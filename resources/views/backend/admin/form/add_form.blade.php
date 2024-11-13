<x-admin-layout>
    <div class="form_container">
        <h1>Add Form</h1>

        <div class="custom_form">
            <form action="{{ route('forms.store') }}" method="post">
                @csrf
                
                <div class="input_group">
                    <label for="form_name">Form</label>
                    <input type="text" name="form_name" id="form_name" value="{{ old('form_name') }}" placeholder="Enter the form Name">
                    <span class="inline_alert">{{ $errors->first('form_name') }}</span>
                </div>

                <button type="submit">Add New</button>
            </form>
        </div>
    </div>
</x-admin-layout>