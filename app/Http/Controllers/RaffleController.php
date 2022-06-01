<?php

namespace App\Http\Controllers;
use App\Models\Raffle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RaffleController extends Controller
{
    public function index()
    {
        return response([
            "status" => true,
            "message" => "Success",
            "data" => Raffle::all()
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'product_name' => 'required',
            'product_sku' => 'required',
            'product_price' => 'required',
            'product_brand' => 'required',
            'product_category' => 'required',
            'product_option' => 'required',
            'product_size' => 'required',
            'product_color' => 'required',
            'raffle_name' => 'required',
            'raffle_start_date' => 'required',
            'raffle_end_date' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response([
                "status" => false,
                "message" => $validator->errors()->first(),
                "data" => []
            ]);
        }
        $newRaffle = Raffle::create($request->all());
        if($newRaffle){
            return response([
                "status" => true,
                "message" => "Success",
                "data" => $newRaffle
            ]);
        }else{
            return response([
                "status" => false,
                "message" => "Something went wrongs.",
                "data" => []
            ]);
        }

    }
}
