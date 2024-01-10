<?php
namespace App\Http\Controllers\SystemManagement\UserManagement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Location;
use App\Models\LookUp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{



  public function __construct()
  {
    $this->middleware('auth');
  }

  // index
  public function Index()
  {
     // Look up
    $catagorys =   LookUp::where("Parent_Name", "=", "None")->get();
    return view('SystemManagement.Index', compact('catagorys'));
  }


  // list
  public function All()
  {

    $PageInfo = 'All';
    $datas =   User::leftjoin('locations as a', 'users.Province_ID', '=', 'a.id')
      ->leftjoin('locations as b', 'users.District_ID', '=', 'b.id')
      ->join('users as d', 'users.Created_By', '=', 'd.id')
      ->select(['users.*',  'a.Name as ProvinceName', 'b.Name as DistrictName', 'd.FirstName as UFirstName', 'd.LastName as ULastName', 'd.Job as UJob'])
      ->where("users.IsEmployee", "=", 1)
      ->paginate(100);
    return view('SystemManagement.User.All', compact('datas', 'PageInfo'));
  }

  public function Activated()
  {
    $PageInfo = 'Active';
    $datas =   User::leftjoin('locations as a', 'users.Province_ID', '=', 'a.id')
      ->leftjoin('locations as b', 'users.District_ID', '=', 'b.id')
      ->join('users as d', 'users.Created_By', '=', 'd.id')
      ->select(['users.*', 'a.Name as ProvinceName', 'b.Name as DistrictName', 'd.FirstName as UFirstName', 'd.LastName as ULastName', 'd.Job as UJob'])
      ->where("users.IsEmployee", "=", 1)
      ->where("users.IsActive", "=", 1)
      ->paginate(100);
    return view('SystemManagement.User.All', compact('datas', 'PageInfo'));
  }


  public function DeActivated()
  {
    $PageInfo = 'InActive';
    $datas =   User::leftjoin('locations as a', 'users.Province_ID', '=', 'a.id')
      ->leftjoin('locations as b', 'users.District_ID', '=', 'b.id')
      ->join('users as d', 'users.Created_By', '=', 'd.id')
      ->select(['users.*', 'a.Name as ProvinceName', 'b.Name as DistrictName',  'd.FirstName as UFirstName', 'd.LastName as ULastName', 'd.Job as UJob'])
      ->where("users.IsEmployee", "=", 1)
      ->where("users.IsActive", "!=", 1)
      ->paginate(100);
    return view('SystemManagement.User.All', compact('datas', 'PageInfo'));
  }


  // create
  public function Create()
  {

    $countries =   LookUp::where("Parent_Name", "=", "Country")->get();
    $genders =   LookUp::where("Parent_Name", "=", "Gender")->get();
    $tribes =   LookUp::where("Parent_Name", "=", "Tribe")->get();
    $languages =   LookUp::where("Parent_Name", "=", "Language")->get();
    $currentjobs =   LookUp::where("Parent_Name", "=", "CurrentJob")->get();
    $futurejobs =   LookUp::where("Parent_Name", "=", "FutureJob")->get();
    $educationlevels =   LookUp::where("Parent_Name", "=", "EducationLevel")->get();
    $relationships =   LookUp::where("Parent_Name", "=", "RelativeRelationship")->get();
    $incomestreams =   LookUp::where("Parent_Name", "=", "IncomeStream")->get();
    $familystatus =   LookUp::where("Parent_Name", "=", "FamilyStatus")->get();
    $whatqamarcandos =   LookUp::where("Parent_Name", "=", "WhatQamarCanDo")->get();
    $provinces = Location::whereNull("Parent_ID")->get();
    return view('SystemManagement.User.Create', ['countries' => $countries, 'whatqamarcandos' => $whatqamarcandos, 'genders' => $genders, 'tribes' => $tribes, 'languages' => $languages, 'currentjobs' => $currentjobs, 'futurejobs' => $futurejobs, 'educationlevels' => $educationlevels, 'provinces' => $provinces, 'relationships' => $relationships, 'incomestreams' => $incomestreams, 'familystatus' => $familystatus]);
  }

  public function Store(Request $request)
  {

    $validator = $request->validate([
      'FirstName' => 'bail|required|max:255',
      'LastName' => 'required|max:255',
      'FullName' => 'required|max:255',
      'Job' => 'required|max:255',
      'email' => 'required|unique:users|email|max:255',
      'password' => 'required|max:255',
    ]);

    User::create([
      'FirstName' => request('FirstName'),
      'LastName' => request('LastName'),
      'FullName' => request('FullName'),
      'Job' => request('Job'),
      'email' => request('email'),
      'password' => Hash::make(request('password')),
      'IsEmployee' => 1,
      'Profile' => 'avatar.jpg',
      'IsActive' => 0,
      'Created_By' => auth()->user()->id,
    ]);
    return redirect()->route('AllUser')->with('toast_success', 'Record Created Successfully!');
  }

  // update
  public function Edit(User $data)
  {

    $countries =   LookUp::where("Parent_Name", "=", "Country")->get();
    $genders =   LookUp::where("Parent_Name", "=", "Gender")->get();
    $tribes =   LookUp::where("Parent_Name", "=", "Tribe")->get();
    $languages =   LookUp::where("Parent_Name", "=", "Language")->get();
    $currentjobs =   LookUp::where("Parent_Name", "=", "CurrentJob")->get();
    $futurejobs =   LookUp::where("Parent_Name", "=", "FutureJob")->get();
    $educationlevels =   LookUp::where("Parent_Name", "=", "EducationLevel")->get();
    $relationships =   LookUp::where("Parent_Name", "=", "RelativeRelationship")->get();
    $incomestreams =   LookUp::where("Parent_Name", "=", "IncomeStream")->get();
    $familystatus =   LookUp::where("Parent_Name", "=", "FamilyStatus")->get();
    $whatqamarcandos =   LookUp::where("Parent_Name", "=", "WhatQamarCanDo")->get();
    $provinces = Location::whereNull("Parent_ID")->get();
    return view('SystemManagement.User.Edit', ['data' => $data, 'countries' => $countries, 'whatqamarcandos' => $whatqamarcandos, 'genders' => $genders, 'tribes' => $tribes, 'languages' => $languages, 'currentjobs' => $currentjobs, 'futurejobs' => $futurejobs, 'educationlevels' => $educationlevels, 'provinces' => $provinces, 'relationships' => $relationships, 'incomestreams' => $incomestreams, 'familystatus' => $familystatus]);
  }

  public function Update(Request $request, User $data)
  {
    $validator = $request->validate([
      'FirstName' => 'bail|required|max:255',
      'LastName' => 'required|max:255',
      'FullName' => 'required|max:255',
      'Job' => 'required|max:255',
      'email' => 'required',
    ]);


    $data->update([
      'FirstName' => request('FirstName'),
      'LastName' => request('LastName'),
      'FullName' => request('FullName'),
      'Job' => request('Job'),
      'email' => request('email'),
    ]);
    return back()->with('toast_success', 'Record Updated Successfully!');
  }

 // status
 public function Status(User $data)
 {
   $users =   User::where("users.id", "=", $data->id)
     ->leftjoin('locations as a', 'users.Province_ID', '=', 'a.id')
     ->leftjoin('locations as b', 'users.District_ID', '=', 'b.id')
     ->leftjoin('look_ups as d', 'users.Gender_ID', '=', 'd.id')
     ->select(
       'users.*',
       'a.Name as Province',
       'b.Name as District',
       'd.Name as Gender',
     )
     ->first();
   return view('SystemManagement.User.Status',  ['data' => $users]);
 }


 public function Activate(User $data)
 {
   $data->update([
     'IsActive' => 1,
     'Updated_By' => auth()->user()->id
   ]);
   return back()->with('toast_success', 'user Activated Successfully!');
 }

 public function DeActivate(User $data)
 {
   $data->update([
     'IsActive' => 0,
     'Updated_By' => auth()->user()->id
   ]);
   return back()->with('toast_error', 'User De-Activated Successfully!');
 }



  // role
  public function Role(User $data)
  {
    $users =   User::where("users.id", "=", $data->id)
      ->join('locations as a', 'users.Province_ID', '=', 'a.id')
      ->join('locations as b', 'users.District_ID', '=', 'b.id')
      ->select(
        'users.*',
        'a.Name as Province',
        'b.Name as District',
      )
      ->get();
    return view('SystemManagement.User.Role', ['datas' => $users]);
  }

  public function AssignRole(User $data)
  {

    $data->update([
      'IsSuperAdmin' => request('IsSuperAdmin'),
      'IsOrphanRelief' => request('IsOrphanRelief'),
      'IsAidAndRelief' => request('IsAidAndRelief'),
      'IsWash' => request('IsWash'),
      'IsEducation' => request('IsEducation'),
      'IsInitiative' => request('IsInitiative'),
      'IsMedicalSector' => request('IsMedicalSector'),
      'IsFoodAppeal' => request('IsFoodAppeal'),
      'IsQamarCareCard' => request('IsQamarCareCard'),
      'IsAppealsDistributions' => request('IsAppealsDistributions'),
      'IsDonorsAndDonorBoxes' => request('IsDonorsAndDonorBoxes'),
      'IsVolunteer' => request('IsVolunteer'),
      'IsRepresentative' => request('IsRepresentative'),
      'IsManager' => request('IsManager'),
      'IsGeneralManager' => request('IsGeneralManager'),
    ]);
    return back()->with('toast_success', 'Role Added Successfully!');
  }




  public function ResetPassword(Request $request, User $data)
  {
    $validator = $request->validate([
      'password' => 'bail|required|max:255',
    ]);
    $data->update([
      'password' => Hash::make(request('password')),
    ]);
    return back()->with('toast_success', 'Password reset Successfully!');
  }

  public function UpdatePassword(Request $request, User $data)
  {
      $request->validate([
          'current_password' => ['required', 'string'],
          'password' => ['required', 'string', 'min:6', 'confirmed'],
      ]);

      if (!(Hash::check($request->get('current_password'), Auth::user()->password)))
      {
        return back()->with('toast_warning', 'Prev Password Does Not Match!');
      }
       else
      {
        $data->update([
          'password' => Hash::make(request('password')),
        ]);
       return back()->with('toast_success', 'Password Updated Successfully!');
      }
  }

  // Delete
  public function Delete(User $data)
  {
    $data->delete();
    return redirect()->route('AllUser')->with('success', 'Record deleted successfully');
  }

 // Profile
 public function Profile(User $data)
 {
   $users =   User::where("users.id", "=", $data->id)
     ->leftjoin('locations as a', 'users.Province_ID', '=', 'a.id')
     ->leftjoin('locations as b', 'users.District_ID', '=', 'b.id')
     ->leftjoin('look_ups as d', 'users.Gender_ID', '=', 'd.id')
     ->select(
       'users.*',
       'a.Name as Province',
       'b.Name as District',
       'd.Name as Gender',
     )
     ->first();
   return view('SystemManagement.User.Profile',  ['data' => $users]);
 }

 public function UpdateProfile(Request $request, User $data)
 {
   $validator = $request->validate([
     'FirstName' => 'bail|required|max:255',
     'LastName' => 'required|max:255',
     'FullName' => 'required|max:255',
     'Job' => 'required|max:255',
     'Profile' => 'required',
   ]);


   $data->update([
     'FirstName' => request('FirstName'),
     'LastName' => request('LastName'),
     'FullName' => request('FullName'),
     'Job' => request('Job'),
     'Profile' => request('Profile'),

   ]);
   return back()->with('toast_success', 'Record Updated Successfully!');
 }



}
