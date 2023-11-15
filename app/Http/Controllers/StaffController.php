<?php

namespace App\Http\Controllers;

use App\Models\staff;
use App\Http\Requests\StorestaffRequest;
use App\Http\Requests\UpdatestaffRequest;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewData = DB::table('staff')->orderBy('id', 'DESC')->get();
        $user = DB::table('authentications')->where('email', session()->get('user_added'))->first();
        return view('Staff.viewStaff', compact('viewData', "user"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('Staff.viewStaff');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorestaffRequest $request)
    {
        $request->validate([
            'emp_name' => 'required',
            'emp_email' => 'required|email|unique:staff',
            'emp_no' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
        ]);

        $input = $request->all();
        staff::insert($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(staff $staff)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(staff $staff)
    {
        $editData = staff::where('id', $staff->id)->first();
        return response()->json([
            'message' => $editData,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestaffRequest $request, staff $staff)
    {
        staff::where('id', $staff->id)->update([
            'emp_name' => $request->input('employe_name'),
            'emp_no' => $request->input('employe_no'),
            'emp_email' => $request->input('employe_email'),
            'emp_address' => $request->input('employe_address'),
            'emp_city' => $request->input('employe_city'),
            'emp_state' => $request->input('employe_state'),
            'emp_department' => $request->input('employe_department'),
            'emp_join_date' => $request->input('employe_join_date'),
            'emp_contract_period' => $request->input('employe_contract_period'),
            'emp_sallery' => $request->input('employe_sallery'),
        ]);
        return response()->json([
            'message' => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(staff $staff)
    {
        staff::where('id', $staff->id)->delete();
        return response()->json([
            'message' => 200,
        ]);
    }
    public function showdetail($id)
    {
        $viewData = staff::where('id', $id)->first();
        return response()->json([
            "message" => $viewData,
        ]);
    }
}
