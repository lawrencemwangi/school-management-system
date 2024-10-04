<x-admin-layout>
    <h1>Add Class</h1>

    <div class="custom_from">
       <form action="{{ route('classes.store') }}" method="post">
        @csrf

        <div class="input_group">
            <label for="class_name">Class Name</label>
            <input type="text" name="class_name" id="class_name" value="{{ old('class_name') }}">
            <span class="inline_alert">{{ $errors->first('class_name') }}</span>
        </div>

        <button type="submit">Add New</button>
       </form>
    </div>
</x-admin-layout>