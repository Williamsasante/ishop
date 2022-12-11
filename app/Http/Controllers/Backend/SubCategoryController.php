<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $categories =Category::orderBy('category_name','ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('Backend.subcategory.subcategory_view',compact('subcategories','categories'));

    }

    public function SubCategoryStore(Request $request){

        $request->validate([
             'category_id' => 'required',
             'subcategory_name' => 'required',
         ],[
             'category_id.required' => 'Please select Any option',
             'subcategory_name.required' => 'Input SubCategory  Name',
         ]);
 
 
 
        SubCategory::insert([
         'category_id' => $request->category_id,
         'subcategory_name' => $request->subcategory_name,
         'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
        
 
 
         ]);
 
         $notification = array(
             'message' => 'SubCategory Inserted Successfully',
             'alert-type' => 'success'
         );
 
         return redirect()->back()->with($notification);
 
     } 

     public function SubCategoryEdit($id){
    	$categories = Category::orderBy('category_name','ASC')->get();
    	$subcategory = SubCategory::findOrFail($id);
    	return view('backend.subcategory.subcategory_edit',compact('subcategory','categories'));

     }
     public function SubCategoryEditEdit($id)
     {
        $categories = Category::orderBy('category_name','ASC')->get();
    	$subcategory = SubCategory::findOrFail($id);
    	return view('backend.subcategory.subcategory_edit_edit',compact('subcategory','categories'));
     }

     public function SubCategoryDelete($id){

    	SubCategory::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Category Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } 
    

    public function SubCategoryUpdate(Request $request, $id)
    {

        SubCategory::findorFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
        ]);
        $notification = array(
			'message' => 'SubCategory Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->route('all.subcategory')->with($notification);

    }
    



}
