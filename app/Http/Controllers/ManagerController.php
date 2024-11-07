<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaffRequest;
use App\Models\Orders;
use App\Models\User;
use App\Models\Watch;
use Exception;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index() 
    {
        $watch = Watch::orderBy('created_at', 'DESC')->take(10)->get();
        $orders = Orders::whereYear('created_at', date('Y'))
        ->whereMonth('created_at', (int)date('M') )
        ->with(['user' => function ($query) {
            return $query->select('name', 'email', 'score');
        }, 'watches' => function () {}, 
        'voucher' => function () {}, 
        'payment' => function () {}])->get();

        return view('manager', ['order' => $orders, 'watches' => $watch]);
    }

    public function getRevenue($request) {
        try {
            return Orders::whereDate('created_at', '>=', $request->start_date)
            ->whereDate('created_at', '<=', $request->end_date)->sum('total_prices');
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }

    public function allStaff() 
    {
        return User::where('role', 'staff')->paginate(10);
    }

    public function searchStaff(Request $request)
    {
        return User::where('role', 'staff')->search($request->q)->paginate(10);
    }

    public function createStaff(Request $request) 
    {
        try {
           $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'staff'
            ]);

            return back()->withInput(['message' => 'Staff created successfully']);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function chart() {
        $month1 = Orders::whereMonth('created_at', date('m'))->where('status', 'Success')->sum('total_prices');
        $month2 = Orders::whereMonth('created_at', date('m', strtotime('-1 month')))->where('status', 'Success')->sum('total_prices');
        $month3 = Orders::whereMonth('created_at', date('m', strtotime('-2 month')))->where('status', 'Success')->sum('total_prices');
        return ['month1' => $month1, 'month2' => $month2, 'month3' => $month3];
    }

    public function getAllWatch() {
        // dd(1);
        $count = Watch::count();
        $skip = 10;
        $limit = $count - $skip;
        return Watch::with(['brand', 'category'])->skip(10)->take($limit)->get();
    }
}
