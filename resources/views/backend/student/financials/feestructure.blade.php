<x-admin-layout>
    @if(!empty($feeData))
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
                @foreach ($feeData as $fee)
                    <div class="fees_infor">
                        <p>Year: <span>{{ $fee->academic_year }}</span></p>
                        <p>Term: <span>{{ $fee->term }}</span></p>
                        <p>Form: <span>{{ $fee->form->form_name }}</span></p>
                    </div>
                    <hr>
                    <br>

                    <div class="fees_details">
                        <div class="fees_title">
                            <span>Account</span>
                            <span>Amount(KES)</span>
                        </div>
                        <div class="fees_items">
                            @if (is_array($fee->fees_categories) && count($fee->fees_categories) > 0)
                                <div class="fees_item">
                                    @foreach ($fee->fees_categories as $category => $amount)
                                        <span class="category_name">{{ $fee->category }}</span>
                                        <span class="category_amount">{{ $fee->amount }}</span>
                                    @endforeach
                                </div> 
                            @else
                                <p>No fee categories available.</p>
                            @endif  
                        </div>  
        
                        <div class="fees_total">
                            <div class="total ">
                                <p>Total Amout</p>
                                <p>{{ $fee->total_amount }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>No fee Structure available.</p>
    @endif
</x-admin-layout>