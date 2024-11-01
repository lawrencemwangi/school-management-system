<x-admin-layout>
    <h1>Fees Structure</h1>

    <div class="custom_form">
        <form action="#" method="post">
            @csrf

            <div class="groups">
                <div class="input_group">
                    <label for="academic_year">Academic Year</label>
                    <input type="date" name="academic_year" id="academic_year" value="{{ old('academic_year') }}">
                    <span class="inline_alert">{{ $errors->first('academic_year') }}</span>
                </div>

                <div class="input_group">
                    <label for="term">Term</label>
                    <select name="term" id="term">
                        <option value="">--select term--</option>
                        <option value="term_1">Term 1</option>
                        <option value="term_2">Term 2</option>
                        <option value="term_3">Term 3</option>
                    </select>
                </div>

                
                <div class="input_group">
                    <label for="class_form">Class</label>
                    <select name="class_form" id="class_form">
                        <option value="">--select class--</option>
                        <option value="form_1">Form 1</option>
                        <option value="form_2">Form 2</option>
                        <option value="form_3">Form 3</option>
                        <option value="form_4">Form 4</option>
                    </select>
                </div>
            </div>

            <button type="submit">Add New</button>
        </form>
    </div>
</x-admin-layout>