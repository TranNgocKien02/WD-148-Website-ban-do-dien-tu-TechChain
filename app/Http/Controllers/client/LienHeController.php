<?php

namespace App\Http\Controllers\Client;


use App\Http\Requests\StoreLienHeRequest;
use App\Models\LienHe;
use App\Http\Controllers\BaseController;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class LienHeController extends BaseController
{

    public function index() {
        $this->shareCartData(); // 
        return view('clients.lienhes.index');
    }

    public function store(StoreLienHeRequest $request) {
        
        $data = $request->all();
        $maxId = LienHe::max('id') ?? 0;
        $data['ma_lien_he'] = 'LH-' . now()->format('dmY') . '-' . str_pad(($maxId + 1), 3, '0', STR_PAD_LEFT);

        try {
            DB::beginTransaction();
            LienHe::create($data);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollback();
            dd($exception);
            // return back();
        }

        return back()->with('success', 'Thành công');
    }
}
