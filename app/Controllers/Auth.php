<?php
namespace App\Controllers;
use App\Models\UserModel;
class Auth extends BaseController
{
    public function login(){ if(session('is_logged_in')) return redirect()->to('/tasks'); return view('auth/login',['title'=>'Login']); }
    public function attempt()
    {
        if(!$this->validate(['username'=>'required','password'=>'required'])) return redirect()->back()->withInput()->with('error','Username and password are required.');
        $user=(new UserModel())->where('username',trim((string)$this->request->getPost('username')))->first();
        if(!$user || !password_verify((string)$this->request->getPost('password'),$user['password'])) return redirect()->back()->withInput()->with('error','Invalid username or password.');
        session()->regenerate(true);
        session()->set(['user_id'=>$user['id'],'username'=>$user['username'],'full_name'=>$user['full_name'],'is_logged_in'=>true]);
        return redirect()->to('/tasks')->with('success','Welcome, '.$user['full_name'].'!');
    }
    public function logout(){ session()->destroy(); return redirect()->to('/login')->with('success','You have been logged out.'); }
}
