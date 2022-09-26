<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Auth;
use Validator;
use Yajra\Datatables\Datatables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getListCategory(Request $request)
    {
        if($request->ajax()) {
            $category =Category::all();
            return Datatables::of($category)
            ->make(true);
        }

        return view('FlowerCategory.category-list');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|max:200',
            'description' => 'required|string',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors(($validator))->withInput();
        }
        
        Category::create([
            'name' => $request->category_name,
            'description' => $request->description,
        ]);

        return redirect('/admin/category/list')->with('success', 'Thêm mới danh mục thành công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCategory($id)
    {
        $category = Category::find($id);

	    return response()->json([
	      'data' => $category
	    ]);
    }

    public function editCategory(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'description' => 'required|string',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors(($validator))->withInput();
        }

        Category::where('id', '=', $id)->update(
            [
                'name' => $request->name,
                'description' => $request->description,
            ],
        );

        return response()->json([ 'success' => true ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory(Request $request, $id)
    {
        $category = Category::where('id', $id)->delete();
        return redirect('/admin/category/list')->with('success', 'Xóa danh mục thành công');
    }
}