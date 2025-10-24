<x-layouts.main>
    <h2>{{ __('Master Codes list') }}</h2>
    @foreach($customs AS $code)
        <div>
            <a href="{{ route('custom.show', $code->type->value.config('defaults.slug_split').$code->code) }}">{{ __('View') }}</a>
            <span>{{ $code }}</span>
        </div>
        <hr/>
    @endforeach
</x-layouts.main>
