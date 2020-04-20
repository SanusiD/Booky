<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \App\User;
class EditCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = DB::table('users')
            ->select('*')
            ->where('isAdmin', 0)
            ->get();

        //  dd($accounts);
        return view('editUser.index', compact('accounts'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        // dd($user);
        return view('editUser.show', compact('user'));
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
        User::where('id', $request->get('id'))->update(array(
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'phoneNumber' => $request->get('phoneNumber'),
            'email' => $request->get('email'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'country' => $request->get('country')
        ));

        return redirect()->action('EditCustomerController@index');
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
