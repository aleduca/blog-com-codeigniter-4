<?php

namespace App\Libraries;

use CodeIgniter\Email\Email;
use Exception;

class Mail
{
    private Email $email;
    private ?string $template = null;

    public function __construct()
    {
        $this->initialize();
    }

    private function initialize()
    {
        $this->email = \Config\Services::email();

        $this->email->initialize(
            [
                'protocol' => 'smtp',
                'SMTPHost' => $_ENV['EMAIL_HOST'],
                'SMTPUser' => $_ENV['EMAIL_USER'],
                'SMTPPass' => $_ENV['EMAIL_PASS'],
                'SMTPPort' => $_ENV['EMAIL_PORT'],
                'wordWrap' => true,
                'mailType' => 'html',
                'charset' => 'utf-8',
            ]
        );
    }

    public function setFrom(array $from)
    {
        $this->email->setFrom($from['email'], $from['name']);
    }

    public function setTo(string $to)
    {
        $this->email->setTo($to);
    }

    public function setSubject(string $subject)
    {
        $this->email->setSubject($subject);
    }

    public function setTemplate(string $template, array $data)
    {
        $this->template = view($template, $data);
        $this->email->setMessage($this->template);
    }

    public function setMessage(string $message)
    {
        if (!$this->template) {
            throw new Exception('You already selected a template to send email');
        }
        $this->email->setMessage($message);
    }

    public function send()
    {
        return $this->email->send();
    }
}
