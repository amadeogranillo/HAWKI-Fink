


<div class="input-container admin-only editor-only" id="input-container">

    <div class="isTypingStatus"></div>

    <div class="input-controls" id="input-controls">
        @if(!$lite)
        <button class="btn-xs expand-btn" onclick="toggleRelativePanelClass('input-controls', this,'expanded')">
            <div class="icon">
                <x-icon name="chevron-up"/>
            </div>
        </button>
        @endif

        <div class="minimized-content">
            <div class="left">

                @if($activeModule === 'chat')
                    <button class="btn-xs fast-access-btn" onclick="startNewChat()">
                        <x-icon name="new"/>
                        <div class="tooltip">
                            {{ $translation["StartNewChat"] }}
                        </div>
                    </button>
                @endif

                @if(!$lite && $activeModule === 'chat')
                    <button class="btn-xs fast-access-btn" value="system_prompt_panel" onclick="toggleRelativePanelClass('input-controls', this,'expanded'); switchControllerProp(this, 'system_prompt_panel')">
                        <x-icon name="sliders"/>
                        <div class="tooltip">
                            {{ $translation["SystemPrompt"] }}
                        </div>
                    </button>

                @endif

                @if(!$lite && $activeModule === 'chat')
                    <button class="btn-xs fast-access-btn" value="temperature_panel" onclick="toggleRelativePanelClass('input-controls', this,'expanded'); switchControllerProp(this, 'temperature_panel')">
                        <x-icon name="thermometer"/>
                        <div class="tooltip">
                            {{ $translation["ModelTemperature"] }}
                        </div>
                    </button>

                @endif

                @if(!$lite && $activeModule === 'chat')
                    <button class="btn-xs fast-access-btn" value="prompt_library_panel" onclick="toggleRelativePanelClass('input-controls', this,'expanded'); switchControllerProp(this, 'prompt_library_panel')">
                        <x-icon name="book"/>
                        <div class="tooltip">
                            {{ $translation["PromptLibrary"] }}
                        </div>
                    </button>

                @endif

                @if(!$lite)
                    <button class="btn-xs fast-access-btn" value="export-panel" onclick="toggleRelativePanelClass('input-controls', this,'expanded'); switchControllerProp(this, 'export-panel')">
                        <x-icon name="download"/>
                        <div class="tooltip">
                            {{ $translation["Export"] }}
                        </div>
                    </button>
                @endif
   
            </div>

            <div class="right">
                <div id="model-selectors">

                    <div class="burger-dropdown anchor-top-right" id="model-selector-burger">
                        @include('partials.home.components.models-list')
                    </div>
                
                    <div class="burger-btn-arrow burger-btn" onclick="openBurgerMenu('model-selector-burger', this, false, true, true)">
                        <div class="icon">
                            <x-icon name="chevron-up"/>
                        </div>
                        <div class="label model-selector-label"></div>
                    </div>
              
                </div>
            </div>
        </div>

        @if(!$lite)
        <div class="expanded-content">

            <div class="expanded-left">
                <div class="controls-container scroll-container">

                    <div class="control-buttons scroll-panel">
                        @if($activeModule === 'chat')

                        <button class="btn-xs menu-item" value="" onclick="switchControllerProp(this); startNewChat(); toggleRelativePanelClass('input-controls', this,'expanded');">
                            <x-icon name="new"/>
                            <div class="label">{{ $translation["StartNewChat"] }}</div>
                        </button>
                        @endif

                        <button class="btn-xs menu-item" value="models_panel" onclick="switchControllerProp(this, 'models_panel')">
                            <x-icon name="layers"/>
                            <div class="label">{{ $translation["Models"] }}
                                <span id="models-info-icon" style="display:inline-block;vertical-align:middle;cursor:pointer;margin-left:0.5em;position:relative;" onclick="openModelInfoModal(event)" onmouseenter="showModelsTooltip()" onmouseleave="hideModelsTooltip()">
                                    <x-icon name="info"/>
                                    <span id="models-info-tooltip" style="display:none;position:absolute;left:1.5em;top:50%;transform:translateY(-50%);background:#222;color:#fff;padding:0.2em 0.6em;border-radius:4px;font-size:0.9em;white-space:nowrap;z-index:10;">{{ $translation["ModelsInfoTooltip"] }}</span>
                                </span>
                            </div>
                        </button>
                        
                        @if($activeModule === 'chat')
                        <button class="btn-xs menu-item" value="system_prompt_panel" onclick="switchControllerProp(this, 'system_prompt_panel')">
                            <x-icon name="sliders"/>
                            <div class="label">{{ $translation["SystemPrompt"] }}
                                <span id="system-prompt-info-icon" style="display:inline-block;vertical-align:middle;cursor:pointer;margin-left:0.5em;position:relative;" onmouseenter="showSystemPromptTooltip()" onmouseleave="hideSystemPromptTooltip()">
                                    <x-icon name="info"/>
                                    <span id="system-prompt-info-tooltip" style="display:none;position:fixed;background:#222;color:#fff;padding:0.5em 0.8em;border-radius:6px;font-size:0.85em;z-index:1000;width:300px;white-space:normal;box-shadow:0 2px 8px rgba(0,0,0,0.3);pointer-events:none;">{{ $translation["SystemPrompt_Desc"] }}</span>
                                </span>
                            </div>
                        </button>
                        @endif
                        
                        @if($activeModule === 'chat')
                        <button class="btn-xs menu-item" value="temperature_panel" onclick="switchControllerProp(this, 'temperature_panel')">
                            <x-icon name="thermometer"/>
                            <div class="label">{{ $translation["ModelTemperature"] }}
                                <span id="temperature-info-icon" style="display:inline-block;vertical-align:middle;cursor:pointer;margin-left:0.5em;position:relative;" onmouseenter="showTemperatureTooltip()" onmouseleave="hideTemperatureTooltip()">
                                    <x-icon name="info"/>
                                    <span id="temperature-info-tooltip" style="display:none;position:fixed;background:#222;color:#fff;padding:0.5em 0.8em;border-radius:6px;font-size:0.85em;z-index:1000;width:300px;white-space:normal;box-shadow:0 2px 8px rgba(0,0,0,0.3);pointer-events:none;">{{ $translation["ModelTemperature_Desc"] }}</span>
                                </span>
                            </div>
                        </button>
                        @endif
                        
                        @if($activeModule === 'chat')
                        <button class="btn-xs menu-item" value="prompt_library_panel" onclick="switchControllerProp(this, 'prompt_library_panel')">
                            <x-icon name="book"/>
                            <div class="label">{{ $translation["PromptLibrary"] }}
                                <span id="prompt-library-info-icon" style="display:inline-block;vertical-align:middle;cursor:pointer;margin-left:0.5em;position:relative;" onmouseenter="showPromptLibraryTooltip()" onmouseleave="hidePromptLibraryTooltip()">
                                    <x-icon name="info"/>
                                    <span id="prompt-library-info-tooltip" style="display:none;position:fixed;background:#222;color:#fff;padding:0.5em 0.8em;border-radius:6px;font-size:0.85em;z-index:1000;width:300px;white-space:normal;box-shadow:0 2px 8px rgba(0,0,0,0.3);pointer-events:none;">{{ $translation["PromptLibrary_Desc"] }}</span>
                                </span>
                            </div>
                        </button>
                        @endif
                        
                        <button class="btn-xs menu-item" value="export-panel" onclick="switchControllerProp(this, 'export-panel')">
                            <x-icon name="download"/>
                            <div class="label">{{ $translation["Export"] }}</div>
                        </button>            
                    </div>

                </div>
            </div>
            <div class="expanded-right">
                <div class="controls-props scroll-container">
                    
                    <div class="scroll-panel" id="input-controls-props-panel">
                        
                        <div id="system_prompt_panel" class="prop-content">
                            <div contenteditable class="system_prompt_field" id="system_prompt_field"></div>
                        </div>

                        <div id="temperature_panel" class="prop-content">
                            <div class="temperature-control">
                                <div class="temperature-slider-container">
                                    <input type="range" id="temperature-slider" class="temperature-slider" min="0" max="1" step="0.1" value="0.7" oninput="updateTemperatureValue(this.value)">
                                    <div class="temperature-value-display">
                                        <span id="temperature-value">0.7</span>
                                    </div>
                                </div>
                                <div class="temperature-labels">
                                    <span class="temp-label-min">{{ $translation["Logical"] }}</span>
                                    <span class="temp-label-max">{{ $translation["Creative"] }}</span>
                                </div>
                            </div>
                        </div>

                        <div id="prompt_library_panel" class="prop-content">
                            <div id="prompt-library-categories" style="margin-bottom: 1rem;">
                                @if(isset($translation["categories"]))
                                    @foreach($translation["categories"] as $index => $category)
                                        <div class="prompt-category-section" data-category-index="{{ $index }}" style="margin-bottom: 1rem;">
                                            <div class="prompt-category-item" style="display: flex; align-items: center; gap: 0.5em; margin-bottom: 0.5em; cursor: pointer; padding: 0.5em; border-radius: 4px; background: var(--background-secondary);">
                                                <span class="category-icon">
                                                    @if(isset($category["icon"]))
                                                        <x-icon name="{{ $category["icon"] }}"/>
                                                    @endif
                                                </span>
                                                <span class="category-label" style="font-weight: 600;">{{ $category["label"] }}</span>
                                            </div>
                                            <div class="category-prompts" style="display: none; margin-left: 1.5em; margin-top: 0.5em;"></div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div id="models_panel" class="prop-content">
                            @include('partials.home.components.models-list')
                        </div>

                        <div id="export-panel" class="prop-content">
                            
                            <button class="burger-item" id="export-btn-print" onclick="exportPrintPage()">
                                <div class="icon"></div>
                                <div class="label">{{ $translation["Print"] }}</div>
                            </button>

                            <button class="burger-item" id="export-btn-pdf" onclick="exportAsPDF()">
                                <div class="loading loading-sm">
                                    <x-icon name="loading"/>
                                </div>
                                <div class="icon"></div>
                                <div class="label">PDF {{ $translation["Download"] }}</div>
                            </button>

                            <button class="burger-item" id="export-btn-word" onclick="exportAsWord()">
                                <div class="loading loading-sm">
                                    <x-icon name="loading"/>
                                </div>
                                <div class="icon"></div>
                                <div class="label">Word {{ $translation["Download"] }}</div>
                            </button>

                            <button class="burger-item" id="export-btn-csv" onclick="exportAsCsv()">
                                <div class="loading loading-sm">
                                    <x-icon name="loading"/>
                                </div>
                                <div class="icon"></div>
                                <div class="label">CSV {{ $translation["Download"] }}</div>
                            </button>

                            <button class="burger-item" id="export-btn-json" onclick="exportAsJson()">
                                <div class="icon"></div>
                                <div class="label">JSON {{ $translation["Download"] }}</div>
                            </button>
                        </div>

                    </div>
                    
                </div>

            </div>
        </div>
        @endif

    </div>
    <div class="input" id="0">
        <div class="input-wrapper">
            <textarea  
                class="input-field"
                id="main-input-field" 
                type="text"

                @if($activeModule === 'chat')

                    placeholder="{{ $translation['Input_Placeholder_Chat'] }}" 
                    oninput="resizeInputField(this);" 
                    onkeypress="onHandleKeydownConv(event)"

                @elseif($activeModule === 'groupchat')

                    placeholder="{{ $translation['Input_Placeholder_Room'] ." ". config('app.aiHandle')}}"
                    oninput="resizeInputField(this); onGroupchatType()" 
                    onkeypress="onHandleKeydownRoom(event)"
                
                @endif

                onfocus="onInputFieldFocus(this); toggleOffRelativeInputControl(this)"
                onfocusout="onInputFieldFocusOut(this)"></textarea>
        </div>


        <div class="input-send-group">
            <div class="mic-btn tooltip-parent" onclick="toggleMicrophone()">
                <svg width="16" height="16" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.003 22.377c3.231 0 5.851-2.619 5.851-5.851v-10.639c0-3.231-2.62-5.85-5.851-5.85s-5.851 2.619-5.851 5.85v10.639c0 3.231 2.62 5.851 5.851 5.851zM11.216 5.888c0-2.639 2.147-4.786 4.787-4.786s4.787 2.147 4.787 4.786v10.639c0 2.64-2.147 4.787-4.787 4.787s-4.787-2.147-4.787-4.787v-10.639z" fill="currentColor"/>
                    <path d="M23.978 11.207v5.319c0 4.399-3.579 7.978-7.978 7.978s-7.978-3.579-7.978-7.978v-5.319h-1.064v5.319c0 4.83 3.81 8.776 8.581 9.018h-0.068v5.354h-4.79v1.064h10.637v-1.064h-4.784v-5.354h-0.073c4.771-0.243 8.581-4.189 8.581-9.018v-5.319h-1.064z" fill="currentColor"/>
                </svg>
                <div class="label tooltip tt-abs-up">
                    {{ $translation["Microphone"] ?? "Microphone" }}
                </div>
            </div>

            <div class="input-send tooltip-parent">
                @if($activeModule === 'chat')
                    <div id="send-btn" onClick="onSendClickConv(this)">
                @elseif($activeModule === 'groupchat')
                    <div id="send-btn" onClick="onSendClickRoom(this)">
                @endif
                        <div id="send-icon" class="send-btn-icon" >
                            <x-icon name="arrow-up"/>
                        </div>
                        <div id="stop-icon" class="send-btn-icon" style="display:none">
                            <x-icon name="stop"/>
                        </div>
                        <div id="loading-icon" class="send-btn-icon loading loading-lg" style="display:none">
                            <div class="loading">
                                <x-icon name="loading"/>
                            </div>
                        </div>
                </div>

                <div class="label tooltip tt-abs-up">
                    {{ $translation["Send"] }}
                </div>
            </div>
        </div>


        <div class="prompt-improvement-btn tooltip-parent" onclick="requestPromptImprovement(this)">
            <x-icon name="vector"/>
            <div class="label tooltip tt-abs-up">
                {{ $translation["PromptImprovement"] }}
            </div>
        </div>
    </div>
