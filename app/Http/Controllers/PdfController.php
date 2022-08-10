<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function index()
    {
        return view('pdf.index');
    }

    public function create()
    {   
        $pdf = PDF::loadView('pdf.index');
        return $pdf->download('testing_data.pdf');
    }
}
