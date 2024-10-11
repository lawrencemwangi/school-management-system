<x-admin-layout>
    <h1>Student Information</h1>

    <div class="student_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Names</span>
                <span class="user-col email">Email </span>
                <span class="user-col">User Level</span>
                <span class="user-col">class Name</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($students))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($students as $student)
                    <div class="user_infor">
                        <span class=" user-col">
                            {{ $student->user->first_name }} {{ $student->user->last_name }}
                        </span>
                        <span class="user-col email">{{ $student->user->email }}</span>
                        <span class="user-col">{{ $student->class->class_name }}</span>
                        <span class="user-col">{{ $student->user->user_level_label }}</span>
                        
                        <span class="action">
                            <a href="{{ route('view_student', $student->id) }}">
                                <i class="fas fa-eye"></i>
                            </a>
                        </span>
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
</x-admin-layout>