@php
// Icons für Fähigkeiten
$capIcons = [
    'vision'    => '📷',
    'tools'     => '🧰',
    'web'       => '🌐',
    'reasoning' => '🧠',
    'code'      => '💻',
    'general'   => '✳️',
];

// Modelle nach Gruppe bündeln (fällt auf "Sonstiges" zurück)
$items  = collect($models['models'] ?? []);
$groups = $items->groupBy(fn($m) => $m['group'] ?? 'Sonstiges');

// Flaggen-Helfer
$groupFlagImg = function ($g) {
    $k = strtolower(trim($g));
    return match ($k) {
        'eu', 'europa', 'europe' =>
            '<img src="'.asset('img/EU.svg').'" alt="EU" style="width:1em;height:1em;vertical-align:-0.15em;margin-right:.25em">',
        'us', 'usa', 'u.s.', 'united states' =>
            '<img src="'.asset('img/USA.svg').'" alt="USA" style="width:1em;height:1em;vertical-align:-0.15em;margin-right:.25em">',
        'lokal', 'local' =>
            '<img src="'.asset('img/Lokal.svg').'" alt="Lokal" style="width:1em;height:1em;vertical-align:-0.15em;margin-right:.25em">',
        default => '',
    };
};
@endphp


<div class="model-selection-panel">
    @foreach($groups as $group => $list)
        {{-- Überschrift (nur Anzeige; kein Klick, Design bleibt unberührt) --}}
        <div class="group-header burger-item" role="presentation">
            {!! $groupFlagImg($group) !!} {{ $group }}
        </div>

        @foreach($list as $model)
            <button
                class="model-selector burger-item"
                onclick="selectModel(this); closeBurgerMenus()"
                value="{{ json_encode($model) }}"
            >
                @if(array_key_exists('status',$model))
                    @switch($model['status'])
                        @case('ready')
                            <span class="dot grn-c"></span>
                            @break
                        @case('loading')
                            <span class="dot org-c"></span>
                            @break
                        @case('unavailable')
                            <span class="dot red-c"></span>
                            @break
                        @default
                            <span class="dot org-c"></span>
                    @endswitch
                @else
                    <span class="dot grn-c"></span>
                @endif

                <span>{{ $model['label'] }}</span>

                {{-- Fähigkeits-Icons (optional, falls im Modell vorhanden) --}}
                @if(!empty($model['capabilities']))
                    <span class="cap-icons">
                        @foreach($model['capabilities'] as $c)
                            <span title="{{ $c }}">{{ $capIcons[$c] ?? '' }}</span>
                        @endforeach
                    </span>
                @endif
            </button>
        @endforeach
    @endforeach
</div>
