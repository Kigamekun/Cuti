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

class DataKaryawanController extends Controller
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'nama' => 'required',
        //     'formulir' => 'required',
        // ]);


        if ($request->hasFile('thumb')) {
            $file = $request->file('thumb');
            $thumbname = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . '/thumb' . '/', $thumbname);
            DB::table('users')->insert([
                'npp' => $request->npp,
                'name' => $request->name,
                'jenis_kelamin' => $request->jenis_kelamin,
                'phone' => $request->phone,
                'divisi' => $request->divisi,
                'alamat' => $request->alamat,
                'thumb' => $request->thumb,
                'status' => 1,
                'role' => 1,
                'email' => $request->email,
                'password' => $request->password,
                'thumb' => $thumbname,
            ]);
        }else {
            DB::table('users')->insert([
                'npp' => $request->npp,
                'name' => $request->name,
                'jenis_kelamin' => $request->jenis_kelamin,
                'phone' => $request->phone,
                'divisi' => $request->divisi,
                'alamat' => $request->alamat,
                'thumb' => $request->thumb,
                'status' => 1,
                'role' => 1,
                'email' => $request->email,
                'password' => $request->password,
            ]);
        }





        return redirect()->back()->with(['message'=>'Data Karyawan berhasil ditambahkan','status'=>'success']);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data Karyawan  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        if ($request->hasFile('thumb')) {
            $file = $request->file('thumb');
            $thumbname = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path() . '/thumb' . '/', $thumbname);
            DB::table('users')->where('id',$id)->update([
                'name' => $request->name,
                'jenis_kelamin' => $request->jenis_kelamin,
                'phone' => $request->phone,
                'divisi' => $request->divisi,
                'alamat' => $request->alamat,
                'thumb' => $request->thumb,
                'status' => 1,
                'role' => 1,
                'email' => $request->email,
                'password' => $request->password,
                'thumb' => $thumbname,
            ]);
        }else {
            DB::table('users')->where('id',$id)->update([
                'name' => $request->name,
                'jenis_kelamin' => $request->jenis_kelamin,
                'phone' => $request->phone,
                'divisi' => $request->divisi,
                'alamat' => $request->alamat,
                'thumb' => $request->thumb,
                'status' => 1,
                'role' => 1,
                'email' => $request->email,
                'password' => $request->password,

            ]);
        }



        return redirect()->back()->with(['message'=>'Data Karyawan berhasil di update','status'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data Karyawan  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('admin.datakaryawan.index')->with(['message'=>'Data Karyawan berhasil di delete','status'=>'success']);
    }
}
