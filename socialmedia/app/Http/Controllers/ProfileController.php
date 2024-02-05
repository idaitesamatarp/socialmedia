<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Profile;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::first();
        return view('Profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request)->all();   
        $user = Auth::user(); 
        $profile = new Profile;
        $profile->full_name = $request['full_name'];
        $profile->age = $request['age'];
        $profile->gender = $request['gender'];
        $profile->mobile_number = $request['mobile_number'];
        $profile->location = $request['location'];
        $profile->address = $request['address'];
        $profile->user_id = $user->id;
        $profile->save();
        return redirect('/profile')->with('success', 'Profil sudah berhasil dibuat');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::find($id);
        return view('Profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::where('id', $id)->first();
        return view('Profile.edit', compact('profile'));
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
        $update = Profile::where('id', $id)->update([
            "full_name" => $request["full_name"],
            "age" => $request["age"],
            "gender" => $request["gender"],
            "mobile_number" => $request["mobile_number"],
            "location" => $request["location"],
            "address" => $request["address"]
        ]);

        return redirect('/profile')->with('success', 'Profile Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profile::destroy($id);
        return redirect('/profile')->with('success', 'Profile Berhasil Dihapus!');
    }
}
