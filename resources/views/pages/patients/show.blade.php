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
            <table width="50%">
                <thead align="center">
                <tr>
                    <th>Enc #</th>
                    <th>&nbsp;</th>
                    <th>DOS</th>
                    <th>&nbsp;</th>
                    <th><abbr title="Rendering Doctor">RD</abbr></th>
                    <th>&nbsp;</th>
                    <th>DOE</th>
                </tr>
                </thead>
                <tbody align="center">
                <tr>
                    <td>{{ $encounter->enc }}</td>
                    <td>&nbsp;</td>
                    <td>{{ $encounter->date_of_service }}</td>
                    <td>&nbsp;</td>
                    <td>{{ $encounter->rendering_doctor->profile->initials }}</td>
                    <td>&nbsp;</td>
                    <td>{{ $encounter->date_of_entry }}</td>
                </tr>
                </tbody>
            </table>
            {{--
            @isset($encounter->rendering_id)
                <div>{{ $encounter->rendering_doctor->profile->initials }}</div>
                <div>{{ $encounter->rendering_doctor->profile->full_name }} [{{ $encounter->rendering_doctor->job_title }}]</div>
            @endisset
            @isset($encounter->referring_id)
                <div>{{ $encounter->referring_doctor->profile->initials }}</div>
                <div>{{ $encounter->referring_doctor->profile->full_name }} [{{ $encounter->referring_doctor->job_title }}]</div>
            @endisset
            @isset($encounter->ordering_id)
                <div>{{ $encounter->ordering_doctor->profile->initials }}</div>
                <div>{{ $encounter->ordering_doctor->profile->full_name }} [{{ $encounter->ordering_doctor->job_title }}]</div>
            @endisset
            @isset($encounter->supervising_id)
                <div>{{ $encounter->supervising_doctor->profile->initials }}</div>
                <div>{{ $encounter->supervising_doctor->profile->full_name }} [{{ $encounter->supervising_doctor->job_title }}]</div>
            @endisset
            --}}
            <br/>
            @if($encounter->items->isNotEmpty())
                <table width="50%">
                    <thead align="center">
                    <tr>
                        <th colspan="2">Code</th>
                        <th>&nbsp;</th>
                        <th>Fee</th>
                        <th>&nbsp;</th>
                        <th>Units</th>
                    </tr>
                    </thead>
                    <tbody align="center">
                    @foreach($encounter->items as $item)
                        <tr>
                            <td>{{ $item->code_type }}</td>
                            <td>{{ $item->code }}</td>
                            <td>&nbsp;</td>
                            <td>{{ $item->fee }}</td>
                            <td>&nbsp;</td>
                            <td>{{ $item->units }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div>No items found</div>
            @endif
            <br/>
        @endforeach
    @endempty
</x-layouts.main>
