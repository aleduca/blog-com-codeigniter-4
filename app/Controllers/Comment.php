<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Comment as ModelsComment;

class Comment extends BaseController
{
  public function store()
  {

    $validated = $this->validate([
      'comment' => 'required'
    ], [
      'comment' => [
        'required' => 'O comentário é obrigatório'
      ]
    ]);

    if (!$validated) {
      session()->setFlashdata('errors', $this->validator->getErrors());
      return redirect()->back();
    }

    $created = (new ModelsComment())->insert([
      'user_id' => session()->get('user')->id,
      'post_id' => $this->request->getPost('post_id'),
      'comment' => strip_tags((string)$this->request->getPost('comment'), '<p>')
    ]);

    ($created) ?
      session()->setFlashdata('created', 'Comentário cadastrado com sucesso') :
      session()->setFlashdata('not_created', 'Ocorreu um erro ao cadastrar o comentário');

    return redirect()->back();
  }
}
