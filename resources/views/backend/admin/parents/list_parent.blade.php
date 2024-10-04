<x-admin-layout>
    <x-header title="Parents" addLink="{{ route('parents.create') }}"/>

    <div class="parent_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Names</span>
                <span class="user-col email">Email </span>
                <span class="user-col">Username</span>
                <span class="user-col">Phone No.</span>
                <span class="user-col">Gender</span>
                <span class="user-col">Action</span>
            </div>
    {{--          
            @if (empty($teachers))
                <p>No User Found at the moment</p> 
            @else --}}
                {{-- @foreach ($teachers as $teacher) --}}
                    <div class="user_infor">
                        <span class="user-col"> gcycy</span>
                        <span class="user-col email">hhvh</span>
                        <span class="user-col">jj</span>
                        <span class="user-col">bubu</span>
                        <span class="user-col">vvv</span>
                        <span>
                            <a href="#">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </span>
                    </div>
               {{-- @endforeach
            @endif       --}}
        </div>
    </div>
</x-admin-layout>