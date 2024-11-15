<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLienHeRequest;
use App\Models\LienHe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LienHeController extends Controller
{
    public function index() {
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
            return back();
        }

        return back()->with('success', 'Thêm banner thành công');
    }
}
