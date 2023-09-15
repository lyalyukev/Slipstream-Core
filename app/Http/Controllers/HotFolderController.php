<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class HotFolderController extends Controller
{
    public function checkFolder()
    {
        $files = Storage::allFiles('public/hotfolder') ;

        $fileDetails = [];
        foreach ($files as $key => $file) {
            $pathInfo = pathinfo($file);

            $fileDetails[$key]['filename']= $pathInfo['filename'];
            $fileDetails[$key]['extension']= $pathInfo['extension'];
            $fileDetails[$key]['mimetype']= Storage::mimeType($file);
            $fileDetails[$key]['supported']= in_array(Storage::mimeType($file), config('slipstream.supported_mimetypes'));
        }


//        $fileDetails = collect($files)->map(function ($filePath) {
//            $pathInfo = pathinfo($filePath);
//            return [
//                'filename' => $pathInfo['filename'],
//                'extension' => $pathInfo['extension']
//            ];
//        });

        return inertia('Hotfolder', ['files' => $fileDetails]) ;
    }

    public function destroyFile(Request $request)
    {

            $file = $request->input('deleteItem');
            $filename = $file['filename'].'.'.$file['extension'];
            $exists = Storage::disk('hotfolder')->exists($filename);
            Storage::disk('hotfolder')->delete($filename);
            return back();
    }
}
