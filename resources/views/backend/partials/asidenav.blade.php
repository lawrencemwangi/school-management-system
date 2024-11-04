<div class="aside_container sidebar" id="sidebar">
    <div class="toggle">
        <span id="navbar-toggle-icon">&lt;</span>
    </div>
    <div class="aside_logo">
        <a href="{{ route('home') }}" target="_blank">
            <img src="{{ asset('/assets/images/image.jpg') }}" width="35px" height="35px" alt="{{ config('app.name') }}">
            <span>{{ config('school_setting.school_abbreviation')}}</span> 
        </a>
    </div>

    @php
        $menuItems = (new \App\Http\Controllers\DashboardController)->getMenuLinks();
    @endphp

    <div class="aside_link " id="navbar">
        <ul>
            @foreach($menuItems as $item)
                <li class="{{ Str::startsWith(Route::currentRouteName(), explode('.', $item['route'] ?? '')[0]) ? 'active' : '' }}">                    @if (isset($item['submenu']))
                        <a href="javascript:void(0)" class="dropdown-toggle">
                            <i class="{{ $item['icon'] }}"></i>
                            <span class="label">{{ $item['label'] }}</span>
                            <i class="fa fa-caret-down"></i> 
                        </a>
                        <ul class="submenu">
                            @foreach($item['submenu'] as $subitem)
                                <li>
                                    <a href="{{ route($subitem['route']) }}">
                                        <i class="{{ $subitem['icon'] }}"></i>
                                        <span>{{ $subitem['label'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <a href="{{ route($item['route']) }}">
                            <i class="{{ $item['icon'] }}"></i>
                            <span class="label">{{ $item['label'] }}</span>
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    <div class="aside_profile">
        <div class="img">
            <a href="{{ route('profile.edit') }}">
                <img src="{{ asset('/assets/images/logo.jpg') }}" alt="{{ Auth::user()->first_name }}">
            </a>
        </div>
        <div class="profile_details">
            <a href="{{ route('profile.edit') }}">
                <p> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
            </a>
        </div>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit"><i class="fa fa-sign-out-alt"></i><span>Logout</span></button>
        </form>
    </div>
</div>
