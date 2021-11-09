<?php
//include("session.php");
include 'database.php';
require('tfpdf/tfpdf.php');

$p = $_GET['p'];
$m = $_GET['m'];
$n = $_GET['n'];
$c = $_GET['c'];

$cina = ["0", "10", "10", "10", "15", "20", "25", "45"];
$taryf = ["0", "8,50-Б", "8,50-Б", "7,50-Б", "12,50-Б", "17,50-Б", "21,50-Б", "38,50-Б"];
$cp = ["0", "1,39-В", "1,39-В", "1,39-В", "2,31-В", "2,24-В", "3,16-В", "5,94-В"];
$cz = ["0", "0,11-В", "0,11-В", "0,11-В", "0,19-В", "0,26-В", "0,34-В", "0,56-В"];

$DB = new DB();

$marshrut = $DB->select(
    "SELECT * FROM `crud` WHERE `name` LIKE ?",
    ["%{$m}%"]
);

$nom = 1;


$marsh = mb_strtoupper($marshrut[0]['rout']);

$taryf = $taryf[$m];
$cp = $cp[$m];
$cz = $cz[$m];
$cina = $cina[$m] . "10.00";

date_default_timezone_set('Europe/Kiev');
$date = date('d-m-Y H:i:s');

$pdf = new tFPDF();

$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);
$pdf->AddPage();
$pdf->SetMargins(10, 1, 20);
$pdf->SetFont('DejaVu','',25);
$pdf->Cell(0,10,'',0,1,'C');
$pdf->Cell(0,10,"ТзОВ \"Гранд вокзал\"",0,1,'C');
$pdf->Cell(0,10,"каса автобусна №1",0,1,'C');
$pdf->Cell(0,10,"м. Надвірна",0,1,'C');
$pdf->Cell(0,10,"вул. К. Ольги, 1",0,1,'C');
$pdf->Cell(0,10,'',0,1,'C');
$pdf->Cell(135,10,"ФН 3000915934",0,0);
$pdf->Cell(45,10,"ІД 44111689",0,0);
$pdf->Cell(0,10,'',0,1,'C');
$pdf->Cell(119,10,"ЗН ЗМ1001049206",0,0);
$pdf->Cell(45,10,"ПН",0,1,'C');
$pdf->Cell(0,10,'',0,1,'C');
$pdf->Cell(0,15,"ЧEK - ".$nom,0,1,'C');
$pdf->Cell(0,10,'',0,1,'C');
$pdf->Cell(0,10,$date,0,1,'C');
$pdf->Cell(0,10,'',0,1,'C');
$pdf->Cell(0,10,"Касир : 1",0,1,'C');
$pdf->Cell(0,10,"Відд.2",0,1,'C');
$pdf->Cell(110,10,"Обов'язкове страхування:",0,1,'C');
$pdf->Cell(100,10,"102000грн.патСКкраїна",0,1,'C');
$pdf->Cell(105,10,"Київ_вул.Електриків_29а",0,1,'C');
$pdf->Cell(45,10,"332280450",0,1,'C');
$pdf->Cell(120,20,"<"."Надвірна". " - " . $c .">",0,1,'C');
$pdf->Cell(0,20,"Місце",0,1,'C');
$pdf->SetFont('DejaVu','',35);
$pdf->Cell(0,15,"HAДBIPHA",0,1,'C');
$pdf->Cell(0,15, mb_strtoupper($c),0,1,'C');
$pdf->Cell(170,10,"Відправлення:",0,'C');
$pdf->SetFont('DejaVu','',25);
$pdf->Cell(150,10,"Тариф",0,0);
$pdf->Cell(48,10,$taryf,0,1,'C');
$pdf->Cell(151,10,"Станц. послуг",0,0);
$pdf->Cell(48,10,$cp,0,1,'C');
$pdf->Cell(151,10,"Страх. збір",0,0);
$pdf->Cell(48,10,$cz,0,1,'C');
$pdf->SetFont('DejaVu','',45);
$pdf->Cell(150,15,"CУMA:",0,0);
$pdf->Cell(38,15,$cina,0,1,'C');
$pdf->Cell(0,10,'',0,1,'C');
$pdf->SetFont('DejaVu','',20);
$pdf->Cell(0,10,"WWW.KASA.BUS.COM.UA",0,1,'C');
$pdf->Cell(0,10,"ЕЛЕКТРОННИЙ ВАУЧЕР",0,1,'C');

//$pdf->output('I','Kvytok-'. $n . '.pdf');
$pdf->output();
