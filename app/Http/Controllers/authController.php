<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class authController extends Controller
{
    
    public function getLoginForm()
    {
        return view('auth.register')->with(['active' => false]);
    }

    public function getSignupForm()
    {
        return view('auth.register')->with(['active' => true]);
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => ['required', 'min:4', 'max:255'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required','min:6','max:255', 'confirmed'],
        ]);


       

        // User::create([
        //     'name' => request('name'),
        //     'email'=> request('email'),
        //     'password' => request('password'),
        //     'role' => request('role'),
        // ]);

        //return redirect()->route('showings.index')->with(['message','Sign Up Successfully!', 'status' => 'success']);

        try{
            User::create($request->all());
            return redirect(route('admin.showings.index'))->with(['status' => 'success', 'message' => 'User registration was successfull']);
        }
        catch (\Throwable $th)
        {
            return redirect(route('admin.showings.index'))->with(['status' => 'danger', 'message' => 'User registration was not successful. Try again later']);
        }

    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email','max:255'],
            'password' => ['required','max:255',],

        ]);

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect(route('admin.showings.index'))->with(['status'=> 'success', 'message'=> 'Login Successfully']);
        }
        else
        {
            return redirect()->back()->withInput()->with(['status' => 'danger','message' => 'Email/Password is incorrect']);
        }
    }

    public function logoutUser(Request $request) {
        $request->session()->invalidate();
        return redirect(route('admin.showings.index'))->with([
            'status' => 'info', 'message' => 'Logout successful'
        ]);
    }
    
    public function apiLogin(Request $request){
        $this->validate($request, [
            'email' => ['required', 'email','max:255'],
            'password'=> ['required', 'max:255'],
        ]);

        $user = User::where('email', $request->email)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return response()->json([
            'status'=> 'success',
            'token' => $user->createToken($user->name)->plainTextToken,
            'user' => $user
        ]);
    }
    


    
}
