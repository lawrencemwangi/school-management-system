<x-admin-layout>
    {{-- <x-header title="settings" addLink=" {{ route('settings.create')}}"/> --}}
    <h1> School Setting</h1>

    <div class="setting_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">School Name</span>
                <span class="user-col">Address</span>
                <span class="user-col">Contact</span>
                <span class="user-col">Abbreviation</span>
                <span class="user-col"> Email</span>
                <span class="user-col">Motto</span>
                <span class="user-col">Vision</span>
                <span class="user-col">Mission</span>
                <span class="user-col">Action</span>
            </div>
                <div class="user_infor">
                    <span class="user-col">{{ config('school_setting.school_name') }}</span>
                    <span class="user-col">{{ config('school_setting.school_address') }}</span>
                    <span class="user-col">{{ config('school_setting.school_contact') }}</span>
                    <span class="user-col">{{ config('school_setting.school_abbreviation') }}</span>
                    <span class="user-col">{{ config('school_setting.school_email') }}</span>
                    <span class="user-col">{{ config('school_setting.school_motto') }}</span>
                    <span class="user-col">{{ config('school_setting.school_vision') }}</span>
                    <span class="user-col">{{ config('school_setting.school_mission') }}</span>
                    <span class="action">
                        <a href="{{ route('school_settings') }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>                        
                    </span>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>