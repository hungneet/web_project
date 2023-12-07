<?php
require_once __DIR__ . '/vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options;
$options->setChroot(__DIR__);
$options->setIsRemoteEnabled(true);
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

$dompdf = new Dompdf($options);

$dompdf->setPaper('A4', 'portrait');

$cvID = $_GET['cvID'];
// Place your folder contains these code in localhost here (ex: 'http://localhost/cvbuilder/' => $folderInLocalHost = 'http://localhost/cvbuilder/')
$folderInLocalHost = 'http://localhost/cvbuilder/';
$html = file_get_contents($folderInLocalHost . 'cv_template.php?cvID=' . $cvID . '');
$btnRemove = '/<a\b[^>]*class="btn btn-light text-dark shadow-sm mt-1 me-1"[^>]*href="indexPDF.php\?cvID=[^"]*"[^>]*id="btnDownload"[^>]*>.*?<\/a>/i';
$html = preg_replace($btnRemove, '', $html);
$dompdf->loadHtml($html);

$dompdf->render();

$dompdf->stream("personal_CV.pdf", ["Attachment" => false]);
?>