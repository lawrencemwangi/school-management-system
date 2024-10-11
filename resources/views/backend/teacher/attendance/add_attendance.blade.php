<x-admin-layout>
    <h1>Students Attendance</h1>

    <div class="attendance_container custom_form user_container">
        <form action="{{ route('attendance.store') }}" method="post" id="attendance-form">
            @csrf

            <div class="group">
                <div class="input_group">
                    <label for="class_id">Class</label>
                    <select name="class_id" id="class_id" required>
                        <option value="">--Select the class--</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : ''}}>
                                {{ $class->class_name }}
                            </option>            
                        @endforeach
                    </select>
                </div>

                <div class="input_group">
                    <label for="date">Attendance Date</label>
                    <input type="date" name="date" id="date">
                    <span class="inline_alert">{{ $errors->first('date') }}</span>
                </div>
            </div>

            <div class="user_content">
                <div class="user_details">
                    <span  class="user-col">Names</span>
                    <span class="user-col">Attendance type</span>
                </div>

                <div id="students-section">
                    {{-- The student liat will be added here dynamically --}}
                </div>
            </div>

            <button type="submit" class="btn btn-primary" id="submit-btn" style="display:none;">Submit Attendance</button>
        </form>
    </div> 
</x-admin-layout>
