<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductSlider;
use App\Helper\ResponseHelper;
use App\Models\ProductDetails;
use Illuminate\Http\JsonResponse;
use Whoops\Handler\JsonResponseHandler;

class ProductController extends Controller
{
    public function WishList()
    {
        return view('pages.wish-list-page');
    }


    public function CartListPage()
    {
        return view('pages.cart-list-page');
    }


    public function Details()
    {
        return view('pages.details-page');
    }


    public function ListProductByCategory(Request $request):JsonResponse{
        $data=Product::where('category_id',$request->id)->with('brand','category')->get();
        return  ResponseHelper::Out('success',$data,200);
    }

    public function ListProductByBrand(Request $request):JsonResponse{
        $data=Product::where('brand_id',$request->id)->with('brand','category')->get();
        return ResponseHelper::Out('success',$data,200);
    }

    public function ListProductByRemark(Request $request):JsonResponse{
        $data=Product::where('remark',$request->remark)->with('brand','category')->get();
        return ResponseHelper::Out('success',$data,200);
    }

    public function ListProductSlider():JsonResponse{
        $data=ProductSlider::all();
        return ResponseHelper::Out('success',$data,200);
    }

    public function ProductDetailsById(Request $request):JsonResponse{

        $data=ProductDetails::where('product_id',$request->id)->with('product','product.brand','product.category')->get();

        return ResponseHelper::Out('success',$data,200);
    }






    /////
}
