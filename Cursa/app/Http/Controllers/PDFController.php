<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($response)
    {

        $separador = ",";
        $arreglo = explode($separador, $response);
   /*     dd($arreglo); */
     $data = [
        'arreglo' => $arreglo
    ];

        $pdf = PDF::loadView('pdf.myPDF', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }
}
