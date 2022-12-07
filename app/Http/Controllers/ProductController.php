<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $products = Product::latest('updated_at')->get();

        return view('products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ファイルを代入
        $file = $request->file('image_path');

        // 画像が入力された際の保存先を指定
        if (!empty($file)) {
            $filename = $file->getClientOriginalName();
            $file->move('./upload/', $filename);
        } else {
            $filename = "";
        }

        $product = new Product();
        $product->name = $request->input('name');
        $product->user_id = Auth::id();
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_name = $request->input('category_name');
        $product->image_path = $filename;
        $product->save();

        // 二重送信防止
        $request->session()->regenerateToken();

        return to_route('products.index');
        // return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $comments = Comment::where('product_id', $product->id)->latest()->take(3)->get();
        return view('products.show', compact('product', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // ファイルを代入
        $file = $request->file('image_path');

        // 画像が入力された際の保存先を指定
        if (!empty($file)) {
            $filename = $file->getClientOriginalName();
            $file->move('./upload/', $filename);
        } else {
            $filename = "";
        }

        $product->name = $request->input('name');
        $product->user_id = Auth::id();
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_name = $request->input('category_name');
        $product->image_path = $filename;
        $product->save();

        return to_route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Comment $comment)
    {
        $product->delete();
        return to_route('products.index');
    }
}
