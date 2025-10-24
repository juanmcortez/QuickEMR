<x-layouts.main>
    <h2>{{ __('Patient :patient | Encounter #:encounter', ['patient' => $patient->profile->full_name, 'encounter' => $encounter->enc]) }}</h2>
    <div>{{ $patient->accession_number_ptlvl }}</div>
    <div>{{ $patient->profile->registration_date }}</div>
    <div>{{ $patient->profile->full_name }}</div>
    <div>{{ $patient->profile->birthdate }}</div>
    <div>{{ $patient->profile->email->address }}</div>
    <div>{{ $patient->profile->primary_address->formatted }}</div>
    <div>{{ $patient->profile->primary_phone->formatted }}</div>
    <div>{{ $patient->profile->secondary_address->formatted }}</div>
    <div>{{ $patient->profile->secondary_phone->formatted }}</div>
    <br/>
    @foreach($patient->subscribers AS $subscriber)
        <div>{{ $subscriber->companies->name }}</div>
        <div>{{ $subscriber->companies->payer_id }}</div>
        <div>{{ $subscriber->effective_date }}</div>
        <div>{{ $subscriber->termination_date }}</div>
        <div>{{ $subscriber->type->name }}</div>
        <div>{{ $subscriber->profile->full_name }}</div>
        <div>{{ $subscriber->profile->birthdate }}</div>
        <br/>
    @endforeach
    <br/>
    <table>
        <thead>
        <tr>
            <th colspan="2">{{ __('Rendering Doctor') }}</th>
            <th colspan="2">{{ __('Referring Doctor') }}</th>
            <th colspan="2">{{ __('Ordering Doctor') }}</th>
            <th colspan="2">{{ __('Supervising Doctor') }}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $encounter->rendering_doctor->job_title }}</td>
            <td>&nbsp;</td>
            <td>{{ $encounter->referring_doctor->job_title }}</td>
            <td>&nbsp;</td>
            <td>{{ $encounter->ordering_doctor->job_title }}</td>
            <td>&nbsp;</td>
            <td>{{ $encounter->supervising_doctor->job_title }}</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            @empty($encounter->rendering_doctor->profile->initials)
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            @else
                <td>{{ $encounter->rendering_doctor->profile->initials }}</td>
                <td>{{ $encounter->rendering_doctor->profile->full_name }}</td>
            @endempty

            @empty($encounter->referring_doctor->profile->initials)
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            @else
                <td>{{ $encounter->referring_doctor->profile->initials }}</td>
                <td>{{ $encounter->referring_doctor->profile->full_name }}</td>
            @endempty

            @empty($encounter->ordering_doctor->profile->initials)
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            @else
                <td>{{ $encounter->ordering_doctor->profile->initials }}</td>
                <td>{{ $encounter->ordering_doctor->profile->full_name }}</td>
            @endempty

            @empty($encounter->supervising_doctor->profile->initials)
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            @else
                <td>{{ $encounter->supervising_doctor->profile->initials }}</td>
                <td>{{ $encounter->supervising_doctor->profile->full_name }}</td>
            @endempty
        </tr>
        </tbody>
    </table>
    <br/>
    <table width="50%">
        <thead align="center">
        <tr>
            <th>Code</th>
            <th>&nbsp;</th>
            <th>Fee</th>
            <th>&nbsp;</th>
            <th>Units</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody align="center">
        @foreach($encounter->items as $item)
            <tr>
                <td>{{ $item->code_detail->type->name }} {{ $item->code_detail->code }}</td>
                <td>&nbsp;</td>
                <td>{{ $item->formatted_fee }}</td>
                <td>&nbsp;</td>
                <td>{{ $item->units }}</td>
                <td>&nbsp;</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-layouts.main>
