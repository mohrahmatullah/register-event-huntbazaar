<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registers;
use Illuminate\Support\Facades\Crypt;
use Session;
use Validator;

class HomeController extends Controller
{
    public function registerUndangan( $key )
    {
        $data['decrypted'] = Crypt::decrypt($key);
        $cek = Registers::where('email', $data['decrypted'])->first();
        if($cek){
            return view('frontend.form-register.index', $data);
        }else{
            return view('layouts.error-404');
        }
        
    }

    public function saveUndangan(Request $request)
    {
        $data = $request->all();
        $rules =  ['email' => 'required', 'nama' => 'required', 'tgl' => 'required', 'jenkel' => 'required' , 'design_favorite' => 'required'];
        $atributname = ['email.required' => 'required.', 'nama.required' => 'required.', 'tgl.required' => 'required', 'jenkel.required' => 'required' , 'design_favorite.required' => 'required'];

        $validator = Validator::make($data, $rules, $atributname);
        // $arr = get_defined_vars(); dd($arr);
        if($validator->fails()){
            return redirect()->back()
            ->withInput()
            ->withErrors( $validator );
        }
        else{

            $data = array(
                'nama'                  => $request->nama,
                'tgl_lahir'             => $request->tgl,
                'jenkel'             => $request->jenkel,
                'design_favorite'               => $request->design_favorite,
                'status'            => '1'
            );
            $notification = array(
              'message' => 'Anda sukses terdaftar',
              'alert-type' => 'success'
            );
            Registers::where('email', $request->email)->update($data);
          return redirect()->back()->with($notification);
        }

    }
}
