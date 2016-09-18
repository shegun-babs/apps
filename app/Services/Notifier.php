<?php
namespace App\Services;

use Illuminate\Http\Request;

class Notifier {


    /**
     * @var Request
     */
    private $request;

    public function __construct(Request $request)
    {

        $this->request = $request;
    }



    public function info($message, $type='notification')
    {
        $this->flash($message, $type, 'info');
        return $this;
    }


    public function message($message)
    {
        $this->flash($message, 'message');
        return $this;
    }


    public function success($message)
    {
        $this->flash($message, 'success');
        return $this;
    }


    public function error($message)
    {
        $this->flash($message, 'error');
        return $this;
    }


    public function flash($message, $level = 'notification')
    {
        $this->request->session()->flash('flash.message', $message);
        //$this->request->session()->flash('flash.header', $header);
        $this->request->session()->flash('flash.level', $level);
    }

} 