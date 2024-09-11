<div class="aside_container">
    <div class="aside_logo">
        <a href="{{ route('home') }}" target="_blank">
            <img src="{{ asset('/assets/images/image.jpg') }}" width="35px" height="35px" alt="{{ config('app.name') }}">
            Kiambu High
        </a>
    </div>

    @php
        $menuItems = (new \App\Http\Controllers\DashboardController)->getMenuLinks();
    @endphp

    <div class="aside_link">
        <ul>
            @foreach($menuItems as $item)
                <li class="{{ Route::is($item['route'] . '*') ? 'active' : '' }}">
                    <i class="{{ $item['icon'] }}"></i>
                    <a href="{{ $item['route'] }}">{{ $item['label'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="aside_profile">
        <div class="img">
            <img src="{{ asset('/assets/images/logo.jpg') }}" alt="{{ Auth::user()->first_name }}">
        </div>
        <div class="profile_details">
            <a href="{{ route('profile.edit') }}">
                <p> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
            </a>
        </div>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit"><i class="fa fa-sign-out-alt"></i> Logout</button>
        </form>
    </div>
</div>
