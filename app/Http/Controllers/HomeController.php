<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registers;
use Illuminate\Support\Facades\Crypt;
use Session;
use Validator;
use App\Models\Setting;

class HomeController extends Controller
{
    public function registerUndangan( $key )
    {
        $data['decrypted'] = Crypt::decrypt($key);
        $data['cek'] = Registers::where('email', $data['decrypted'])->first();
        date_default_timezone_set('Asia/Jakarta');
        $start = date("Y-m-d H:i:s", strtotime('now'));
        $date_expired = Setting::where('param','date_expired')->first();
        $data['date_expired'] = $date_expired->param_value;
        $expired = date("Y-m-d H:i:s", strtotime($date_expired->param_value));
        // $arr = get_defined_vars();
        // dd($arr);
        if($start >= $expired){
            return view('layouts.page-expired');
        }
        else{
            if($data['cek']){
                return view('frontend.form-register.index', $data);
            }else{
                return view('layouts.error-404');
            }
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
                'kode_registrasi'   => $request->nama.md5($request->tgl),
                'nama'              => $request->nama,
                'tgl_lahir'         => $request->tgl,
                'jenkel'            => $request->jenkel,
                'design_favorite'   => implode(',',$request->design_favorite),
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
