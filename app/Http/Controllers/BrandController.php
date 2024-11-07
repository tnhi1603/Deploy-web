<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Exception;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function index()
    {
        //
        $brand = Brand::all();
        return $brand;
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
    public function store(StoreBrandRequest $request)
    {
        //
        try {
            Brand::create(['name' => $request->name]);
            // dd($brand);
            return back()->withInput(['message' => 'Tạo thành công']);
        } catch (Exception $e) {
            return back()->withInput(['message' => $e->getMessage()]);
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
