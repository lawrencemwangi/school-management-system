<x-admin-layout>
    <x-header title=" Student Discipline"  addLink="{{ route('discipline.create') }}"/>

    <div class="discipline_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Names</span>
                <span class="user-col">class Name</span>
                <span class="user-col">Discipline Type</span>
                <span class="user-col">Date</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($disciplines))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($disciplines as $discipline)
                    <div class="user_infor">
                        <span class="user-col">
                            {{ $discipline->student->user->first_name }} {{ $discipline->student->user->last_name }} 
                        </span>
                        <span class="user-col">{{ $discipline->class->class_name }}</span>
                        <span class="user-col">{{ $discipline->discipline_type }}</span>
                        <span class="user-col">{{ $discipline->discipline_comment }}</span>
                        <span class="action">
                            <a href="{{ route('discipline.edit', ['discipline' => $discipline]) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <form id="deleteForm_{{ $discipline->id }}" action="{{ route('discipline.destroy', ['discipline' => $discipline->id]) }}" method="post">
                                @csrf
                                @method("DELETE")

                                <a href="javascript:void(0)" onclick="deleteItem({{  $discipline->id }},'disciplines');">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                            </form>
                        </span>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-admin-layout>