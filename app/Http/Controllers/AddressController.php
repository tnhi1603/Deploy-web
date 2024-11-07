<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\default_address;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use Exception;
use Illuminate\Http\Request;

class AddressController extends Controller
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
    public function store(Request $request)
    {
        //
        $province = Province::find($request->province)->name;
        
        $district = District::find($request->district)->name;

        $ward = Ward::find($request->ward)->name;
        $user = auth()->user()->id;
        try {
            $address = Address::create([
                'province' => $province,
                'district' => $district,
                'ward' => $ward,
                'user_id' => $user,
                'phone_number' => $request->phone,
                'address' => $request->address
                
            ]);

            if (count(Address::where('user_id', $user)->get()) == 1) {
                default_address::create([
                    'user_id' => $user,
                    'address_id' => $address->id,
                ]);
            }
    
            return back()->with('message', 'Cập nhật địa chỉ thành công');
        }
        catch (Exception $e) {
            return $e->getMessage();
            return back()->with('message: ', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $address = Address::find($id);

            $address->update([
                'province' => $request->has('province') ? $request->get('province') : $address->province,
                'district' => $request->has('district') ? $request->get('district') : $address->district,
                'ward' => $request->has('ward') ? $request->get('ward') : $address->ward,
                'phone_number' => $request->has('phone_number') ? $request->get('phone_number') : $address->phone_number,
                'address' => $request->has('address') ? $request->get('address') : $address->address,
            ]);
            return back()->withInput(['message' => 'Cập nhật thành công']);
        }
        catch (\Exception $e) { 
            return $e;
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            Address::find($id)->delete();
            return back()->with(['message' => "Thành công"]);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function get_provinces() {
        return Province::all();
    }

    public function get_districts(Request $request) {
        return District::where('province_id', $request->province_id)->get();
    }

    public function get_wards(Request $request) { 
        return Ward::where('district_id', $request->district_id)->get();
    }
}
