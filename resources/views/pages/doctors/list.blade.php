<x-layouts.main>
    <h2>{{ __('Doctors list') }}</h2>
    @foreach($doctors AS $doctor)
        <div>
            <a href="{{ route('doctors.show', $doctor->did) }}">{{ __('View') }}</a>
            <span>{{ $doctor }}</span>
        </div>
        <hr/>
    @endforeach
</x-layouts.main>
