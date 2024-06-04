<?php namespace App\Controllers;

use App\Libraries\ExportPdf;
use CodeIgniter\Controller;

class PdfController extends Controller {

    public function generate_pdf() {
        $pdf = new \App\Libraries\ExportPdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $output = $pdf->generatePDF();

        // Définition des en-têtes pour l'affichage ou le téléchargement du PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="example.pdf"');
        header('Content-Length: '. strlen($output));
        echo $output;
    }
}
