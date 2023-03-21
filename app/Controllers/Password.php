<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Password extends BaseController
{
  public function update()
  {
    if ($this->request->isAJAX()) {
      $data = json_decode(file_get_contents('php://input'), true);

      $validated = $this->validate([
        'password' => 'required',
        'newPassword' => 'required',
        'confirmNewPassword' => 'required|matches[newPassword]'
      ], [
        'confirmNewPassword' => [
          'matches' => 'As senhas não são iguais'
        ]
      ]);

      if (!$validated) {
        return $this->response->setJson(['validate' => $this->validator->getErrors()])->setStatusCode(401);
      }

      if ($data['id'] !== session()->get('user')->id) {
        return $this->response->setJSON(['error' => 'You can not change this user'])->setStatusCode(401);
      }

      $user = new User();
      $userFound = $user->find($data['id']);

      if (!password_verify($data['password'], $userFound->password)) {
        return $this->response->setJSON(['error' => 'Password not found'])->setStatusCode(401);
      }

      if ($user->save([
        'id' => $data['id'],
        'password' => password_hash($data['newPassword'], PASSWORD_DEFAULT)
      ])) {
        return $this->response->setJSON(['message' => 'User password updated'])->setStatusCode(200);
      }

      return $this->response->setJSON(['error' => 'Not updated'])->setStatusCode(401);
    }
  }
}
