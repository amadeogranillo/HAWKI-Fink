


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
                            <div class="label">{{ $translation["Models"] }}</div>
                        </button>
                        
                        @if($activeModule === 'chat')
                        <button class="btn-xs menu-item" value="system_prompt_panel" onclick="switchControllerProp(this, 'system_prompt_panel')">
                            <x-icon name="sliders"/>
                            <div class="label">{{ $translation["SystemPrompt"] }}</div>
                        </button>
                        @endif
                        
                        @if($activeModule === 'chat')
                        <button class="btn-xs menu-item" value="prompt_library_panel" onclick="switchControllerProp(this, 'prompt_library_panel')">
                            <x-icon name="book"/>
                            <div class="label">{{ $translation["PromptLibrary"] }}</div>
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

                        <div id="prompt_library_panel" class="prop-content">
                            
                            <div style="padding: 1rem 0 0.5rem 0; font-weight: bold; font-size: 1.1em; color: var(--text-primary);">
                                {{ $translation["PromptLibrary_Desc"] }}
                            </div>
                            
                            <button class="burger-item" onclick="applyPromptTemplate('code_review')">
                                <div class="icon"></div>
                                <div class="label">Code Review Assistant</div>
                            </button>

                            <button class="burger-item" onclick="applyPromptTemplate('debug_helper')">
                                <div class="icon"></div>
                                <div class="label">Debug Helper</div>
                            </button>

                            <button class="burger-item" onclick="applyPromptTemplate('architecture_advisor')">
                                <div class="icon"></div>
                                <div class="label">Architecture Advisor</div>
                            </button>

                            <button class="burger-item" onclick="applyPromptTemplate('documentation_writer')">
                                <div class="icon"></div>
                                <div class="label">Documentation Writer</div>
                            </button>

                            <button class="burger-item" onclick="applyPromptTemplate('api_designer')">
                                <div class="icon"></div>
                                <div class="label">API Designer</div>
                            </button>

                            <button class="burger-item" onclick="applyPromptTemplate('performance_optimizer')">
                                <div class="icon"></div>
                                <div class="label">Performance Optimizer</div>
                            </button>

                            <button class="burger-item" onclick="applyPromptTemplate('security_analyst')">
                                <div class="icon"></div>
                                <div class="label">Security Analyst</div>
                            </button>

                            <button class="burger-item" onclick="applyPromptTemplate('testing_strategist')">
                                <div class="icon"></div>
                                <div class="label">Testing Strategist</div>
                            </button>

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
