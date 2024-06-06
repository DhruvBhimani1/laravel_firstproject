<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class democontroller extends Controller{
    public function create(){
        $data['url'] = url("register");
        $data['title'] = "Add New User";
        return view("form", $data);
    }
    public function store(Request $request){
        $request->validate([
            "email"=> "required",
            "password"=> "required",
            "lastname"=> "required",
            "firstname"=> "required"
        ]);
        $user = new User; 
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/view');
    }
    public function view(Request $request){
        $data['search'] = $request['search'] ?? "";
        if($data['search'] != ""){
            $data['user'] = User::where("firstname","LIKE","%".$data['search']."%")->orWhere("email","LIKE","%".$data['search']."%")->paginate(10);
        }else{
            $data['user'] = User::paginate(10);
        }
        return view('user-view')->with($data);
    }
    public function login(Request $request){
        $credentials = $request->validate([
        'email'=> 'required|email',
        'password'=> 'required'
        ]);
        if(Auth::attempt($credentials)){
            return redirect()->route('view');
        }else{
            return redirect()->route('login');
        }
    }
    public function trash(){
        $user = User::onlyTrashed()->get();
        $data['user'] = $user;
        return view('user-trash')->with($data);
    }
    public function restore($id) {
        $user = User::withTrashed()->find($id);
        if (!is_null($user)) {
            $user->restore();
            return redirect('/trash')->with('restore_success', 'User restored successfully...');
        }
        return redirect('/trash')->with('restore_error', 'User not found...');
    }
    public function forceDelete($id) {
        $user = User::withTrashed()->find($id);
        if (!is_null($user)) {
            $user->forceDelete();
            return redirect('/trash')->with('forcedelete_success', 'User permanently deleted...');
        }
        return redirect('/trash')->with('forcedelete_error', 'User not found...');
    }
    public function delete($id){
        $user = User::find($id);   
        if(!is_null($user)){
            $user->delete();
            return redirect('/view')->with('success', 'User deleted successfully...');
        }else{
            return redirect('/view')->with('error','User Not Found...');
        }
    }
    public function edit($id){
        $user = User::find($id);
        if(!is_null($user)){
            $data['url'] = url('update')."/".$id;
            $data['title'] = "Update User";
            $data["user"] = $user;
            return view('form')->with($data);
        }else{
            return redirect('form')->with('error','User Not Found..');
        }
        
    }
    public function update($id, Request $request){
        $request->validate([
            'firstname'=> 'required',
            'lastname'=> 'required',
            'email'=> 'required|email',
        ]);
        $user = User::find($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('view')->with('success', 'User Data successfully Updated.');
    }
    public function upload(Request $request){
        echo $request->file('file')->store('upload');
    }

    public function logout(){
        Auth::logout();
        return view('login');
    }
}