</div>

<script>
class SpeechDictation {
    constructor() {
        this.recognition = null;
        this.isListening = false;
        this.silenceTimer = null;
        this.micButton = null;
        this.inputField = null;
        this.isSupported = false;
        this.currentLanguage = this.detectLanguage();
        
        this.init();
    }
    
    init() {
        console.log('SpeechDictation: Initializing...');
        
        // Get DOM elements first
        this.micButton = document.querySelector('.mic-btn');
        this.inputField = document.querySelector('.input-field');
        
        console.log('SpeechDictation: Button found:', !!this.micButton);
        console.log('SpeechDictation: Input field found:', !!this.inputField);
        
        // Always ensure button is visible
        if (this.micButton) {
            this.micButton.style.display = '';
            console.log('SpeechDictation: Button made visible');
        }
        
        // Check if Web Speech API is supported
        if (!('webkitSpeechRecognition' in window) && !('SpeechRecognition' in window)) {
            console.warn('Web Speech API not supported in this browser');
            this.isSupported = false;
            this.addUnsupportedStyling();
            return;
        }
        
        console.log('SpeechDictation: Web Speech API supported');
        this.isSupported = true;
        
        // Initialize speech recognition
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        this.recognition = new SpeechRecognition();
        
        // Configure recognition
        this.recognition.continuous = true;
        this.recognition.interimResults = false;
        this.recognition.lang = this.currentLanguage;
        
        console.log('SpeechDictation: Language set to', this.currentLanguage);
        
        // Set up event listeners
        this.setupEventListeners();
    }
    
