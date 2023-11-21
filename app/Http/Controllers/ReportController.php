<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\ledger;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Psr\Log\NullLogger;
use Psy\CodeCleaner\ReturnTypePass;

use function Laravel\Prompts\alert;

class ReportController extends Controller
{
    public function GetReport()
    {
        $user = DB::table('authentications')->where('email', session()->get('user_added'))->first();
        $start_month = Carbon::now()->startOfMonth()->format('Y-m-d');
        $end_month = Carbon::now()->endOfMonth()->format('Y-m-d');

        $viewData = ledger::whereBetween('date', [$start_month, $end_month])->get();
        $array_data = [];
        foreach ($viewData as  $vdata) {
            $category = category::where('id', $vdata->category_type)->get();
            $array_data[$vdata->id] = $category;
        }
        return view('Report.viewReport', compact('user', 'viewData', 'array_data'));
    }


    public function myFuncton(Request $request)
    {
        if ($request->cat_val == "income") {
            $category = category::where('cat_type', 1)->get();
            $array = [];
            foreach ($category as $cat) {
                $ledger = ledger::where('category_type', $cat->id)->get();
                $array[$cat->cat_name] = $ledger;
            }
            return  response()->json([
                'message' => $array,
            ]);
        } else {
            $category = category::where('cat_type', 0)->get();
            foreach ($category as $cat) {
                $ledger = ledger::where('category_type', $cat->id)->get();
                $array[$cat->cat_name] = $ledger;
            }
            return  response()->json([
                'message' => $array,
            ]);
        }
    }
    public function compareFunction(Request  $request)
    {
        if ($request->sub_cat != "" && $request->period == "") {
            $subCat = isset($request->sub_cat) ? $request->sub_cat : "";
            $getRecord = DB::table('ledgers as ld')
                ->join('categories as ct', 'ld.category_type', '=', 'ct.id')
                ->select('ld.id', 'ld.price', 'ld.description', 'ld.date', 'ct.cat_name', 'ct.cat_type')
                ->where('ld.category_type', '=', $subCat)
                ->get();
            return response()->json([
                //  'record' => $getRecord,
            ]);
        } elseif ($request->sub_cat != "" && $request->period != "") {
            if ($request->period == "Today") {
                $start_date = Carbon::now()->format('Y-m-d');
                $end_date = Carbon::now()->format('Y-m-d');
                $subCat = isset($request->sub_cat) ? $request->sub_cat : "";

                $getRecord = DB::table('ledgers as ld')
                    ->join('categories as ct', 'ld.category_type', '=', 'ct.id')
                    ->select('ld.id', 'ld.price', 'ld.description', 'ld.date', 'ct.cat_name', 'ct.cat_type')
                    ->where('ld.category_type', '=', $subCat)->whereBetween('ld.date', [$start_date, $end_date])
                    ->get();
                return response()->json([
                    'record' => $getRecord,
                ]);
            } elseif ($request->period == "Yesterday") {
                $start_date = Carbon::now()->yesterday()->format('Y-m-d');
                $end_date = Carbon::now()->yesterday()->format('Y-m-d');
                $subCat = isset($request->sub_cat) ? $request->sub_cat : "";

                $getRecord = DB::table('ledgers as ld')
                    ->join('categories as ct', 'ld.category_type', '=', 'ct.id')
                    ->select('ld.id', 'ld.price', 'ld.description', 'ld.date', 'ct.cat_name', 'ct.cat_type')
                    ->where('ld.category_type', '=', $subCat)->whereBetween('ld.date', [$start_date, $end_date])
                    ->get();
                return response()->json([
                    'record' => $getRecord,
                ]);
            } elseif ($request->period == "This week") {
                $start_date = Carbon::now()->startOfWeek()->format('Y-m-d');
                $end_date = Carbon::now()->endOfWeek()->format('Y-m-d');
                $subCat = isset($request->sub_cat) ? $request->sub_cat : "";

                $getRecord = DB::table('ledgers as ld')
                    ->join('categories as ct', 'ld.category_type', '=', 'ct.id')
                    ->select('ld.id', 'ld.price', 'ld.description', 'ld.date', 'ct.cat_name', 'ct.cat_type')
                    ->where('ld.category_type', '=', $subCat)->whereBetween('ld.date', [$start_date, $end_date])
                    ->get();
                return response()->json([
                    'record' => $getRecord,
                ]);
            } elseif ($request->period == "Last Week") {
                $start_date = Carbon::now()->subWeek()->startOfWeek()->format('Y-m-d');
                $end_date = Carbon::now()->subWeek()->endOfWeek()->format('Y-m-d');
                $subCat = isset($request->sub_cat) ? $request->sub_cat : "";

                $getRecord = DB::table('ledgers as ld')
                    ->join('categories as ct', 'ld.category_type', '=', 'ct.id')
                    ->select('ld.id', 'ld.price', 'ld.description', 'ld.date', 'ct.cat_name', 'ct.cat_type')
                    ->where('ld.category_type', '=', $subCat)->whereBetween('ld.date', [$start_date, $end_date])
                    ->get();
                return response()->json([
                    'record' => $getRecord,
                ]);
            } elseif ($request->period == "Last 7 Days") {
                $end_date = Carbon::now()->format('Y-m-d');
                $start_date = Carbon::now()->subDays(7)->format('Y-m-d');

                $subCat = isset($request->sub_cat) ? $request->sub_cat : "";

                $getRecord = DB::table('ledgers as ld')
                    ->join('categories as ct', 'ld.category_type', '=', 'ct.id')
                    ->select('ld.id', 'ld.price', 'ld.description', 'ld.date', 'ct.cat_name', 'ct.cat_type')
                    ->where('ld.category_type', '=', $subCat)->whereBetween('ld.date', [$start_date, $end_date])
                    ->get();

                return response()->json([
                    'record' => $getRecord,
                ]);
            } elseif ($request->period == "Last 30 Days") {
                $end_date = Carbon::now()->format('Y-m-d');
                $start_date = Carbon::now()->subDays(30)->format('Y-m-d');
                $subCat = isset($request->sub_cat) ? $request->sub_cat : "";

                $getRecord = DB::table('ledgers as ld')
                    ->join('categories as ct', 'ld.category_type', '=', 'ct.id')
                    ->select('ld.id', 'ld.price', 'ld.description', 'ld.date', 'ct.cat_name', 'ct.cat_type')
                    ->where('ld.category_type', '=', $subCat)->whereBetween('ld.date', [$start_date, $end_date])
                    ->get();

                return response()->json([
                    'record' => $getRecord,
                ]);
            } elseif ($request->period == "Last 60 Days") {
                $end_date = Carbon::now()->format('Y-m-d');
                $start_date = Carbon::now()->subDays(60)->format('Y-m-d');
                $subCat = isset($request->sub_cat) ? $request->sub_cat : "";

                $getRecord = DB::table('ledgers as ld')
                    ->join('categories as ct', 'ld.category_type', '=', 'ct.id')
                    ->select('ld.id', 'ld.price', 'ld.description', 'ld.date', 'ct.cat_name', 'ct.cat_type')
                    ->where('ld.category_type', '=', $subCat)->whereBetween('ld.date', [$start_date, $end_date])
                    ->get();

                return response()->json([
                    'record' => $getRecord,
                ]);
            } elseif ($request->period == "Last 90 Days") {
                $end_date = Carbon::now()->format('Y-m-d');
                $start_date = Carbon::now()->subDays(90)->format('Y-m-d');
                $subCat = isset($request->sub_cat) ? $request->sub_cat : "";

                $getRecord = DB::table('ledgers as ld')
                    ->join('categories as ct', 'ld.category_type', '=', 'ct.id')
                    ->select('ld.id', 'ld.price', 'ld.description', 'ld.date', 'ct.cat_name', 'ct.cat_type')
                    ->where('ld.category_type', '=', $subCat)->whereBetween('ld.date', [$start_date, $end_date])
                    ->get();

                return response()->json([
                    'record' => $getRecord,
                ]);
            } elseif ($request->period == "This Year") {
                $start_date = Carbon::now()->startOfYear();
                $end_date = Carbon::now()->endOfYear();
                $subCat = isset($request->sub_cat) ? $request->sub_cat : "";

                $getRecord = DB::table('ledgers as ld')
                    ->join('categories as ct', 'ld.category_type', '=', 'ct.id')
                    ->select('ld.id', 'ld.price', 'ld.description', 'ld.date', 'ct.cat_name', 'ct.cat_type')
                    ->where('ld.category_type', '=', $subCat)->whereBetween('ld.date', [$start_date, $end_date])
                    ->get();

                return response()->json([
                    'record' => $getRecord,
                ]);
            }
        }
    }
}
