<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
use App\Models\Users;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function addProductsPage($id)
    {
        $user = Users::findOrFail($id);
        $userID = $user->UserID;
        $products = Product::where('UserID', $userID)->get();
        return view('addProductsPage', ['user' => $user, 'products' => $products]);
    }
    public function welcomePage($id)
    {
        $user = Users::findOrFail($id);
        $userId = $user->UserID;
        $products = Product::all();
        return view('/welcome', ['id' => $userId, 'user' => $user, 'products' => $products]);
    }
    public function storeProduct(Request $request, $id)
    {
        $request->validate([
            'ProductName' => 'required|string',
            'ProductDesc' => 'required|min:15',
            'ProductStock' => 'required|numeric|gt:5',
            'ProductPrice' => 'required|numeric|gt:1000',
            'ProductImage' => 'required|mimes:png,jpg',
        ]);

        $productImg = $request->file('ProductImage');
        $filename = $productImg->store('public/');
        Product::create([
            'ProductName' => $request->ProductName,
            'ProductDescription' => $request->ProductDesc,
            'ProductStock' => $request->ProductStock,
            'ProductPrice' => $request->ProductPrice,
            'ProductImage' => $filename,
            'UserID' => $id
        ]);
        $user = Users::findOrFail($id);
        $userId = $user->UserID;
        $products = Product::all();
        return redirect()->route('welcome', ['id' => $userId, 'user' => $user, 'products' => $products]);
    }
    public function updateProductView($id)
    {
        $product = Product::find($id);
        return view('updateProductsPage', ['product' => $product]);
    }
    public function updateProduct(Request $request, $userid, $productid)
    {
        $user = Users::findOrFail($userid);
        $userId = $user->UserID;
        $products = Product::all();
        Product::findOrFail($productid)->update([
            'ProductName' => $request->ProductName,
            'ProductDescription' => $request->ProductDesc,
            'ProductStock' => $request->ProductStock,
            'ProductPrice' => $request->ProductPrice
        ]);
        return redirect()->route('welcome', ['id' => $userId, 'user' => $user, 'products' => $products]);
    }
    public function deleteProduct($userId, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        $products = Product::all();
        $user = Users::findOrFail($userId);
        $userid = $user->UserID;
        return redirect()->route('addProductsPage', ['id' => $userid, 'user' => $user, 'products' => $products]);
    }
}
