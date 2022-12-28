<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class TableController extends Controller
{
    //redirecting index page
    function indexPage(){
        $table = Table::get();
        return view('admin.table.index',compact('table'));
    }
    // redirecing new table page
    function newTable(){
        return view('admin.table.newTable');
    }
    // store btn
    function store(Request $req){
        $this->tableCheckValidation($req);
        $data = $this->getTableData($req);
        Table::create($data);
        return redirect()->route('admin#table')->with(['storeSuccess'=>'Successfully Stored']);
    }
    // redirect edit blade
    function edit($id){
        $table= Table::where('id',$id)->first();
        return view('admin.table.edit',compact('table'));
    }
    // update btn
    function update(Request $req,$id){
        $this->tableCheckValidation($req);
        $data = $this->getTableData($req);
        Table::where('id',$id)->update($data);
        return redirect()->route('admin#table')->with(['updateSuccess'=>'Successfully Updated']);
    }
    // delete btn
    function delete($id){
        Table::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Successfully Deleted']);
    }
      // validation check
      private function tableCheckValidation($req,){
        $validationRules=[
            'name'=>'required|max:50',
            'guestNumber'=>'required',
        ];
        Validator::make($req->all(),$validationRules)->validate();
    }
     // change data for db
     private function getTableData($req){
        return [
            'name'=>$req->name,
            'guest_number'=>$req->guestNumber,
        ];
    }

}
