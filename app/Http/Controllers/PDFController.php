<?php

namespace App\Http\Controllers;
use PDF;

class PDFController extends Controller
{
    //
    public function viewPdf()
    {
        $data['name'] = 'zamzam';

        $pdf = PDF::loadView('document', $data); //PDF -> go to function loadview / pfpdf.document -> view , بتاالي تتحول هذه الصفحة إلى فيو

        return $pdf->stream('document.pdf');
    }
}
