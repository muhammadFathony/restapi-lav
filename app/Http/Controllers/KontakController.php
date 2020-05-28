<?php

namespace App\Http\Controllers;

use App\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Kontak::all();

        if(count($data) > 0){
            $res['message'] = "Success";
            $res['values'] = $data;
            return response($res);
        }else{
            $res['message'] = "data not found" ;
            return response($res);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $nama = $request->input('nama');
        $email = $request->input('email');
        $nohp = $request->input('nohp');
        $alamat = $request->input('alamat');

        $data = new Kontak;
        $data->nama = $nama;
        $data->email = $email;
        $data->nohp = $nohp;
        $data->alamat = $alamat;

        if($data->save()){
            $res['message'] = "success insert";
            $res['value'] = "$data";
            return response($res);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Kontak::find($id);
        if(!empty($data)){
            $res['message'] = 'success';
            $res['values'] = $data;
            return response($data);
        }else{
            $res['message'] = 'failed';
            return response($res);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $nama = $request->nama;
        $email = $request->email;
        $alamat = $request->alamat;
        $nohp = $request->nohp;
        
        $data = Kontak::find($id);
        if(!empty($data)){
            $data->nama = $nama;
            $data->email = $email;
            $data->alamat = $alamat;
            $data->nohp = $nohp;

            if($data->save()){
                $res['message'] = "success update data";
                $res['value'] = "$data";
                return response($res);
            } else {
                $res['message'] = "failed";
                return response($res);
            }
        } else {
            $res['message'] = "data not found";
            return response($res);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Kontak::find($id);
        if(!empty($data) > 0){
            if($data->delete()){
                $res['message'] = "success";
                $res['values'] = "$data";
                return response($res);
            } else {
                $res['message'] = "failed";
                return response($res);
            }
        } else {
            $res['message'] = "data not found";
            return response($res);
        }  
    }
}
