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
                            <a href="{{ route('dorms.edit', ['dorm' => $dorm]) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form  id="deleteForm_{{ $dorm->id }}" action="{{ route('dorms.destroy', ['dorm' => $dorm->id]) }}" method="post">
                                @csrf
                                @method("DELETE")

                                <a href="javascript:void(0)" onclick="deleteItem({{ $dorm->id }},'dorms');" >
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </form>
                        </span>
                    </div>
                @endforeach
            @endif      
        </div>
    </div>
</x-admin-layout>