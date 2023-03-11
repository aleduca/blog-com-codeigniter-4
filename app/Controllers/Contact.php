<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Contact extends BaseController
{
  public function index()
  {
    return view('contact');
  }

  public function store()
  {

    $validated = $this->validate([
      'name' => 'required',
      'email' => 'required|valid_email',
      'subject' => 'required',
      'message' => 'required',
    ]);

    if (!$validated) {
      session()->setFlashdata('error', $this->validator->getErrors());
      return redirect()->route('contact');
    }

    $config = [
      'protocol' => 'smtp',
      'SMTPHost' => $_ENV['EMAIL_HOST'],
      'SMTPUser' => $_ENV['EMAIL_USER'],
      'SMTPPass' => $_ENV['EMAIL_PASS'],
      'SMTPPort' => $_ENV['EMAIL_PORT'],
      'wordWrap' => true,
      'mailType' => 'html',
      'charset' => 'utf-8'
    ];

    $email = \Config\Services::email();

    $email->initialize($config);

    $email->setFrom($this->request->getPost('email'), $this->request->getPost('name'));
    $email->setTo($_ENV['EMAIL_TO']);

    $template = view('emails/contact', [
      'name' => 'Alexandre Cardoso',
      'from' => $this->request->getPost('email'),
      'message' => strip_tags((string)$this->request->getPost('message'))
    ]);

    $email->setSubject($this->request->getPost('subject'));
    $email->setMessage($template);

    ($email->send()) ?
      session()->setFlashdata('contact_sent', 'Email enviado com sucesso, responderemos em no máximo 24 horas.') :
      session()->setFlashdata('contact_not_sent', 'Ocorreu um erro ao enviar o email, tente novamente em alguns segubndos');

    return redirect()->route('contact');
  }
}
