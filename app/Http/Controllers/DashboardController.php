<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registers;
use Session;
use Validator;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Facades\Crypt;
use Mail;
use App\Models\Setting;

class DashboardController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerUndangan()
    {
        $data['products'] = Registers::orderby('created_at', 'DESC')->get();
        $data['date_expired'] = Setting::where('param','date_expired')->first();
        $data['title_form'] = 'List Registers';
        return view('admin.register-undangan.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveUndangan(Request $request)
    {
        $data = $request->all();
        $rules =  ['email' => 'required|unique:registers,email'];
        $atributname = [
          'email.required' => 'The email field is required.',
        ];

        $validator = Validator::make($data, $rules, $atributname);
        // $arr = get_defined_vars(); dd($arr);
        if($validator->fails()){
            return redirect()->back()
            ->withInput()
            ->withErrors( $validator );
        }
        else{

            $p        =  new Registers; 

            $p->email                 = $request->email;
            $p->save();
            $notification = array(
                'message' => 'Success mengirimkan generate link.',
                'alert-type' => 'success'
            );
            /*Send email message carier*/
            try{
                Mail::send('layouts.layout-email',
                    array(
                       'email' => $request->email,
                       'generate_link' => route('register.undangan', Crypt::encrypt($request->email))
                   ), function ($msg) use ($request)
            {                                                 
                  $msg->subject("Link Register Event Huntbazaar");
                  $msg->from('rahmatfitri104@gmail.com');
                  $msg->to($request->email, 'Register');
            });
                // Session::flash('success-message', "Terima kasih, kami sudah menerima email anda.");
                return redirect()->back();
            }
            catch (Exception $e){
                return redirect()->back();
            }
            /* \Send email message carier*/
            
          return redirect()->back()->with($notification);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveExpired(Request $request)
    {
        $data = $request->all();
        $rules =  ['date_expired' => 'required'];
        $atributname = [
          'date_expired.required' => 'The date expired field is required.',
        ];

        $validator = Validator::make($data, $rules, $atributname);
        // $arr = get_defined_vars(); dd($arr);
        if($validator->fails()){
            return redirect()->back()
            ->withInput()
            ->withErrors( $validator );
        }
        else{

            $data = array(
                'param_value' => $request->date_expired
            );
            $notification = array(
              'message' => 'Success',
              'alert-type' => 'success'
            );
            Setting::where('param', 'date_expired')->update($data);
          return redirect()->back()->with($notification);
        }

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
    }
}
