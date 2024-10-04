<x-admin-layout>
    <x-header title="Teachers" addLink="{{ route('teachers.create') }}" />
    <div class="teacher_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Names</span>
                <span class="user-col email">Email </span>
                <span class="user-col">Username</span>
                <span class="user-col">Phone No.</span>
                <span class="user-col">Gender</span>
                <span class="user-col">Emp code</span>
                <span class="user-col">Emp Date</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($teachers))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($teachers as $teacher)
                    <div class="user_infor">
                        <span class="user-col"> {{ $teacher->user->first_name }} {{ $teacher->user->last_name }}</span>
                        <span class="user-col email">{{ $teacher->user->email }}</span>
                        <span class="user-col">{{  $teacher->user->username }}</span>
                        <span class="user-col">{{ $teacher->user->phone_number }}</span>
                        <span class="user-col">{{ $teacher->user->gender }}</span>
                        <span class="user-col">{{ $teacher->emp_code}}</span>
                        <span class="user-col">{{ $teacher->emp_date}}</span>
                        <span>
                            <a href="#">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </span>
                    </div>
                @endforeach
            @endif     
        </div>
    </div>
</x-admin-layout>