    detectLanguage() {
        let currentLang = 'en_US'; // Default fallback
        
        // Method 1: Check window.activeLocale (primary method)
        if (window.activeLocale?.id) {
            currentLang = window.activeLocale.id;
            console.log('SpeechDictation: Language from activeLocale:', currentLang);
        }
        // Method 2: Check global translation object
        else if (window.translation) {
            // Check for German-specific translations
            if (window.translation['Logout'] === 'Ausloggen' || 
                window.translation['Settings'] === 'Einstellungen' ||
                window.translation['Chat'] === 'Chat') {
                currentLang = 'de_DE';
                console.log('SpeechDictation: Language detected from translation object: German');
            } else {
                currentLang = 'en_US';
                console.log('SpeechDictation: Language detected from translation object: English');
            }
        }
        // Method 3: Check for German UI elements
        else if (this.detectFromUIElements()) {
            currentLang = 'de_DE';
            console.log('SpeechDictation: Language detected from UI elements: German');
        }
        // Method 4: Check document language
        else if (document.documentElement.lang) {
            const docLang = document.documentElement.lang.toLowerCase();
            if (docLang.includes('de')) {
                currentLang = 'de_DE';
            } else if (docLang.includes('en')) {
                currentLang = 'en_US';
            }
            console.log('SpeechDictation: Language from document.lang:', docLang, '->', currentLang);
        }
        
        // Map app languages to speech recognition languages
        const languageMap = {
            'de_DE': 'de-DE',
            'en_US': 'en-US'
        };
        
        const speechLang = languageMap[currentLang] || 'en-US';
        console.log('SpeechDictation: Final speech recognition language:', speechLang);
        
        return speechLang;
    }
    
