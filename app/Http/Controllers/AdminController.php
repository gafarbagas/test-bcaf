<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Alert;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('role_id',1)->get();
        return view('pages.admin.index', compact('admins'));
    }

    public function create()
    {
        return view('pages.admin.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ];

        $customMessage = [
            'required' => ':attribute harus diisi',
            'unique' => ':attribute telah digunakan',
        ];

        $attributeName = [
            'name' => 'Nama',
            'email' => 'E-mail',
            'password' => 'Kata sandi',
        ];
        
        $this->validate($request, $rules, $customMessage, $attributeName);

        User::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'role_id' => 1,
        ]);

        Alert::success('Berhasil!', 'Data telah disimpan');
        return redirect(route('admin.index'));
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $admin = User::find($id);
        return view('pages.admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'email' => "required|unique:users,email,$id",
        ];

        $customMessage = [
            'required' => ':attribute harus diisi',
            'unique' => ':attribute telah digunakan',
        ];

        $attributeName = [
            'name' => 'Nama',
            'email' => 'E-mail',
        ];
        
        $this->validate($request, $rules, $customMessage, $attributeName);

        if($request->password == NULL){
            User::where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }else{
            User::where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
        }

        Alert::success('Berhasil!', 'Data telah diperbaharui');
        return redirect(route('admin.index'));
    }

    public function delete($id)
    {
        $id = Crypt::decrypt($id);
        User::destroy($id);
        Alert::success('Berhasil!', 'Data telah dihapus');
        return redirect(route('admin.index'));
    }
}
