<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $proucts= Product::orderBy('id', 'desc')->get();
        return response()->json($proucts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**       
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'title'=>'required',
            'sales_price'=>'required|numeric',
            'cost_price'=>'required|numeric',
            'image'=> 'image|nullable',
            'product_size' => 'required',
        ]);

        $product = Product::create([
            'name'=>$request->name,
            'title'=>$request->title,
            'category_id'=>1,
            'sales_price' => $request->sales_price,
            'cost_price' => $request->cost_price,
            'product_size' => $request->product_size,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ]);

        if ($request->image) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('storage/product'), $imageName);
            $product->image = 'storage/product/' . $imageName;
            $product->save();
        };


        return response()->json('Product Create Successfully');
    }

    /** 
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if ($product) {
            return response()->json($product);
        } else {
            return redirect()->json('not found', 404);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'title'=>'required',
            'sales_price'=>'required|numeric',
            'cost_price'=>'required|numeric',
            'product_size' => 'required',
        ]);
        $product ->update([
            'name' => $request->name,
            'title' => $request->title,
            
            'sales_price' => $request->sales_price,
            'cost_price' => $request->cost_price,
            'product_size' => $request->product_size,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description
        ]);
        
        return response()->json('Product Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        
        if ($product) {
            $image_path = $product->image;

            if (File::exists($image_path)) {
                File::delete($image_path);
                //unlink($image_path);
            }

            $product->delete();
            return response()->json('Product Deleted successfully');
        }else{
            return response()->json('failed', 404);
        }
    }
}