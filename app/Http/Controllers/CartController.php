<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\InventoryModel;
use App\Models\ProductModel;
use App\Models\StoreModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function cart(){
        $stores = CartModel::where('customer_id', Auth::guard('customer')->user()->id)
        ->groupBy('store_id')
        ->select('store_id')
        ->get();

        $carts = CartModel::where('customer_id', Auth::guard('customer')->user()->id)->latest()->get();
        return view('frontend.cart',[
            'carts'=>$carts,
            'stores'=>$stores,
        ]);
    }
    function cart_store(Request $request, $id){
        $request->validate([
            'quantity'=>'required',
        ]);

        $store_id = ProductModel::find($id)->store_id;
        $customer_id = Auth::guard('customer')->user()->id;


        dd($request->size_id);
        if(CartModel::where('product_id', $id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->exists()){


            CartModel::where('product_id', $id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->increment('quantity', $request->quantity);

        }
        else{

            CartModel::create([
                'customer_id'=>$customer_id,
                'product_id'=>$id,
                'store_id'=>$store_id,
                'store_id'=>$store_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'quantity'=>$request->quantity,
            ]);

        }


        return back()->with('success', 'Product Added to Cart');
    }

    function cart_delete($id){
        CartModel::find($id)->delete();
        return back();
    }

    public function updateCartQuantity(Request $request)
{
    $cart = CartModel::find($request->cart_id);

    if ($cart) {
        $cart->quantity = $request->quantity;
        $cart->save();

        // If you need to calculate new subtotal or any other data, do it here
        $subtotal = $cart->quantity * $cart->rel_to_product->after_discount;

        return response()->json([
            'success' => true,
            'subtotal' => $subtotal,
            'message' => 'Cart quantity updated successfully.',
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Cart item not found.',
    ]);
}

public function deleteCartItem(Request $request)
{
    $cart = CartModel::find($request->cart_id);

    if ($cart) {
        $cart->delete();
        return response()->json([
            'success' => true,
            'message' => 'Cart item deleted successfully.',
        ]);
    }

    return response()->json([
        'success' => false,
        'message' => 'Cart item not found.',
    ]);
}


function getSize(Request $request) {
    $sizes = InventoryModel::where('product_id', $request->product_id)
                            ->where('color_id', $request->color_id)
                            ->get();
    $str = '';
    foreach($sizes as $size) {
        if($size->rel_to_size->size == 'NA') {
            $str .= '<li>
                        <div class="size">
                            <input class="opacity-0 size_id" type="radio" name="size_id" checked value="'.$size->rel_to_size->id.'"/>
                            <label class="form-label"><a>'.$size->rel_to_size->size.'</a></label>
                        </div>
                     </li>';
        } else {
            $str .= '<li>
                        <div class="size">
                            <button type="button" class="btn_choose_sent">
                                <a class="">
                                    <input class="opacity-0 size_id" type="radio" name="size_id" required value="'.$size->rel_to_size->id.'"/>'.$size->rel_to_size->size.'
                                </a>
                            </button>
                        </div>
                     </li>';
        }
    }
    echo $str;
}



}
