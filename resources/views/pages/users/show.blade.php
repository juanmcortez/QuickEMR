<x-layouts.main>
    <h2>{{ __('User :username', ['username' => $user->username]) }}</h2>
    <div>{{ $user->username }}</div>
    <div>{{ $user->profile->registration_date }}</div>
    <div>{{ $user->profile->full_name }}</div>
    <div>{{ $user->profile->birthdate }}</div>
    <div>{{ $user->profile->email->address }}</div>
    <div>{{ $user->profile->primary_address->formatted }}</div>
    <div>{{ $user->profile->primary_phone->formatted }}</div>
    <div>{{ $user->profile->secondary_address->formatted }}</div>
    <div>{{ $user->profile->secondary_phone->formatted }}</div>
</x-layouts.main>