    detectFromUIElements() {
        // Look for German text in common UI elements
        const elementsToCheck = [
            'h1', 'h2', 'h3', 
            '.btn', '.label', '.title',
            '[class*="translation"]',
            'button'
        ];
        
        for (const selector of elementsToCheck) {
            const elements = document.querySelectorAll(selector);
            for (const element of elements) {
                const text = element.textContent?.toLowerCase() || '';
                // Check for common German words
                if (text.includes('einstellungen') || 
                    text.includes('ausloggen') || 
                    text.includes('verlauf') ||
                    text.includes('gruppenchat') ||
                    text.includes('neuen chat starten') ||
                    text.includes('guten') ||
                    text.includes('wie kann ich')) {
                    return true;
                }
            }
        }
        return false;
    }
    
    setupEventListeners() {
        this.recognition.onstart = () => {
            this.isListening = true;
            this.micButton?.classList.add('recording');
            this.startSilenceTimer();
        };
        
        this.recognition.onresult = (event) => {
            this.resetSilenceTimer();
            
            // Get the final result
            let finalTranscript = '';
            for (let i = event.resultIndex; i < event.results.length; i++) {
                if (event.results[i].isFinal) {
                    finalTranscript += event.results[i][0].transcript;
                }
            }
            
            if (finalTranscript) {
                // Animate text replacement like prompt improvement
                this.animateTextReplacement(finalTranscript.trim());
            }
        };
        
        this.recognition.onerror = (event) => {
            console.error('Speech recognition error:', event.error);
            this.stopListening();
            
            // Show user-friendly error message
            this.showError(event.error);
        };
        
        this.recognition.onend = () => {
            this.stopListening();
        };
    }
    
