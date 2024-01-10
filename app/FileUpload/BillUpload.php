<?php

namespace App\FileUpload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class BillUpload extends Controller
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


    public function Bill_Upload(Request $request)
    {
        if ($request->hasFile('Bill')) {
            $Bill = $request->file('Bill');
            $Extenstion = $Bill->getClientOriginalExtension();
            if($Extenstion == 'pdf' || $Extenstion == 'jpeg' || $Extenstion == 'jpg' || $Extenstion == 'png')
            {
            $Billuniquename = uniqid() .'_'. now()->format('Y-m-d') . '.' . $Extenstion;
            $Bill->storeAs('', $Billuniquename, 'Bills');
            return $Billuniquename;
            }
            return '';
        }
        return '';
    }

   

}
