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
            /*Send email message carier*/
            try{
                Mail::send('layouts.layout-email',
                    array(
                       'email' => $request->email,
                       'generate_link' => route('register.undangan', Crypt::encrypt($request->email))
                   ), function ($msg) use ($request)
            {                                                 
                  $msg->subject("Link Register Event Huntbazaar");
                  $msg->from('mangiamo.buffet@gmail.com');
                  $msg->to($request->email, 'Admin');
                  // $msg->to('mangiamo.buffet@gmail.com', 'Admin');
                  // $msg->attach($path);
            });
                // Session::flash('success-message', "Terima kasih, kami sudah menerima email anda.");
                return redirect()->back();
            }
            catch (Exception $e){
                return redirect()->back();
            }
            /* \Send email message carier*/
            $notification = array(
                'message' => 'Success mengirimkan generate link.',
                'alert-type' => 'success'
            );
          return redirect()->back()->with($notification);
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
