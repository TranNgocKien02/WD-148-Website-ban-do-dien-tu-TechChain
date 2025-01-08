<?php

namespace App\Http\Controllers\Admin;

use App\Models\LienHe;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\PhanHoi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class LienHeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Liên Hệ";
        $data = LienHe::all();
        return view('admins.lienhes.index', compact('title', 'data'));
    }



    /**
     * Display the specified resource.
     */
    public function show(LienHe $lienHe)
    {
        $title = "Nội dung liên hệ";
        $responseHistory = PhanHoi::query()->where('lien_he_id', $lienHe->id)->get();
        // dd($responseHistory);
        return view('admins.lienhes.response', compact('lienHe', 'title', 'responseHistory'));
    }


    public function respond(Request $request)
    {
        $data = $request->all();
        $data['nguoi_phan_hoi'] = auth()->user()->name;
        $lienHeId = $data['lien_he_id'];
        $data['created_at'] = Carbon::parse();
        try {
            DB::beginTransaction();
            try { 
                Mail::to($data['email_khach_hang'])->send(new ContactMail($data['noi_dung'], $data['ten_khach_hang'], $data['created_at'])); 
            } catch (\Exception $mailException) { 
                dd($mailException);
                DB::rollback(); 
                return back()->withErrors('Error occurred while sending email: ' . $mailException->getMessage()); 
            }

            PhanHoi::create($data);
            $lienHeId = $request->input('lien_he_id');
            if (PhanHoi::where('lien_he_id', $lienHeId)->exists()) { 
                $lienHe = LienHe::find($lienHeId);
                    if ($lienHe){ 
                        $lienHe->is_respond = true;
                        $lienHe->save(); 
                    }
            }    

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            // dd($exception);
            return back();
        }

        return back()->with('success', 'Thêm phản hồi thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LienHe $lienHe)
    {

        try {
            DB::beginTransaction();
            $lienHe->phanhois()->delete();
            $lienHe->delete();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return back()->with('message', 'Error');
        }
        return back()->with('success', 'Xóa thành công');
    }
}
