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
    $mainLookUps = LookUp::where('look_ups.Parent_Name', '=', 'None')->get();
    $Homes =   LookUp::where("Parent_Name", "=", "Home")->get();
    $Items =   LookUp::where("Parent_Name", "=", "Item")->get();
    $Currencies =   LookUp::where("Parent_Name", "=", "Currency")->get();



    // for kabul 
    $Type_ID_Kabul =   LookUp::where("Name", "=", "Kabul")->first();
    $AllKabulExpenses = Expense::Where("Type_ID", "=", $Type_ID_Kabul->id)->sum('Amount');
    $YearlyKabulExpenses = Expense::Where("Type_ID", "=", $Type_ID_Kabul->id)->whereYear("Date", "=", now()->format('Y'))->sum('Amount');
    $MonthlyKabulExpenses = Expense::Where("Type_ID", "=", $Type_ID_Kabul->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", now()->format('m'))->sum('Amount');
    $DailyKabulExpenses = Expense::Where("Type_ID", "=", $Type_ID_Kabul->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", now()->format('m'))->whereDay("Date", "=", now()->format('d'))->sum('Amount');


    // for Laghman 
    $Type_ID_Laghman =   LookUp::where("Name", "=", "Laghman")->first();
    $AllLaghmanExpenses = Expense::Where("Type_ID", "=", $Type_ID_Laghman->id)->sum('Amount');
    $YearlyLaghmanExpenses = Expense::Where("Type_ID", "=", $Type_ID_Laghman->id)->whereYear("Date", "=", now()->format('Y'))->sum('Amount');
    $MonthlyLaghmanExpenses = Expense::Where("Type_ID", "=", $Type_ID_Laghman->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", now()->format('m'))->sum('Amount');
    $DailyLaghmanExpenses = Expense::Where("Type_ID", "=", $Type_ID_Laghman->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", now()->format('m'))->whereDay("Date", "=", now()->format('d'))->sum('Amount');

    // for Canada 
    $Type_ID_Canada =   LookUp::where("Name", "=", "Canada")->first();
    $AllCanadaExpenses = Expense::Where("Type_ID", "=", $Type_ID_Canada->id)->sum('Amount');
    $YearlyCanadaExpenses = Expense::Where("Type_ID", "=", $Type_ID_Canada->id)->whereYear("Date", "=", now()->format('Y'))->sum('Amount');
    $MonthlyCanadaExpenses = Expense::Where("Type_ID", "=", $Type_ID_Canada->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", now()->format('m'))->sum('Amount');
    $DailyCanadaExpenses = Expense::Where("Type_ID", "=", $Type_ID_Canada->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", now()->format('m'))->whereDay("Date", "=", now()->format('d'))->sum('Amount');

    return view(
      'Expenses.Index',
      [
        'AllKabulExpenses' => $AllKabulExpenses,
        'YearlyKabulExpenses' => $YearlyKabulExpenses,
        'MonthlyKabulExpenses' => $MonthlyKabulExpenses,
        'DailyKabulExpenses' => $DailyKabulExpenses,


        'AllLaghmanExpenses' => $AllLaghmanExpenses,
        'YearlyLaghmanExpenses' => $YearlyLaghmanExpenses,
        'MonthlyLaghmanExpenses' => $MonthlyLaghmanExpenses,
        'DailyLaghmanExpenses' => $DailyLaghmanExpenses,

        'AllCanadaExpenses' => $AllCanadaExpenses,
        'YearlyCanadaExpenses' => $YearlyCanadaExpenses,
        'MonthlyCanadaExpenses' => $MonthlyCanadaExpenses,
        'DailyCanadaExpenses' => $DailyCanadaExpenses,

        'currencies' => $Currencies,
        'items' => $Items, 'homes' => $Homes,
        'mainLookUps' => $mainLookUps
      ]
    );
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
    $PageInfo = $Type_Name->Name;
    $datas = Expense::Where("Type_ID", "=", $Type_Name->id)
      ->join('users as a', 'expenses.Created_By', '=', 'a.id')
      ->join('look_ups as b', 'expenses.Item_ID', '=', 'b.id')
      ->join('look_ups as c', 'expenses.Currency_ID', '=', 'c.id')
      ->select('expenses.*', 'a.FirstName as UFirstName', 'a.LastName as ULastName', 'b.Name as Item', 'c.Name as Currency')
      ->orderByDesc('Date')
      ->paginate(50);
    $AllHomeExpenses = Expense::Where("Type_ID", "=", $Type_Name->id)->sum('Amount');
    $ThisYearHomeExpenses = Expense::Where("Type_ID", "=", $Type_Name->id)->whereYear("Date", "=", now()->format('Y'))->sum('Amount');
    $ThisMonthHomeExpenses = Expense::Where("Type_ID", "=", $Type_Name->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", now()->format('m'))->sum('Amount');
    return view('Expenses.Details', ['PageInfo' => $PageInfo, 'datas' => $datas, 'AllHomeExpenses' => $AllHomeExpenses, 'ThisYearHomeExpenses' => $ThisYearHomeExpenses, 'ThisMonthHomeExpenses' => $ThisMonthHomeExpenses]);
  }


  
    // Tribe Chart
    public function YealyExpense_ColumnChart(string $data)
    {

      $Type_Name =   LookUp::where("Name", "=", $data)->first();
        $jan =   Expense::where("Type_ID", "=", $Type_Name->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", 1)->sum('Amount');
        $feb =   Expense::where("Type_ID", "=", $Type_Name->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", 2)->sum('Amount');
        $mar =   Expense::where("Type_ID", "=", $Type_Name->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", 3)->sum('Amount');
        $apr =   Expense::where("Type_ID", "=", $Type_Name->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", 4)->sum('Amount');
        $may =   Expense::where("Type_ID", "=", $Type_Name->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", 5)->sum('Amount');
        $jun =   Expense::where("Type_ID", "=", $Type_Name->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", 6)->sum('Amount');
        $jul =   Expense::where("Type_ID", "=", $Type_Name->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", 7)->sum('Amount');
        $aug =   Expense::where("Type_ID", "=", $Type_Name->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", 8)->sum('Amount');
        $sep =   Expense::where("Item_ID", "=", $Type_Name->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", 9)->sum('Amount');
        $oct =   Expense::where("Type_ID", "=", $Type_Name->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", 10)->sum('Amount');
        $nov =   Expense::where("Type_ID", "=", $Type_Name->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", 11)->sum('Amount');
        $dec =   Expense::where("Type_ID", "=", $Type_Name->id)->whereYear("Date", "=", now()->format('Y'))->whereMonth("Date", "=", 12)->sum('Amount');

        return response()->json([
            'jan' => $jan,
            'feb' => $feb,
            'mar' => $mar,
            'apr' => $apr,
            'may' => $may,
            'jun' => $jun,
            'jul' => $jul,
            'aug' => $aug,
            'sep' => $sep,
            'oct' => $oct,
            'nov' => $nov,
            'dec' => $dec,


        ]);
    }


}
