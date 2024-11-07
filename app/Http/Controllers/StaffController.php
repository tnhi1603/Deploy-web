<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\Orders;
use App\Models\Voucher;
use App\Models\Watch;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pOrders = Orders::where('status', 'Pending')->with([
            'watches' => function ($query) { return $query->select('watches.id', 'watches.name', 'watches.img1', 'watches.price', 'watches.storage'); },
            'address',
            'user'
        ])->get();
        $sOrders = Orders::where('status', 'Shipping')->with([
            'watches' => function ($query) { $query->select('watches.id', 'watches.name', 'watches.img1', 'watches.price', 'watches.storage'); } ,
            'address',
            'user',
        ])->get();
        $successOrders = Orders::where('status', 'Success')->with([
            'watches' => function ($query) { $query->select('watches.id', 'watches.name', 'watches.img1', 'watches.price', 'watches.storage'); } ,
            'address',
            'user',
        ])->get();

        $awaitVoucher = Voucher::where('status', 'await')->get();
        $activeVoucher = Orders::where('status', 'Active')->get();
        $trashProduct = Watch::onlyTrashed()->get();
        return view('staff/staff', ['pOrders' => $pOrders, 'sOrders' => $sOrders, 'successOrders' => $successOrders, 'awaitVoucher' => $awaitVoucher, 'activeVoucher' => $activeVoucher, 'trashed' => $trashProduct]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStaffRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffRequest $request, User $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $staff)
    {
        //
    }
}
