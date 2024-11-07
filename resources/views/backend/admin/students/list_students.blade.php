<x-admin-layout>
    <x-header title="Students" addLink="{{ route('students.create') }}"/>
    
    <div class="student_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Names</span>
                <span class="user-col">Parent Name</span>
                <span class="user-col">Registration No</span>
                <span class="user-col">Date of birth</span>
                <span class="user-col">Admission Date</span>
                <span class="user-col">class Name</span>
                <span class="user-col">Dorm Name</span>
                <span class="user-col">Graduation Status</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($students))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($students as $student)
                    <div class="user_infor">
                        <span class="user-col"> {{ $student->user->first_name }} {{ $student->user->last_name }}</span>
                        <span class="user-col">
                            {{ $student->parent->user->first_name}}
                            {{ $student->parent->user->last_name}}
                        </span>
                        <span class="user-col email">{{ $student->registration_number }}</span>
                        <span class="user-col">{{ $student->dob}}</span>
                        <span class="user-col">{{  $student->year_admitted }}</span>
                        <span class="user-col">{{ $student->class->class_name}}</span>
                        <span class="user-col">{{ $student->dorm->dorm_name}}</span>
                        <span class="{{ $student->status == 1 ? 'text_success' : 'text_danger' }} user-col">
                            {{ $student->graduation_status == 1 ? 'Graduate' : 'Undergraduate'}}
                        </span>
                        <span class="action">
                            <a href="{{ route('students.edit',['student' => $student]) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            {{-- <form action="#" method="post">
                                <a href="#">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </form> --}}
                        </span>
                    </div>
                @endforeach
            @endif     
        </div>
    </div>
</x-admin-layout>