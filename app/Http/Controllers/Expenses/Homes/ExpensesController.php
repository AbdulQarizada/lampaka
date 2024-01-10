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
      

      $Type_ID =   LookUp::where("Name", "=", "Kabul")->first();
      $PageInfo = $Type_ID -> Name;

      $AllHomeExpenses = Expense::Where("Type_ID", "=",$Type_ID -> id)->sum('Amount');
      $ThisYearHomeExpenses = Expense::Where("Type_ID", "=",$Type_ID-> id)->whereYear("Date", "=", now() -> format('Y'))->sum('Amount');
      $ThisMonthHomeExpenses = Expense::Where("Type_ID", "=",$Type_ID-> id)->whereYear("Date", "=", now() -> format('Y'))->whereMonth("Date", "=", now() -> format('m'))->sum('Amount');
      return view('Expenses.Index', ['PageInfo'=> $PageInfo,  'AllHomeExpenses' => $AllHomeExpenses, 'ThisYearHomeExpenses' => $ThisYearHomeExpenses, 'ThisMonthHomeExpenses' => $ThisMonthHomeExpenses,'currencies' => $Currencies, 'items' => $Items,'homes' => $Homes,'mainLookUps' => $mainLookUps]);
        
    }

   
    public function Search(string $data)
    {
      $mainLookUps = LookUp::where('look_ups.Parent_Name', '=', 'None') -> get();
      $Homes =   LookUp::where("Parent_Name", "=", "Home")->get();
      $Items =   LookUp::where("Parent_Name", "=", "Item")->get();
      $Currencies =   LookUp::where("Parent_Name", "=", "Currency")->get();

      $Type_Name =   LookUp::where("Name", "=", $data)->first();
      $PageInfo = $Type_Name -> Name;

      $AllHomeExpenses = Expense::Where("Type_ID", "=",$Type_Name -> id)->sum('Amount');
      $ThisYearHomeExpenses = Expense::Where("Type_ID", "=",$Type_Name -> id)->whereYear("Date", "=", now() -> format('Y'))->sum('Amount');
      $ThisMonthHomeExpenses = Expense::Where("Type_ID", "=",$Type_Name -> id)->whereYear("Date", "=", now() -> format('Y'))->whereMonth("Date", "=", now() -> format('m'))->sum('Amount');
      return view('Expenses.Index', ['PageInfo'=> $PageInfo,  'AllHomeExpenses' => $AllHomeExpenses, 'ThisYearHomeExpenses' => $ThisYearHomeExpenses, 'ThisMonthHomeExpenses' => $ThisMonthHomeExpenses,'currencies' => $Currencies, 'items' => $Items,'homes' => $Homes,'mainLookUps' => $mainLookUps]);
        
    }






    public function Store(Request $request) 
    {
        $validator = $request->validate([
          'Type_ID' => 'bail|required|max:20',
          'Item_ID' => 'required|max:20',
          'Currency_ID' => 'required|max:20',
          'Amount' => 'required|max:255',
        ]);
        Expense::create([
          'Type_ID' => request('Type_ID'),
          'Item_ID' => request('Item_ID'),
          'Currency_ID' => request('Currency_ID'),
          'Amount' => request('Amount'),
          'Description' => request('Description'),
          'Date' => request('Date'),
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

      $Type_Name =   LookUp::where("Name", "=", $data)->first();
      $PageInfo = $Type_Name -> Name;
      $datas = Expense::Where("Type_ID", "=",$Type_Name -> id)
      -> join('users as a', 'expenses.Created_By', '=', 'a.id')
      -> join('look_ups as b', 'expenses.Item_ID', '=', 'b.id')
      -> join('look_ups as c', 'expenses.Currency_ID', '=', 'c.id')
      -> select('expenses.*', 'a.FirstName as UFirstName', 'a.LastName as ULastName', 'b.Name as Item', 'c.Name as Currency')
      ->orderByDesc('Date')
      -> paginate(100);
      $AllHomeExpenses = Expense::Where("Type_ID", "=",$Type_Name -> id)->sum('Amount');
      $ThisYearHomeExpenses = Expense::Where("Type_ID", "=",$Type_Name -> id)->whereYear("Date", "=", now() -> format('Y'))->sum('Amount');
      $ThisMonthHomeExpenses = Expense::Where("Type_ID", "=",$Type_Name -> id)->whereYear("Date", "=", now() -> format('Y'))->whereMonth("Date", "=", now() -> format('m'))->sum('Amount');
      return view('Expenses.Details', ['PageInfo'=> $PageInfo, 'datas'=> $datas, 'AllHomeExpenses' => $AllHomeExpenses, 'ThisYearHomeExpenses' => $ThisYearHomeExpenses, 'ThisMonthHomeExpenses' => $ThisMonthHomeExpenses]);
     
      
    }




}
