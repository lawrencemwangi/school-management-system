<x-admin-layout>
    <h1>Fees Structure</h1>

    <div class="custom_form">
        <form action="{{ route('feestructure.store') }}" method="post">
            @csrf

            <div class="groups">
                <div class="input_group">
                    <label for="academic_year">Academic Year</label>
                    <input type="text" name="academic_year" id="academic_year" value="{{ old('academic_year') }}" placeholder="eg.2024">
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
                    <label for="class_form">Form</label>
                    <select name="class_form" id="class_form">
                        <option value="">--select class--</option>
                        <option value="form_1">Form 1</option>
                        <option value="form_2">Form 2</option>
                        <option value="form_3">Form 3</option>
                        <option value="form_4">Form 4</option>
                    </select>
                </div>
            </div>

            <button type="button" id="add-category" class="btn btn-secondary mt-3">Add Fee Category</button><br>

            <div class="group" id="fee-categories">
                <div class="input_group">
                    <label for="fee_category">Fee Category</label>
                    <input type="text" name="fee_category[]" id="fee_category" value="{{ old('fee_category') }}" placeholder="eg.tution">
                </div>

                <div class="input_group">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount[]" id="amount" placeholder="ksh. 5400" value="{{ old('amount') }}">
                </div>
            </div>

            <button type="submit">Save fees Structure</button>
        </form>
    </div>
</x-admin-layout>