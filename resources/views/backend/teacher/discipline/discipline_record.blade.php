<x-admin-layout>
    <h1>Discipline Report</h1>
    <div class="custom_form">
        <form action="{{ route('discipline.store') }}" method="post">
            @csrf

            <div class="group">
                <div class="input_group">
                    <label for="student_id">Student Name</label>
                    <select name="student_id" id="student_id">
                        <option value="">--Select a Student--</option>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}" {{ old('student_id') == $student ? 'selected' : '' }} >
                                {{ $student->user->first_name }} {{ $student->user->last_name }}
                            </option>
                        @endforeach   
                    </select>             
                </div>

                <div class="input_group">
                    <label for="class_id">Class Name</label>
                    <select name="class_id" id="class_id">
                        <option value="">--Select class--</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}" {{ old('class_id') == $class ? 'selected' : '' }} >
                                {{ $class->class_name }} 
                            </option>
                        @endforeach   
                    </select>
                </div>
            </div>

            <div class="input_group">
                <label for="discipline_type">Discipline Type</label>
                <select name="discipline_type" id="discipline_type">
                    <option value="">--Select discipline type--</option>
                    <option value="minor">Minor Discipline</option>
                    <option value="major">Major Discipline</option>  
                </select>
            </div>

            <textarea name="discipline_comment" id="discipline_comment" cols="10" rows="5" placeholder="Comment on the student's discipline">
                {{ old('discipline_comment') }}
            </textarea>

            <button type="submit">Add New</button>
        </form>
    </div>
</x-admin-layout>