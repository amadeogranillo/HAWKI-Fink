<?php

namespace App\Services\Auth;

use Jumbojett\OpenIDConnectClient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;


class OidcService
{
    protected $oidc;

    public function __construct()
{
    if (env('AUTHENTICATION_METHOD') !== 'OIDC') {
        return;
    }

    // Retrieve configuration settings
    $idp = config('open_id_connect.oidc_idp');
    $clientId = config('open_id_connect.oidc_client_id');
    $clientSecret = config('open_id_connect.oidc_client_secret');
    $redirectUri = config('open_id_connect.oidc_redirect_uri'); // ✅ get redirect URI Change of Hochschule Frankfurt

    // Validate configuration settings
    if (empty($idp) || empty($clientId)) {
        throw new \InvalidArgumentException('OIDC configuration variables are not set properly.');
    }

    // Initialize the OpenID Connect client
    if (!empty($clientSecret)) {
        // Confidential client
        $this->oidc = new OpenIDConnectClient($idp, $clientId, $clientSecret);
    } else {
        // Public client
        $this->oidc = new OpenIDConnectClient($idp, $clientId);
    }

    // ✅ Set redirect URI from config #Change of Hochschule Frankfurt
    if (!empty($redirectUri)) {
        $this->oidc->setRedirectURL($redirectUri);
    }

    // ✅ Add scopes from config #Change of Hochschule Frankfurt
    $scopes = config('open_id_connect.oidc_scopes');
    $this->oidc->addScope($scopes);
}


    public function authenticate()
{
    try {
        // Attempt to authenticate the user
        $this->oidc->authenticate();

        // Retrieve attribute mapping from configuration
        $firstNameAttr = config('open_id_connect.attribute_map.firstname');
        $lastNameAttr = config('open_id_connect.attribute_map.lastname');
        $emailAttr = config('open_id_connect.attribute_map.email');
        $employeetypeAttr = config('open_id_connect.attribute_map.employeetype');

        // Retrieve user information
        $email = $this->oidc->requestUserInfo($emailAttr);
        $employeetype = $this->oidc->requestUserInfo($employeetypeAttr);
        $firstname = $this->oidc->requestUserInfo($firstNameAttr);
        $surname = $this->oidc->requestUserInfo($lastNameAttr);
        $name = trim("$firstname $surname");

        // 🔑 Hol den REMOTE_USER-Wert dynamisch aus dem Claim #Change Hochschule Frankfurt
        $remoteUserAttr = env('OIDC_REMOTE_USER_CLAIM', 'email');
        $remoteUser = $this->oidc->requestUserInfo($remoteUserAttr);

        // ✅ Setze REMOTE_USER Change Hochschule Frankfurt
        $_SERVER['REMOTE_USER'] = $remoteUser;

        // Return UserInfo array to authentication controller
        if (!empty($_SERVER['REMOTE_USER'])) {
            return [
                'username' => $_SERVER['REMOTE_USER'],
                'name' => $name,
                'email' => $email,
                'employeetype' => $employeetype,
            ];
        } else {
            throw new \RuntimeException('REMOTE_USER is not set.');
        }
    } catch (\Exception $e) {
        // Handle errors, such as authentication failures
        return response()->json(['error' => 'Authentication failed: ' . $e->getMessage()], 401);
    }
}
}
