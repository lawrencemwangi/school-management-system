<x-admin-layout>
    <h1> Updated Discipline Report</h1>
    <div class="custom_form">
        <form action="{{ route('discipline.update', ['discipline' => $discipline]) }}" method="post">
            @csrf
            @method("PATCH")

            <div class="group">
                <div class="input_group">
                    <label for="student_id">Student Name</label>
                    <select name="student_id" id="student_id">
                        <option value="">--Select a Student--</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" {{ old('student_id', $discipline->student_id) == $student->id ? 'selected' : '' }} >
                                {{ $student->user->first_name }} {{ $student->user->last_name }}
                            </option>
                        @endforeach   
                    </select> 
                    <span class="inline_alert">{{ $errors->first('student_id') }}</span>            
                </div>

                <div class="input_group">
                    <label for="class_id">Class Name</label>
                    <select name="class_id" id="class_id">
                        <option value="">--Select class--</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}" {{ old('class_id', $discipline->class_id) == $class->id ? 'selected' : '' }} >
                                {{ $class->class_name }} 
                            </option>
                        @endforeach   
                    </select>
                    <span class="inline_alert">{{ $errors->first('class_id') }}</span>
                </div>
            </div>

            <div class="input_group">
                <label for="discipline_type">Discipline Type</label>
                <select name="discipline_type" id="discipline_type">
                    <option value="">--Select discipline type--</option>
                    <option value="minor">Minor Discipline</option>
                    <option value="major">Major Discipline</option>  
                </select>
                <span class="inline_alert">{{ $errors->first('discipline_type') }}</span>
            </div>

            <div class="input_group">
                <label for="discipline_comment">Discipline Comment</label>
                <textarea name="discipline_comment" id="discipline_comment" cols="10" rows="7" placeholder="Comment on the student's discipline">{{ old('discipline_comment', $discipline->discipline_comment) }}</textarea>
                <span class="inline_alert">{{ $errors->first('discipline_comment') }}</span>
            </div>

            <button type="submit">Add New</button>
        </form>
    </div>
</x-admin-layout>