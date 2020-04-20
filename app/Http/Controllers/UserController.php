<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('account.profile', compact('user'));
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        User::where('id', $request->get('id'))->update(array(
			'firstname'=> $request->get('firstname'),
			'lastname'=> $request->get('lastname'),
			'phoneNumber'=> $request->get('phoneNumber'),
			'email'=> $request->get('email'),
			'city'=> $request->get('city'),
			'state'=> $request->get('state'),
			'country'=> $request->get('country')
        ));
        
        return redirect()->action('UserController@index');
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
