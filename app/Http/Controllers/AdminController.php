<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    public function adminDashboard(){
        return view('admin.dashboard');
    }

    public function index(){
        $admins = User::where('role' , 'admin')->paginate(5);
        return view('admin.admin.list'  , compact('admins'));
    }

    public function create(){
        
        return view('admin.admin.add');
    }

    public function store(Request $admin){

        $data = [];
        $data['name'] = $admin->name;
        $data['email'] = $admin->email;
        $data['password'] = $admin->password;
        $data['role'] = $admin->role;
    User::create($data);

    return redirect()->route('admins.index')->with('success', 'Admin Added Successfully');
}

    public function show($admin)
    {
        $showAdmn = User::findOrFail($admin);
        return view('admin.admin.show', compact('showAdmn'));
    }



    public function edit($admin){
        $editAdmin = User::findOrFail($admin);
        return view('admin.admin.edit', compact('editAdmin'));
        }


        public function update(Request $admin , $id)
        {
            $data = [];
            $data['name'] = $admin->name;
            $data['email'] = $admin->email;
            if (!empty($admin->password)) {
                $data['password'] = $admin->password;
            }
            
            User::findOrFail($id)->update($data);
            return redirect()->route('admins.index')->with('success', 'Admin Updated Successfully');
        }   

        public function destroy($admin){
            $admin = User::findOrFail($admin);
            $admin->delete();
            return redirect()->route('admins.index')->with('success', 'Admin Deleted Successfully');
        }

        public function search(Request $request)
        {
            $search = $request->q;
            $admins = User::where('name', 'LIKE', '%'.$search.'%')
            ->orWhere('email', 'LIKE', '%'.$search.'%')->get();
            return redirect()->route('admins.index', compact('admins'));
            
            
        }

        

    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
