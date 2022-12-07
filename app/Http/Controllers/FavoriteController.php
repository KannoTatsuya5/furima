<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index(User $user, Product $product) 
    {
        $users = $user::with('favorites')->get();
        $products = $product::with('users')->get();
        
        return view('favorites.index', compact('users', 'products'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        $product->users()->syncWithoutDetaching(Auth::id());
        // dd($product->user());

        return redirect()->route('products.show', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->users()->detach(Auth::id());

        return redirect()->route('products.show', $product);
    }
}
