<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 

class CategoryController extends Controller
{
    public function create(){
          $categories = Category::paginate(3);
         return view('category', compact('categories'));
    }

    public function category(Request $request){

        $request->validate([
            'name'=>'required',
            'description'=>'required'
        ]);
        $category = Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
        ]);

        return back()->with('success','category added successfully!');
    }

    public function editCategory($id){
        $category = Category::find($id);
        return view('editCategory',['data'=>$category]);
    }

    public function updateCategory(Request $request,$id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        if($category->save()){
            return redirect('/category')->with('success','Category Updated Successfully!');
        }else{
            return "Somthing wrong!";
        }
    }

    public function deleteCategory($id){
        $isDeleted = Category::destroy($id);
        if($isDeleted){
             return redirect('/category')->with('success', 'Task deleted successfully!');
        }
    }

   public function search(Request $request)
    {
         $search = trim($request->search);
        $categories = Category::where('name', 'LIKE', "%{$search}%")->get();
        return view('category', [
            'categories' => $categories, 
            'search' => $search
        ]);
    }
}
