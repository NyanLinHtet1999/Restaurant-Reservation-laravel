<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    //redirect index page
    function indexPage(){
        $menu = Menu::get();
        return view('admin.menu.index',compact('menu'));
    }
    // redirecting newmenu page
    function newMenu(){
        $category = Category::get();
        return view('admin.menu.newMenu',compact('category'));
    }
    // store btn
    function store(Request $req){
        $this->checkMenuValidation($req,"create");
        $data= $this->getMenuData($req);
        $fileName=uniqid().$req->file('image')->getClientOriginalName();
        $req->file('image')->storeAs('public',$fileName);
        $data['image']=$fileName;
        Menu::create($data);
        return redirect()->route('admin#menu')->with(['storeSuccess'=>'Successfully Stored']);
    }
    // redirecting edit blade
    function edit($id){
        $menu = Menu::where('id',$id)->first();
        $category = Category::get();
        return view('admin.menu.edit',compact('menu','category'));
    }
    // update btn
    function update(Request $req,$id){
        $this->checkMenuValidation($req,'update');
        $data = $this->getMenuData($req);
        if($req->hasfile('image')){
            $oldImageName = Menu::select('image')->where('id',$id)->first()->toArray();
            $oldImageName = $oldImageName['image'];
            Storage::delete('public/'.$oldImageName);
            $fileName = uniqid().$req->file('image')->getClientOriginalName();
            $req->file('image')->storeAs('public',$fileName);
            $data['image']=$fileName;
        }
        Menu::where('id',$id)->update($data);
        return redirect()->route('admin#menu')->with(['updateSuccess'=>'Successfully Updated']);
    }
    // delete for menu
    function delete($id){
        $oldImageName = Menu::select('image')->where('id',$id)->first()->toArray();
        $oldImageName = $oldImageName['image'];
        Storage::delete('public/'.$oldImageName);
        Menu::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Successfully Deleted']);
    }
    // validation for menu
    private function checkMenuValidation($req,$action){
        $validationRules = [
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'categoryId' => 'required'
        ];
        $validationRules['image']= $action == 'update' ? 'mimes:jpg,jpeg,png,webp' : 'required|mimes:jpg,jpeg,png,webp';
        Validator::make($req->all(),$validationRules)->validate();
    }
    // Changing menu data
    private function getMenuData($req){
        return [
            'name'=>$req->name,
            'price'=>$req->price,
            'description'=>$req->description,
            'category_id'=>$req->categoryId,
        ];
    }
}
