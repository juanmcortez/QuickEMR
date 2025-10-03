<x-layouts.main>
    <h2>{{ __('Users list') }}</h2>
    @foreach($users AS $user)
        <div>
            <a href="{{ route('users.show', $user->username) }}">{{ __('View') }}</a>
            <span>{{ $user }}</span>
        </div>
        <hr/>
    @endforeach
</x-layouts.main>
