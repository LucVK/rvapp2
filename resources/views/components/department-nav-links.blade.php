@props(['link' => 'normal'])

<div>
    @foreach ($departments as $name => $id)
        @if ($link == 'normal')
            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                {{ $name }}
            </x-jet-dropdown-link>
        @else
        <x-jet-responsive-nav-link href="{{ route('profile.show') }}">
            {{ $name }}
        </x-jet-responsive-nav-link>
    @endif
    @endforeach
</div>
