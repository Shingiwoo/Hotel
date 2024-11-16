<?php

namespace App\Http\Controllers\Backend;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Facility;

class RoomController extends Controller
{



    public function EditRoom($id){

        $basic_facility = Facility::where('rooms_id', $id)->get();
        $editData = Room::find($id);

        return view('backend.allroom.rooms.edit_rooms', compact('editData', 'basic_facility'));
    }

    // public function EditRoom(Request $request){

    //     $roomtype_id = Room::insertGetId([
    //         'name' => $request ->name,
    //     ]);

    //     Room::insert([
    //         'roomtype_id' => $roomtype_id,
    //     ]);


    //     $notification = [
    //         'message' => 'Tipe kamar baru berhasil di tambahkan!',
    //         'alert-type' => 'success',
    //     ];

    //     return redirect()->route('room.type.list')->with($notification);
    // }
}
