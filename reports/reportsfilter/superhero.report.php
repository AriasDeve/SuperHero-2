<?php

require_once '../../vendor/autoload.php';
require_once '../../models/SuperHerofilter.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {

    //Instanciar la clase superhero
    $superhero = new SuperHerofilter();
    $datos = $superhero->listarSuperHerofilter($_GET['race_id'],$_GET['gender_id'],$_GET['alignment_id']);
    $race = $_GET['race'];
    $gender = $_GET['gender'];
    $alignment = $_GET['alignment'];
    
    ob_start();
    //Archivos que componen los pdf
    //hoja de estilos
    include './estilos.report.html';
    //archivos con datos  (estaticos/dinamicoa)
    include './superhero.data.php';

    $content = ob_get_clean();

    $html2pdf = new Html2Pdf('P', 'A4', 'es');
    $html2pdf->writeHTML($content);
    $html2pdf->output('SuperHeroFilterPlus.pdf');
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}