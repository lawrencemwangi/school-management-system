<div class="navbar_container">
    <div class="logo">
        <img src="{{ asset('/assets/images/logo.jpg') }}"  width="35px" height="35px" alt="{{ config('app.name') }}">
        <a href="{{ route('home') }}">
            <h2>{{ config('app.name')}}</h2>
        </a>
    </div>

    <div class="nav_links">
        <ul>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="#"></a></li>
            <li><a href="{{  route('contact') }}">Contact</a></li>

            <div class="profile_cotent">
                @if (Auth::user())
                    <div class="profile">
                       <div class="image">
                            <a href="{{ route('profile.edit') }}">
                                <img src="{{ asset('/assets/images/logo.jpg') }}" alt="...">
                            </a>
                       </div>
                       
                        <div class="logout">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="logout">Log out</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="btn">
                        <a href="{{ route('login') }}">Log in</a>
                    </div>
                @endif
            </div>
        </ul>
    </div>

    <div class="burger" id="burgerIcon">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>