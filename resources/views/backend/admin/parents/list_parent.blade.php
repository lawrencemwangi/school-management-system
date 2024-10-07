<x-admin-layout>
    <x-header title="Parents" addLink="{{ route('parents.create') }}"/>

    <div class="parent_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Names</span>
                <span class="user-col email">Email </span>
                <span class="user-col">Phone No.</span>
                <span class="user-col">Gender</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($parents))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($parents as $parent)
                    <div class="user_infor">
                        <span class="user-col">{{ $parent->user->first_name }} {{ $parent->user->last_name }}</span>
                        <span class="user-col email">{{ $parent->user->email }}</span>
                        <span class="user-col">{{ $parent->user->phone_number }}</span>
                        <span class="user-col">{{ $parent->user->gender }}</span>
                        <span class="action">
                            <a href="#">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <form action="#" method="post">
                                @csrf
                                <a href="#">
                                    <i class="fas fa-trash"></i>  
                                </a>
                            </form>
                        </span>
                    </div>
                @endforeach
            @endif      
        </div>
    </div>
</x-admin-layout>