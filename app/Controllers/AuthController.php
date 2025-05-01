<?php

namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class AuthController extends BaseController
{
    public function login()
    {        
        return view('auth/login');
    }

    public function auth()
    {
        $session = session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // user
        $user = new UserModel();
        $data = $user->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'name'     => $data['name'],
                    'email'    => $data['email'],
                    'role' => $data['role'],
                    'warehouse' => $data['warehouse'],
                    'logged_in'     => TRUE,
                    'login_date'   => Time::now('Asia/Jakarta')->toDateString()
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('dashboard'));
            } else {
                $session->setFlashdata('warning', 'Wrong email or password');
                return redirect()->to(base_url('/'));
            }
        } else {
            $session->setFlashdata('warning', 'Wrong email or password');
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}

?>