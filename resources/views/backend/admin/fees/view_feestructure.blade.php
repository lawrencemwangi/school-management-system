<x-admin-layout>
    <div class="fees_container">
        <div class="fees_view">
            <div class="feesturcture_header">
                <img src="{{ asset(config('school_setting.school_logo')) }}" alt="school logo">
                <p>{{ config('school_setting.school_name') }}</p>
                <p>{{ config('school_setting.school_address') }}</p>
                <div class="fee_group">
                    <p>Tel: <span>{{ config('school_setting.school_contact') }}</span></p>
                    <p>{{ config('school_setting.school_email') }}</p>
                </div>
            </div>
        </div>

        <h1>Fees Structure</h1>
    </div>
</x-admin-layout>