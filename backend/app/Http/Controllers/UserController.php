<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return User::all();
    }


    public function store(Request $request)
    {
        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->gender = $request->gender;
        $user->role = 'user';
        $user->phoneNumber = $request->phoneNumber;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['msg' => 'success']);
    }


    public function show( $id)
    {
        return User::with(['posts','subscribsion'])->where('id',$id)->get();
    }


    public function update(Request $request,  $id)
    {
        $user = User::findOrFail($id);
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if ($request->img != null) {
            $path = public_path('images');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('img');
            $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
            $file->move($path, $fileName);
            $user->img = asset('images/' . $fileName);
        }
        $user->verify_code = $request->verify_code;
        $user->update();
        return response()->json(['msg' => 'updated']);
    }

    public function verifyCode(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->verify_code = $request->verify_code;
        $user->update();
        return response()->json(['msg' => 'verify code updated']);
    }


    public function destroy(User $id)
    {
        return User::destroy($id);
    }


    public function getUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }


    public function resetPassword(Request $request,$id)
    {
        $user = User::findOrFail($id);
        if($user){
            $user->password = bcrypt($request->newPassword);
            $user->update();
            return response()->json(['msg' => 'password change success']);
        }

    }
}
