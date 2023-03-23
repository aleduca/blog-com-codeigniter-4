<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class Avatar extends BaseController
{
  public function update()
  {
    if ($this->request->isAJAX()) {
      $data = $this->request->getGetPost();
      $img = $this->request->getFile('file');

      if ($data['id'] !== session()->get('user')->id) {
        return $this->response->setJson(['error' => 'You can not change this data'])->setStatusCode(401);
      }

      $user = new User();
      $userFound = $user->find($data['id']);

      if ($userFound->image !== null) {
        $path = FCPATH . $userFound->image;
        if (file_exists($path)) {
          unlink($path);
        }
      }

      $imageName = uniqid() . '.' . $img->getExtension();
      $uploaded  = \Config\Services::image('gd')
        ->withFile($img)
        ->resize(640, 480, true)
        ->save('assets/avatar/' . $imageName);
    }

    if ($uploaded && $user->save([
      'id' => $data['id'],
      'image' => '/assets/avatar/' . $imageName
    ])) {
      $_SESSION['user']->avatar = '/assets/avatar/' . $imageName;
      return $this->response->setJSON(['message' => 'uploaded'])->setStatusCode(200);
    }
    return $this->response->setJSON(['error' => 'not_uploaded'])->setStatusCode(401);
  }
}
