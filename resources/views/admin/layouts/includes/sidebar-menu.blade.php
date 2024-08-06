@php
    $currentRoute = Route::currentRouteName();
@endphp

<ul>
    <li class="{{ $currentRoute == 'admin.dashboard' ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a>
    </li>

</ul>
