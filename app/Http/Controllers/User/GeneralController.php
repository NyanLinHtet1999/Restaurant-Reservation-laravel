<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Table;
use App\Models\Category;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GeneralController extends Controller
{
    //redirecting home page
    function homePage(){
        return view('user.home');
    }
    // redirecting menu page
    function menuPage(){
        $category = Category::get();
        $menu = Menu::get();
        return view('user.menu',compact('category','menu'));
    }
    // category filter in menu
    function categoryFilter($id){
        $category = Category::get();
        $menu = Menu::where('category_id',$id)->get();
        // dd($menu->toArray());
        return view('user.menu',compact('category','menu'));
    }
    //single food in menu
    function food($id){
        $food = Menu::where('id',$id)->first();
        return view('user.food',compact('food'));
    }

}
