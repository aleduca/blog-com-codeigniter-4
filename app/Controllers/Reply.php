<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Reply as ModelsReply;

class Reply extends BaseController
{
  public function store()
  {
    if ($this->request->isAJAX()) {
      $data = json_decode(file_get_contents('php://input'));
      $replied = (new ModelsReply())->insert([
        'comment_id' => $data->commentId,
        'user_id' => session()->get('user')->id,
        'comment' => strip_tags($data->reply)
      ]);

      return ($replied) ?
        $this->response->setJson(['message' => 'replied'])->setStatusCode(200) :
        $this->response->setJson(['message' => 'not replied'])->setStatusCode(400);
    }
  }
}
