<x-admin-layout>
    <x-header title="FeeStructure"  addLink="{{ route('feestructure.create') }}" />

    <div class="fees user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Academic Year</span>
                <span class="user-col email">Term</span>
                <span class="user-col">Form</span>
                <span class="user-col">Fees Total</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($fees))
                <p>No Feestrucre found at the moment</p> 
            @else
                @foreach ($fees as $fee)
                    <div class="user_infor">
                        <span class="user-col email">
                            <a href="{{ route('fee_structure', ['id' => $fee->id]) }}">{{ $fee->academic_year }}</a>  
                        </span>
                        <span class="user-col">{{ $fee->form  }}</span>
                        <span class="user-col">{{ $fee->term }}</span>
                        <span class="user-col">{{ $fee->total_amount }}</span>
                        <span class="action">
                            <a href="#">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="#" method="post">
                                <a href="#">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </form>
                        </span>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-admin-layout>