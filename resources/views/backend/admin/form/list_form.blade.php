<x-admin-layout>
    <x-header title="Forms" addLink="{{ route('forms.create') }}"/>

    <div class="dorm_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Form Name</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($school_forms))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($school_forms as $form)
                    <div class="user_infor">
                        <span class="user-col">{{ $form->form_name }}</span>
                        <span class="action">
                            <a href="{{ route('forms.edit', ['form' => $form]) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
    
                            <form  id="deleteForm_{{ $form->id }}" action="{{ route('forms.destroy', ['form' => $form->id]) }}" method="post">
                                @csrf
                                @method("DELETE")

                                <a href="javascript:void(0)" onclick="deleteItem({{ $form->id }},'forms');" >
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </form>
                        </span>
                    </div>
                @endforeach
            @endif      
        </div>
    </div>
</x-admin-layout>