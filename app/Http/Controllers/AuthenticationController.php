<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\category;
use App\Models\staff;
use App\Mode\ledger;
use Carbon\Carbon;
use Carbon\Doctrine\CarbonDoctrineType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function index()
    {
        return view('Authentication.signup');
    }

    public function dasboard()
    {
        $user = DB::table('authentications')->where('email', session()->get('user_added'))->first();
        $activeUser = DB::table('categories')->where('status', 1)->get()->count();
        $allCategory = DB::table('categories')->get()->count();
        $allstaff = DB::table('staff')->get()->count();

        //   income Ledger
        $category = category::where('cat_type', 1)->get();
        $totalIncome = 0;
        foreach ($category as $cat) {
            $start_month = Carbon::now()->startOfMonth()->format("Y-m-d");
            $end_month = Carbon::now()->endOfMonth()->format("Y-m-d");

            $incomeLedger = DB::table('ledgers')
                ->where('category_type', $cat->id)
                ->whereBetween('date', [$start_month, $end_month])->sum('price');

            $totalIncome += $incomeLedger;
        }

        // Expence Ledegr

        $category = category::where('cat_type', 0)->get();
        $totalexpense = 0;
        foreach ($category as $cat) {
            $start_month = Carbon::now()->startOfMonth()->format("Y-m-d");
            $end_month = Carbon::now()->endOfMonth()->format("Y-m-d");

            $incomeLedger = DB::table('ledgers')
                ->where('category_type', $cat->id)
                ->whereBetween('date', [$start_month, $end_month])->sum('price');

            $totalexpense += $incomeLedger;
        }

        //  weekly expense

        $category = category::where('cat_type', 0)->get();
        $totalincomeweekly = 0;
        foreach ($category as $cat) {
            $start_month = Carbon::now()->startOfWeek()->format("Y-m-d");
            $end_month = Carbon::now()->endOfWeek()->format("Y-m-d");

            $incomeLedger = DB::table('ledgers')
                ->where('category_type', $cat->id)
                ->whereBetween('date', [$start_month, $end_month])->sum('price');

            $totalincomeweekly += $incomeLedger;
        }
        $category = category::where('cat_type', 1)->get();
        $totalexpenseweekly = 0;
        foreach ($category as $cat) {
            $start_month = Carbon::now()->startOfWeek()->format("Y-m-d");
            $end_month = Carbon::now()->endOfWeek()->format("Y-m-d");

            $incomeLedger = DB::table('ledgers')
                ->where('category_type', $cat->id)
                ->whereBetween('date', [$start_month, $end_month])->sum('price');

            $totalexpenseweekly += $incomeLedger;
        }
        return view('Authentication.dashboard', compact("user", "activeUser", "allCategory", "allstaff", "totalIncome", "totalexpense", "totalincomeweekly", "totalexpenseweekly"));
    }



    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:authentications,email',
            'password' => 'required|max:10',
        ]);
        $register =  DB::table('authentications')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->password),
        ]);

        if ($register) {
            return redirect('/');
        } else {
            echo 300;
        }
    }

    public function showlogin()
    {
        if (session()->has('user_added')) {
            return redirect('/dashboard');
        } else {
            return view('Authentication.signin');
        }
    }

    public function doLogout()
    {
        if (session()->has('user_added')) {
            session()->forget('user_added');
            return redirect('/');
        } else {
            return redirect('/');
        }
    }
    public function doLogin(Request $request)
    {
        $data = DB::table('authentications')->where('email', $request->email)->first();

        if ($data) {

            if (Hash::check($request->password, $data->password)) {

                session()->put('user_added', $data->email);
                return redirect('/dashboard');
            } else {
                echo "Credentials are matched";
            }
        } else {
            echo "Credentials are not matched";
        }
    }
}
