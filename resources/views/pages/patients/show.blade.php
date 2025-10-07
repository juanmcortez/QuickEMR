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
    @empty($patient->encounters)
        <div>{{ __('No encounters available') }}</div>
    @else
        <br/>
        <div>Encounters</div>
        <br/>
        @foreach($patient->encounters AS $encounter)
            <div>{{ $encounter->date_of_service }}</div>
            <div>{{ $encounter->enc }}</div>
            <div>{{ $encounter->date_of_entry }}</div>
            @isset($encounter->rendering_id)
                <div>{{ $encounter->rendering_doctor->profile->full_name }} [{{ $encounter->rendering_doctor->job_title }}]</div>
            @endisset
            @isset($encounter->referring_id)
                <div>{{ $encounter->referring_doctor->profile->full_name }} [{{ $encounter->referring_doctor->job_title }}]</div>
            @endisset
            @isset($encounter->ordering_id)
                <div>{{ $encounter->ordering_doctor->profile->full_name }} [{{ $encounter->ordering_doctor->job_title }}]</div>
            @endisset
            @isset($encounter->supervising_id)
                <div>{{ $encounter->supervising_doctor->profile->full_name }} [{{ $encounter->supervising_doctor->job_title }}]</div>
            @endisset
            <br/>
        @endforeach
    @endempty
</x-layouts.main>
