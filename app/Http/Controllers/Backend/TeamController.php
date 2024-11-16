<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BookArea;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    public function AllTeam(){

        $team = Team::latest()->get();
        return view('backend.team.all_team', compact('team'));
    }

    public function AddTeam(){

        $team = Team::latest()->get();
        return view('backend.team.add_team', compact('team'));
    }

    public function StoreTeam(Request $request){

        // Periksa apakah file gambar ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(550, 670)->save('upload/team/' . $name_gen);
            $save_url = 'upload/team/' . $name_gen;

            // Masukkan data ke database
            Team::insert([
                'name' => $request->name,
                'position' => $request->position,
                'facebook' => $request->facebook,
                'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);

            $notification = [
                'message' => 'Team Data Inserted Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('all.team')->with($notification);
        }

        // Jika file gambar tidak ada, kembalikan error
        return redirect()->back()->withErrors(['image' => 'Image file is required.']);
    }



    public function EditTeam($id){

        $team = Team::findOrFail($id);
        return view('backend.team.edit_team', compact('team'));
    }

    public function UpdateTeam(Request $request){
        $teamId = $request->id;

        // Temukan data tim berdasarkan ID
        $team = Team::findOrFail($teamId);

        // Periksa apakah ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nameGen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            // Hapus gambar lama jika ada
            if ($team->image) {
                $oldImagePath = public_path('upload/team/' . $team->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Simpan gambar baru
            Image::make($image)->resize(550, 670)->save('upload/team/' . $nameGen);
            $saveUrl = 'upload/team/' . $nameGen;

            // Update data tim dengan gambar baru
            $team->update([
                'name' => $request->name,
                'position' => $request->position,
                'facebook' => $request->facebook,
                'image' => $saveUrl,
            ]);

            $notification = [
                'message' => 'Data tim berhasil diperbarui dengan gambar baru',
                'alert-type' => 'success'
            ];

        } else {
            // Update data tim tanpa mengubah gambar
            $team->update([
                'name' => $request->name,
                'position' => $request->position,
                'facebook' => $request->facebook,
            ]);

            $notification = [
                'message' => 'Data tim berhasil diperbarui',
                'alert-type' => 'success'
            ];
        }

        // Redirect ke route dengan notifikasi
        return redirect()->route('all.team')->with($notification);
    }


    public function DeleteTeam($id){

        $item = Team::findOrFail($id);
        $img = $item->image;
        unlink($img);

        Team::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Gambar & Tean berhasil di hapus',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    // ======================= Book Area All Methode =======================

    public function BookArea()
    {
        $book = BookArea::find(1);
        return view('backend.bookarea.book_area', compact('book'));
    }

    public function BookAreaUpdate(Request $request)
    {
        $bookId = $request->id;

        // Temukan data bookarea berdasarkan ID
        $bookArea = BookArea::findOrFail($bookId);

        // Periksa apakah ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nameGen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            // Hapus gambar lama jika ada
            if ($bookArea->image) {
                $oldImagePath = public_path('upload/bookarea/' . $bookArea->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Simpan gambar baru
            Image::make($image)->resize(1000, 1000)->save('upload/bookarea/' . $nameGen);
            $saveUrl = 'upload/bookarea/' . $nameGen;

            // Update data bookarea dengan gambar baru
            $bookArea->update([
                'short_title' => $request->short_title,
                'main_title' => $request->main_title,
                'short_desc' => $request->short_desc,
                'link_url' => $request->link_url,
                'image' => $saveUrl,
            ]);

            $notification = [
                'message' => 'Data Bookarea berhasil diperbarui dengan gambar baru',
                'alert-type' => 'success'
            ];

        } else {
            // Update data bookarea tanpa mengubah gambar
            $bookArea->update([
                'short_title' => $request->short_title,
                'main_title' => $request->main_title,
                'short_desc' => $request->short_desc,
                'link_url' => $request->link_url,
            ]);

            $notification = [
                'message' => 'Data Bookarea tanpa gambar berhasil diperbarui',
                'alert-type' => 'success'
            ];
        }

        // Redirect ke route dengan notifikasi
        return redirect()->back()->with($notification);
    }
}
