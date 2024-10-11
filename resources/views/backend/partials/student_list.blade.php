@if($students->isEmpty())
    <p>No students found for this class.</p>
@else
    @foreach ($students as $student)
        <div class="user_infor">
            <span class="user-col">
                {{ $student->user->first_name }} 
                {{ $student->user->last_name }}
            </span>
            <span class="user-col email">
                <select name="attendance[{{ $student->id }}][type]" required>
                    <option value="">--Attendance--</option>
                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                    <option value="Late">Late</option>
                </select>
            </span>                       
        </div>
    @endforeach
@endif
