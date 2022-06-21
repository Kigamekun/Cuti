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
use PDF;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cuti', [
            'data' => DB::table('cuti')->get()
        ]);
    }

    public function pending()
    {
        return view('admin.cuti', [
            'data' => DB::table('cuti')->where('status',0)->get(),

        ]);
    }

    public function approved()
    {
        return view('admin.cuti', [
            'data' => DB::table('cuti')->where('status',1)->get()
        ]);
    }


    public function reject()
    {
        return view('admin.cuti', [
            'data' => DB::table('cuti')->where('status',-1)->get()
        ]);
    }

    public function approve($id)
    {
        DB::table('cuti')->where('id',$id)->update([
            'status' => 1
        ]);
        return redirect()->back()->with(['status' => 'success','message'=>'Cuti Berhasil Di Approve']);
    }

    public function decline(Request $request,$id)
    {
        DB::table('cuti')->where('id',$id)->update([
            'status' => -1,
            'keterangan_reject'=>$request->keterangan_reject
        ]);
        return redirect()->back()->with(['status' => 'success','message'=>'Cuti Berhasil Di Decline']);
    }


    public function cetakPdf($id)
    {
        $pdf = PDF::loadview('cuti-pdf',['data'=>DB::table('cuti')->get()]);
        return $pdf->stream();
    }

    public function laporan(Request $request)
    {
        return view('admin.laporan-cuti');
    }



}
