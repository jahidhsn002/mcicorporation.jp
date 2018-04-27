<?php

namespace App\Http\Controllers\Core;

use Illuminate\Http\Request;

use Validator;
use Carbon\Carbon;

class Upload
{
    public function handle(Request $req)
    {

        // Validate Image
        $role = ['files.*' => 'required|image'];
        Validator::make($req->all(), $role)->validate();

        $file_urls = [];
        $files = $req->file('files');

        if(is_array($files)):
            foreach ($files as $file) {
                $file_urls[] = $this->upload($file);
            }
        endif;

        return response($file_urls, 200);
    }

    public function upload($file)
    {

        $Time = Carbon::now();
        $file_name = $Time->timestamp . mt_rand(00000, 99999) . '.' . $file->extension();

        // Upload Path
        $path = '/uploads/'.$Time->year.'/'.$Time->month.'/'.$Time->day.'/';
        $file->move(public_path() . $path, $file_name );
        return $path . $file_name;
    }

}
