<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\role;
use App\Models\admin_role;
use Carbon\Carbon;
class employeeController extends Controller
{
    public function create(){
        return view('admin/employee/create');
    }
    public function index(Request $request)
    {
        $admin = admin::get();
        return view('admin/employee/index')->with(compact('admin'));
    }
    public function edit($id)
    {
        $admin = admin::find($id);
        return view('admin/employee/edit')->with(compact('admin'));
    }
    public function store(Request $request){
            $message = ([
                'name.required' => 'Bạn chưa điền tên',
                'email.required' => 'Bạn chưa điền email',
                'password.required' => 'Bạn chưa điền mật khẩu',
                'password.min' => 'Bạn phải điền mật khẩu ít nhất 6 ký tự',
                'email.unique' => 'Email đã tồn tại',
            ]);
            $request->validate([
                'name' => 'required|max:30',
                'email' => 'email|unique:admin',
                'password' => 'required|min:6'
            ], $message);
            $ad = admin::get();
            if (count($ad) == 0) {
                $admin = admin::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => md5($request->password),
                ]);
                $role=role::get();
                foreach($role as $key =>$val){
                    $admin_role=admin_role::create([
                        'admin_id'=>$admin->id,
                        'role_id'=>$val->id
                    ]);
                }
            } else {
                $admin = admin::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => md5($request->password),
                ]);
            }
    }
    public function update(Request $request, $id)
    {
        $message = ([
            'name.required' => 'Bạn chưa điền tên',
            'password.required' => 'Bạn chưa điền mật khẩu',
            'password.min' => 'Bạn phải điền mật khẩu ít nhất 6 ký tự',
        ]);
        $request->validate([
            'name' => 'required|max:30',
            'password' => 'required|min:6'
        ], $message);
        $ad = admin::find($id);
        $ad->name = $request->name;
        $ad->password = md5($request->password);
        $ad->save();
    }
}
