<x-admin-layout>
    <h1>Update Teacher</h1>

    <div class="custom_form">
        <form action="{{ route('teachers.update', ['teacher' => $teacher]) }}" method="post">
            @csrf
            @method("PATCH")
    
            <div class="group">
                <div class="input_group">
                    <label for="User_id">User</label>
                    <select name="user_id" id="user_id">
                        <option value="">--Select a user--</option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{  old('user_id', $teacher->user_id) == $user->id ? 'selected' : '' }}>{{  $user->first_name }} {{  $user->last_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input_group">
                    <label for="emp_code">Employee Code</label>
                    <input type="text" name="emp_code" id="emp_code" value="{{ old('emp_code', $teacher->emp_code )}}" placeholder="Employee code">
                    <span class="inline_alert">{{ $errors->first('emp_code') }}</span>
                </div>
            </div>

            <div class="group">
                <div class="input_group">
                    <label for="emp_date">Employee Date (Date of Employment)</label>
                    <input type="date" name="emp_date" id="emp_date" value="{{ old('emp_date', $teacher->emp_date)}}">
                    <span class="inline_alert">{{ $errors->first('emp_date') }}</span>
                </div>

                <div class="input_group">
                    <label for="class_id">Class Teacher</label>
                    <select name="class_id" id="class_id">
                        <option value="">--Select the Class--</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id}}" {{ old('class_id', $teacher->class_id) == $class->id ? 'selected' : '' }}>
                                {{ $class->class_name }}
                            </option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('class_id') }}</span>
                </div>
            </div>

            <div class="input_group subjects">
                <label for="subjects">Select Subjects</label>
                <div class="subject-list">
                    @foreach ($subjects as $subject)
                        <div class="subject-item">
                            <input type="checkbox" name="subjects[]" value="{{ $subject->id }}" {{ in_array($subject->id, $teacherSubjects) ? 'checked' : '' }}>{{ $subject->subject_name }}                            {{-- <label for="subjects"></label> --}}
                        </div>
                    @endforeach
                </div>
            </div>
        
            <div class="group">
                <div class="input_group">
                    <label for="status">Status:-</label>
                    <div class="custom_radio_buttons">
                        <label>
                            <input class="option_radio" type="radio" name="status" id="active" value="1" {{ old('status' , $teacher->user->status) == '1' ? 'checked' : '' }}>
                            <span>Active</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="status" id="inactive" value="0" {{ old('status', $teacher->user->status) == '0' ? 'checked' : '' }}>
                            <span>Inacitve</span>
                        </label>
                    </div>
                    <span class="inline_alert">{{ $errors->first('status') }}</span>
                </div>

                <div class="input_group">
                    <label for="user_level">User Level:-</label>
                    <div class="custom_radio_buttons">
                        {{-- 1: admin, 2:teacher, 3: accountant, 4:student, 5: parent --}}
                        <label>
                            <input class="option_radio" type="radio" name="user_level" id="admin" value="1" {{ old('user_level', $teacher->user->user_level) == '1' ? 'checked' : '' }}>
                            <span>Admin</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="user_level" id="teacher" value="2" {{ old('user_level', $teacher->user->user_level) == '2' ? 'checked' : '' }}>
                            <span>Teacher</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="user_level" id="accountant" value="3" {{ old('user_level', $teacher->user_level) == '3' ? 'checked' : '' }}>
                            <span>Accountant</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="user_level" id="student" value="4" {{ old('user_level', $teacher->user->user_level) == '4' ? 'checked' : '' }}>
                            <span>Student</span>
                        </label>

                        <label>
                            <input class="option_radio" type="radio" name="user_level" id="parent" value="5" {{ old('user_level') == '5' ? 'checked' : '' }}>
                            <span>Parent</span>
                        </label>
                    </div>
                    <span class="inline_alert">{{ $errors->first('user_level') }}</span>
                </div>
            </div>

            <button type="submit">Update</button>
        </form>
    </div>
</x-admin-layout>