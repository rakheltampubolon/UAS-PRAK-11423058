<?php 

namespace App\Services;

use Str;

class UploadService
{
	public function fileUpload($path)
	{
		$file = request()->file('file');
        $filename = date('dmy').' '.time().' '.$file->getClientOriginalName();
		$file->move(public_path('uploads/file/'.$path),$filename);

		return $filename;
	}
}
