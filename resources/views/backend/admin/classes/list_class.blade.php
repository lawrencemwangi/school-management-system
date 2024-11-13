<x-admin-layout>
    <x-header title="Classes" addLink="{{ route('classes.create') }}" />

    <div class="class_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Form</span>
                <span  class="user-col">Class Names</span>
                <span  class="user-col">Class Capacity</span>
                <span class="user-col">Action</span>
            </div>
             
            @if (empty($classes))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($classes as $class)
                    <div class="user_infor">
                        <span class="user-col">{{ $class->form->form_name }}</span>
                        <span class="user-col">{{ $class->class_name }}</span>
                        <span class="user-col">{{ $class->class_capacity }}</span>
                        <span class="action">
                            <a href="{{ route('classes.edit', ['class' => $class]) }}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="" method="post">
                                @csrf
                                <a href="#">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </form>
                        </span>
                    </div>
                @endforeach
            @endif      
        </div>
    </div>
</x-admin-layout>