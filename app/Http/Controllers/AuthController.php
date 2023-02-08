<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function registerPage()
    {
       return view('register');
    }

    public function loginPage()
    {
        return view('login');
    }

    public function registerAcc(Request $request)
    {
            $validateData = $request->validate([
                'firstname' =>'required|max:25',
                'lastname' => 'required|max:25',
                'email' => 'required|email',
                'role' => 'required|in:User,Admin',
                'gender' => 'required',
                "display_picture" => 'required|mimes:png,jpg',
                "password" => ['required','confirmed',Password::min(8)->numbers()]
            ]);
            
            $fileObj = $request->file('display_picture');
            $name = $fileObj->getClientOriginalName();
            $ext = $fileObj->getClientOriginalExtension();
            $new_filename = $name . time() . '.' . $ext;
            $fileObj->storeAs('/public/images', $new_filename);

            $users = new users();
            $users->firstname = $validateData['firstname'];
            $users->lastname = $validateData['lastname'];
            $users->email = $validateData['email'];
            $users->role = $validateData['role'];
            $users->gender = $validateData['gender'];
            $users->display_picture = $validateData['display_picture'];
            $users->password = $validateData['password'];
            $users->password = Hash::make($users->password);

            if($users->role == "Admin"){
                $users->role = 1;
            }else{
                $users->role = 2;
            }

            DB::table('users')->insert([
                "roles_id" => $users->role,
                "genders_id" => $users->gender,
                "firstname" => $users->firstname,
                "lastname" => $users->lastname,
                "email" => $users->email,
                "display_picture_link" => $new_filename,
                "password" => $users->password
            ]);

            return redirect()->route('login_page');
    }

    public function loginAcc(Request $request){
        $messages = [
            'Wrong Email/Password. Please Check Again'
        ];
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]) == true){
            Cookie::queue(
                'loggedUser',
                Auth::user()->name,
                60
            );
            return redirect()->route('home_page');
        }else{
            return redirect()->back()->withErrors($messages);
        };
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('logout_page');
    }
}
