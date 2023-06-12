<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;


class PDFController extends Controller
{
    public function downloadPDF(Request $req){
        $order = $req->input('id');
        $code = $req->input('code');

        $htmlContent = view('components.struk', ['order' => $order, 'code' => $code])->render();
        $pdf = new Dompdf();
        $pdf->loadHtml($htmlContent);
        $pdf->render();
        $pdfPath = public_path('pdf/reservation_' . $order . '.pdf');
        file_put_contents($pdfPath, $pdf->output());
        return response()->download($pdfPath, 'struk.pdf');
    }
}
