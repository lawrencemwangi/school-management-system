<x-admin-layout>
    <div class="schoolsetting_container">
        <h1>Update School Setting</h1>

        <div class="school_logo">
            <label for="school_logo">Current School Logo</label><br>
            <img src="{{ asset($schoolSettings['school_logo']) }}" width="60px" height="60px" alt="{{ $schoolSettings['school_name'] }}">
        </div>
        
        <div class="custom_form">
            <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                
                <div class="group">
                    <div class="input_group">
                        <label for="school_name">School Name</label>
                        <input type="text" name="school_name" id="school_name" value="{{ old('school_name', $schoolSettings['school_name']) }}">
                        <span class="inline_alert">{{ $errors->first('school_name') }}</span>
                    </div>
    
                    <div class="input_group">
                        <label for="school_address">School Address</label>
                        <input type="text" name="school_address" id="school_address" value="{{ old('school_address', $schoolSettings['school_address']) }}">
                        <span class="inline_alert">{{ $errors->first('school_address') }}</span>
                    </div>
                </div>

                 
                <div class="group">
                    <div class="input_group">
                        <label for="school_abbreviation">School Abbreviation</label>
                        <input type="text" name="school_abbreviation" id="school_abbreviation" value="{{ old('school_abbreviation', $schoolSettings['school_abbreviation']) }}">
                        <span class="inline_alert">{{ $errors->first('school_abbreviation') }}</span>
                    </div>
    
                    <div class="input_group">
                        <label for="school_motto">School Motto</label>
                        <input type="text" name="school_motto" id="school_motto" value="{{ old('school_motto', $schoolSettings['school_motto']) }}">
                        <span class="inline_alert">{{ $errors->first('school_motto') }}</span>
                    </div>
                </div>

                <div class="group">
                    <div class="input_group">
                        <label for="school_email">School email</label>
                        <input type="email" name="school_email" id="school_email" value="{{ old('school_email', $schoolSettings['school_email']) }}">
                        <span class="inline_alert">{{ $errors->first('school_email') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="school_contact">School Contact</label>
                        <input type="text" name="school_contact" id="school_contact" value="{{ old('school_contact', $schoolSettings['school_contact']) }}">
                        <span class="inline_alert">{{ $errors->first('school_contact') }}</span>
                    </div>
                </div>

                <div class="group">
                    <div class="input_group">
                        <label for="school_website">School website</label>
                        <input type="text" name="school_website" id="school_website" value="{{ old('school_website', $schoolSettings['school_website']) }}">
                        <span class="inline_alert">{{ $errors->first('school_website') }}</span>
                    </div>
    
                    <div class="input_group">
                        <label for="school_logo">New Logo</label>
                        <input type="file" name="school_logo" id="school_logo" value="{{ old('school_logo', $schoolSettings['school_logo']) }}">
                        <span class="inline_alert">{{ $errors->first('school_logo') }}</span>
                    </div>
                </div>

                <div class="group">
                    <div class="input_group">
                        <label for="school_vision">School Vision</label>
                        <input type="text" name="school_vision" id="school_vision" value="{{ old('school_vision', $schoolSettings['school_vision']) }}">
                        <span class="inline_alert">{{ $errors->first('school_vision') }}</span>
                    </div>
    
                    <div class="input_group">
                        <label for="school_mission">School Mission</label>
                        <input type="text" name="school_mission" id="school_mission" value="{{ old('school_mission', $schoolSettings['school_mission']) }}">
                        <span class="inline_alert">{{ $errors->first('school_mission') }}</span>
                    </div>
                </div>

                {{-- pricipal details --}}
                <h1>Pricipal details</h1>
                <hr>
                <div class="groups">
                    <div class="input_group">
                        <label for="principal_title">Pricipal Name</label>
                        <input type="text" name="principal_title" id="principal_title" value="{{ old('principal_title', $schoolSettings['principal_title']) }}">
                        <span class="inline_alert">{{ $errors->first('principal_title') }}</span>
                    </div>
    
                    <div class="input_group">
                        <label for="principal_email">Principal Email</label>
                        <input type="text" name="principal_email" id="principal_email" value="{{ old('principal_email', $schoolSettings['principal_email']) }}">
                        <span class="inline_alert">{{ $errors->first('principal_email') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="pricipal_contact">Pricipal Contact</label>
                        <input type="text" name="pricipal_contact" id="pricipal_contact" value="{{ old('pricipal_contact', $schoolSettings['pricipal_contact']) }}">
                        <span class="inline_alert">{{ $errors->first('pricipal_contact') }}</span>
                    </div>
                </div>

                {{-- Social medai Platforms for the school --}}
                <h1>Soacial Media  Channels</h1>
                <hr>
                <div class="groups">
                    <div class="input_group">
                        <label for="instagram_account">Instagam Account</label>
                        <input type="text" name="instagram_account" id="instagram_account" value="{{ old('instagram_account', $schoolSettings['instagram_account']) }}">
                        <span class="inline_alert">{{ $errors->first('instagram_account') }}</span>
                    </div>
    
                    <div class="input_group">
                        <label for="facebook_account">Facebook Account</label>
                        <input type="text" name="facebook_account" id="facebook_account" value="{{ old('facebook_account', $schoolSettings['facebook_account']) }}">
                        <span class="inline_alert">{{ $errors->first('facebook_account') }}</span>
                    </div>

                    <div class="input_group">
                        <label for="twitter_account">Twitter Account</label>
                        <input type="text" name="twitter_account" id="twitter_account" value="{{ old('twitter_account', $schoolSettings['twitter_account']) }}">
                        <span class="inline_alert">{{ $errors->first('twitter_account') }}</span>
                    </div>
                </div>

                <button type="submit">Update Settings</button>
            </form>
        </div>
    </div>
</x-admin-layout>