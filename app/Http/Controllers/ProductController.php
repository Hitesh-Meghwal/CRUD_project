<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    //This method will show product page
    public function index(){
        return view('Products.list');
    }

    //This method will show create product page
    public function create(){
        return view('Products.create');
    }

    //This method will store a product in db
    public function store(Request $request){
        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',   
            'image' => 'nullable|image'
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }

        //here we will insert product in db
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->hasFile('image')) {
            // Here we will store the image
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; // unique name
    
            // Save the image to the public directory
            $image->move(public_path('uploads/products'), $imageName);
    
            // Save the image name in the db
            $product->image = $imageName;
            $product->save();
        } else {
            // Assign a default image if none is provided
            $product->image = 'C:\xampp\htdocs\CRUD_project\public\uploads\products\freestocks-PkyL3p9Kx8c-unsplash.jpg';
            $product->save();
        }
        
        return redirect()->route('products.index')->with('success','Product added successfully');

    }

    //This method will show edit product page
    public function edit(){

    }

    //This method will update a product
    public function update(){

    }

    //This method will delete a product
    public function destroy(){

    }
}
