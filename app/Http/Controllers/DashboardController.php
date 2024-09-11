<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userLevel = auth()->user()->user_level;
        $menuItems = $this->getMenuLinks();  
        return view('backend.dashboard', compact('userLevel', 'menuItems'));
    }
    
    public function getMenuLinks()
    {
        $menuItems = [];
        $userLevel = Auth::user()->user_level;
    
        if(in_array($userLevel, [0,1])){
            $menuItems = [
                ['icon' => 'fa-solid fa-gauge', 'route' => 'admin_dashboard','label' => 'Dashboard' ],
                ['icon' => 'fa-solid fa-users', 'route' => '#', 'label' => 'Users' ],
                ['icon' => 'fa fa-chalkboard-teacher', 'route' => '#','label' => 'Teachers'],
                ['icon' => 'fa fa-bed', 'route' => '#', 'label' => 'Dorms'],
                ['icon' => 'fa fa-coins',  'route' => '#', 'label' => 'Finance'],
                ['icon' => 'fa fa-bell', 'route' => '#','label' => 'Notifications' ],
                ['icon' => 'fa fa-chart-line', 'route' => '#', 'label' => 'Reports' ],
                ['icon' => 'fa fa-cog',  'route' => '#', 'label' => 'Settings' ],
            ]; 
    
        } elseif (in_array($userLevel, [2])) {
            $menuItems = [
                ['icon' => 'fa-solid fa-gauge', 'route' => 'teacher_dashboard','label' => 'Dashboard' ],
                ['icon' => 'fa-solid fa-gauge', 'route' => '#','label' => 'class' ],
                ['icon' => 'fa fa-tasks', 'route' => '#', 'label' => 'Assignments'],
                ['icon' => 'fa fa-user-check', 'route' => '#', 'label' => 'Attendance'],
            ];

        }elseif(in_array($userLevel, [3])){
            $menuItems = [
                ['icon' => 'fa-solid fa-gauge', 'route' => 'accountant_dashboard', 'label' => 'Dashboard'],
                ['icon' => 'fas fa-coins',  'route' => '#', 'label' => 'Finance'],
                ['icon' => 'fa fa-chart-line', 'route' => '#', 'label' => 'Reports' ],
            ];

        }elseif(in_array($userLevel, [4])){
            $menuItems = [
                ['icon' => 'fa-solid fa-gauge', 'route' => 'student_dashboard', 'label' => 'Dashboard'],
                ['icon' => 'fa fa-tasks', 'route' => '#', 'label' => 'Assignments'],
                ['icon' => 'fa fa-user-check', 'route' => '#', 'label' => 'Attendance'],
            ];

        }elseif(in_array($userLevel, [5])){
            $menuItems = [
                ['icon' => 'fa-solid fa-gauge', 'route' => 'parent_dashboard', 'label' => 'Dashboard'],
                ['icon' => 'fa fa-user-check', 'route' => '#', 'label' => 'Attendance'],
                ['icon' => 'fa fa-phone-alt', 'route' => '#', 'label' => 'Contact'],
                ['icon' => 'fa fa-coins', 'route' => '#', 'label' => 'Fees'],
                ['icon' => 'fa fa-chart-line', 'route' => '#', 'label' => 'Report'],

            ];
        }
    
        return $menuItems;
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