    startSilenceTimer() {
        this.silenceTimer = setTimeout(() => {
            if (this.isListening) {
                this.stopListening();
            }
        }, 5000); // 5 seconds silence timeout
    }
    
    resetSilenceTimer() {
        if (this.silenceTimer) {
            clearTimeout(this.silenceTimer);
            this.startSilenceTimer();
        }
    }
    
    startListening() {
        if (!this.recognition || this.isListening) return;
        
        try {
            // Always re-detect language before starting
            const detectedLang = this.detectLanguage();
            this.currentLanguage = detectedLang;
            this.recognition.lang = detectedLang;
            
            console.log('SpeechDictation: Starting recognition with language:', detectedLang);
            this.recognition.start();
        } catch (error) {
            console.error('Failed to start speech recognition:', error);
            this.showError('start_failed');
        }
    }
    
    // Method to manually update language (can be called when user changes app language)
    updateLanguage() {
        const newLang = this.detectLanguage();
        this.currentLanguage = newLang;
        if (this.recognition) {
            this.recognition.lang = newLang;
        }
        console.log('SpeechDictation: Language updated to:', newLang);
        return newLang;
    }
    
    stopListening() {
        if (!this.recognition || !this.isListening) return;
        
        this.isListening = false;
        this.micButton?.classList.remove('recording');
        
        if (this.silenceTimer) {
            clearTimeout(this.silenceTimer);
            this.silenceTimer = null;
        }
        
        try {
            this.recognition.stop();
        } catch (error) {
            console.error('Error stopping recognition:', error);
        }
    }
    
