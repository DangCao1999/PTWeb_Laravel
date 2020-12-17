<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('profile.createprofile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $profile = new Profile();
        $profile->address = $request->input('address');
        $profile->phone = $request->input('phone');
        $profile ->birthday = $request->input('birthday');
        $profile->user_id = $request->input('userid');
        // $profile->user_id = $request->input('userId');
        // dd($request->input('id'));
        //$validate = $request->validate(['avatar' => 'nullable|mimes:jpg, jpeg, png, xlx,xls, pdf|max::2048']);
        //print($user->name);
        $filename = $request->file('avatar')->getClientOriginalName();
        //dd($filename);
        $filepath = $request->file('avatar')->storeAs('uploads',$filename, 'public');
        //dd($filepath);
        $profile->avatar = '/storage/' . $filepath;
        DB::table('profiles')->insert([
            'user_id' => $profile->user_id,
            'address' => $profile->address,
            'avatar' => $profile->avatar,
            'birthday' => $profile->birthday,
            'phone' => $profile->phone
        ]);
        toast('Data Saved','success','top-right')->autoClose(2000)->showCloseButton();
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile =  DB::table('profiles')->where('user_id', $id)->first();
        if(is_null($profile))
        {
            return View('profile.createprofile', ['id' => $id]);
        }
        return View('profile.index', ['profile' => $profile]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile =  DB::table('profiles')->where('user_id',$id)->first();
		return View('profile.edit',['profile'=>$profile]);
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
        $profile = new Profile();
        $profile->address = $request->input('address');
        $profile->phone = $request->input('phone');
        $profile ->birthday = $request->input('birthday');
        $profile->user_id = $request->input('userid');
        // $profile->user_id = $request->input('userId');
        //dd($request->input('profileid'));
        //$validate = $request->validate(['avatar' => 'nullable|mimes:jpg, jpeg, png, xlx,xls, pdf|max::2048']);
        //print($user->name);
        if($request->file())
        {
            $filename = $request->file('avatar')->getClientOriginalName();
            $filepath = $request->file('avatar')->storeAs('uploads',$filename, 'public');
            $profile->avatar = '/storage/' . $filepath;
        }
        else
        {
            $profile->avatar = $request->input("avatar");
            //dd($request->input('avatar'));
        }
        //dd($filename);

        //dd($filepath);

        DB::table('profiles')->where(['id' => $id])->update([
            'user_id' => $profile->user_id,
            'address' => $profile->address,
            'avatar' => $profile->avatar,
            'birthday' => $profile->birthday,
            'phone' => $profile->phone
        ]);
        toast('Update Success','success','top-right')->autoClose(2000)->showCloseButton();
        return redirect('/user');


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
        // dd("ok");
        DB::table('profiles')->where('id', $id)->delete();
        toast('Delete Success','success','top-right')->autoClose(2000)->showCloseButton();
        return response()->json([
            'message' => 'Done'
          ]);
    }
}
