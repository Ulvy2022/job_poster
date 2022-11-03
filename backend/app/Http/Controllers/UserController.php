<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::where('role','user')->get();
    }

     /**
     * In user table, there are
     * - fullName,
     * - email
     * - password
     */
    public function register(Request $request)
    {
        $validated = $request->validateWithBag('User',[
            'fullName' => 'required|max:20|min:2',
            'email'=> 'required|email|unique:users,email',
            'password' => 'min:6',
        ]);
        $user = new User();
        $user->fullName = $request->fullName;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->role = 'user';
        $user->save();
        return response()->json(['msg' => 'success']);
    }


    public function store(Request $request)
    {
        $validated = $request->validateWithBag('User', [
            'fullName' => 'required|max:20|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6',
            
        ]);
        $user = new User();
        $user->fullName = $request->fullName;
        $user->email = $request->email;
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
        $user->gender = $request->gender;
        $user->password = bcrypt($request->password);
        $user->role = 'user';
        $user->save();
        return response()->json(['msg' => 'success']);
    }


    public function show( $id)
    {
        return User::with(['jobsposter','subscribsion'])->where('id',$id)->get();
    }


    public function update(Request $request,  $id)
    {
        $validated = $request->validateWithBag('User',[
            'fullName' => 'required|max:20|min:2',
            'password' => 'min:8|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->fullName = $request->fullName;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->companyName = $request->companyName;
        $user->gender = $request->gender;
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

    public function count()
    {
        return User::all()->count();
    }

    public function setUserToAdmine($id)
    {
        $user = User::findOrFail($id);
        $user->role = "Admine";
        $user->update();
        return response()->json(['msg' => 'set user to admine success']);
    }

    public function updateImg(Request $request,$id)
    {
        $user = User::findOrFail($id);
        if ($request->img != null) {
            $path = public_path('images');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $file = $request->file('img');
            $fileName = uniqid() . '_' . trim($file->getClientOriginalName());
            $file->move($path, $fileName);
            $user->img = asset('images/' . $fileName);
            $user->update();
        }
        return response()->json(['msg' => 'ing updated']);

    }


    public function changePassword(Request $request,$id)
    {
        $user = User::find($id);
        if($user)
        {
            if(Hash::check($request->oldPassword, $user->password))
            {
                $user->password = bcrypt($request->newPassword);
                $user->update();
                return response()->json(['msg' => 'password changed']);
            }
            return response()->json(['msg' => 'failed']);

        }
    }

    // public function deadline(Request $request,$id)
    // {
    //     $start_date = Carbon::parse($item->start_date);
    //     $end_date = Carbon::parse($item->end_date);
    //     $diff_in_hours = $end_date->diffInHours($start_date);
    //     $diff_in_days = $end_date->diffInDays($start_date);
    //     $diff_in_minutes = $end_date->diffInMinutes($start_date);
    //     $diff_in_seconds = $end_date->diffInSeconds($start_date);
    //     $schedules = DB::table('users')
    //         ->get()
    //         ->map(function($item){
    //             $start_date = Carbon::parse($item->start_date);
    //             $end_date = Carbon::parse($item->end_date);
    //             $item->diff = $end_date->diffInMinutes($start_date);

    //         return $item;
    //     });
    // }
}
