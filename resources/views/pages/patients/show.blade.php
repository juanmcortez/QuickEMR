<x-layouts.main>
    <h2>{{ __('Patient PID :patient', ['patient' => $patient->pid]) }}</h2>
    <div>{{ $patient->accession_number_ptlvl }}</div>
    <div>{{ $patient->profile->registration_date }}</div>
    <div>{{ $patient->profile->full_name }}</div>
    <div>{{ $patient->profile->birthdate }}</div>
    <div>{{ $patient->profile->email->address }}</div>
    <div>{{ $patient->profile->primary_address->formatted }}</div>
    <div>{{ $patient->profile->primary_phone->formatted }}</div>
    <div>{{ $patient->profile->secondary_address->formatted }}</div>
    <div>{{ $patient->profile->secondary_phone->formatted }}</div>
</x-layouts.main>
