<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Hash;
use Session;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   
      public function index(){
        return view('auth.login');
      }

      public function employee_register(){
        return view('auth.register');
      }




      public function employee_store(Request $request)
      {
          Log::info('employee_store method called.');
      
          $request->validate([
              'name' => 'required|string|max:255',
              'email' => 'required|string|email|max:255|unique:users',
              'phone' => 'required|string|max:15',
              'address' => 'required|string|max:255',
              'age' => 'required|integer|min:18',
              'password' => 'required|string|min:6',
          ]);
      
          try {
              Log::info('Creating new user.');
      
              $user = new User();
              $user->name = $request->name;
              $user->email = $request->email;
              $user->phone = $request->phone;
              $user->address = $request->address;
              $user->age = $request->age;
              $user->password = Hash::make($request->password);
              $user->role = "employee";
              $user->save();
      
              Log::info('User saved.');
      
              $credentials = $request->only('email', 'password');
              if (Auth::attempt($credentials)) {
                  Log::info('User authenticated.');
                  return response()->json(['success'=>true,'message'=>'Login Successfull' ,'redirect_url' => route('admin.dashboard')]);
              }
      
            } catch (\Throwable $exception) {
              Log::error('Error: ' . $e->getMessage());
              return response()->json([
                  'error' => true,
                  'message' => 'Something Went Wrong: ' . $e->getMessage()
              ], 422);
          }
      }
      
      

      public function authenticate(Request $request)
      {
          try {
              $request->validate([
                  'email' => 'required|email',
                  'password' => 'required',
              ]);
      
              $credentials = $request->only('email', 'password');
              if (Auth::attempt($credentials)) {
                    return response()->json(['success'=>true,'message'=>'Login Successfull' ,'redirect_url' => route('admin.dashboard')]);
               
              }
              return response()->json(['error'=>true,'message'=>'Login details are not valid']);
          } catch (\Throwable $exception) {
            return response()->json(['error'=>true,'message'=>'Something went wrong']);
          }
      }

      public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }

    
      public function dashboard(){
        return view('admin.dashboard');
      }
      

}
