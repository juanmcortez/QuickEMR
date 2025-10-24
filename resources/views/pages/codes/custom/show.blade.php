<x-layouts.main>
    <h2>{{ __('Code :custom', ['custom' => $custom->type->name . ' ' . $custom->code]) }}</h2>
    <div>{{ $custom->type->name }}</div>
    <div>{{ $custom->code }}</div>
    <div>{{ $custom->code_short }}</div>
    <div>{{ $custom->description }}</div>
    <div>{{ $custom->default_modifier }}</div>
    <div>{{ $custom->default_ndc }}</div>
    <div>{{ $custom->default_fee }} -> {{ $custom->formatted_default_fee }}</div>
    <div>{{ $custom->default_units }}</div>
</x-layouts.main>
