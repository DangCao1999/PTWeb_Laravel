<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        //
        $products = Product::all();
        //dd($products);
        return View('product.index',['products'=>$products]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       //
        return View('product.createproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $profile = new Product();
        //dd($request);
        $profile->name = $request->input('name');
        $profile->price = $request->input('price');
        $profile ->gender = $request->input('gender');
        $profile->amount = $request->input('amount');
        $profile->description = $request->input('description');
        // $profile->user_id = $request->input('userId');
        // dd($request->input('id'));
        //$validate = $request->validate(['avatar' => 'nullable|mimes:jpg, jpeg, png, xlx,xls, pdf|max::2048']);
        //print($user->name);
        //dd($request->file('avatar'));
        $filename = $request->file('avatar')->getClientOriginalName();
        //dd($filename);
        $filepath = $request->file('avatar')->storeAs('uploads/product',$filename, 'public');
        //dd($filepath);
        $profile->pictureURL = '/storage/' . $filepath;
        $profile->save();
        toast('Data Saved','success','top-right')->autoClose(2000)->showCloseButton();
        return redirect('/product');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);;
        // dd($product);
        return View('product.editproduct', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->get();
        return View('product.editproduct', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::find($id);
        
        //dd($request);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product ->gender = $request->input('gender');
        $product->amount = $request->input('amount');
        $product->description = $request->input('description');
        // $profile->user_id = $request->input('userId');
        // dd($request->input('id'));
        //$validate = $request->validate(['avatar' => 'nullable|mimes:jpg, jpeg, png, xlx,xls, pdf|max::2048']);
        //print($user->name);
        //dd($request->file('avatar'));
        if($request->file("avatar"))
        {
            $filename = $request->file('avatar')->getClientOriginalName();
            $filepath = $request->file('avatar')->storeAs('uploads/product',$filename, 'public');
            $product->pictureURL = '/storage/' . $filepath;
        }
        else
        {
            $product->pictureURL = $request->input("pictureURL");
        }
        //dd($filename);
        //dd($request->input("pictureURL"));
        //dd($filepath);
        
        $product->save();
        toast('Update Success','success','top-right')->autoClose(2000)->showCloseButton();
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        Product::destroy($id);
        toast('Delete Success','success','top-right')->autoClose(2000)->showCloseButton();
        return response()->json([
            'message' => 'Done'
          ]);
    }
}