    toggle() {
        if (!this.isSupported) {
            this.showUnsupportedMessage();
            return;
        }
        
        if (this.isListening) {
            this.stopListening();
        } else {
            this.startListening();
        }
    }
    
    addUnsupportedStyling() {
        if (this.micButton) {
            this.micButton.style.opacity = '0.5';
            this.micButton.style.cursor = 'not-allowed';
            console.log('SpeechDictation: Added unsupported styling');
        }
    }
    
    showUnsupportedMessage() {
        const browserName = this.getBrowserName();
        let message = `Speech recognition is not supported in ${browserName}.\n\nFor voice dictation, please use:\n• Chrome\n• Microsoft Edge\n• Safari (iOS only)`;
        
        alert(message);
        console.warn('Speech recognition attempted on unsupported browser:', browserName);
    }
    
    getBrowserName() {
        const userAgent = navigator.userAgent;
        if (userAgent.includes('Firefox')) return 'Firefox';
        if (userAgent.includes('Safari') && !userAgent.includes('Chrome')) return 'Safari';
        if (userAgent.includes('Edge')) return 'Microsoft Edge';
        if (userAgent.includes('Chrome')) return 'Chrome';
        return 'this browser';
    }
    
    // Animate text replacement with smooth transition like prompt improvement
    async animateTextReplacement(newText) {
        if (!this.inputField) return;
        
        // First, smoothly delete existing content if any
        if (this.inputField.value.trim()) {
            await this.smoothDeleteWords(this.inputField, 300);
        }
        
        // Then, type the new text with animation
        await this.typeText(this.inputField, newText, 25);
        
        // Focus the input field
        this.inputField.focus();
    }
    
    // Smooth word-by-word deletion animation (adapted from home_functions.js)
    async smoothDeleteWords(element, totalTime) {
        let content = element.value || '';
        let words = content.trim().split(/\s+/);
        
        if (words.length === 0 || words[0] === '') return;
        
        let interval = totalTime / words.length;
        
        while (words.length > 0) {
            words.pop();
            element.value = words.join(' ');
            
            // Trigger resize if the function exists
            if (typeof resizeInputField === 'function') {
                resizeInputField(element);
            }
            
            await new Promise(resolve => setTimeout(resolve, interval));
        }
        
        element.value = '';
    }
    
    // Smooth typing animation (adapted from inputfield_functions.js)
    async typeText(element, text, speed = 50) {
        const words = text.split(' ');
        let currentText = '';
        
        for (let i = 0; i < words.length; i++) {
            currentText += (i > 0 ? ' ' : '') + words[i];
            element.value = currentText;
            
            // Trigger resize if the function exists
            if (typeof resizeInputField === 'function') {
                resizeInputField(element);
            }
            
            await new Promise(resolve => setTimeout(resolve, speed));
        }
    }
    
    showError(errorType) {
        let message = 'Speech recognition error';
        
        switch (errorType) {
            case 'not-allowed':
                message = 'Microphone access denied. Please allow microphone access and try again.';
                break;
            case 'no-speech':
                message = 'No speech detected. Please try again.';
                break;
            case 'network':
                message = 'Network error. Please check your connection.';
                break;
            case 'start_failed':
                message = 'Failed to start speech recognition. Please try again.';
                break;
        }
        
        // Show error in console for now (could be replaced with toast notification)
        console.warn('Dictation error:', message);
    }
    
