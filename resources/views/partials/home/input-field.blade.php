


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


        <div class="prompt-improvement-btn tooltip-parent" onclick="requestPromptImprovement(this)">
            <x-icon name="vector"/>
            <div class="label tooltip tt-abs-up">
                {{ $translation["PromptImprovement"] }}
            </div>
        </div>
    </div>
</div>

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
