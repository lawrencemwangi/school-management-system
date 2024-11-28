<x-admin-layout>
    <div class="class_container">
        <h1>Update Class Detials</h1>

        <div class="custom_form">
            <form action="{{ route('classes.update', ['class' => $class]) }}" method="post">
                @csrf
                @method('PATCH')

                <div class="groups">
                    <div class="input_group">
                        <label for="form_id">Form</label>
                        <select name="form_id" id="form_id">
                            <option value="">--select form--</option>
        
                            @foreach ($forms as $form)
                                <option value="{{ $form->id }}" {{ old('form_id', $class->form_id) == $form->id ? 'selected' : '' }}>{{ $form->form_name }}</option>
                            @endforeach
                        </select>
                        <span class="inline_alert">{{ $errors->first('form_id') }}</span>
                    </div>
                    
                    <div class="input_group">
                        <label for="class_name">Class Name</label>
                        <input type="text" name="class_name" id="class_name" value="{{ old('class_name', $class->class_name) }}">
                        <span class="inline_alert">{{ $errors->first('class_name') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="class_capacity">Class Name</label>
                        <input type="text" name="class_capacity" id="class_capacity" value="{{ old('class_capacity', $class->class_capacity) }}">
                        <span class="inline_alert">{{ $errors->first('class_capacity') }}</span>
                    </div>
                </div>

                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</x-admin-layout>