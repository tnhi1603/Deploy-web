<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalShipRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Ramsey\Uuid\Exception\NameException;

class ShipController extends Controller
{
    //
    public function CalShipFee(CalShipRequest $request) {
        $address = Address::find($request->address_id);
        $provinceId = $this->getProvince($address->province) ;
        $districtId = $this->getDistrict($address->district, $provinceId);
        $wardId = $this->getWard($address->ward, $districtId);
        [$serviceId, $serviceTypeId] = $this->getService($districtId);
        $endpoint = 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee';
        
        $data = [
            'from_district_id' => 3695,
            'from_ward_code' => '90737',
            'service_id' => (int)$serviceId,
            'service_type_id' => (int)$serviceTypeId, 
            'to_district_id' => (int)$districtId,
            'to_ward_code' => (string)$wardId,
            'height' => 18,
            'length' => 15,
            'width' => 12,
            'weight' => 200,
            'cod_value' => 0
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Token' => env('Token'),
            'ShopId' => (int)env('shopID'),
            'Content-Type' => 'text/plain'
        ])->get($endpoint, $data);

        return $response['data']['total'];
    }

    public function CalShip($address_id) {
        $address = Address::find($address_id);
        $provinceId = $this->getProvince($address->province) ;
        $districtId = $this->getDistrict($address->district, $provinceId);
        $wardId = $this->getWard($address->ward, $districtId);
        [$serviceId, $serviceTypeId] = $this->getService($districtId);
        $endpoint = 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee';
        
        $data = [
            'from_district_id' => 3695,
            'from_ward_code' => '90737',
            'service_id' => (int)$serviceId,
            'service_type_id' => (int)$serviceTypeId, 
            'to_district_id' => (int)$districtId,
            'to_ward_code' => (string)$wardId,
            'height' => 18,
            'length' => 15,
            'width' => 12,
            'weight' => 200,
            'cod_value' => 0
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Token' => env('Token'),
            'ShopId' => (int)env('shopID'),
            'Content-Type' => 'text/plain'
        ])->get($endpoint, $data);

        return $response['data']['total'];
    }

    private function getProvince($province) {
        $endpoint = 'https://online-gateway.ghn.vn/shiip/public-api/master-data/province';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Token' => env('Token'),
        ])->post($endpoint);

        $result = $response->body();

        $jsonResult = json_decode($result, true);
        // return $jsonResult['data'][0]['NameExtension'];

        foreach ($jsonResult['data'] as $value) {

            foreach ($value['NameExtension'] as $name) {
                if ($province == $name) { 
                    return $value['ProvinceID'];
                }
            }
        }
    }

    private function getDistrict($district, $provinceId) {
        $endpoint = 'https://online-gateway.ghn.vn/shiip/public-api/master-data/district';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Token' => env('Token'),
        ])->post($endpoint, ['province_id' => (int)$provinceId]);

        $result = $response->body();

        $jsonResult = json_decode($result, true);
        // return $jsonResult['data'][0]['NameExtension'];

        foreach ($jsonResult['data'] as $value) {

            foreach ($value['NameExtension'] as $name) {
                if ($district == $name) { 
                    return $value['DistrictID'];
                }
            }
        }
    }

    private function getWard($ward, $districtId) {
        $endpoint = 'https://online-gateway.ghn.vn/shiip/public-api/master-data/ward';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Token' => env('Token'),
        ])->post($endpoint, ['district_id' => (int)$districtId]);

        $result = $response->body();

        $jsonResult = json_decode($result, true);
        // return $jsonResult['data'][0]['NameExtension'];
        // dd($jsonResult);
        foreach ($jsonResult['data'] as $value) {
            if ($ward == $value['WardName']) { 
                return $value['WardCode'];
            }         
        }
    }

    private function getService($districtId) {
        $endpoint = 'https://online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/available-services';
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Token' => env('Token'),
        ])->post($endpoint, ['from_district' => 3695, 'shop_id' => (int)env('shopID'), 'to_district' => $districtId]);

        $result = $response->body();

        $jsonResult = json_decode($result, true);
            // dd($jsonResult);
        // return $jsonResult['data'][0]['NameExtension'];
        return [$jsonResult['data'][0]['service_id'],$jsonResult['data'][0]['service_type_id']];
    }
}
