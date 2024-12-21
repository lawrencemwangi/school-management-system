<x-admin-layout>
    <h1>Student Discipline record</h1>

    <div class="student_container">
        <div class="discipline_cases">
            @if ($disciplines->isempty())
                <p>Now Indiscipline case for your account.</p>

            @else
                @foreach ($disciplines as $discipline)
                    <p>Student Names: 
                        <span>
                            {{ $discipline->student->user->first_name }} {{ $discipline->student->user->last_name }}
                        </span>
                    </p>
                    <p>Discipline Type: <span>{{ $discipline->discipline_type }}</span></p>
                    <p>Recorded On: <span>{{ $discipline->created_at }}</span></p> 
                    <br>

                    <h4>Disciplinary Reason</h4>
                    <p>{{ $discipline->discipline_comment }}</p>
                @endforeach                
            @endif
        </div>
    </div>
</x-admin-layout>