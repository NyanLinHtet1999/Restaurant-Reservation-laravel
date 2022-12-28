<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //redirect home page
    function indexPage(){
        $category=Category::get();
        return view('admin.category.index',compact('category'));
    }
    // redirecting new category page
    function newCategory(){
        return view('admin.category.newCategory');
    }
    // store btn
    function store(Request $req){
        $this->categoryCheckValidation($req);
        $data=$this->getCategoryData($req);
        Category::create($data);
        return redirect()->route('admin#category')->with(['storeSuccess'=>'Successfully Stored']);
    }
    // update btn
    function update(Request $req,$id){
        $this->categoryCheckValidation($req);
        $data = $this->getCategoryData($req);
        Category::where('id',$id)->update($data);
        return redirect()->route('admin#category')->with(['updateSuccess'=>'Successfully Updated']);
    }
    // redirecting edit page
    function edit($id){
        $category = Category::where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
    }
    // delete
    function delete($id){
        $oldImageName = Category::select('image')->where('id',$id)->first()->toArray();
        $oldImageName = $oldImageName['image'];
        Storage::delete('public/'.$oldImageName);
        Category::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Successfully Deleted']);
    }
    // validation check
    private function categoryCheckValidation($req){
        $validationRules=[
            'name'=>'required|max:50',
        ];
        Validator::make($req->all(),$validationRules)->validate();
    }
    // change data for db
    private function getCategoryData($req){
        return [
            'name'=>$req->name,
        ];
    }

}
