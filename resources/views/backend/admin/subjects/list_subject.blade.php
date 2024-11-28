<x-admin-layout>
    <x-header title="Subjects" addLink="{{ route('subject.create') }}" />
    <p>There are <strong>{{ $count_subjects }}</strong> subjects in the system</p>

    <div class="subject_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col"> Subject Names</span>
                <span class="user-col">Subject Code </span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($subjects))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($subjects as $subject)
                    <div class="user_infor">
                        <span class="user-col">{{ $subject->subject_name }}</span>
                        <span class="user-col">{{ $subject->subject_code }}</span>
                        <span class="action">
                            <a href="{{ route('subject.edit', ['subject' => $subject]) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            
                            <form  id="deleteForm_{{ $subject->id }}" action="{{ route('subject.destroy', ['subject' =>$subject->id]) }}" method="post">
                                @csrf
                                @method("DELETE")

                                <a href="javascript:void(0)" onclick="deleteItem({{  $subject->id }},'subjects');" >
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