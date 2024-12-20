<x-admin-layout>
    <x-header title=" Student Results "  addLink="{{ route('result.create') }}"/>

    <div class="discipline_container user_container">
        <div class="user_content">
            <div class="user_details">
                <span  class="user-col">Names</span>
                <span class="user-col">class Name</span>
                <span class="user-col">Discipline Type</span>
                <span class="user-col">Date</span>
                <span class="user-col">Action</span>
            </div>
             
            {{-- @if (empty($disciplines))
                <p>No User Found at the moment</p> 
            @else
                @foreach ($disciplines as $discipline) --}}
                    <div class="user_infor">
                        <span class="user-col">#</span>
                        <span class="user-col">#</span>
                        <span class="user-col">#</span>
                        <span class="user-col">#</span>
                        <span class="action">
                            <a href="#">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <form action="#" method="post">
                                <a href="#">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                            </form>
                        </span>
                    </div>
                {{-- @endforeach
            @endif --}}
        </div>
    </div>
</x-admin-layout>