<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    //redirecting indexpage
    function indexPage(){
        $reservation=Reservation::select('reservations.*','tables.name as table_name','tables.guest_number as table_guest_number')
        ->leftJoin('tables','reservations.table_id','tables.id')
        ->orderBy('res_date','asc')
        ->get();
        return view('admin.reservation.index',compact('reservation'));
    }
    // reditecting new reservation page
    function newReservation(){
        $table= Table::get();
        return view('admin.reservation.newReservation',compact('table'));
    }
    // store btn
    function store(Request $req){
        $this->reservationCheckValidation($req);
        $table= Table::findOrFail($req->tableId);
        if($table->guest_number < $req->guestNumber){
            return back()->with(['errorTable'=>'Please choose the number of guests based on table']);
        };
        $reservations = Reservation::get();
        foreach ($reservations as $res) {
            $resDate = Carbon::parse($res->res_date)->format('d/m/Y');
            $newDate = Carbon::parse($req->resDate)->format('d/m/Y');
            if($resDate == $newDate && $res->table_id == $req->tableId){
                return back()->with(['tableNotFree'=>'This table has been booked on this day.']);
            };
        };
        $data = $this->getReservationData($req);
        Reservation::create($data);
        return redirect()->route('admin#reservation')->with(['storeSuccess'=>'Successfully Stored']);
    }
     // redirecting edit blade
     function edit($id){
        $table= Table::get();
        $reservation = Reservation::where('id',$id)->first();
        return view('admin.reservation.edit',compact('table','reservation'));
    }
       // update btn
       function update(Request $req,$id){
        $this->reservationCheckValidation($req);
        $table= Table::findOrFail($req->tableId);
        if($table->guest_number < $req->guestNumber){
            return back()->with(['errorTable'=>'Please choose the number of guests based on table']);
        };
        $reservations = Reservation::get();
        foreach ($reservations as $res) {
            $resDate = Carbon::parse($res->res_date)->format('d/m/Y');
            $newDate = Carbon::parse($req->resDate)->format('d/m/Y');
            if($resDate == $newDate && $res->table_id == $req->tableId && $res->id != $req->id){
                return back()->with(['tableNotFree'=>'This table has been booked on this day.']);
            };
        };
        $data = $this->getReservationData($req);
        Reservation::where('id',$id)->update($data);
        return redirect()->route('admin#reservation')->with(['updateSuccess'=>'Successfully Updated']);
    }
     // delete btn
     function delete($id){
        Reservation::where('id',$id)->delete();
        return back()->with(['deleteSuccess'=>'Successfully Deleted']);
    }
     // validation check
     private function reservationCheckValidation($req){
        $validationRules=[
            'name'=>'required|max:50',
            'email'=>'required',
            'phoneNumber'=>'required',
            'resDate'=>['required',new DateBetween , new TimeBetween],
            'guestNumber'=>'required|min:1|numeric',
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
