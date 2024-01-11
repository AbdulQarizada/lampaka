<?php

namespace App\FileUpload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class SystemManagement extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Users_Profile(Request $request)
    {
        if ($request->hasFile('Profile')) {
            $profile = $request->file('Profile');
            $profilename = $profile->getClientOriginalName();
            $profileuniquename = uniqid() . '_' . $profilename;
            $profile->storeAs('Profiles', $profileuniquename, 'Users');
            return $profileuniquename;
        }
        return '';
    }
}
