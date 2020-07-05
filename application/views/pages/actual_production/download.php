
<?php

        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Actual Production');

        // design
        $this->excel->getActiveSheet()->getStyle("A6:AS1000")->applyFromArray(
            array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN, PHPExcel_Style_Alignment::VERTICAL_CENTER,

                    )
                )
            )
        );

        $styleAja = array (
                        'alignment' => array('horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
            );

        // title
            // Company Name
            $this->excel->getActiveSheet()->setCellValue('A1', 'PT DAE BAEK');
            $this->excel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
            $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(26);
            $this->excel->getActiveSheet()->getStyle('A1:AS7')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

             // Judul
            $this->excel->getActiveSheet()->setCellValue('A2','ACTUAL PRODUCTION');
            $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
            $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

            // Date
            $this->excel->getActiveSheet()->setCellValue('A3', $start_date." to ". $end_date);
            $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(16);
            $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        // header
            $this->excel->getActiveSheet()->setCellValue('A6', 'No');
            $this->excel->getActiveSheet()->mergeCells('A6:A7');
             $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $this->excel->getActiveSheet()->setCellValue('B6', 'MC No');
            $this->excel->getActiveSheet()->mergeCells('B6:B7');
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(13);
            $this->excel->getActiveSheet()->setCellValue('C6', 'MC Name');
            $this->excel->getActiveSheet()->mergeCells('C6:C7');
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
            $this->excel->getActiveSheet()->setCellValue('D6', 'Date');
            $this->excel->getActiveSheet()->mergeCells('D6:D7');
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(13);

            // Model Information'
            $this->excel->getActiveSheet()->setCellValue('E6', 'Model Information');
            $this->excel->getActiveSheet()->mergeCells('E6:H6');
            $this->excel->getActiveSheet()->setCellValue('E7', 'Part Number');
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);            
            $this->excel->getActiveSheet()->setCellValue('F7', 'Model');
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
            $this->excel->getActiveSheet()->setCellValue('G7', 'Description');
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
            $this->excel->getActiveSheet()->setCellValue('H7', 'Capa/hour');
            $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
            $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
            $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
            $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
            $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
            $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(10);

            // Actual Production
            $this->excel->getActiveSheet()->setCellValue('I6', 'Actual Production');
            $this->excel->getActiveSheet()->mergeCells('I6:T6');
            $this->excel->getActiveSheet()->setCellValue('I7','Plan Qty');
            $this->excel->getActiveSheet()->setCellValue('J7','Actual Qty');
            $this->excel->getActiveSheet()->setCellValue('K7','Balance');
            $this->excel->getActiveSheet()->setCellValue('L7','Prod. %');
            $this->excel->getActiveSheet()->setCellValue('M7','NG Qty');
            $this->excel->getActiveSheet()->setCellValue('N7','Start');
            $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
            $this->excel->getActiveSheet()->setCellValue('O7','End');
            $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
            $this->excel->getActiveSheet()->setCellValue('P7','Work Time');
            $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
            $this->excel->getActiveSheet()->setCellValue('Q7','Loss Time');
            $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
            $this->excel->getActiveSheet()->setCellValue('R7','Operation %');
            $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(12);
            $this->excel->getActiveSheet()->setCellValue('S7','Shift');
            $this->excel->getActiveSheet()->setCellValue('T7','Worker');

            // Prod Qty
            $this->excel->getActiveSheet()->setCellValue('U6', 'Prod Qty');
            $this->excel->getActiveSheet()->mergeCells('U6:U7');

            // Result NG
            $this->excel->getActiveSheet()->setCellValue('V6', 'Result NG');
            $this->excel->getActiveSheet()->mergeCells('V6:AK6');
            $this->excel->getActiveSheet()->setCellValue('V7','1');
            $this->excel->getActiveSheet()->setCellValue('W7','2');
            $this->excel->getActiveSheet()->setCellValue('X7','3');
            $this->excel->getActiveSheet()->setCellValue('Y7','4');
            $this->excel->getActiveSheet()->setCellValue('Z7','5');
            $this->excel->getActiveSheet()->setCellValue('AA7','6');
            $this->excel->getActiveSheet()->setCellValue('AB7','7');
            $this->excel->getActiveSheet()->setCellValue('AC7','8');
            $this->excel->getActiveSheet()->setCellValue('AD7','9');
            $this->excel->getActiveSheet()->setCellValue('AE7','10');
            $this->excel->getActiveSheet()->setCellValue('AF7','11');
            $this->excel->getActiveSheet()->setCellValue('AG7','12');
            $this->excel->getActiveSheet()->setCellValue('AH7','13');
            $this->excel->getActiveSheet()->setCellValue('AI7','14');
            $this->excel->getActiveSheet()->setCellValue('AJ7','15');
            $this->excel->getActiveSheet()->setCellValue('AK7','16');


            // Lost Time
            $this->excel->getActiveSheet()->setCellValue('AL6', 'Lost Time');
            $this->excel->getActiveSheet()->mergeCells('AL6:AS6');
            $this->excel->getActiveSheet()->setCellValue('AL7','1');
            $this->excel->getActiveSheet()->setCellValue('AM7','2');
            $this->excel->getActiveSheet()->setCellValue('AN7','3');
            $this->excel->getActiveSheet()->setCellValue('AO7','4');
            $this->excel->getActiveSheet()->setCellValue('AP7','5');
            $this->excel->getActiveSheet()->setCellValue('AQ7','6');
            $this->excel->getActiveSheet()->setCellValue('AR7','7');
            $this->excel->getActiveSheet()->setCellValue('AS7','8');

            // DATA
        $i = 1;
        $rowStart = 8;

        foreach ($data as $key) {
            $id = "'".$key['id']."'";
            $this->excel->getActiveSheet()->setCellValue('A'.$rowStart, $i);
            $this->excel->getActiveSheet()->setCellValue('B'.$rowStart, $key['mcNo']);
            $this->excel->getActiveSheet()->setCellValue('C'.$rowStart, $key['mcName']);
            $this->excel->getActiveSheet()->setCellValue('D'.$rowStart, $key['date']);
            $this->excel->getActiveSheet()->setCellValue('E'.$rowStart, $key['production_part_no']);
            $this->excel->getActiveSheet()->setCellValue('F'.$rowStart, $key['model']);
            $this->excel->getActiveSheet()->setCellValue('G'.$rowStart, $key['description']);
            $this->excel->getActiveSheet()->setCellValue('H'.$rowStart, $key['capaHour']);
            $this->excel->getActiveSheet()->setCellValue('I'.$rowStart, $key['planQty']);
            $this->excel->getActiveSheet()->setCellValue('J'.$rowStart, (rupiah0dec($key['actual']-$key['ng'])));
            $this->excel->getActiveSheet()->setCellValue('K'.$rowStart, (rupiah0dec($key['actual']-$key['ng']-$key['planQty'])));
            $this->excel->getActiveSheet()->setCellValue('L'.$rowStart, (rupiah2dec((($key['actual']-$key['ng'])/$key['planQty'])*100)));
            $this->excel->getActiveSheet()->setCellValue('M'.$rowStart, ($key['ng'] == '') ? rupiah0dec(0) : rupiah0dec($key['ng']));
            $this->excel->getActiveSheet()->setCellValue('N'.$rowStart, $key['start']);
            $this->excel->getActiveSheet()->setCellValue('O'.$rowStart, ($key['finish'] == '00/00/00 00:00') ? '-' : $key['finish']);
            $this->excel->getActiveSheet()->setCellValue('P'.$rowStart, ($key['working_time'] == 0) ? '' : sprintf("%02d",floor($key['working_time'] / 3600)) . ':' . sprintf("%02d",floor($key['working_time'] / 60 % 60)) . ':' . sprintf("%02d",floor($key['working_time'] % 60)));
            $this->excel->getActiveSheet()->setCellValue('Q'.$rowStart, ($key['losstime'] == 0) ? '' : sprintf("%02d",floor($key['losstime'] / 3600)) . ':' . sprintf("%02d",floor($key['losstime'] / 60 % 60)) . ':' . sprintf("%02d",floor($key['losstime'] % 60)));
            $this->excel->getActiveSheet()->setCellValue('R'.$rowStart, ($key['status_close'] == 1 && $key['working_time'] > 0 || $key['status_close'] == 2 && $key['working_time'] > 0) ? (number_format((float)(($key['working_time']/($key['working_time']+$key['losstime']))*100), 2, '.', ''))  : '0' );//Opeation %
            $this->excel->getActiveSheet()->setCellValue('S'.$rowStart, $key['-']);//Sift
            $this->excel->getActiveSheet()->setCellValue('T'.$rowStart, $key['-']);//Worker

            
            $this->excel->getActiveSheet()->setCellValue('U'.$rowStart, (rupiah0dec($key['actual']-$key['ng']))); //Prod Qty (diambil dari data aktual)

            $this->excel->getActiveSheet()->setCellValue('V'.$rowStart, $key['idNg1']);//Rng
            $this->excel->getActiveSheet()->setCellValue('W'.$rowStart, $key['idNg2']);//Rng
            $this->excel->getActiveSheet()->setCellValue('X'.$rowStart, $key['']);//Rng
            $this->excel->getActiveSheet()->setCellValue('Y'.$rowStart, $key['']);//Rng
            $this->excel->getActiveSheet()->setCellValue('Z'.$rowStart, $key['']);//Rng
            $this->excel->getActiveSheet()->setCellValue('AA'.$rowStart, $key['']);//Rng
            $this->excel->getActiveSheet()->setCellValue('AB'.$rowStart, $key['']);//Rng
            $this->excel->getActiveSheet()->setCellValue('AC'.$rowStart, $key['']);//Rng
            $this->excel->getActiveSheet()->setCellValue('AD'.$rowStart, $key['']);//Rng
            $this->excel->getActiveSheet()->setCellValue('AE'.$rowStart, $key['']);//Rng
            $this->excel->getActiveSheet()->setCellValue('AF'.$rowStart, $key['']);//Rng
            $this->excel->getActiveSheet()->setCellValue('AG'.$rowStart, $key['']);//Rng
            $this->excel->getActiveSheet()->setCellValue('AH'.$rowStart, $key['']);//Rng
            $this->excel->getActiveSheet()->setCellValue('AI'.$rowStart, $key['']);//Rng
            $this->excel->getActiveSheet()->setCellValue('AJ'.$rowStart, $key['']);//Rng
            $this->excel->getActiveSheet()->setCellValue('AK'.$rowStart, $key['']);//Rng

            $this->excel->getActiveSheet()->setCellValue('AL'.$rowStart, $key['']);//losstime
            $this->excel->getActiveSheet()->setCellValue('AM'.$rowStart, $key['']);//losstime
            $this->excel->getActiveSheet()->setCellValue('AN'.$rowStart, $key['']);//losstime
            $this->excel->getActiveSheet()->setCellValue('AO'.$rowStart, $key['']);//losstime
            $this->excel->getActiveSheet()->setCellValue('AP'.$rowStart, $key['']);//losstime
            $this->excel->getActiveSheet()->setCellValue('AQ'.$rowStart, $key['']);//losstime
            $this->excel->getActiveSheet()->setCellValue('AR'.$rowStart, $key['']);//losstime
            $this->excel->getActiveSheet()->setCellValue('AS'.$rowStart, $key['']);//losstime
            $rowStart++;
            $i++;
        }

        $this->excel->getActiveSheet()->getStyle("A6:AS1000")->applyFromArray(
            array(
                'alignment' => array('horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
            )
        );

        $filename= 'Smart Andon Daebaek - '.date('Ymdhis').'.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //force user to download the Excel file without writing it to server's HD
        ob_end_clean();
        $objWriter->save('php://output');


    function rupiah2dec($total) {
        if ($total == 0) {
            return "0";
        }else{
            return number_format($total,2,',',',');
        }
    }

    function rupiah0dec($total) {
        if ($total == 0) {
            return "0";
        }else{
            return number_format($total,0,',',',');
        }
    } 
?>