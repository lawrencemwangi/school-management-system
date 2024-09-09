<div class="aside_container">
    <div class="aside_logo">
        <div class="img">
            <img src="{{ asset('/assets/images/logo.jpg') }}" width="35px" height="35px" alt="{{ config('app.name') }}">
            <a href="{{ route('home') }}" target="_blank">School Mgt</a>
        </div>

        <p>wecome <span>{{ Auth::user()->first_name }}</span></p>
        <div class="aside_link">
            <ul>
                <li><a href="#">Dashbord</a></li>
            </ul>
        </div>
    </div>
</div>