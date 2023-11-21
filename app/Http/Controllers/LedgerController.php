<?php

namespace App\Http\Controllers;

use App\Models\ledger;
use App\Http\Requests\StoreledgerRequest;
use App\Http\Requests\UpdateledgerRequest;
use App\Models\category;
use Illuminate\Support\Facades\DB;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = ledger::orderBy('id', 'DESC')->get();
        $array_data = array();
        foreach ($viewData as $value) {
            $category = category::where('id', $value->category_type)->first();
            $array_data[$value->id] =  $category;
        }
        $user = DB::table('authentications')->where('email', session()->get('user_added'))->first();
        return view('ledger.viewLedger', compact('user', 'viewData', 'array_data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $viewData = category::where('cat_type', 0)->get();
        return response()->json([
            "category" => $viewData,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreledgerRequest $request)
    {
   $validation=     $request->validate([
            'category_type'=>'required',
            'date'=>'required',
            'price'=>'required',

        ]);

        $input = $request->all();
        ledger::insert($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ledger $ledger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ledger $ledger)
    {
        $editData =  ledger::where('id', $ledger->id)->first();
        $category = category::where('id', $editData->category_type)->first();
        $allcategory = category::all();
        if ($category->cat_type == 0) {
            $category = "Expence";
        } else {
            $category = "Income";
        }
        return response()->json([
            "message" => $editData,
            "message2" => $category,
            "allcategory" => $allcategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateledgerRequest $request, ledger $ledger)
    {
        $input = $request->all();
        DB::table('ledgers')->where('id', $ledger->id)->update([
            'category_type' => $request->input('cat_type'),
            'price' => $request->input('exp_price'),
            'date' => $request->input('exp_date'),
            'description' => $request->input('exp_description'),
        ]);
        return response()->json([
            "update" => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ledger $ledger)
    {
        ledger::where('id', $ledger->id)->delete();
        return response()->json([
            'message' => 200,
        ]);
    }


    public function incomeCategory()
    {
        $incomeCategroy = category::where('cat_type', 1)->get();
        return response()->json([
            "message" => $incomeCategroy,
        ]);
    }

    public function expenceCategory()
    {
        $expenceCategroy = category::where('cat_type', 0)->get();
        return response()->json([
            "message" => $expenceCategroy,
        ]);
    }
}
