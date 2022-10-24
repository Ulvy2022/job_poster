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
        $validated = $request->validateWithBag('User',[
            'firstName' => 'required|unique:users,firstName|max:20|min:2',
            'lastName' =>'required|max:20|min:2',
            'gender' => 'required|max:6|min:1',
            'phoneNumber' => 'required |unique:users,phoneNumber| numeric | digits:10 | starts_with: 6,7,8,9',
            'email'=> 'required|email|unique:users,email',
            'password' => 'required|min:8|unique:users,password',
        ]);

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
        $validated = $request->validateWithBag('User',[
            'firstName' => 'required|unique:users,firstName|max:20|min:2',
            'lastName' =>'required|max:20|min:2',
            'gender' => 'required|max:6|min:1',
            'phoneNumber' => 'required |unique:users,phoneNumber| numeric | digits:10 | starts_with: 6,7,8,9',
            'email'=> 'required|email|unique:users,email',
            'password' => 'required|min:8|unique:users,password',
        ]);

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


    public function destroy($id)
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


    public function getUserById($id)
    {
        return User::findOrFail($id);
    }

    public function count() {
        return User::all()->count();
    }

    
}
