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
    public function generatePDF(Request $request)
    {


        $pdf = PDF::loadView('pdf.myPDF', $response);

        return $pdf->download('itsolutionstuff.pdf');
    }
}
