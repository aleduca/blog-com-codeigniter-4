<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Login;
use App\Models\User;

class Register extends BaseController
{
  public function index()
  {
    return view('register');
  }

  public function store()
  {

    $validated = $this->validate([
      'firstName' => 'required',
      'lastName' => 'required',
      'email' => 'required|is_unique[users.email]|valid_email',
      'password' => 'required'
    ]);

    if (!$validated) {
      session()->setFlashdata('errors', $this->validator->getErrors());
      return redirect()->route('register');
    }

    $user = new User;

    $created = $user->insert([
      'firstName' => $this->request->getGetPost('firstName'),
      'lastName' => $this->request->getGetPost('lastName'),
      'email' => $this->request->getGetPost('email'),
      'password' => password_hash((string)$this->request->getGetPost('password'), PASSWORD_DEFAULT),
    ]);

    ($created) ?
      session()->setFlashdata('user_created', 'Cadastrado com sucesso') :
      session()->setFlashdata('user_not_created', 'Erro ao cadastrar, tente novamente em alguns minutos');

    $user = $user->find($created);

    Login::login($user);

    return redirect()->route('register');
  }
}
