<?php

// require_once __DIR__ . '/vendor/autoload.php';

// $mpdf = new \Mpdf\Mpdf();
// $a = file_get_contents('http://localhost/testPDF/cv_template.php?cvID=2');
// $mpdf->SetDisplayMode('fullpage');
// $mpdf->render();
// $mpdf->WriteHTML($a);
// $mpdf->Output();

require_once __DIR__ . '/vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

$dompdf = new Dompdf($options);

$dompdf->setPaper('A3', 'portrait');

$cvID = $_GET['cvID'];
$html = file_get_contents('http://localhost/cv_template.php?cvID=' . $cvID . '');
$btnRemove = '/<a\b[^>]*class="btn btn-light text-dark shadow-sm mt-1 me-1"[^>]*href="indexPDF.php\?cvID=[^"]*"[^>]*id="btnDownload"[^>]*>.*?<\/a>/i';
$html = preg_replace($btnRemove, '', $html);
$dompdf->loadHtml($html);

$dompdf->render();

$dompdf->stream("test.pdf", ["Attachment" => false]);


// require 'tcpdf/TCPDF-main/tcpdf.php';
// $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

// $pdf->setTitle('Resume Builder');
// $pdf->addPage(); 
// $html = file_get_contents('http://localhost/cv_template.php?cvID=1');
// $pdf->writeHTML($html);
// $pdf->Output('example_001.pdf', 'I');
?>