<?php

namespace App\Http\Controllers;

use App\Models\BannerModel;
use App\Models\CategoryModel;
use App\Models\GalleryModel;
use App\Models\InventoryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $banners = BannerModel::where('status', '1')->get();
        $categories = CategoryModel::where('status', '1')->with(['products' => function ($query) {
            $query->latest()->take(15);
        }])->get();
        $products = ProductModel::all();
        return view('frontend.index', [
            'categories'=>$categories,
            'products'=>$products,
            'banners'=>$banners,
        ]);
    }

    public function category($slug){

        if(CategoryModel::where('slug', $slug)->exists()){
            $category = CategoryModel::where('slug', $slug)->first();
            $products = ProductModel::where('category_id', $category->id)->paginate(15);
            return view('frontend.category', [
                'category'=>$category,
                'products'=>$products,
            ]);
        }
        else{
            return abort(404);
        }

    }

    public function product($slug){
        if(ProductModel::where('slug', $slug)->exists()){
            $product = ProductModel::where('slug', $slug)->first();
            $colors = InventoryModel::where('product_id', $product->id)
            ->groupBy('color_id')
            ->selectRaw('sum(color_id) as sum, color_id')
            ->get();
            $sizes = InventoryModel::where('product_id', $product->id)
            ->groupBy('size_id')
            ->selectRaw('sum(size_id) as sum, size_id')
            ->get();
            $galleries = GalleryModel::where('product_id', $product->id)->get();
            $store_products = ProductModel::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();

            return view('frontend.product', [
                'product'=>$product,
                'colors'=>$colors,
                'sizes'=>$sizes,
                'galleries'=>$galleries,
                'store_products'=>$store_products,
        ]);
        }
        else{
            return abort(404);
        }

    }
}
