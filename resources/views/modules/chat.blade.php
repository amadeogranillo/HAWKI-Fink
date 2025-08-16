@extends('layouts.home')
@section('content')
<div class="main-panel-grid">
	<div class="dy-sidebar expanded" id="chat-sidebar">
		<div class="dy-sidebar-wrapper">
			<!-- <div class="welcome-panel">
				<h1>{{ Auth::user()->name }}</h1>
			</div> -->
			<div class="header">
				<button class="btn-md-stroke" onclick="startNewChat()">
					<div class="icon">
						<x-icon name="plus"/>
					</div>
					<div class="label"><strong>{{ $translation["StartNewChat"] }}</strong></div>
				</button>
				<div class="history-header" style="display: flex; align-items: center; margin-top: 1rem; padding-right: 1rem;">
					<h3 class="title" style="margin: 0; padding-left: 1rem; flex: 1;">{{ $translation["History"] }}</h3>
					<div class="search-container" style="position: relative; width: 2rem; height: 2rem; flex-shrink: 0;">
						<input type="text" id="chat-search" placeholder="{{ $translation['SearchChats'] }}" style="position: absolute; right: 2rem; top: 0; width: 0; height: 2rem; border: 1px solid var(--border-color); border-radius: 4px; padding: 0 0.5rem; font-size: 0.8rem; transition: width 0.3s ease; background: var(--background-secondary); color: var(--text-primary); opacity: 0; pointer-events: none;">
						<button id="search-toggle" onclick="toggleChatSearch()" style="position: absolute; right: 0; top: 0; width: 2rem; height: 2rem; border: none; background: transparent; cursor: pointer; display: flex; align-items: center; justify-content: center; color: var(--text-secondary);">
							<x-icon name="search"/>
						</button>
					</div>
				</div>
			</div>
			<div class="dy-sidebar-content-panel">
				<div class="dy-sidebar-scroll-panel">
					<div class="selection-list" id="chats-list">
				
						
					</div>
				</div>
			</div>
		
			<div class="dy-sidebar-expand-btn" onclick="togglePanelClass('chat-sidebar', 'expanded')">
				<x-icon name="chevron-right"/>
			</div>

		</div>
	</div>



	<div class="dy-main-panel">

		<div class="dy-main-content" id="chat">

			<div class="chat-info">
				<div class="system-prompt"></div>
			</div>


			<div class="chatlog">
				<div class="chatlog-container">

					<div class="scroll-container">
						<div class="scroll-panel">

							<div class="thread trunk" id="0">

							</div>
						</div>
					</div>
					
				</div>
				@php
    $fullName = isset($userProfile) ? $userProfile->name : (Auth::user()->name ?? '');
    $firstName = $fullName ? explode(' ', trim($fullName))[0] : '';
    $hour = (int)date('H');
    if ($hour < 12) {
        $greeting = $translation["GoodMorning"];
    } elseif ($hour < 18) {
        $greeting = $translation["GoodAfternoon"];
    } else {
        $greeting = $translation["GoodEvening"];
    }
@endphp
		<div class="chat-llm-header">
			<div class="chat-llm-logo">
				<img src="{{ asset('/img/robot.svg') }}" alt="Robot" />
			</div>
			<div class="chat-llm-text">Chat LLM</div>
		</div>
		<h1 id="start-title">{{ $greeting }}, {{ $firstName }}<br>{{ $translation["WhatCanIHelpYouWithToday"] }}</h1>
	
				@include('partials.home.input-field', ['lite' => false])

			</div>
			<p class="warning">{{ $translation["MistakeWarning"] }} <a href="/dataprotection" target="_blank"><u>{{ $translation["DataProtection"] }}</u></a> und <a href="/impressum" target="_blank"><u>{{ $translation["Impressum"] }}</u></a>.</p>

		</div>
	</div>
</div>


<script>

let chatSearchActive = false;

function toggleChatSearch() {
	const searchInput = document.getElementById('chat-search');
	const searchContainer = document.querySelector('.search-container');
	const sidebar = document.getElementById('chat-sidebar');
	
	if (!chatSearchActive) {
		// Expand container and show search input
		searchContainer.style.width = '12rem';
		searchInput.style.width = '10rem';
		searchInput.style.opacity = '1';
		searchInput.style.pointerEvents = 'auto';
		searchInput.focus();
		sidebar.classList.add('search-active');
		chatSearchActive = true;
	} else {
		// Collapse container and hide search input
		searchContainer.style.width = '2rem';
		searchInput.style.width = '0';
		searchInput.style.opacity = '0';
		searchInput.style.pointerEvents = 'none';
		searchInput.value = '';
		sidebar.classList.remove('search-active');
		chatSearchActive = false;
		// Reset chat list
		filterChats('');
	}
}

function filterChats(searchTerm) {
	const chatsList = document.getElementById('chats-list');
	const chatItems = chatsList.querySelectorAll('.selection-item');
	let visibleCount = 0;
	
	chatItems.forEach(item => {
		const chatTitle = item.querySelector('.label')?.textContent.toLowerCase() || '';
		const matches = chatTitle.includes(searchTerm.toLowerCase());
		
		if (matches || searchTerm === '') {
			item.style.display = 'flex';
			visibleCount++;
		} else {
			item.style.display = 'none';
		}
	});
	
	// Show "no results" message if needed
	let noResultsMsg = document.getElementById('no-chats-message');
	if (visibleCount === 0 && searchTerm !== '' && chatItems.length > 0) {
		if (!noResultsMsg) {
			noResultsMsg = document.createElement('div');
			noResultsMsg.id = 'no-chats-message';
			noResultsMsg.style.padding = '1rem';
			noResultsMsg.style.textAlign = 'center';
			noResultsMsg.style.color = 'var(--text-secondary)';
			noResultsMsg.style.fontSize = '0.9rem';
			noResultsMsg.textContent = @json($translation['NoChatsFound']);
			chatsList.appendChild(noResultsMsg);
		}
		noResultsMsg.style.display = 'block';
	} else if (noResultsMsg) {
		noResultsMsg.style.display = 'none';
	}
}

// Add event listener for search input
document.addEventListener('DOMContentLoaded', function() {
	const searchInput = document.getElementById('chat-search');
	searchInput.addEventListener('input', function(e) {
		filterChats(e.target.value);
	});
	
	// Close search when clicking outside
	document.addEventListener('click', function(e) {
		const searchContainer = document.querySelector('.search-container');
		if (chatSearchActive && !searchContainer.contains(e.target)) {
			toggleChatSearch();
		}
	});
	
	// Handle escape key
	searchInput.addEventListener('keydown', function(e) {
		if (e.key === 'Escape') {
			toggleChatSearch();
		}
	});
});

window.addEventListener('DOMContentLoaded', async function (){

	initializeAiChatModule(@json($userData['convs']))

	const slug = @json($slug);

	if (slug){
		await loadConv(null, slug);
	}
	else{
        switchDyMainContent('chat');
	}
});


</script>


@endsection

