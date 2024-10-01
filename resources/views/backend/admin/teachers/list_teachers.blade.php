<x-admin-layout>
    <x-header title="Teahcers" addLink="{{ route('teachers.create') }}" />
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
             
            {{-- @if (empty($users))
                <p>No User Found at the moment</p> 
            @else --}}
                {{-- @foreach ($users as $user) --}}
                    <div class="user_infor">
                        <span class="user-col">hello</span>
                        <span class="user-col email">Hello</span>
                        <span class="user-col">Hello</span>
                        <span class="user-col">Hello</span>
                        <span class="user-col">0799507464</span>
                        <span class="user-col">Hello</span>
                        <span class="user-col">Hello</span>
                        <span>
                            <a href="#">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </span>
                    </div>
                {{-- @endforeach --}}
            {{-- @endif --}}
            
        </div>
    </div>
</x-admin-layout>