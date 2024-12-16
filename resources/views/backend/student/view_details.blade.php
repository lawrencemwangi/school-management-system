<x-admin-layout>
    <h1>student Detials</h1>

    <div class="student_container">
        <div class="image_profile">
            <h3>Student Profile picture</h3>
            <img src="{{ $students->user->profile_image_url }}" alt="Student Profile Image">
        </div>
        <br>
        <hr>

        <h3>Student Information</h3>
        <div class="student_data">
            <div class="student_infor">
                <p>Student Names: 
                    <span>{{ $students->user->first_name }}</span>
                    <span>{{ $students->user->last_name }}</span>
                </p>

                <p>Parent Names:
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
            </div>
            
            <div class="student_infor">

                <p>Phone Number: 
                    <span>{{ $students->user->phone_number }}</span>
                </p>
                
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
        <br>
        <hr>

        <div class="student_subjeccts">
            <h3>Student Subjects</h3>
            <p>Subjects: 
                @foreach ($subjects as $subject)
                    <strong>{{ $subject }}</strong>
                @endforeach
            </p>
        </div>
    </div>
</x-admin-layout>