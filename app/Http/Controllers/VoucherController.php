<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use App\Http\Requests\StoreVoucherRequest;
use App\Http\Requests\UpdateVoucherRequest;
use App\Models\Product_voucher;
use Exception;
use Illuminate\Http\Request;

class VoucherController extends Controller
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
        return view('voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVoucherRequest $request)
    {
        //
        try {
            $voucher = Voucher::create([
                'code' => $request->get('code'),
                'discount' => $request->get('discount'),
                'type' => $request->get('type'),
                'quantity' => $request->get('quantity'),
                'rule' => $request->get('rule'),
                'minimum' => $request->get('minimum'),
                'start_date' => $request->get('start_date'),
                'end_date' => $request->get('end_date'),
            ]);
            
            // $this->store_pv($request->get('watch_id'), $voucher->id);

            return back()->withInput(['message' => 'Tạo voucher thành công']);
            // return $voucher;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // Tạm hoãn đoạn dưới đổi phương án khác
    // Lưu product_voucher
    // public function store_pv($watch_ids, $voucher_id) {
    //     try {
    //         foreach ($watch_ids as $watch_id) {
    //             Product_voucher::create(['watch_id' => $watch_id, 'voucher_id' => $voucher_id]);
    //         }
    //     }
    //     catch (\Exception $e) { 
    //         return $e->getMessage();
    //     }  
    // }

    public function checkStatus($code){
        $voucher = Voucher::where('code', $code)->first();
        if (is_null($voucher)) {
            return null;
        }
        return $voucher->status;
    }

    public function getVoucher($code) {
        $voucher = Voucher::where('code', $code)->first();
        if (is_null($voucher)) {
            return null;
        }
        return $voucher;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voucher $voucher)
    {
        //
        try {
            $voucher->delete();
            return back()->withInput(['message' => 'Xóa thành công']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
       
    }
}
