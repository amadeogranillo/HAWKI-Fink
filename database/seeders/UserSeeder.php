<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['employeetype' => 'AI'], // Find by this condition
            [
                'name' => 'AI',
                'username' => 'CHAT LLM',
                'email' => 'HAWKI@hawk.de',
                'publicKey' => '0',
                'avatar_id' => 'hawkiAvatar.jpg'
            ]
        );
    }
}
