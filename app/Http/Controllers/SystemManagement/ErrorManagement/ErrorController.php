<?php
namespace App\Http\Controllers\SystemManagement\ErrorManagement;
use App\Http\Controllers\Controller;
use App\Models\ErrorLog;


class ErrorController extends Controller
{



  public function __construct()
  {
    $this->middleware('auth');
  }


  public function All()
  {
    $PageInfo = 'All';
    $datas =   ErrorLog::orderBy('id', 'DESC') -> paginate(100);
    return view('SystemManagement.Error.All', compact('datas', 'PageInfo'));
  }



}