    hideMicrophoneButton() {
        const micBtn = document.querySelector('.mic-btn');
        if (micBtn) {
            micBtn.style.display = 'none';
            console.warn('Microphone button hidden - Web Speech API not supported in this browser');
        }
    }
}

// Global speech dictation instance
let speechDictation = null;

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing speech dictation...');
    
    // Ensure microphone button is visible first
    const micBtn = document.querySelector('.mic-btn');
    if (micBtn) {
        micBtn.style.display = '';
        console.log('Microphone button found and made visible');
    } else {
        console.warn('Microphone button not found in DOM');
    }
    
    // Initialize speech dictation
    try {
        speechDictation = new SpeechDictation();
    } catch (error) {
        console.error('Failed to initialize speech dictation:', error);
        // Even if speech fails, keep the button visible with a fallback
        if (micBtn) {
            console.log('Keeping microphone button visible despite speech initialization failure');
        }
    }
});

// Global function for button click
function toggleMicrophone() {
    console.log('Microphone button clicked');
    
    if (speechDictation) {
        speechDictation.toggle();
    } else {
        console.warn('Speech dictation not initialized');
        alert('Speech recognition is not available. Please refresh the page or try using Chrome or Microsoft Edge.');
    }
}

// Global function to test and debug language detection
function testSpeechLanguage() {
    if (!speechDictation) {
        console.warn('Speech dictation not available');
        return null;
    }
    
    console.log('=== SPEECH LANGUAGE DEBUG ===');
    console.log('1. window.activeLocale:', window.activeLocale);
    console.log('2. window.translation sample:', {
        logout: window.translation?.['Logout'],
        settings: window.translation?.['Settings'],
        chat: window.translation?.['Chat']
    });
    console.log('3. document.documentElement.lang:', document.documentElement.lang);
    
    const detectedLang = speechDictation.detectLanguage();
    console.log('4. Detected speech language:', detectedLang);
    console.log('==============================');
    
    return detectedLang;
}

// Global function to manually update speech language
function updateSpeechLanguage() {
    if (speechDictation) {
        return speechDictation.updateLanguage();
    }
    return null;
}
</script>

<div id="model-info-modal" class="modal" style="display:none;">
    <div class="modal-panel">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="closeButton" onclick="closeModelInfoModal()" style="position:absolute;top:1rem;right:1rem;cursor:pointer;">
                    <svg viewBox="0 0 100 100" width="24" height="24"><path class="fill-svg" d="M 19.52 19.52 a 6.4 6.4 90 0 1 9.0496 0 L 51.2 42.1504 L 73.8304 19.52 a 6.4 6.4 90 0 1 9.0496 9.0496 L 60.2496 51.2 L 82.88 73.8304 a 6.4 6.4 90 0 1 -9.0496 9.0496 L 51.2 60.2496 L 28.5696 82.88 a 6.4 6.4 90 0 1 -9.0496 -9.0496 L 42.1504 51.2 L 19.52 28.5696 a 6.4 6.4 90 0 1 0 -9.0496 z"/></svg>
                </div>
                <h2>{{ $translation['ModelInfo_Title'] }}</h2>
                <p style="white-space:pre-line;">{{ $translation['ModelInfo_Text'] }}</p>
            </div>
        </div>
    </div>
</div>

<script>
function showModelsTooltip() {
    var tooltip = document.getElementById('models-info-tooltip');
    if (tooltip) tooltip.style.display = 'block';
}

function hideModelsTooltip() {
    var tooltip = document.getElementById('models-info-tooltip');
    if (tooltip) tooltip.style.display = 'none';
}

function showPromptLibraryTooltip() {
    var tooltip = document.getElementById('prompt-library-info-tooltip');
    var icon = document.getElementById('prompt-library-info-icon');
    if (tooltip && icon) {
        var rect = icon.getBoundingClientRect();
        tooltip.style.left = (rect.right + 10) + 'px';
        tooltip.style.top = (rect.top - 10) + 'px';
        tooltip.style.display = 'block';
    }
}

