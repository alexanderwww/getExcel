<?php
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

// Border 
use PhpOffice\PhpSpreadsheet\Style\Border;
// Color 
use PhpOffice\PhpSpreadsheet\Style\Fill;
// Alignment 
use PhpOffice\PhpSpreadsheet\Style\Alignment;


$spreadsheet= new Spreadsheet();
$spreadsheet->getProperties()->setCreator('Alexander')->setTitle('TitleFile');
$spreadsheet->setActiveSheetIndex(0);
$hojaActiva=$spreadsheet->getActiveSheet();

// -------------------------- Style
$styleBordersArray = [
    'borders' => [
        'outline' => [
            'borderStyle' => Border::BORDER_MEDIUM,
            'color' => ['argb' => '000000'],
        ],
    ],
];

$styleFontArray=[
    'name' => 'Arial',
    'bold' => TRUE,
    'size'=>15,
    'italic' => FALSE,
    'underline' => \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_DOUBLE,
    'strikethrough' => FALSE,
    'color' => [
        'rgb' => 'FFFFFF'
    ]
];


$styleAlingArray=[
    'horizontal'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    'vertical'     => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    'textRotation' => 0,
    'wrapText'     => TRUE
];



// ----------------------- Title

$hojaActiva->mergeCells('A1:D1');
$hojaActiva->getRowDimension('1')->setRowHeight(40);
$hojaActiva->getStyle("A1")->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('000000');
$hojaActiva->setCellValue('A1','TituloNuevo');


$hojaActiva->getStyle('A1:D1')->applyFromArray($styleBordersArray);
	
$hojaActiva->getStyle('A1')->getFont()->applyFromArray($styleFontArray);

$hojaActiva->getStyle('A1')->getAlignment()->applyFromArray($styleAlingArray);


// ----------------------------- Rows

$hojaActiva->setCellValue('B2','text');

// ----------------------------- Procesamiento


// redirect output to client browser
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="fileExcel.xlsx"');
header('Cache-Control: max-age=0');



$writer =IOFactory::createWriter($spreadsheet, 'Xlsx');

$writer->save('php://output');



?>