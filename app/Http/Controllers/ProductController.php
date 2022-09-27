<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Validator;

class ProductController extends Controller
{
    public function showDetailCategory(Request $request, $id)
    {
        $categoryInfo = DB::table('category')->where('category.id', $id)->first();
        
        if($request->ajax()) {
            $category = Product::join('category', 'category.id', '=', 'product.category_id')
            ->select('*','category.description as category_description', 'product.description as product_description', 'product.id as product_id')
            ->where('product.category_id', $id)
            ->get();
            return Datatables::of($category)
            ->editColumn('image', function($category) {
                if($category->image != null) {
                    return asset('storage/FlowerImage/'.$category->image);
                } 
                    return asset('/images/therose.png');
            })
            ->editColumn('price', function ($category)
            {
                return number_format($category->price);
            })
            ->make(true);
        }

        return view('FlowerCategory.category-detail', compact('categoryInfo'));
    }

    public function addProduct(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'product_name' => 'string|required|max:200',
            'product_price' => 'required',
            'discount' => 'required|max:3',
            'product_description' => 'required|string',
        ]);

        
        if($validator->fails()){
            return redirect()->back()->withErrors(($validator))->withInput();
        }

        $dataProduct = new Product;
        $price = str_replace(',', '', $request->product_price);
        $dataProduct->category_id = $request->category_id;
        $dataProduct->product_name = $request->product_name;
        $dataProduct->price = $price;
        $dataProduct->discount = $request->discount;
        if($request->hasFile('product_image')){
            $filename = $request->product_image->getClientOriginalName();
            $request->product_image->storeAs('FlowerImage',$filename,'public');
            $dataProduct->image = $filename;
        }
        $dataProduct->description = $request->product_description;
        $dataProduct->save();

        return redirect()->back()->with('success', 'Thêm mới sản phẩm thành công');
    }

    public function deleteProduct($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Xóa danh mục thành công');
    }
}
