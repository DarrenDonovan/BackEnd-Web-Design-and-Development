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
        $rng = mt_rand(0, 999999);
        $pdfPath = public_path('pdf/' . $rng . $order . '.pdf');
        file_put_contents($pdfPath, $pdf->output());
        // Get the file contents
        $fileContents = file_get_contents($pdfPath);

        // Set the appropriate headers for the response
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename=struk.pdf',
        ];

        // Return the file as a response
        return response($fileContents, 200, $headers);
    }
}
