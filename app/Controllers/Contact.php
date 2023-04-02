<?php

namespace App\Controllers;

use App\Libraries\Mail;

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

        $mail = new Mail;
        $mail->setFrom([
            'email' => $this->request->getPost('email'),
            'name' => $this->request->getPost('name'),
        ]);
        $mail->setTo($_ENV['EMAIL_TO']);
        $mail->setSubject((string)$this->request->getPost('subject'));
        $mail->setTemplate('emails/contact', [
            'name' => 'Alexandre Cardoso',
            'from' => $this->request->getPost('email'),
            'message' => strip_tags((string)$this->request->getPost('message')),
        ]);

        ($mail->send()) ?
          session()->setFlashdata('contact_sent', 'Email enviado com sucesso, responderemos em no máximo 24 horas.') :
          session()->setFlashdata('contact_not_sent', 'Ocorreu um erro ao enviar o email, tente novamente em alguns segubndos');

        return redirect()->route('contact');
    }
}
