<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    public function RoomTypeList(){

        $allData = RoomType::orderby('id','desc')->get();
        return view('backend.allroom.roomtype.view_roomtype',compact('allData'));
    }

    public function AddRoomType(){

        return view('backend.allroom.roomtype.add_roomtype');
    }

    public function RoomTypeStore(Request $request){

        RoomType::insert([
            'name' => $request ->name,
        ]);

        $notification = [
            'message' => 'Tipe kamar baru berhasil di tambahkan!',
            'alert-type' => 'success',
        ];

        return redirect()->route('room.type.list')->with($notification);
    }

}
