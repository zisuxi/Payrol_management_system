<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\ledger;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;

use function Laravel\Prompts\alert;

class ReportController extends Controller
{
    public function GetReport()
    {
        $user = DB::table('authentications')->where('email', session()->get('user_added'))->first();
        $viewData = ledger::all();
        $allCats = category::get()->toArray();
        $array_data = [];
        foreach ($viewData as  $Vdata) {
            $category = category::where('id', $Vdata->category_type)->first();
            $array_data[$Vdata->id] = $category;
        }

        return view('Report.viewReport', compact('allCats', 'user', 'viewData', 'array_data'));
    }


    public function myFuncton(Request $request)
    {

        if (isset($request->niche) == '') {
            return 'Please Select Main Category';
        }
        $mainCat = isset($request->niche) ? $request->niche : "";
        $subCat = isset($request->catType) ? $request->catType : "";

        // $duration = isset($request->period) ? $request->period : "";
        $start_date = $request->to_date;
        $end_date = $request->from_date;

        // $getRecord = ledger::where("category_type", '=', $subCat)->whereBetween('date', [$start_date, $end_date])->get()->toArray();
        $getRecord = DB::table('ledgers as ld')
            ->join('categories as ct', 'ld.category_type', '=', 'ct.id')
            ->selectRaw('ld.id as id, ld.price as price, ld.description as description, ld.date as date, ct.cat_name as cat_name, ct.cat_type as cat_type')
            ->where("ld.category_type", '=', $subCat)
            ->whereBetween('ld.date', [$start_date, $end_date])->get();
        return response()->json([
            'record' => $getRecord,
        ]);
    }
}
