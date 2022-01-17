<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use RealRashid\SweetAlert\Facades\Alert;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Exports\UsersExport;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // print_r("user.index");
       
        // return view('user.index');
        $user = Users::paginate(5);
        return view('user.index',compact('user'));
        // return view('user.index')->with('user',users::all());
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
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
        $req=new Users;
        $req->name=$request->input('name');
        $req->phoneNumber=$request->input('phoneNumber');
        $req->email=$request->input('email');
        $req->address=$request->input('address');
        $req->save();        
        Alert::success('Update Account', 'Your account added succesfully');
        return view('user.index')->with('user',Users::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users, $id)
    {
        //
        $user=Users::find($id);
        return view('user.show',compact('user')); 

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
        $user = Users::findorFail($id);
        return view('user.edit',compact('user'));
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
        // return $request->input('name');
        $req=Users::find($id);      
        $req->name=$request->input('name');
        $req->phoneNumber=$request->input('phoneNumber');
        $req->email=$request->input('email');
        $req->address=$request->input('address');
        $req->update();
        
        Alert::success('Update Account', 'Your account updated succesfully');
        // return redirect('user.index');
        return view('user.index')->with('user',Users::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // print_r("destroye");
      
        //   Alert::question('Delete Account', 'Do you want Delete Account');
        // Alert::toast('Account deleted successfully', 'success');
          $user=Users::find($id);
          $user->delete();          
          Alert::success('Delete Account', 'Your account deleted succesfully');
          return redirect()->back();
          
    }

      
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new UsersImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new UsersExport, 'users_list.csv');
    }  
}