<?php

namespace App\Http\Controllers;

use App\Models\AppUser;
use App\Models\cost_categories;

use App\Models\Cost;
use Illuminate\Support\Facades\Session;


class BillCostApp extends Controller
{
    //

    public function index()
    {
        return view('auth.auth');
    }

    public function regUser()
    {
        $validatedData = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = AppUser::create([
            'UserName' => request('UserName'),
            'Email' => request('UserEmail'),
            'Password' => request('UserPassword'),
        ]);
        return redirect()->back()->with('message', 'Registration Complete Successfully, Now Please Login.');
    }

    public function loginUser()
    {
        $user = AppUser::where('Email', '=', request()->UserEmail)->First();

        if ($user) {

            if (request()->UserPassword === $user->password) {
                Session::put('userid', $user->id);
                return redirect('home');
            }

        } else {
            return "email and password are not matched";
        }
    }

    public function home()
    {
        date_default_timezone_set('Asia/Shanghai');
        $userId = Session::get('userid');

        if ($userId) {
            $user = AppUser::find($userId);
            if ($user) {
                $user->toArray();

                // ShowingCategories
                $cost_categories = cost_categories::where('user_id', '0')->orWhere('user_id', $userId)->get();
                $cost_categories->toArray();
                //Showing date and Cost
                $date = str(date("Y-m-d"));
                $matchingDate_Cost = Cost::where('user_id', $userId)->where('cost_expense_date', $date)->sum('total_cost');

                $matchingDate_CostView = Cost::where('user_id', $userId)->where('cost_expense_date', $date)->with('cost_categories')->get();


                return view('home')->with('user', $user)->with('cost_categories', $cost_categories)->with('t_cost', $matchingDate_Cost)
                    ->with('matchingDate_CostView', $matchingDate_CostView);

            } else {
                dd('User not found');
            }
        } else {
            dd('User ID not found in session');
        }

    }

    public function addCost()
    {
        $userId = Session::get('userid');
        $cost = Cost::create([
            'user_id' => $userId,
            'cost_categories_id' => request('cost_categories_id'),
            'cost_expense_date' => request('cost_expense_date'),
            'total_cost' => request('total_cost'),
        ]);

        return redirect('home');
    }


    public function deleteCost($id)
    {
        $task = Cost::find($id);

        if ($task) {
            $task->delete();
            return redirect('home')->with('Cost_deleted_success', 'Cost deleted successfully.');
        } else {
            return redirect('home')->with('error', 'Cost not found.');
        }

    }



}