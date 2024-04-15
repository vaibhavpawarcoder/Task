<?php

namespace App\Controllers;

use App\Models\Usermodel;

class Home extends BaseController
{
    public $user;
    public function __construct()
    {
        helper('form');
        $this->user = new Usermodel();
    }
    public function index(): string
    {
        return view('welcome_message');
    }

    public function Registration()
    {
        $data = [];
        if ($this->request->getMethod() == 'POST') {
            $Rules = [
                'username' => 'required|is_unique[user.Username]',
                'email' => 'required|is_unique[user.Email]|valid_email',
                'mobile' => 'required|numeric',
                'password' => 'required|min_length[6]|max_length[19]',
                'rpassword' => 'required|matches[password]',
                'gender' => 'required',
                'dob' => 'required',
            ];

            if ($this->validate($Rules)) {
                echo "done";
                $cdata = [
                    'Username' => $this->request->getVar('username'),
                    'Email' => $this->request->getVar('email'),
                    'Mobile' => $this->request->getVar('mobile'),
                    'Password' =>  password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'Gender' => $this->request->getVar('gender'),
                    'DOB' => $this->request->getVar('dob'),
                    'UserID' => '#' . $this->request->getVar('username') . rand(99, 9999),
                ];

                $insert = $this->user->insert($cdata);

                if ($insert) {
                    session()->setTempdata('status', 'Admin Created', 3);
                } else {
                    session()->setTempdata('status', 'Admin Creatio Failed', 3);
                }
            } else {
                //   session()->setTempdata('status',  $this->validator , 3);
                $data['validation'] = $this->validator;
            }
        }
        return view('Registration', $data);
    }

    //Admin Login
    public function Login()
    {
        $data = [];
        if ($this->request->getMethod() == 'POST') {
            $Rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[6]|max_length[19]',
            ];

            if ($this->validate($Rules)) {
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');

                $chk_query = $this->user->where('Email', $email)->first();
                if ($chk_query) {
                    $password_verify = password_verify($password, $chk_query['Password']);

                    if ($password_verify) {
                        session()->set('admin_login', $chk_query['ID']);
                        return redirect()->to('AdminDashboard');
                    } else {
                        session()->setTempdata('status', 'Wrong Password ', 3);
                    }
                } else {
                    session()->setTempdata('status', 'Wrong Email ID', 3);
                }
            } else {
                //   session()->setTempdata('status',  $this->validator , 3);
                $data['validation'] = $this->validator;
            }
        }

        return view('Login', $data);
    }

    //Admin Logout
    public function Logout()
    {
        session()->remove('admin_login');
        session()->destroy();
        return redirect()->to(base_url() . 'Login');
    }

    public function AdminDashboard()
    {
        $data = [];
        //session and admin info
        $sessionID = session('admin_login');
        $data['admin'] = $this->user->where('ID', $sessionID)->first();

        $data['users'] = $this->user->findAll();

        return view('AdminDashboard', $data);
    }

    public function userList(){
        $record['record'] = $this->user->findAll();

        if ($record) {
            return $this->response->setJSON($record);
        } else {
            return $this->response->setJSON("No Record Found");
        }
    }

    public function viewUpdate()
    {
        $data = [];
        $IDinfo = $this->request->getVar('IDinfo');
        $record['record'] = $this->user->where('ID', $IDinfo)->first();

        if ($record) {
            return $this->response->setJSON($record);
        } else {
            return $this->response->setJSON("No Record Found");
        }
    }

    public function Updateuser()
    {
         $ID = $this->request->getVar('campIDrecord');

            $cdata = [
                'Username' => $this->request->getVar('username'),
                'Email' => $this->request->getVar('email'),
                'Mobile' => $this->request->getVar('mobile'),
                'Gender' => $this->request->getVar('gender'),
                'DOB' => $this->request->getVar('dob'),
            ];
            $update = $this->user->update($ID, $cdata);
            if ($update) {
                return $this->response->setJSON(['Record Update SucessFully']);
            } else {
                return $this->response->setJSON(['Record Update Failed']);
            }
        if ($this->request->isajax()) {
           
        }
    }

    public function remove()
    {
        $data = [];
        $IDinfo = $this->request->getVar('IDinfo');
        $record['record'] = $this->user->delete($IDinfo);

        if ($record) {
            return $this->response->setJSON($record);
        } else {
            return $this->response->setJSON("No Record Found");
        }
    }
}
