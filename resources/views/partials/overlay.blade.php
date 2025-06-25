<div id="overlay"

@if($activeOverlay)
    style =" visibility: visible; opacity: 1;"
@else
    style ="visibility: hidden; opacity: 0;"
@endif
>
    <div id="overlay-wrapper">
        <div id="overlay-logo">
            <img src="{{ asset('img/robot.svg') }}" alt="">
        </div>  
    </div>
</div>

@if($activeOverlay)
    <style>
        /* Simple jumping animation for the overlay logo */
        #overlay-logo img {
            animation: jump 1s ease-in-out infinite;
        }

        @keyframes jump {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-12px);
            }
        }
    </style>
@endif

