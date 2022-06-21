<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\{
    Hash,
    Auth,
    Mail,
    Response
};
use Illuminate\Support\Str;

use Carbon\Carbon;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.datakaryawan', [
            'data' => DB::table('users')->get()
        ]);
    }

    public function pengajuan()
    {
        return view('pengajuan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            DB::table('cuti')->insert([
                'no_cuti' => 'CT#'.Str::upper(Str::random(3).time()),
                'tgl_pengajuan' => Carbon::now(),
                'tgl_awal' => $request->tgl_mulai,
                'tgl_akhir' => $request->tgl_akhir,
                'keterangan' => $request->keterangan,
                'status' => 0,
                'user_id' => Auth::user()->id,
            ]);

        return redirect()->back()->with(['message'=>'Pengajuan berhasil dibuat','status'=>'success']);
    }
    public function dataCuti(Request $request)
    {
        return view('data-cuti', [
            'data' => DB::table('cuti')->where('user_id',Auth::user()->id)->get()
        ]);
    }
}
