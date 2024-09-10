<div class="aside_container">
    <div class="aside_logo">
        <a href="{{ route('home') }}" target="_blank">
            <img src="{{ asset('/assets/images/image.jpg') }}" width="35px" height="35px" alt="{{ config('app.name') }}">
            School Mgt
        </a>
    </div>

    <div class="aside_link">
        <ul>
            <li>
                <i class="fa-solid fa-gauge"></i>
                <a href="#">Dashbord</a>
            </li>

            <li>
                <i class="fa-solid fa-users"></i>
                <a href="#">Users</a>
            </li>

            <li>
                <i class="fa fa-chalkboard-teacher"></i>
                <a href="#">classes</a>
            </li>

            <li>
                <i class="fa fa-bed"></i>
                <a href="#">Dorms</a>
            </li>

            <li>
                <i class="fa fa-money-bill-wave"></i>
                <a href="#">Fees</a>
            </li>
            
            <li>
                <i class="fa fa-user-check"></i>
                <a href="#">Attendance</a>
            </li>
            
            <li class="{{ Route::is('*') ? 'active' : '' }}">
                <i class="fas fa-coins"></i>
                <a href="#">Finance</a>
            </li>
            
            <li>
                <i class="fa fa-tasks"></i>
                <a href="#">Assignments</a>
            </li>

            <li>
                <i class="fa fa-bell"></i>
                <a href="#">Notifications</a>
            </li>

            <li>
                <i class="fa fa-chart-line"></i>
                <a href="#">Reports</a>
            </li>
            <li>
                <i class="fa fa-cog"></i>
                <a href="#">Settings</a>
            </li>
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
            <button type="submit">Logout</button>
        </form>
    </div>
</div>