<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserReservationController extends Controller
{
     // redirecting newReservation
     function step1Page(){
        return view('user.step1');
    }
    //checkBtn
    function checkBtn(Request $req){
        $guestNumber=$req->guestNumber;
        $resDate =$req->resDate;
        $newDate = Carbon::parse($req->resDate)->format('d');
        $reservedTableIds = Reservation::select('table_id')->whereDay('res_date',$newDate)->get();
        $tableIds= array();
        foreach ($reservedTableIds as $resTableId) {
           $tableIds[] = $resTableId->table_id;
        }
        $this->checkStep1Validation($req);
        $table= Table::where('guest_number','>=',$req->guestNumber)->whereNotIn('id',$tableIds)->get();
        return view('user.step2',compact('table','guestNumber','resDate'));
    }
    // book btn
    function bookBtn(Request $req){
        $this->checkStep2Validation($req);
        //  dd($req->all());
        $data = $this->getReservationData($req);
        Reservation::create($data);
        return redirect()->route('user#reservationNewStep1')->with(['storeSuccess'=>'You have been booked. We will call you back to comfirm. Thanks for your choice!']);
    }
    // step1 validation
    private function checkStep1Validation($req){
        $validationRules = [
            'resDate'=>['required',new DateBetween , new TimeBetween],
            'guestNumber'=>'required|min:1|numeric',
        ];
        Validator::make($req->all(),$validationRules)->validate();
    }
    // step2 validation
    private function checkStep2Validation($req){
        $validationRules=[
            'name'=>'required|max:50',
            'email'=>'required',
            'phoneNumber'=>'required',
            'resDate'=>'required',
            'guestNumber'=>'required',
            'tableId'=>'required',
        ];
        Validator::make($req->all(),$validationRules)->validate();
    }
    // change data for db
    private function getReservationData($req){
        return [
            'name'=>$req->name,
            'email'=>$req->email,
            'phone'=>$req->phoneNumber,
            'res_date'=>$req->resDate,
            'guest_number'=>$req->guestNumber,'table_id'=>$req->tableId,
        ];
    }
}
