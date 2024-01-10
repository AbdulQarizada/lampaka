<?php
namespace App\Http\Controllers\SystemManagement\LookUpManagement;
use App\Http\Controllers\Controller;
use App\Models\LookUp;
use Illuminate\Http\Request;

class LookUpController extends Controller
{



  public function __construct()
  {
    $this->middleware('auth');
  }


  // list
  public function All()
  {
    $mainLookUps = LookUp::where('look_ups.Parent_Name', '=', 'None') -> get();
    $datas =   LookUp::where('look_ups.Parent_Name', '=', 'None') -> paginate(100);
    return view('SystemManagement.LookUp.All', compact('datas', 'mainLookUps'));
  }

  public function SearchByMain($data)
  {
    $mainLookUps = LookUp::where('look_ups.Parent_Name', '=', 'None') -> get();
    $datas =   LookUp::where('look_ups.Parent_Name', '=', $data)->paginate(100);
    return view('SystemManagement.LookUp.All', compact('datas', 'mainLookUps'));
}

  public function Create(Request $request)
  {
      $validator = $request->validate([
          'Parent_Name' => 'bail|required|max:255',
          'Name' => 'required|max:255',
      ]);
      LookUp::create([
          'Parent_Name' => request('Parent_Name'),
          'Name' => request('Name'),
      ]);
      return back()->with('toast_success', 'Record Created Successfully!');
  }

  // Delete
  public function Delete(LookUp $data)
  {
    $data->delete();
    return back()->with('success', 'Record deleted successfully');
  }

}
