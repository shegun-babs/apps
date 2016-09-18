<?php
/**
 * Created by PhpStorm.
 * User: segun
 * Date: 9/11/2016
 * Time: 7:14 PM
 */

namespace App\Http\Forms;

define('UPLOAD_PATH', storage_path('uploads/contact-upload/'));

class RecipientsUploadForm extends Form
{

    protected $rules = [
        'file' => 'required|file|mimes:txt,csv',
    ];

    protected $messages = [
        'file.file' => 'The uploaded file is not a valid file',
        'file.mime' => 'Only .txt and .csv files are allowed',
    ];


    public function save()
    {
        if ($this->isValid()):
            return $this->persist();
        endif;
        return false;
    }


    public function persist()
    {
        $target = $this->uploadFile($this->request->file('file'));
        return $target->getPathname();
    }


    private function uploadFile($fileHandle)
    {
        $ext = $fileHandle->getClientOriginalExtension();
        $file = bin2hex(random_bytes(3)) . '.' . $ext;
        return $fileHandle->move(UPLOAD_PATH, $file);
    }

}