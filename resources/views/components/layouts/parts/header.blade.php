<nav class="header">
    <ul>
        <li>
            <a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
        </li>
        <li>
            <a href="{{ route('patients.list') }}">{{ __('Patients') }}</a>
        </li>
        <li>
            <a href="{{ route('custom.list') }}">{{ __('Codes') }}</a>
        </li>
        <li>
            <a href="{{ route('doctors.list') }}">{{ __('Doctors') }}</a>
        </li>
        <li>
            <a href="{{ route('users.list') }}">{{ __('Users') }}</a>
        </li>
    </ul>
</nav>
