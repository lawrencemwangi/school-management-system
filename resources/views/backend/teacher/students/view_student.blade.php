<x-admin-layout>
    <h1>Student Infromation</h1>

    <div class="student_container">
        <div class="btn">
            <button><a href="{{ route('student.show') }}">Back</a></button>
        </div>
        <div class="student_data">
            <div class="student_infor">
                <p>Student Names:
                    <span>
                        {{ $students->parent->user->first_name }}
                        {{ $students->parent->user->last_name }} 
                    </span>
                </p>
                
                <p>Class Names: 
                    <span>{{ $students->class->class_name }}</span>
                </p>
        
                <p>Addmision Number: 
                    <span>{{ $students->registration_number }}</span>
                </p>
    
                <p>Year admitted: 
                    <span>{{ $students->year_admitted }}</span>
                </p>
    
                <p>Date of Birth: 
                    <span>{{ $students->dob }}</span>
                </p>
    
                <p>Email: 
                    <span>{{ $students->user->email }}</span>
                </p>

                <p>Phone Number: 
                    <span>{{ $students->user->phone_number }}</span>
                </p>
            </div>
            
            <div class="student_infor">
                <p>Dorm Name: 
                    <span>{{ $students->dorm->dorm_name }}</span>
                </p>
                  
                <p>Gender: 
                    <span>{{ $students->user->gender }}</span>
                </p>
        
                <p>Address: 
                    <span>{{ $students->user->address }}</span>
                </p>
                
                <p>User Level: 
                    <span>{{ $students->user->user_level_label }}</span>
                </p>
                <p>Graduation Date: 
                    <span>{{ $students->graduation_date }}</span>
                </p>
    
                <p>Graduation Status: 
                    <span class="{{ $students->graduation_status == 1 ? 'text_success' : 'text_danger' }} ">
                        {{ $students->graduation_status == 1 ? 'Graduate' : 'Undergraduate' }}
                    </span>
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>