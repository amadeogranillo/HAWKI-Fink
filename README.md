
## Installation instructions: see "Anleitung HAWKI_LDAP.pdf" file in the repository.

For a complete description of the project and its changes to the original HAWKI code refer to Prof. Fr. Fink for the documentation.

## HAWKI2 original README


With HAWKI2, our university's own data protection-compliant platform for generative AI enters the next phase of development. The new version offers numerous improvements through even stronger integration into everyday university life, focusing on flexibility, transparency, and collaboration.


![A laptop that shows the new version of HAWKI](https://github.com/user-attachments/assets/120488e9-5ce2-4a3f-be5b-aa57bf4a2438)


### What's new in HAWKI 2?


- Group chats for peer-to-peer qualification
  
University members can now exchange ideas in interactive chat rooms—similar to WhatsApp—and additionally integrate the generative AI at any time by addressing it as an additional participant in the group. This not only facilitates extended collaboration but also provides all participants the opportunity to use and understand the generative AI together.


- Export function with intelligent summarization
  
The new automated documentation of prompts creates transparency in AI-supported work processes—an important step for use in examinations and scientific work.


- Modular architecture for rapid development
  
HAWKI 2 is designed so that new features can be integrated even more quickly and flexibly. This allows educational institutions that use HAWKI to tailor the platform to their specific needs. We will be adding new features at short intervals!


- Various model options
  
By allowing the use of different language models, HAWKI opens up to intercultural perspectives and more diverse use cases in university teaching. The differently trained language models are suitable for engaging with the values, norms, cultures, and biases within their respective models. We provide a connection for the models of OpenAI, Google and various models hosted by the GWDG (for example DeepSeek or Meta Llama).


### Why HAWKI 2?

The updated HAWKI ecosystem deliberately emphasizes inter-university collaboration to design generative AI in a sustainable, transparent manner tailored to the needs of universities. Unlike commercial AI applications, HAWKI prioritizes the digital sovereignty of universities. The goal is to create a connected ecosystem that allows university members to interact with generative AI in their own way—without rigid guidelines, but with clear ethical and didactic principles.


**HAWKI 2 is open for everyone—join now, shape the future, and explore the possibilities of generative AI in university teaching!** 

### Changes compared to the original HAWKI repository

- LDAP authentication flow added and enabled by default:
  - Backend: `app/Services/Auth/LdapService.php`, `app/Http/Controllers/AuthenticationController.php` (route `POST /req/login-ldap` in `routes/web.php`).
  - Frontend: LDAP login form and JS handlers in `resources/views/partials/login/authForms.blade.php` and `resources/views/layouts/login.blade.php`.
  - Configuration: `config/ldap.php` and `.env` variables (`LDAP_*`). The `hawki` CLI assists with LDAP setup.
- AI model providers configuration prepopulated and tooling:
  - Config template `config/model_providers.php.example` with GWDG, OpenAI, Google, Ollama, and OpenWebUI models.
  - Providers and factory in `app/Services/AI/Providers/*` and `app/Services/AI/AIProviderFactory.php` (includes `GWDGProvider`, `OpenWebUIProvider`).
  - Utility command `app/Console/Commands/GetGWDGList.php`.
  - `hawki` CLI supports interactive model provider setup and generates `config/model_providers.php`.
- Documentation and deployment aids:
  - Extended docs in `_documentation/` (Local/Docker/Apache installation, model connection, API/CLI).
  - Docker and nginx/php configs for local and production setups.

Notes:
- Where features existed upstream, this fork preconfigures and documents them for LDAP-centric setups and GWDG integration.
- See the commit history for granular diffs against upstream.
