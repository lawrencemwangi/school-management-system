<x-admin-layout>
    <div class="admin_container">
        <div class="lastseen_details">
            <p>Welcome <strong>{{ Auth::check() ? Auth::user()->user_level_label : 'Guest'}}</strong> 
                {{  Auth::user()->first_name}} {{  Auth::user()->last_name}}
            </p>
            <p>Last Seen at 
                <strong>{{ Auth::user()->last_seen ? \Carbon\Carbon::parse(Auth::user()->last_seen)->format(' H:i:s  D-m-Y ') : 'Never' }}</strong>
            </p>
        </div>
        
        <div class="dashboard_infor">
            <div class="admin_dashboard">
                <div class="admin_items">
                    <i class="fa fa-user-graduate"></i>
                    <div class="details">
                        <p>Students</p>
                        <span>{{ $count_students }}</span>
                    </div>
                </div>
                
                <div class="admin_items">
                    <i class="fa fa-chalkboard-teacher"></i>
                    <div class="details">
                        <p>Teachers</p>
                        <span>{{ $count_teachers }}</span>
                    </div>
                </div>
                
                <div class="admin_items">
                    <i class="fa fa-child"></i>
                    <div class="details">
                        <p>Parents</p>
                        <span>{{ $count_parents }}</span>
                    </div>
                </div>

                <div class="admin_items">
                    <i class="fa fa-school"></i>
                    <div class="details">
                        <p>Classes</p>
                        <span>{{ $count_classes }}</span>
                    </div>
                </div>
    
                <div class="admin_items">
                    <i class="fa fa-bed"></i>
                    <div class="details">
                        <p>Dorms</p>
                        <span>{{ $count_dorms }}</span>
                    </div>
                </div>
    
                <div class="admin_items">
                    <i class="fas fa-dollar-sign"></i>
                    <div class="details">
                        <p>sales</p>
                        <span>#</span>
                    </div>
                </div>
            </div>
    
        </div>
    </div>
</x-admin-layout>