<x-admin-layout>
    <x-header title="Grades" addLink="{{ route('grade.create') }}" />
    
    <div class="grade_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Grade Names</span>
                <span class="user-col">Grade Points</span>
                <span class="user-col">Minimum Score</span>
                <span class="user-col">Maximum Score</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($grades))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($grades as $grade)
                    <div class="user_infor">
                        <span class="user-col">{{ $grade->grade_name }}</span>
                        <span class="user-col">{{ $grade->grade_point }}</span>
                        <span class="user-col">{{ $grade->min_score }}</span>
                        <span class="user-col">{{ $grade->max_score }}</span>
                        <span class="action">
                            <a href="{{ route('grade.edit', ['grade' => $grade]) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            
                            <form  id="deleteForm_{{ $grade->id }}" action="{{ route('grade.destroy', ['grade' => $grade->id]) }}" method="post">
                                @csrf
                                @method("DELETE")

                                <a href="javascript:void(0)" onclick="deleteItem({{ $grade->id }},'grades');" >
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