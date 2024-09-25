<x-admin-layout>
    <div class="user_container">
        <x-header title="Users" addLink="{{ route('admin_dashboard') }}" />

        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Names</span>
                <span class="user-col email">Email </span>
                <span class="user-col">Username</span>
                <span class="user-col">Phone No.</span>
                <span class="user-col">Other Number</span>
                <span class="user-col">Gender</span>
                <span class="user-col">Emp code</span>
                <span class="user-col">Emp Date</span>
                <span class="user-col">User Level</span>
                <span class="user-col">Status</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($users))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($users as $user)
                    <div class="user_infor">
                        <span class="{{ $user->email_verified_at ? 'text_success' : 'text_danger'}} user-col">
                            {{ $user->first_name }} {{ $user->last_name }}
                        </span>
                        <span class="user-col email">{{ $user->email }}</span>
                        <span class="user-col">{{ $user->username }}</span>
                        <span class="user-col">{{ $user->phone_number  }}</span>
                        <span class="user-col">{{ $user->other_phone  }} 0799507464</span>
                        <span class="user-col">{{ $user->gender }}</span>
                        <span class="user-col">{{ $user->emp_code }}</span>
                        <span class="user-col">{{ $user->emp_date }}</span>
                        <span class="user-col">{{ $user->user_level_label }}</span>
                        <span class="{{ $user->status == 1 ? 'text_success' : 'text_danger' }} user-col">
                            {{ $user->status == 1 ? 'Active' : 'Inactive' }}
                        </span>
                        <span>
                            <a href="{{ route('users.edit',['user' => $user]) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </span>
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
</x-admin-layout>

