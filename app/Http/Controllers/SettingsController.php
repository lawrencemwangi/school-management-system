<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.admin.settings.list_setting');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('backend.admin.settings.update_settings');
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
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Settings $settings)
    // {
    //     $request->validate(array_merge([
    //         'school_name' => 'required|string',
    //         'school_address' => 'required|string',
    //         'school_abbreviation' => 'required|string',
    //         'school_contact' => 'required|string',
    //         'school_email' => 'required|string',
    //         'school_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

    //     ], array_fill_keys([
    //         'school_website',
    //         'school_mission',
    //         'school_vision',
    //         'principal_title',
    //         'principal_email',
    //         'principal_contact',
    //         'instagram_account',
    //         'facebook_account',
    //         'twitter_account',
    //     ], 'nullable|string')));

    //     // Update the configuration settings
    //     Config::set('school_settings.school_name', $request->school_name);
    //     Config::set('school_settings.school_address', $request->school_address);
    //     Config::set('school_settings.school_abbreviation', $request->school_abbreviation);
    //     Config::set('school_settings.school_contact', $request->school_contact);
    //     Config::set('school_settings.school_email', $request->school_email);
    //     Config::set('school_settings.school_website', $request->school_website);
    //     Config::set('school_settings.school_mission', $request->school_mission);
    //     Config::set('school_settings.school_vision', $request->school_vision);
    //     Config::set('school_settings.principal_title', $request->principal_title);  
    //     Config::set('school_settings.principal_email', $request->principal_email);
    //     Config::set('school_settings.principal_contact', $request->principal_contact);
    //     Config::set('school_settings.instagram_account', $request->instagram_account);
    //     Config::set('school_settings.facebook_account', $request->facebook_account);
    //     Config::set('school_settings.twitter_account', $request->twitter_account);

    //     // Handle logo upload if provided
    //     if ($request->hasFile('school_logo')) {
    //         $logoPath = $request->file('school_logo')->store('public/images');
    //         Config::set('school_settings.school_logo', $logoPath);
    //     }

    //     dd($settings);
    //     dd($request->all());

    //     return redirect()->route('settings.index')->with('success', [
    //         'message' => 'School Setting updated successfully',
    //         'duration' => $this->alert_message_duration,
    //     ]);
    // }

    public function update(Request $request)
    {
        $request->validate([
            'school_name' => 'required|string',
            'school_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'school_address' => 'required|string',
            'school_abbreviation' => 'required|string',
            'school_contact' => 'required|string',
            'school_email' => 'required|string',
            'school_website' => 'nullable|string',
            'school_motto' => 'nullable|string',
            'school_vision' => 'nullable|string',
            'school_mission' => 'nullable|string',
            'principal_title' => 'nullable|string',
            'principal_email' => 'nullable|string',
            'principal_contact' => 'nullable|string',
            'instagram_account' => 'nullable|string',
            'facebook_account' => 'nullable|string',
            'twitter_account' => 'nullable|string',
        ]);

        $settings = $request->only([
            'school_name', 'school_logo', 'school_address', 'school_abbreviation',
            'school_contact', 'school_email', 'school_website', 'school_motto',
            'school_vision', 'school_mission', 'principal_title', 'principal_email',
            'principal_contact', 'instagram_account', 'facebook_account', 'twitter_account'
        ]);

        foreach ($settings as $key => $value) {
            if ($key == 'school_logo' && $request->hasFile('school_logo')) {
                $logoPath = $request->file('school_logo')->store('public/images');
                SchoolSetting::updateOrCreate(['key' => 'school_logo'], ['value' => $logoPath]);
            } else {
                SchoolSetting::updateOrCreate(['key' => $key], ['value' => $value]);
            }
        }

        $this->loadConfig();

        return redirect()->route('settings.index')->with('success',[
            'message' =>  'School settings updated successfully.',
            'duration' => $this->alert_message_duration,
        ]);
    }

    private function loadConfig()
    {
        $settings = SchoolSetting::all();
        foreach ($settings as $setting) {
            Config::set('school_settings.' . $setting->key, $setting->value);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }

    public function schoolSetting()
    {
        $schoolSettings = config::get('school_setting');
        
        return view('backend.admin.settings.update_settings',compact('schoolSettings'));
    }
}
