<?php

namespace App\Http\Controllers;

use App\Models\default_address;
use App\Http\Requests\Storedefault_addressRequest;
use App\Http\Requests\Updatedefault_addressRequest;
use Exception;

class DefaultAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Storedefault_addressRequest $request)
    {
        //
        try {
            default_address::updateOrCreate(
                ['user_id' => auth()->user()->id],
                ['address_id' => $request->address_id,
            ]);
            return back()->input('message: ', "Thành công");
        } catch (Exception $e) {
            return back()->input('message: ', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(default_address $default_address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(default_address $default_address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatedefault_addressRequest $request)
    {
        //
        default_address::where("user_id", auth()->user()->id)->update([
            'address_id' => $request->address_id,
        ]);

        return back()->input('message: ', "thành công");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(default_address $default_address)
    {
        //
    }
}
