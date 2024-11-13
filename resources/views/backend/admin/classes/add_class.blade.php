<x-admin-layout>
    <h1>Add Class</h1>

    <div class="custom_form">
       <form action="{{ route('classes.store') }}" method="post">
        @csrf

        <div class="groups">
            <div class="input_group">
                
            </div>

            <div class="input_group">
                <label for="class_name">Class Name</label>
                <input type="text" name="class_name" id="class_name" value="{{ old('class_name') }}" placeholder="Form 1Alpha">
                <span class="inline_alert">{{ $errors->first('class_name') }}</span>
            </div>
    
            <div class="input_group">
                <label for="class_capacity">Class capacity</label>
                <input type="text" name="class_capacity" id="class_capacity" value="{{ old('class_capacity') }}" placeholder="30 Students">
                <span class="inline_alert">{{ $errors->first('class_capacity') }}</span>
            </div>
        </div>

        <button type="submit">Add New</button>
       </form>
    </div>
</x-admin-layout>