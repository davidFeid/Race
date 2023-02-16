<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
     /**
     * Generate Upload View
     *
     * @return void
    */
    public  function dropzoneUi()
    {
        return view('upload.dropzone-file-upload');
    }
    /**
     * File Upload Method
     *
     * @return void
     */
    public  function dropzoneFileUpload(Request $request)
    {
        $image = $request->file('file');
        echo ($image);
        /*$image->dataName().'.'.   aqui se tendra que pasar el id de la carrera*/
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);
        return response()->json(['success'=>$imageName]);
    }
}
