<x-admin-layout>
    <x-header title="Dorms" addLink="{{ route('dorms.create') }}"/>

    <div class="dorm_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Dorm Name</span>
                <span class="user-col">Dorm Capacity</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($dorms))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($dorms as $dorm)
                    <div class="user_infor">
                        <span class="user-col">{{ $dorm->dorm_name }}</span>
                        <span class="user-col">{{ $dorm->dorm_capacity }}</span>
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