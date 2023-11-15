<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = DB::table('authentications')->where('email', session()->get('user_added'))->first();
        $categories = DB::table('categories')->orderBy('id', 'DESC')->get();
        return view('Categroy.view', compact('categories', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Categroy.view');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'cat_name' => 'required',
            // 'cat_description' => 'required',
        ]);

        $input = $request->all();
        if ($request->cat_type != "") {
            $input['cat_type'] = 1;
        } else {
            $input['cat_type'] = 0;
        }
        $data = category::where("cat_name", $input['cat_name'])->where('cat_type', $input['cat_type'])->count();
        $input['status'] = 1;
        if ($data == 0) {
            $input['cat_name'] = strtolower($request->cat_name);
            category::insert($input);
            return response()->json([
                "message" => 200,
            ]);
        } else {
            return "Data already inserted";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $editData = DB::table('categories')->find($id);
        return response()->json([
            'data' => $editData,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        if ($request->category_type != "") {
            $category_type = 1;
        } else {
            $category_type = 0;
        }
        $data =  category::where('id', $category->id)->update([
            'cat_name' => $request->input('category_name'),
            'cat_type' => $category_type,
            'cat_description' => $request->input('category_description'),
        ]);
        // echo $data;
        return response()->json([
            'message' => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        category::find($id)->delete();
        return response()->json([
            "message" => 200,
        ]);
    }

    public function Statuschange($id)
    {
        $status = DB::table('categories')->where('id', $id)->first();
        if ($status->status == 1) {
            DB::table('categories')->where('id', $status->id)->update([
                "status" => 0,
            ]);
        } else {
            DB::table('categories')->where('id', $status->id)->update([
                "status" => 1,
            ]);
        }
        return response()->json([
            "message" => $status,
        ]);
    }
}
