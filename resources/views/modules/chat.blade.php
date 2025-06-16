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
				<h3 class="title">{{ $translation["History"] }}</h3>

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
				<h1 id="start-title">{{ $translation["StartBanner"] }}</h1>
				<div id="start-title">
					<div class="opportunities-section">
						<h3>{{ $translation["Opportunities"] }}</h3>
						<ul style="list-style: none; padding-left: 0;">
							<li>{{ $translation["OpportunityText1"] }}</li>
							<li>{{ $translation["OpportunityText2"] }}</li>
							<li>{{ $translation["OpportunityText3"] }}</li>
							<li>{{ $translation["OpportunityText4"] }}</li>
						</ul>
					</div>
					<div class="start-title" style="padding-bottom: 3rem;">
						<h3>{{ $translation["Limitations"] }}</h3>
						<ul style="list-style: none; padding-left: 0;">
							<li>{{ $translation["LimitationText1"] }}</li>
							<li>{{ $translation["LimitationText2"] }}</li>
							<li>{{ $translation["LimitationText3"] }}</li>
							<li>{{ $translation["LimitationText4"] }}</li>
						</ul>
					</div>
				</div>

				@include('partials.home.input-field', ['lite' => false])

			</div>
			<p class="warning">{{ $translation["MistakeWarning"] }}</p>

		</div>
	</div>
</div>


<script>


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