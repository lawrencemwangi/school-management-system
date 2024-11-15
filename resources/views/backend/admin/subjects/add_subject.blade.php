<x-admin-layout>
    <div class="subject_container"> 
        <h1>Add Subject</h1>

        <div class="custom_form">
            <form action="{{ route('subject.store') }}" method="post">
                @csrf

                <div class="group">
                    <div class="input_group">
                        <label for="subject_name">Subject Name</label>
                        <input type="text" name="subject_name" id="subject_name" value="{{ old('subject_name') }}" placeholder="Subject name">
                        <span class="inline_alert">{{ $errors->first('subject_name') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="subject_code">Subject Code</label>
                        <input type="text" name="subject_code" id="subject_code" value="{{ old('subject_code') }}" placeholder="Subject name">
                        <span class="inline_alert">{{ $errors->first('subject_code') }}</span>
                    </div>
                </div>

                <div class="input_group">
                    <label for="description">Subject Code</label>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Subject description">{{ old('description') }}</textarea>
                    <span class="inline_alert">{{ $errors->first('description') }}</span>
                </div>

                <button type="submit">Save</button>
            </form>
        </div>
    </div>
</x-admin-layout>