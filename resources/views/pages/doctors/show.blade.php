<x-layouts.main>
    <h2>{{ __('Doctor :doctor', ['doctor' => $doctor->profile->full_name]) }}</h2>
    <div>{{ $doctor->job_title }}</div>
    <div>{{ $doctor->profile->full_name }}</div>
    <div>{{ $doctor->profile->birthdate }}</div>
    <div>{{ $doctor->profile->email->address }}</div>
    <div>{{ $doctor->profile->primary_address->formatted }}</div>
    <div>{{ $doctor->profile->primary_phone->formatted }}</div>
    <div>{{ $doctor->profile->secondary_address->formatted }}</div>
    <div>{{ $doctor->profile->secondary_phone->formatted }}</div>
</x-layouts.main>
