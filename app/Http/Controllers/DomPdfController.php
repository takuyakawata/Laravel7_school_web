<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DomPDF;

class DomPdfController extends Controller
{
    // //
    // public function output() {
    //     $sushiTable = [
    //         'たまご' => '100円',
    //         'いくら' => '200円',
    //         'サーモン' => '180円',
    //         'いか' => '100円',
    //         'マグロ' => '110円',
    //         'えび' => '100円',
    //     ];
        
    //     $pdf = DomPDF::('dompdf.output', ['sushiTable' => $sushiTable]);
    //     $pdf->setPaper('A4');
    //     return $pdf->stream();
    // }
}
