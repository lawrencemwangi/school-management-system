<x-admin-layout>
    <x-header title="Grades" addLink="{{ route('grade.create') }}" />
    
    <div class="grade_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col"> Subject Names</span>
                <span class="user-col">Subject Code </span>
                <span class="user-col">Action</span>
            </div>
             
            {{-- @if (empty($subjects))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($subjects as $subject) --}}
                    <div class="user_infor">
                        <span class="user-col">#</span>
                        <span class="user-col">#</span>
                        <span class="action">
                            <a href="#">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            
                            <form  id="deleteForm_" action="#" method="post">
                                @csrf
                                @method("DELETE")

                                <a href="javascript:void(0)" onclick="deleteItem();" >
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </form>
                        </span>
                    </div>
                {{-- @endforeach
            @endif --}}
        </div>
    </div>
</x-admin-layout>