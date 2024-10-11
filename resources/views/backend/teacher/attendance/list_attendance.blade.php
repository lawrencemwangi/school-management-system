<x-admin-layout>
    <x-header title="Attendace List"  addLink="{{ route('attendance.create') }}" />

    <div class="attendance_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col"> Class name</span>
                <span class="user-col">Date</span>
                <span class="user-col">Total students</span>
                <span class="user-col">Present student</span>
                <span class="user-col">Absent student</span>
                <span class="user-col">Late student</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($attendances))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($attendances as $attendance)
                    <div class="user_infor">
                        <span class=" user-col">
                           {{ $attendance->class->class_name }}
                        </span>
                        <span class="user-col email">{{ $attendance->date }}</span>
                        <span class="user-col email">{{ $attendance->total_students }}</span>
                        <span class="user-col">{{ $attendance->total_present }}</span>
                        <span class="user-col">{{ $attendance->total_absent }}</span>
                        <span class="user-col">{{ $attendance->total_late }}</span>
                        <span class="action">
                            <a href="{{ route('attendance.edit', ['attendance' => $attendance]) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </span>
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
</x-admin-layout>