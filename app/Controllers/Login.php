<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use stdClass;

class Login extends BaseController
{
  public function index()
  {
    return view('login');
  }

  public function store()
  {
    $validated = $this->validate([
      'email' => 'required|valid_email',
      'password' => 'required',
    ], [
      'email' => [
        'required' => 'O email é obrigatório',
        'valid_email' => 'O email deve ser válido',
      ],
      'password' => [
        'required' => 'O campo password é obrigatório'
      ]
    ]);

    if (!$validated) {
      return redirect()->route('login')->with('errors', $this->validator->getErrors());
    }

    $user = (new User)->where('email', $this->request->getPost('email'))->first();

    if (!$user) {
      return redirect()->route('login')->with('error', 'Email ou senha inválidos');
    }

    if (!password_verify((string)$this->request->getPost('password'), $user->password)) {
      return redirect()->route('login')->with('error', 'Email ou senha inválidos');
    }

    $userInfo = new stdClass;
    $userInfo->firstName = $user->firstName;
    $userInfo->lastName = $user->lastName;
    $userInfo->email = $user->email;
    $userInfo->fullName = $user->firstName . ' ' . $user->lastName;

    session()->set('auth', true);
    session()->set('user', $userInfo);

    return redirect()->route('home');
  }

  public function destroy()
  {
    session()->remove('auth');
    session()->remove('user');

    return redirect()->route('home');
  }
}
