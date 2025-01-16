<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class ProductTypeConroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProductType::all();
        return response([
            "message" => "product type list",
            "data" => $data
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required|unique:product_types,type_name',
        ],[
            'type_name.required' => 'please enter product type name',
            'type_name.unique ' => 'product type name already exists',
        ]);
        
        ProductType::Create([
            'type_name' => $request->type_name,
        ]);    
        
        return response(["massage" => 'product type created succcesfully'],201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ProductType::find($id);

        if (is_null($data)){
        $data = ProductType::find($id);
        return response([
            "message" => "product type not found",
            "data" => [],
        ],404);
        }

        return response([
            "message" => "product type detail",
            "data" => $data
        ]);
    
    
    }   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'type_name' => 'required|unique:product_types_name',]);

            $data = ProductType::find($id);

            if (is_null($data)){
                return response([
                    "message" => "product type not found",
                    "data" => [],
                ],404);
                }

            $data->type_name = $request->type_name;
            $data->save();    

            return response(["message" => "product type succsesfully"],200);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ProductType::find($id);

        if (is_null($data)){
            return response([
                "message" => "product type not found",
                "data" => [],
            ],404);
            }

            $data->delete();
    
            return response([
                "message" => "product is delated success fully",
                "data" => $data,
            ]);
    }
}
