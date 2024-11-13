<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Dorm;
use App\Models\Classes;
use App\Models\Parents;



class DashboardController extends Controller
{
    public function getMenuLinks()
    {
        $menuItems = [];
        $userLevel = Auth::user()->user_level;
    
        //0,1 -admin/superadmin , 2 - teacher, 3 - accountant, 4 - Student & 5 - Parent
        if(in_array($userLevel, [0,1])){
            $menuItems = [
                ['icon' => 'fa-solid fa-gauge', 'route' => 'admin_dashboard','label' => 'Dashboard' ],
                ['icon' => 'fa-solid fa-users', 'route' => 'users.index', 'label' => 'Users' ],
                ['icon' => 'fa fa-chalkboard-teacher', 'route' => 'teachers.index','label' => 'Teachers'],
                [ 'icon' => 'fa fa-file-alt', 'label' =>'Facilities' , 'submenu' =>
                    [
                        ['icon' => 'fa fa-school', 'route' => 'classes.index', 'label' => 'Classes'],
                        ['icon' => 'fa fa-bed', 'route' => 'dorms.index', 'label' => 'Dorms'],
                        ['icon' => 'fa fa-signal', 'route' => 'forms.index', 'label' => 'Forms'],
                    ],
                ],
                ['icon' => 'fa fa-child',  'route' => 'parents.index', 'label' => 'Parents'],
                ['icon' => 'fa fa-user-graduate', 'route' => 'students.index', 'label' => 'Students' ],
                ['icon' => 'fa fa-university', 'label' => 'Financials', 'submenu' => 
                    [
                        ['icon' => 'fa fa-coins',  'route' => 'feestructure.index', 'label' => 'Feestructure'],
                    ]
                ],
                [ 'icon' => 'fa fa-door-open', 'label' => 'Admission', 'submenu' =>
                    [   
                        ['icon' => 'fa fa-user-check', 'route'=> 'users.index', 'label' => 'Enrollment'],
                        ['icon' => 'fa fa-file-signature  ', 'route'=> 'users.index', 'label' => 'Clearance'],
                    ]
                ],
                ['icon' => 'fa fa-bell', 'route' => 'users.index','label' => 'Notifications' ],
                ['icon' => 'fa fa-chart-line', 'route' => 'users.index', 'label' => 'Reports' ],
                ['icon' => 'fa fa-cog',  'route' => 'settings.index', 'label' => 'Settings' ],
            ]; 
    
        } elseif (in_array($userLevel, [2])) {
            $menuItems = [
                ['icon' => 'fa fa-chalkboard-teacher', 'route' => 'teacher_dashboard','label' => 'Dashboard' ],
                ['icon' => 'fa fa-table', 'route' => 'teacher_dashboard','label' => 'Timetable' ],
                ['icon' => 'fa fa-user-graduate', 'route' => 'student.show', 'label' => 'Students' ],
                ['icon' => 'fa fa-user-check', 'route' => 'attendance.index', 'label' => 'Attendance'],
                ['icon' => 'fa  fa-book', 'route' => 'teacher_dashboard','label' => 'Books' ],
                ['icon' => 'fa fa-tasks', 'route' => 'teacher_dashboard', 'label' => 'Assignments'],
                ['icon' => 'fa fa-trophy', 'route' => 'discipline.index','label' => 'Discipline' ],
                ['icon' => 'fa fa-chart-bar', 'route' => 'teacher_dashboard','label' => 'Reports' ],
                ['icon' => 'fa fa-calendar-minus', 'route' => 'teacher_dashboard','label' => 'Leaveout' ],               
            ];

        }elseif(in_array($userLevel, [3])){
            $menuItems = [
                ['icon' => 'fa fa-book-open', 'route' => 'accountant_dashboard', 'label' => 'Dashboard'],
                ['icon' => 'fas fa-coins',  'route' => '#', 'label' => 'Finance'],
                ['icon' => 'fa fa-chart-line', 'route' => '#', 'label' => 'Reports' ],
            ];

        }elseif(in_array($userLevel, [4])){
            $menuItems = [
                ['icon' => 'fa-solid fa-gauge', 'route' => 'student_dashboard', 'label' => 'Dashboard'],
                ['icon' => 'fa fa-tasks', 'route' => 'student_dashboard', 'label' => 'Assignments'],
                ['icon' => 'fa fa-id-card', 'route' => 'student_details', 'label' => 'Student Details'],
                ['icon' => 'fa fa-user-check', 'route' => 'student_dashboard', 'label' => 'Attendance'],
                ['icon' => 'fa  fa-book', 'route' => 'student_dashboard','label' => 'Books' ],
                ['icon' => 'fa fa-table', 'route' => 'student_dashboard','label' => 'Timetable' ],
                ['icon' => 'fa fa-chart-line', 'route' => 'student_dashboard', 'label' => 'Reports' ],
                ['icon' => 'fa fa-receipt', 'label' => 'Financials', 'submenu' =>
                    [
                        ['icon' => 'fa fa-coins', 'route' => 'student_dashboard' ,'label' => 'Fee structure'],
                        ['icon' => 'fa fa-receipt', 'route' => 'student_dashboard' ,'label' => 'Fee statement'],
                    ]
                ],
            ];

        }elseif(in_array($userLevel, [5])){
            $menuItems = [
                ['icon' => 'fa-solid fa-gauge', 'route' => 'parent_dashboard', 'label' => 'Dashboard'],
                ['icon' => 'fa fa-user-check', 'route' => 'parent_dashboard', 'label' => 'Attendance'],
                ['icon' => 'fa fa-phone-alt', 'route' => 'parent_dashboard', 'label' => 'Contact'],
                ['icon' => 'fa fa-coins', 'route' => 'parent_dashboard', 'label' => 'Fees'],
                ['icon' => 'fa fa-chart-line', 'route' => 'parent_dashboard', 'label' => 'Report'],

            ];
        }
    
        return $menuItems;
    }


    public function show(Request $request)
    {
        $message = session('message', 'No message available.');
        return view('partials.error', compact('message'));
    }

    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        $menuItems = $this->getMenuLinks();
        $count_students = Student::count();
        $count_teachers = Teacher::count();
        $count_parents = Parents::count();
        $count_classes = Classes::count();
        $count_dorms = Dorm::count();

        return view('backend.dashboard', compact(
            'menuItems',
            'count_students', 
            'count_teachers', 
            'count_parents', 
            'count_classes', 
            'count_dorms',
        ));
    }
        
}

