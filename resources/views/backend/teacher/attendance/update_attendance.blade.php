<x-admin-layout>
    <h1>Update Students Attendance</h1>

    <div class="custom_form user_container">
        <form action="{{ route('attendance.update', ['attendance' => $attendance]) }}" method="post">
            @csrf
            @method('PATCH')
            
            <div class="group">
                <div class="input_group">
                    <label for="class_id">Class</label>
                    <select name="class_id" id="class_id" required>
                        <option value="">--Select the class--</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}" {{ old('class_id', $attendance->class_id) == $class->id ? 'selected' : ''}}>
                                {{ $class->class_name }}
                            </option>            
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('class_id') }}</span>
                </div>

                <div class="input_group">
                    <label for="date">Attendance Date</label>
                    <input type="date" name="date" id="date" value="{{ old('date', $attendance->date) }}">
                    <span class="inline_alert">{{ $errors->first('date') }}</span>
                </div>
            </div>
            
            <div class="user_content">
                <div class="user_details">
                    <span  class="user-col">Names</span>
                    <span class="user-col">Attendance type</span>
                </div>

                @if($attendance->records && $attendance->records->count())
                    @foreach ($attendance->records as $record)
                        <div class="user_infor">
                            <span for="student_{{ $record->student_id }}" class="user-col">
                                {{ $record->student->user->first_name }} {{ $record->student->user->last_name }}
                            </span>
                            <select name="attendance[{{ $record->student_id }}][type]" id="student_{{ $record->student_id }}" class="form-control" required>
                                <option value="present" {{ $record->attendance_type == 'present' ? 'selected' : '' }}>Present</option>
                                <option value="absent" {{ $record->attendance_type == 'absent' ? 'selected' : '' }}>Absent</option>
                                <option value="late" {{ $record->attendance_type == 'late' ? 'selected' : '' }}>Late</option>
                            </select>
                        </div>
                    @endforeach
                @else
                    <p>No attendance records available for this class.</p>
                @endif

            </div>

            <button type="submit">Update attendace</button>
        </form>
    </div>
</x-admin-layout>