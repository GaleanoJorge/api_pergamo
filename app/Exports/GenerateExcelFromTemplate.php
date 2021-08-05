<?php


namespace App\Exports;

use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GenerateExcelFromTemplate
{
    public static function run($templateName, $output, $params, $outfilename="", $callbacks = [], $is_pdf = false, $events = [])
    {
        $tname=time();
        $filename = ($outfilename!="") ? $outfilename.'_' . $tname  . '.xlsx' :'reporte_' . $tname  . '.xlsx';
        $out = storage_path('app/public/' . $output . '/' . $filename);
        PhpExcelTemplator::saveToFile(
            storage_path('app/public/templates/' . $templateName),
            $out,
            $params,
            $callbacks, $events);

            if($is_pdf){
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($out);
                //$spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                //$spreadsheet->getActiveSheet()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
                $spreadsheet->getActiveSheet()->getPageSetup()->setFitToWidth(1);
                $spreadsheet->getActiveSheet()->getPageSetup()->setFitToHeight(0);
                //$worksheet = $spreadsheet->getActiveSheet();
                /*$worksheet->getCell('A1')->setValue('John');
                $worksheet->getCell('A2')->setValue('Smith');*/
                $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Dompdf');
                $filename = ($outfilename!="") ? $outfilename.'_' . $tname  . '.pdf' :'reporte_' . $tname  . '.pdf';
                $out = storage_path('app/public/' . $output . '/' . $filename);
                //$writer->setPaper('a4', 'landscape')->setWarnings(false)->save($out);
                //$writer->setOptions(['dpi' => 120 ]);
                $writer->save($out);
            }

        return asset('/storage/' . $output . '/' . $filename);
    }

    /**
     * Generador de reporte excel desde una plantilla generica
     *
     * @param string $templateName
     * @param string $output
     * @param array $params
     * @param string $outfilename
     * @param array $callbacks
     * @param boolean $is_pdf
     * @param array $events
     * @param array $colors
     * @return string
     */
    public static function runDefault(
        string $templateName, 
        string $output, 
        array $params, 
        string $outfilename="", 
        array $callbacks = [], 
        $is_pdf = false, 
        array $events = [], 
        array $colors = []
    ) : string {
        $tname=time();
        $filename = ($outfilename!="") ? $outfilename.'_' . $tname  . '.xlsx' : 'reporte_' . $tname  . '.xlsx';
        $out = storage_path('app/public/' . $output . '/' . $filename);
        if(count($events) == 0){
            $events = [
                PhpExcelTemplator::AFTER_INSERT_PARAMS => function (Worksheet $sheet, array $templateVarsArr) use ($colors) {
    
                    $sheet->mergeCells('A3:D3');
                    $sheet->mergeCells('A1:D2');
                    $sheet->mergeCells('A4:'.preg_replace('/[0-9]+/', '', $sheet->getActiveCell()).'4');
                    $sheet->mergeCells('A5:'.preg_replace('/[0-9]+/', '', $sheet->getActiveCell()).'5');
                    $mayusculas = array('C','D','E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
                                        'AA','AB','AC','AD','AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');
                    $sheet->getColumnDimension('A')->setWidth(30);
                    $sheet->getColumnDimension('B')->setWidth(30);
                    foreach ($mayusculas as $key => $coor) {
                        $sheet->getColumnDimension($coor)->setAutoSize(true);
                        if($coor == preg_replace('/[0-9]+/', '', $sheet->getActiveCell())){
                            break;
                        }
                    }
                    if(count($colors) > 0){
                        $sheet->getStyle('A4')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB($colors['primary']);
                        $sheet->getStyle('A5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB($colors['secondary']);
                    }
                },
            ];
        }

        PhpExcelTemplator::saveToFile(
            storage_path('app/public/templates/' . $templateName),
            $out,
            $params,
            $callbacks,
            $events
        );

        if ($is_pdf) {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($out);
            //$spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            //$spreadsheet->getActiveSheet()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
            $spreadsheet->getActiveSheet()->getPageSetup()->setFitToWidth(1);
            $spreadsheet->getActiveSheet()->getPageSetup()->setFitToHeight(0);
            //$worksheet = $spreadsheet->getActiveSheet();
            /*$worksheet->getCell('A1')->setValue('John');
                $worksheet->getCell('A2')->setValue('Smith');*/
            $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Dompdf');
            $filename = ($outfilename != "") ? $outfilename . '_' . $tname  . '.pdf' : 'reporte_' . $tname  . '.pdf';
            $out = storage_path('app/public/' . $output . '/' . $filename);
            //$writer->setPaper('a4', 'landscape')->setWarnings(false)->save($out);
            //$writer->setOptions(['dpi' => 120 ]);
            $writer->save($out);
        }

        return asset('/storage/' . $output . '/' . $filename);
    }
}
