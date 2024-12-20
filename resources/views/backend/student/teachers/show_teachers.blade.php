<x-admin-layout>
    <h1>Our Teachers</h1>

    <div class="student_container">

        <div class="teachers_infor">
            @foreach ($teachers as $teacher)
            
            <ul>
                    <img src="{{ $teacher->user->profile_image_url }}" alt="{{ $teacher->user->first_name }}">
                    <li>Teachers' name: <span>{{ $teacher->user->first_name }} {{ $teacher->user->last_name }}</span></li>
                    <li>Class teacher: <span>{{ $teacher->class->class_name }}</span> </li>
                    <li>Teachers Contact: <span>{{  $teacher->user->phone_number}}</span></li>
                </ul>
            @endforeach
        </div>
    </div>
</x-admin-layout>