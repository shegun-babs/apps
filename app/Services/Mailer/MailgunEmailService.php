<?php
/**
 * Created by PhpStorm.
 * User: segun
 * Date: 9/17/2016
 * Time: 8:06 PM
 */

namespace App\Services\Mailer;

use App\Contracts\Mailer;


/**
 * $mailer->domain($domain)
 * ->to("Andrew Allen <allen@andrew.com>")
 * ->from("sales@jabisodagencies.com", "subject of the email")
 * ->view('mailer', ['email'=>, 'blah'=>$blah])
 * ->oTag('jabisod','sales','wallpaper')
 * ->send()
 *
 */
class MailgunEmailService implements Mailer
{
    protected $domain;
    protected $from;
    protected $to;
    protected $text;
    protected $view;
    protected $subject;
    protected $oTag;
    protected $html;
    protected $bcc;
    private $client;


    /**
     * MailgunEmailService constructor.
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }


    public function domain($domain)
    {
        $this->domain = $domain;
        return $this;
    }


    public function from($email, $subject)
    {

        $this->from = $email;
        $this->subject = $subject;
        return $this;
    }


    public function to($email)
    {
        $this->to = $email;
        return $this;
    }

    public function bcc($email)
    {
        $this->bcc = $email;
        return $this;
    }


    public function view($view, $data = [])
    {
        $this->view = view($view, $data)->render();
        return $this;
    }


    public function oTag($tag1, $tag2 = null, $tag3 = null)
    {
        if ($tag1 && count($this->oTag) < 3)
            $this->oTag[] = $tag1;
        if ($tag2 && count($this->oTag) < 3)
            $this->oTag[] = $tag2;
        if ($tag3 && count($this->oTag) < 3)
            $this->oTag[] = $tag3;
        return $this;
    }


    public function text($text)
    {
        $this->text = $text;
        return $this;
    }


    public function send()
    {
        return $this->client->sendMessage($this->domain, $this->prepare());
    }


    private function prepare()
    {
        if (!$this->to)
            throw new \Exception("To address is required");
        if (!$this->from || !$this->subject):
            throw new \Exception("The From and Subject variables are required.");
        endif;

        $var = [
            'from' => $this->from,
            'to' => $this->to,
            'subject' => $this->subject,
        ];

        if ($this->text)
            $var['text'] = $this->text;

        if ($this->view)
            $var['html'] = $this->view;

        if ($this->oTag && count($this->oTag) < 3)
            $var['o:tag'] = $this->oTag;

        if ($this->bcc)
            $var['bcc'] = $this->bcc;

            return $var;
    }
}