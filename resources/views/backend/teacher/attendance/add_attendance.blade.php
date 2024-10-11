<x-admin-layout>
    <h1>Students Attendance</h1>

    <div class="attendance_container custom_form">
        <form action="#" method="post">
            @csrf

            <div class="group">
                <div class="input_group">
                    <label for="class_id">Class</label>
                    <select name="class_id" id="class_id">
                        <option value="">--select the class</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}" {{ old('class_id') == $class ? 'selected' : ''}}>
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
        </form>
    </div>    
</x-admin-layout>