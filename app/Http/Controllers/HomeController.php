<?php

namespace App\Http\Controllers;

use App\Models\QamarCareCard;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Location;
use App\Models\Scholarship;
use App\Models\ScholarshipModule;
use Illuminate\Support\Facades\Cookie;
use App\Models\LookUp;
use Carbon\Carbon;
use FaizShukri\Quran\Quran;


class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }

    public function root()
    {

        if (Auth::check() && !Auth::User()->IsActive == 1) {
            Auth::logout();
            return redirect()->route('login')->with('Your session has expired because your status changed.');
        }
        if (Cookie::get('Layout') == null) {
            if (Auth::User()->IsOrphanSponsor == 1) {
                $cookies = Cookie::forever('Layout', "LayoutSidebar");
            } else {
                $cookies = Cookie::forever('Layout', "LayoutNoSidebar");
            }
            return redirect()->route('root')->cookie($cookies);
        }




        // Notification
        $notifications = auth()->user()->unreadNotifications;
        // Look up
        $catagorys =   LookUp::where("Parent_Name", "=", "None")->get(); 
        return view('index', compact('notifications'));
    }









    // Family Status Chart



    public function Projects()
    {
        return view('Projects');
    }

    public function BeneficiariesServices()
    {
        return view('BeneficiariesServices');
    }

    public function Reports()
    {
        return view('Reports');
    }




    public function GetDistricts($data)
    {
        $districts =   Location::select('id', 'Name')->where("Parent_ID", "=", $data)->get();
        return response()->json($districts);
    }










    /*set cookies for layout */
    public function LayoutSidebar()
    {
        Cookie::forget('Layout');
        $cookies = Cookie::forever('Layout', "LayoutSidebar");
        return redirect()->back()->cookie($cookies);
    }

    public function LayoutNoSidebar()
    {
        Cookie::forget('Layout');
        $cookies = Cookie::forever('Layout', "LayoutNoSidebar");
        return redirect()->back()->cookie($cookies);
    }

    /*Language Translation*/
    public function lang($locale)
    {
        if ($locale) {
            App::setLocale($locale);
            Session::put('lang', $locale);
            Session::save();
            return redirect()->back()->with('locale', $locale);
        } else {
            return redirect()->back();
        }
    }


}
