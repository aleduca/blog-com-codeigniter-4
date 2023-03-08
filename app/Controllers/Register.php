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
      'email' => 'required|valid_email|is_unique[users.email]',
      'password' => 'required'
    ], [
      'firstName' => [
        'required' => 'O campo nome é obrigatório'
      ],
      'lastName' => [
        'required' => 'O campo sobrenome é obrigatório'
      ],
      'email' => [
        'required' => 'O campo email é obrigatório'
      ],
      'password' => [
        'required' => 'O campo password é obrigatório'
      ],
    ]);

    if (!$validated) {
      session()->setFlashdata('errors', $this->validator->getErrors());
      return redirect()->route('register');
    }

    $user = new User;

    $userCreated = $user->insert([
      'firstName' => strip_tags((string)$this->request->getPost('firstName')),
      'lastName' => strip_tags((string)$this->request->getPost('lastName')),
      'email' => strip_tags((string)$this->request->getPost('email')),
      'password' => strip_tags(password_hash((string)$this->request->getPost('password'), PASSWORD_DEFAULT)),
    ]);

    ($userCreated) ?
      session()->setFlashdata('user_created', 'Usuário cadastrado com sucesso') :
      session()->setFlashdata('user_not_created', 'Ocorreu um erro ao cadastrar, tente novamente em alguns minutos');

    $user = $user->find($userCreated);

    Login::login($user);

    return redirect()->route('register');
  }
}
