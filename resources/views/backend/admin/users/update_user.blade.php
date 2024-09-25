<x-admin-layout>
    <h1>Update Users</h1>
    <form action="#" method="post">
        @csrf

        <div class="group">
            <div class="input_group">
                <label for="first_name">first_name</label>
                <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name )}}">
                <span class="inline_alert">{{ $errors->first('first_name') }}</span>
            </div>
        </div>
    </form>
</x-admin-layout>