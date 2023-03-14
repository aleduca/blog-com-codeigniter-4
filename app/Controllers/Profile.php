<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Profile extends BaseController
{
  public function index()
  {
    return view('profile');
  }

  public function store()
  {
    if ($this->request->isAJAX()) {
      $data = json_decode(file_get_contents('php://input'), true);

      $validated = $this->validate([
        'firstName' => 'required',
        'lastName' => 'required',
        'email' => 'required|valid_email|is_unique[users.email,id,{id}]'
      ]);

      if (!$validated) {
        return $this->response->setJSON(['validate' => $this->validator->getErrors()])->setStatusCode(401);
      }

      if ($data['id'] !== session()->get('user')->id) {
        return $this->response->setJSON(['error' => 'You can not change this user'])->setStatusCode(401);
      }

      if ((new User)->save($data)) {
        $_SESSION['user']->firstName = $data['firstName'];
        $_SESSION['user']->lastName = $data['lastName'];
        $_SESSION['user']->email = $data['email'];
        $_SESSION['user']->fullName = $data['firstName'] . ' ' . $data['lastName'];
        return $this->response->setJson(['message' => 'Os seus dados foram atualizado com sucesso'])->setStatusCode(200);
      }
      return $this->response->setJson(['error' => 'Not updated'])->setStatusCode(400);
    }
  }
}
