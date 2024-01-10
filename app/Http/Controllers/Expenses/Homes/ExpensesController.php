<?php

namespace App\Http\Controllers\Expenses\Homes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\LookUp;
use Carbon;
class ExpensesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // index
    public function Index()
    {
      $mainLookUps = LookUp::where('look_ups.Parent_Name', '=', 'None') -> get();
      $Homes =   LookUp::where("Parent_Name", "=", "Home")->get();
      $Items =   LookUp::where("Parent_Name", "=", "Item")->get();
      $Currencies =   LookUp::where("Parent_Name", "=", "Currency")->get();
      $PageInfo = 'Kabul';


      $AllHomeExpenses = Expense::Where("Type", "=","Kabul")->sum('Amount');
      $ThisYearHomeExpenses = Expense::Where("Type", "=","Kabul")->whereYear("Date", "=", now() -> format('Y'))->sum('Amount');
      $ThisMonthHomeExpenses = Expense::Where("Type", "=","Kabul")->whereYear("Date", "=", now() -> format('Y'))->whereMonth("Date", "=", now() -> format('m'))->sum('Amount');
      return view('Expenses.Index', ['PageInfo'=> $PageInfo,  'AllHomeExpenses' => $AllHomeExpenses, 'ThisYearHomeExpenses' => $ThisYearHomeExpenses, 'ThisMonthHomeExpenses' => $ThisMonthHomeExpenses,'currencies' => $Currencies, 'items' => $Items,'homes' => $Homes,'mainLookUps' => $mainLookUps]);
        
    }

   
    public function Kabul()
    {
      $mainLookUps = LookUp::where('look_ups.Parent_Name', '=', 'None') -> get();
      $Homes =   LookUp::where("Parent_Name", "=", "Home")->get();
      $Items =   LookUp::where("Parent_Name", "=", "Item")->get();
      $Currencies =   LookUp::where("Parent_Name", "=", "Currency")->get();
      $PageInfo = 'Kabul';


      $AllHomeExpenses = Expense::Where("Type", "=","Kabul")->sum('Amount');
      $ThisYearHomeExpenses = Expense::Where("Type", "=","Kabul")->whereYear("Date", "=", now() -> format('Y'))->sum('Amount');
      $ThisMonthHomeExpenses = Expense::Where("Type", "=","Kabul")->whereYear("Date", "=", now() -> format('Y'))->whereMonth("Date", "=", now() -> format('m'))->sum('Amount');
      return view('Expenses.Index', ['PageInfo'=> $PageInfo,  'AllHomeExpenses' => $AllHomeExpenses, 'ThisYearHomeExpenses' => $ThisYearHomeExpenses, 'ThisMonthHomeExpenses' => $ThisMonthHomeExpenses,'currencies' => $Currencies, 'items' => $Items,'homes' => $Homes,'mainLookUps' => $mainLookUps]);
        
    }


    public function Laghman()
    {
      $mainLookUps = LookUp::where('look_ups.Parent_Name', '=', 'None') -> get();
      $Homes =   LookUp::where("Parent_Name", "=", "Home")->get();
      $Items =   LookUp::where("Parent_Name", "=", "Item")->get();
      $Currencies =   LookUp::where("Parent_Name", "=", "Currency")->get();
      $PageInfo = 'Laghman';


      $AllHomeExpenses = Expense::Where("Type", "=","Laghman")->sum('Amount');
      $ThisYearHomeExpenses = Expense::Where("Type", "=","Laghman")->whereYear("Date", "=", now() -> format('Y'))->sum('Amount');
      $ThisMonthHomeExpenses = Expense::Where("Type", "=","Laghman")->whereYear("Date", "=", now() -> format('Y'))->whereMonth("Date", "=", now() -> format('m'))->sum('Amount');
      return view('Expenses.Index', ['PageInfo'=> $PageInfo,  'AllHomeExpenses' => $AllHomeExpenses, 'ThisYearHomeExpenses' => $ThisYearHomeExpenses, 'ThisMonthHomeExpenses' => $ThisMonthHomeExpenses,'currencies' => $Currencies, 'items' => $Items,'homes' => $Homes,'mainLookUps' => $mainLookUps]);
        
    }


    public function Canada()
    {
      $mainLookUps = LookUp::where('look_ups.Parent_Name', '=', 'None') -> get();
      $Homes =   LookUp::where("Parent_Name", "=", "Home")->get();
      $Items =   LookUp::where("Parent_Name", "=", "Item")->get();
      $Currencies =   LookUp::where("Parent_Name", "=", "Currency")->get();
      $PageInfo = 'Canada';
      


      $AllHomeExpenses = Expense::Where("Type", "=","Canada")->sum('Amount');
      $ThisYearHomeExpenses = Expense::Where("Type", "=","Canada")->whereYear("Date", "=", now() -> format('Y'))->sum('Amount');
      $ThisMonthHomeExpenses = Expense::Where("Type", "=","Canada")->whereYear("Date", "=", now() -> format('Y'))->whereMonth("Date", "=", now() -> format('m'))->sum('Amount');
      return view('Expenses.Index', ['PageInfo'=> $PageInfo,  'AllHomeExpenses' => $AllHomeExpenses, 'ThisYearHomeExpenses' => $ThisYearHomeExpenses, 'ThisMonthHomeExpenses' => $ThisMonthHomeExpenses,'currencies' => $Currencies, 'items' => $Items,'homes' => $Homes,'mainLookUps' => $mainLookUps]);
        
    }


    public function Turkey()
    {
      $mainLookUps = LookUp::where('look_ups.Parent_Name', '=', 'None') -> get();
      $Homes =   LookUp::where("Parent_Name", "=", "Home")->get();
      $Items =   LookUp::where("Parent_Name", "=", "Item")->get();
      $Currencies =   LookUp::where("Parent_Name", "=", "Currency")->get();
      $PageInfo = 'Turkey';


      $AllHomeExpenses = Expense::Where("Type", "=","Turkey")->sum('Amount');
      $ThisYearHomeExpenses = Expense::Where("Type", "=","Turkey")->whereYear("Date", "=", now() -> format('Y'))->sum('Amount');
      $ThisMonthHomeExpenses = Expense::Where("Type", "=","Turkey")->whereYear("Date", "=", now() -> format('Y'))->whereMonth("Date", "=", now() -> format('m'))->sum('Amount');
      return view('Expenses.Index', ['PageInfo'=> $PageInfo,  'AllHomeExpenses' => $AllHomeExpenses, 'ThisYearHomeExpenses' => $ThisYearHomeExpenses, 'ThisMonthHomeExpenses' => $ThisMonthHomeExpenses,'currencies' => $Currencies, 'items' => $Items,'homes' => $Homes,'mainLookUps' => $mainLookUps]);
        
    }



    public function Store(Request $request) 
    {
        $validator = $request->validate([
          'Type' => 'bail|required|max:255',
          'Item' => 'required|max:255',
          'Currency' => 'required|max:255',
          'Amount' => 'required|max:255',
        ]);
        Expense::create([
          'Type' => request('Type'),
          'Item' => request('Item'),
          'Currency' => request('Currency'),
          'Amount' => request('Amount'),
          'Date' => Carbon\Carbon::now(),
          'Bill' => request('Bill'),
          'Created_By' => auth()->user()->id,
          'Owner' => 1,
        ]);
        return redirect()->route('IndexExpenses')->with('toast_success', 'Record Created Successfully!');
    }


// Delete
public function Delete(Expense $data)
{
    $data->delete();
    return back()->with('success', 'Record deleted successfully');
}

    // status
    public function Details(string $data)
    {

      $PageInfo = 'Kabul';
      $datas = Expense::Where("Type", "=",$data)
      -> join('users as a', 'expenses.Created_By', '=', 'a.id')
      ->select('expenses.*', 'a.FirstName as UFirstName', 'a.LastName as ULastName')
      ->paginate(100);
      $AllHomeExpenses = Expense::Where("Type", "=",$data)->sum('Amount');
      $ThisYearHomeExpenses = Expense::Where("Type", "=",$data)->whereYear("Date", "=", now() -> format('Y'))->sum('Amount');
      $ThisMonthHomeExpenses = Expense::Where("Type", "=",$data)->whereYear("Date", "=", now() -> format('Y'))->whereMonth("Date", "=", now() -> format('m'))->sum('Amount');
      return view('Expenses.Details', ['PageInfo'=> $PageInfo, 'datas'=> $datas, 'AllHomeExpenses' => $AllHomeExpenses, 'ThisYearHomeExpenses' => $ThisYearHomeExpenses, 'ThisMonthHomeExpenses' => $ThisMonthHomeExpenses]);
     
      
    }




}
