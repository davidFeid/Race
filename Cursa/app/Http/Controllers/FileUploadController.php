<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RaceImage;

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
        /*$image->dataName().'.'.   aqui se tendra que pasar el id de la carrera*/
        $imageName = $request->id.'-'.$image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);
        RaceImage::create(['race_id'=>$request->id,'race_image'=>$imageName]);
        return response()->json(['success'=>$imageName]);
    }
}
