<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
   
      public function index(){
        
        return view('auth.employee.index');
      }


      public function get_employee(){
        
        if(request()->ajax()){

          $user=User::where('id',auth()->user()->id)->get();
          return datatables()->of($user)->addColumn('action',function($data){
          return '<div class="actions">
                <a class="text-black" href="'.route('get.employee.edit',$data->id).'">
                    <i class="feather-edit-3 me-1"></i> Edit
                </a>

            </div>';
          })->make(true);

      }
        return view ('admin.dashboard');

      }

      public function get_all_employee(){
        
        if(request()->ajax()){
    
          $user=User::where('role','employee')->get();
          return datatables()->of($user)->addColumn('action',function($data){
          return '<div class="actions">
                 <a class="text-black" href="'.route('get.employee.edit',$data->id).'">
                     <i class="feather-edit-3 me-1"></i> Edit
                 </a>
                 <a class="text-danger delete-speciality pointer-link" onclick="pack_del('.$data->id.')" data-id="'.$data->id.'">
                <i class="feather-trash-2 me-1"></i> Delete
                </a>
             </div>';
          })->make(true);
    
      }
            return view ('admin.dashboard');    
          }


          public function get_employee_edit($id){
            $user=User::find($id);
            if($user){
              return view('admin.employeeedit',compact('user'));
            }
            return redirect()->back()->with('error','Something Went Wrong');
          }


    public function employee_update(Request $request, $id)
     {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'phone' => 'required|string|max:15',
        'age' => 'required|integer|min:18',
        'address' => 'required|string|max:255',
    ]);

    try {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->age = $request->input('age');
        $user->address = $request->input('address');

        $user->save();
        return redirect()->route('admin.dashboard')->with('success', 'Employee updated successfully.');
    } catch (\Exception $e) {
        \Log::error('Error updating employee: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to update employee. Please try again.');
    }
}

    public function destroy($id, Request $request)
    {
        $user=User::where('id',$request->id)->delete();
        if($user){
        return response()->json(['success'=>true, 'message'=>'Deleted Successfully'],200);
        }
        return response()->json(['error'=>true, 'message'=>'Something went wrong'],500);
    }


  

      

}
