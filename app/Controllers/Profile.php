<?php

namespace App\Controllers;

use App\Controllers\BaseController;

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
    }
  }
}