function hidePromptLibraryTooltip() {
    var tooltip = document.getElementById('prompt-library-info-tooltip');
    if (tooltip) tooltip.style.display = 'none';
}

function showSystemPromptTooltip() {
    var tooltip = document.getElementById('system-prompt-info-tooltip');
    var icon = document.getElementById('system-prompt-info-icon');
    if (tooltip && icon) {
        var rect = icon.getBoundingClientRect();
        tooltip.style.left = (rect.right + 10) + 'px';
        tooltip.style.top = (rect.top - 10) + 'px';
        tooltip.style.display = 'block';
    }
}

function hideSystemPromptTooltip() {
    var tooltip = document.getElementById('system-prompt-info-tooltip');
    if (tooltip) tooltip.style.display = 'none';
}

function showTemperatureTooltip() {
    var tooltip = document.getElementById('temperature-info-tooltip');
    var icon = document.getElementById('temperature-info-icon');
    if (tooltip && icon) {
        var rect = icon.getBoundingClientRect();
        tooltip.style.left = (rect.right + 10) + 'px';
        tooltip.style.top = (rect.top - 10) + 'px';
        tooltip.style.display = 'block';
    }
}

function hideTemperatureTooltip() {
    var tooltip = document.getElementById('temperature-info-tooltip');
    if (tooltip) tooltip.style.display = 'none';
}

function updateTemperatureValue(value) {
    document.getElementById('temperature-value').textContent = value;
    // Store temperature value for use in requests
    window.currentTemperature = parseFloat(value);
    // Save to localStorage for persistence
    localStorage.setItem('hawki_temperature', value);
}

document.addEventListener('DOMContentLoaded', function () {
    const translation = @json($translation);
    const categories = translation.categories || [];
    const categoryItems = document.querySelectorAll('.prompt-category-item');
    const categorySections = document.querySelectorAll('.prompt-category-section');
    
    // Initialize temperature value
    const temperatureSlider = document.getElementById('temperature-slider');
    if (temperatureSlider) {
        // Load saved temperature value or use default
        const savedTemperature = localStorage.getItem('hawki_temperature');
        if (savedTemperature) {
            temperatureSlider.value = savedTemperature;
            document.getElementById('temperature-value').textContent = savedTemperature;
            window.currentTemperature = parseFloat(savedTemperature);
        } else {
            window.currentTemperature = parseFloat(temperatureSlider.value);
        }
    }

    function toggleCategoryPrompts(categoryIdx) {
        const categorySection = categorySections[categoryIdx];
        const promptContainer = categorySection.querySelector('.category-prompts');
        const categoryItem = categorySection.querySelector('.prompt-category-item');
        
        // Check if this category is currently open
        const isOpen = promptContainer.style.display === 'block';
        
        // Close all categories first
        categorySections.forEach((section, idx) => {
            const container = section.querySelector('.category-prompts');
            const item = section.querySelector('.prompt-category-item');
            container.style.display = 'none';
            container.innerHTML = '';
            item.style.fontWeight = '600';
            item.style.backgroundColor = 'var(--background-secondary)';
        });
        
        // If this category was not open, open it
        if (!isOpen) {
            const prompts = categories[categoryIdx].prompts || [];
            prompts.forEach(prompt => {
                const btn = document.createElement('button');
                btn.className = 'burger-item';
                btn.style.marginBottom = '0.25em';
                btn.innerHTML = `<div class="icon"></div><div class="label">${prompt.label}</div>`;
                btn.onclick = function() { applyPromptTemplate(prompt.key); };
                promptContainer.appendChild(btn);
            });
            promptContainer.style.display = 'block';
            categoryItem.style.fontWeight = 'bold';
            categoryItem.style.backgroundColor = 'var(--background-primary)';
        }
    }

    // Add click listeners
    categoryItems.forEach((item, idx) => {
        item.addEventListener('click', function() {
            toggleCategoryPrompts(idx);
        });
    });
});
</script>
