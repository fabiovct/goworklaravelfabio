<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class ProductsController extends Controller
{
    public function index() {
        return response()->json([
        ]);
    }

    public function createProduct( Request $request) {

        //Required
        //$request->validate([
            //'name' => 'required',
            //'startsAt' => 'required',
            //'endsAt' => 'required'
        //]);


    try{
        $user = new Product();
            $user->name = $request->name;
            $user->preco = $request->preco;

        $user->save();
        //echo($user->name);

        return response()->json($user);

    } catch (QueryException $e) {
        return response()->json([
            "error" => $e
        ]);
    }
}

public function listProducts(){
    $products = Product::get();

    return response()->json($products);
}

public function deleteProduct($productId){
    try {

        Product::destroy($productId);
        return response('elemento deletado com sucesso');
    } catch (QueryException $e) {

        return response()->json([
            "error" => $e,
        ]);
    }
}

public function updateProduct(Request $request, $productId) {
    try {

        $product = Product::find($productId);
        $product->name = $request->name;
        $product->preco = $request->preco;
        $product->save();
        return response()->json($product);

    } catch (QueryException $e) {
        return response()->json([
            "error" => $e,
        ]);
    }
}

public function selectProductById(Request $request){
    $products = Product::where('id', '=', $request['productId']);
    return $products->get();
}

}
