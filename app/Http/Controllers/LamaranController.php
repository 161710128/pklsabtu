<?php

namespace App\Http\Controllers;

use App\Lamaran;
use App\Lowongan;
use Illuminate\Http\Request;
use Session;

class LamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lamaran = Lamaran::with('Lowongan')->get();
        return view('lamaran.index',compact('lamaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lowongan = Lowongan::all();
        return view('lamaran.create',compact('lowongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'file_cv' => 'required|',
            'status' => 'required|',
            'lowongan_id' => 'required|'
        ]);
        $lamaran = new Lamaran;
        $lamaran->status = $request->status;
        $lamaran->lowongan_id = $request->lowongan_id;
        //upload
        if ($request->hasFile('file_cv')) {
            $file = $request->file('file_cv');
            $destinationPath = public_path (). '/assests/admin/images/lokerr/';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucess = $file->move($destinationPath, $filename);
            $lamaran->file_cv = $filename;
        }
        $lamaran->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$lamaran->file_cv</b>"
        ]);                
        return redirect()->route('lamaran.index');
        {
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lamaran  $lamaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lamaran = Lamaran::findOrFail($id);
        return view('lamaran.show',compact('lamaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lamaran  $lamaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lamaran = Lamaran::findOrFail($id);
        $lowongan = Lowongan::all();
        $selectedo = Lamaran::findOrFail($id)->lowongan_id;
        return view('lamaran.edit',compact('lamaran','lowongan','selectedus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lamaran  $lamaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'file_cv' => 'required|',
            'status' => 'required|',
            'lowongan_id' => 'required|'
        ]);
        $lamaran = Lamaran::findOrfail($id);
        $lamaran->file_cv = $request->file_cv;
        $lamaran->status = $request->status;
        $lamaran->lowongan_id = $request->lowongan_id;
        $lamaran->save();
        
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil Mengedit <b>$lamaran->file_cv</b>"
        ]);
        return redirect()->route('lamaran.index');

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = public_path (). '/assests/admin/images/lokerr';
            $filename = str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucess = $file->move($destinationPath, $filename);
            
            // hapus foto lama
            if ($lamaran->logo) {
                $old_foto =$lamaran-$logo;
                $filepath = public_path() . DIRECTORY_SEPARATOR . '/assets/admin/images/lokerr'
                . DIRECTORY_SEPARATOR . $lamaran->logo;
                try{
                    File::delete($filepath);
                } catch (FileNotFoundException $e) {
                    
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lamaran  $lamaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lamaran = Lamaran::findOrfail($id);
        $lamaran->delete();
        Session::flash("flash_notification",[
        "level" => "success",
        "message" => "Data Berhasil Dihapus"
        ]);
        return redirect()->route('lamaran.index');
    }
}
