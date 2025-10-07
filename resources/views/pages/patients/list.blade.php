<x-layouts.main>
    <h2>{{ __('Patients list') }}</h2>
    <h3>{{ __('Total patients: :total', ['total' => $patients->total()]) }}</h3>
    @foreach($patients AS $patient)
        <div>
            <a href="{{ route('patients.show', $patient->pid) }}">{{ __('View') }}</a>
            <span>{{ $patient }}</span>
        </div>
        <hr/>
    @endforeach
    {{ $patients->links() }}
</x-layouts.main>
