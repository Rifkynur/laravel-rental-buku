<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories',['categories' => $categories]);
    }

    public function add()
    {
        return view('categories-add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:categories'
        ]);
        $category = Category::create($request->all());
        return redirect('categories')->with('status','Category adding successfully');
    }

    public function edit($slug){
        $category = Category::where('slug', $slug)->first();
        return view('categories-edit',['category'=>$category]);
    }

    public function show(Category $category)
    {
        //
    }

    public function update(Request $request,$slug)
    {
        $validate = $request->validate([
            'name' => 'required|unique:categories'
        ]);
        $category = Category::where('slug',$slug)->first(); 
        $category->update($request->all());
        return redirect('categories')->with('status','category updated Successfully');
    }

    public function delete($slug){
        $category = Category::where('slug',$slug)->first();
        return view('categories-delete',['category'=>$category]);
    }
    
    public function destroy($slug)
    {
        $catgeory = Category::where('slug',$slug);
        $catgeory->delete();
        return redirect('categories')->with('status','category has been deleted');
    }

    public function deleted(){
        $categories = Category::onlyTrashed()->get();
        // dd($categories);
        return view('categories-deleted-list',['deletedCategories'=>$categories]);
    }

    public function restore($slug){
        $category = Category::withTrashed()->where('slug',$slug)->first();
        // dd($category);
        $category->restore();
        return redirect('categories')->with('status','category has been restored');
    }
}
