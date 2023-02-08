<?php

namespace App\Http\Controllers;

use App\Models\items;
use App\Models\orders;
use App\Models\roles;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class MainController extends Controller
{
    public function homePage()
    {
        $vegetable = items::simplepaginate(10);

        return view('home',compact('vegetable'));
    }

    public function cartPage()
    {
        $id = Auth::user()->id;

        $cart = users::with(['orders', 'orders.items'])->where('id', 'LIKE', $id)->get();

        return view('cart',compact('cart'));
    }

    public function profilePage()
    {
        $user = Auth::user();
        $role = roles::where('id','LIKE',$user->roles_id)->first();

        return view('profile',compact('user','role'));
    }

    public function savePage()
    {
        return view('save');
    }

    public function profileUpdate(Request $request)
    {
        $id = Auth::user()->id;
        $image = users::where('id', 'LIKE', $id)->first();

        if($request->display_picture != NULL){
            $validateData = $request->validate([
                'firstname' =>'required|max:25',
                'lastname' => 'required|max:25',
                'email' => 'required|email',
                'gender' => 'required',
                "display_picture" => 'mimes:png,jpg',
                "password" => ['sometimes','nullable','confirmed',Password::min(8)->numbers()]
            ]);
            $fileObj = $request->file('display_picture');
            $name = $fileObj->getClientOriginalName();
            $ext = $fileObj->getClientOriginalExtension();
            $new_filename = $name . time() . '.' . $ext;
            $fileObj->storeAs('public/images', $new_filename);

            File::delete(public_path("images/".$image->display_picture_link));

            DB::table('users')->where('id', 'LIKE',$id)->update([
                "genders_id" => $request->gender,
                "firstname" => $request->firstname,
                "lastname" => $request->lastname,
                "email" => $request->email,
                "display_picture_link" => $new_filename,
                "password" => Hash::make($request->password)
            ]);
        } else{
            $validateData = $request->validate([
                'firstname' =>'required|max:25',
                'lastname' => 'required|max:25',
                'email' => 'required|email',
                'gender' => 'required',
                "password" => ['sometimes','nullable','confirmed',Password::min(8)->numbers()]
            ]);

            DB::table('users')->where('id', 'LIKE',$id)->update([
                "genders_id" => $request->gender,
                "firstname" => $request->firstname,
                "lastname" => $request->lastname,
                "email" => $request->email,
                "password" => Hash::make($request->password)
            ]);
        }

        return redirect()->route('save_page');
    }

    public function adminPage()
    {
        $user = users::with('orders')->get();

        return view('admin',compact('user'));
    }

    public function rolePage($id){
        $user = users::where('id', 'LIKE', $id)->first();

        return view('role',['id'=>$id],compact('user'));
    }

    public function roleUpdate(Request $request, $id){

        if($request->role == "Admin"){
            $role = 1;
        }else{
            $role = 2;
        }

        DB::table('users')->where('id', 'LIKE',$id)->update([
            "roles_id" => $role
        ]);

        return redirect()->route('admin_page');
    }

    public function roleDelete($id)
    {
        $user = users::where('id', 'LIKE', $id)->first();
        $user->delete();

        File::delete(public_path("images/".$user->display_picture_link));

        return redirect()->route('admin_page');
    }

    public function checkoutPage()
    {
        return view('success');
    }

    public function buyItem($id){

        $detail = items::where('id', 'LIKE', $id)->first();

        DB::table('orders')->insert([
            "users_id" => Auth::user()->id,
            "items_id" => $detail->id,
            "price" => $detail->price
        ]);

        return view('detail',['id'=>$id],compact('detail'));
    }

    public function cancelItem($id)
    {
        $order = orders::where('id', 'LIKE', $id)->first();
        $order->delete();

        return redirect()->route('cart_page');
    }

    public function checkOut()
    {
        $id = Auth::user()->id;
        orders::where('users_id', 'LIKE', $id)->delete();

        return redirect()->route('success_checkout');
    }

    public function detailPage($id)
    {
        $detail = items::where('id', 'LIKE', $id)->first();

        return view('detail',['id'=>$id],compact('detail'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('logout_page');
    }

    public function logoutPage(){
        return view('logout');
    }
}
