<x-admin-layout>
    <div class="fees_container">
        <div class="fees_view">
            <div class="feesturcture_header">
                <div class="image">
                    <img src="{{ asset(config('school_setting.school_logo')) }}" alt="school logo">
                </div>
                <p class="school_name">{{ config('school_setting.school_name') }}</p>
                <p>{{ config('school_setting.school_address') }}</p>
                <div class="fee_group">
                    <p>Tel: <span>{{ config('school_setting.school_contact') }}</span></p>
                    <p>{{ config('school_setting.school_email') }}</p>
                </div>
            </div>
        </div>

        <h1>Fees Structure</h1>

        <hr>

        <div class="fees_content">
            <div class="fees_infor">
                <p>Year: <span>{{  $feestructure->academic_year }}</span></p>
                <p>Term: <span>{{ $feestructure->term }}</span></p>
                <p>Form: <span>{{ $feestructure->form }}</span></p>
            </div>
            <hr>
            <br>
            <div class="fees_details">
                <div class="fees_title">
                    <span>Account</span>
                    <span>Amount(KES)</span>
                </div>

                @if(!empty($feestructure->fees_categories) && is_array($feestructure->fees_categories))
                    <div class="fees_items">
                        @foreach($feestructure->fees_categories as $category)
                            <div class="fees_item">
                                <span class="category_name">{{ $category['category'] }}</span>
                                <span class="category_amount">{{ $category['amount'] }}</span>
                            </div>
                        @endforeach
                    </div>  
                @else
                    <p>No fee categories available.</p>
                @endif

                <div class="fees_total">
                    <div class="total ">
                        <p>Total Amout</p>
                        <p>{{ $feestructure->total_amount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>