<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\TypeRoom;
use App\Models\Hotel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class HotelController extends Controller
{
    // public function trangchu(){
    //     $room  = DB::table('room') -> paginate(110);
    //     return view('hoteladmin.trangchu',compact('room'));
    // }

    // public function getAdminAdd()
    // {
    //     return view('hoteladmin.hotelpageadd');
    // }

    // public function postAdminAdd(Request $request)
    // {
    //     $room = new Room();
        
    //     $image = $request -> file('inputImage');
    //     $image -> move('source/image/room', $image -> getClientOriginalName());

    //     $room -> name = $request -> inputName;
    //     $room -> image = "source/image/room/".$image -> getClientOriginalName();
    //     $room -> typeroom= $request -> inputTyperoom;
    //     $room -> number = $request -> inputNumber;
    //     $room -> area = $request -> inputArea;
    //     $room -> price = $request -> inputPrice;
    //     $room -> save();
    //     return $this -> admin();
    // }

    // public function getAdminEdit($id)
    // {
    //     $room =  Room::find($id);
    //     return view('hoteladmin.hotelpageedit')->with('room', $room);
    // }

    // public function postAdminEdit(Request $request)
    // {
    //     $id = $request -> editID;
    //     $room = Room::find($id);
        
    //     $image = $request -> file('editImage');
    //     $image -> move('source/image/room', $image -> getClientOriginalName());

    //     $room -> name = $request -> editName;
    //     $room -> image = "source/image/room/".$image -> getClientOriginalName();
    //     $room -> typeroom= $request -> editTyperoom;
    //     $room -> number = $request -> editNumber;
    //     $room -> area = $request -> editArea;
    //     $room -> price = $request -> editPrice;
    //     $room -> save();
    //     return $this -> admin();
    // }

    // public function postAdminDelete($id)
    // {
    //     $room =  Room::find($id);
    //     $room -> delete();
    //     return $this -> admin();
    // }
    // public function admin(){
    //     $room  = DB::table('room') -> paginate(110);
    //     return view('hoteladmin.table',compact('room'));
    // }




    public function getIndex(){
        $slide = DB::table('slide') -> get();

        // $new_room  = Room::where('new', 1)->paginate(4);
        $room  = DB::table('rooms')->paginate(4);

        // $promotion_room = Room::where('promotion_price', '<>', 0)->paginate(4);


        return view('page.homepage', compact('slide', 'room'));
    }
    // cho ni chac chia ra 4 loai phong, moi loai phong la 4 room
    public function getTypeRoom($type){
        $sp_theoloai= Room::where('id_type',$type) ->limit(4)->paginate(4);
        // $sp_khac= Room::where('id_type','<>',$type)->limit(3)->paginate(4);
        $loai = TypeRoom::all();
        $loai_sp = TypeRoom::where('id',$type)->first();

        return view('page.accommodation',compact('sp_theoloai', 'loai','loai_sp'));
    }

    public function getSp(){
        return view('page.chitiet_sanpham');
    }

    public function contact(){
        return view('page.contact');
    }

    public function about(){
        return view('page.about');
    }

    public function getChitiet(Request $req){
        $sanpham = Room::where('id', $req -> id) -> first();
        $sp_tuongtu = Room::where('id_type', $sanpham -> id_type) -> paginate(3);
        $new_room  = DB::table('rooms') -> where('new', 1)->paginate(4);
        $best_seller  = DB::table('rooms') -> where('new', 2)->paginate(3);
        return view('page.chitiet_sanpham', compact('sanpham', 'sp_tuongtu', 'best_seller', 'new_room'));
    }
    // public function news(){
    //     $bangtin = DB::table('news') -> paginate(12);
    //     return view('page.news',compact('bangtin'));
    // }

    public function admin(){
        $room  = DB::table('rooms') -> paginate(110);
        return view('adminpage.admin',compact('room'));
    }

    public function getAdminAdd()
    {
        return view('adminpage.form_add');
    }

    public function postAdminAdd(Request $request)
    {
        $room = new Room();
        
        $image = $request -> file('inputImage');
        $image -> move('source/image/room', $image -> getClientOriginalName());

        $room -> name = $request -> inputName;
        $room -> image = $image -> getClientOriginalName();
        $room -> description = $request -> inputDescription;
        $room -> unit_price = $request -> inputPrice;
        $room -> promotion_price = $request -> inputPromotionPrice;
        $room -> unit = $request -> inputUnit;
        $room -> new = $request -> inputNew;
        $room -> id_type = $request -> inputType;
        $room -> save();
        return $this -> admin();
    }

    public function getAdminEdit($id)
    {
        $room =  Room::find($id);
        return view('adminpage.form_edit')->with('room', $room);
    }

    public function postAdminEdit(Request $request)
    {
        $id = $request -> editID;
        $room = Room::find($id);
        
        $image = $request -> file('editImage');
        $image -> move('source/image/room', $image -> getClientOriginalName());

        $room -> name = $request -> editName;
        $room -> image = $image -> getClientOriginalName();
        $room -> description = $request -> editDescription;
        $room -> unit_price = $request -> editPrice;
        $room -> promotion_price = $request -> editPromotionPrice;
        $room -> unit = $request -> editUnit;
        $room -> new = $request -> editNew;
        $room -> id_type = $request -> editType;
        $room -> save();
        return $this -> admin();
    }

    public function postAdminDelete($id)
    {
        $room =  Room::find($id);
        $room -> delete();
        return $this -> admin();
    }
}
