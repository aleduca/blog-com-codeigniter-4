<?php

namespace App\Controllers;

use App\Libraries\Mail;
use App\Models\Forgot as ModelsForgot;
use App\Models\User;
use DateTime;

class Forgot extends BaseController
{
    public function index()
    {
        return view('forgot');
    }

    public function store()
    {
        $email = $this->request->getGetPost('email');

        $user = new User();
        $userFound = $user->where('email', $email)->first();

        if (!$userFound) {
            session()->setFlashdata('error', 'Não encontramos seu email');

            return redirect()->route('forgot');
        }

        $date = new DateTime();
        $date->modify('+5 minutes');

        $token = md5(uniqid());

        $forgot = new ModelsForgot();
        $forgot->save([
            'token' => $token,
            'user_id' => $userFound->id,
            'validate' => $date->format('Y-m-d H:i:s'),
        ]);

        $mail = new Mail;
        $mail->setFrom([
            'name' => 'Alexandre Cardoso',
            'email' => 'xandecar@hotmail.com',
        ]);
        $mail->setTo((string)$email);
        $mail->setSubject('Reset Password');
        $mail->setTemplate('emails/reset', [
            'name' => $userFound->firstName,
            'token' => $token,
        ]);

        ($mail->send()) ?
          session()->setFlashdata('forgot_sent', 'Enviamos por email seu link para resetar sua senha.') :
          session()->setFlashdata('forgot_not_sent', 'Ocorreu um erro ao enviar o email, tente novamente em alguns segubndos');

        return redirect()->route('forgot');
    }

    private function tokenIsValid($token)
    {
        $forgot = new ModelsForgot();
        $forgotFound = $forgot->where('token', $token)->first();

        if (!$forgotFound) {
            session()->setFlashdata('token_not_found', 'Token não existe ou não é válido');

            return false;
        }

        $expiration = new DateTime($forgotFound->validate);
        $now = new DateTime('now');

        if ($now > $expiration) {
            session()->setFlashdata('token_not_found', 'Token não existe ou não é válido');

            return false;
        }

        return $forgotFound;
    }

    public function edit($token)
    {
        if (!$token) {
            session()->setFlashdata('token_not_found', 'Token não existe ou não é válido');

            return redirect()->route('forgot');
        }

        if (!$this->tokenIsValid($token)) {
            return redirect()->route('forgot');
        }


        return view('reset', ['token' => $token]);
    }

    public function update($token)
    {
        $password = $this->request->getGetPost('password');

        $forgotFound = $this->tokenIsValid($token);

        if (!$forgotFound) {
            return redirect()->route('forgot');
        }

        $user = new User();
        $saved = $user->save([
            'id' => $forgotFound->user_id,
            'password' => password_hash((string)$password, PASSWORD_DEFAULT),
        ]);
        ($saved) ?
           session()->setFlashdata('updated', 'Password updated') :
           session()->setFlashdata('not_updated', 'Password not updated');

        return redirect()->route('forgot');
    }
}
