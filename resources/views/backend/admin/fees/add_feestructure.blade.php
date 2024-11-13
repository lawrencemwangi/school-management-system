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
                    <label for="form_id">Form</label>
                    <select name="form_id" id="form_id">
                        <option value="">--select form--</option>
    
                        @foreach ($forms as $form)
                            <option value="{{ $form->id }}" {{ old('form_name') == $forms ? 'selected' : '' }}>{{ $form->form_name }}</option>
                        @endforeach
                    </select>
                    <span class="inline_alert">{{ $errors->first('from_id') }}</span>
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