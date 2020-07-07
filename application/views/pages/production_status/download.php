
<?php

        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Production Status');

        // design
        $this->excel->getActiveSheet()->getStyle("A6:AM1000")->applyFromArray(
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
            $this->excel->getActiveSheet()->setCellValue('A2','PRODUCTION STATUS');
            $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
            $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

            // Date
            $this->excel->getActiveSheet()->setCellValue('A3', $start_date." to ". $end_date);
            $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(16);
            $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        // width
            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);

        // header
            $this->excel->getActiveSheet()->setCellValue('A6', 'No');
            $this->excel->getActiveSheet()->mergeCells('A6:A7');

            $this->excel->getActiveSheet()->setCellValue('B6', 'Part No');
            $this->excel->getActiveSheet()->mergeCells('B6:B7');
            $this->excel->getActiveSheet()->setCellValue('C6', 'Model');
            $this->excel->getActiveSheet()->mergeCells('C6:C7');
            $this->excel->getActiveSheet()->setCellValue('D6', 'Description');
            $this->excel->getActiveSheet()->mergeCells('D6:D7');
            $this->excel->getActiveSheet()->setCellValue('E6', 'Capa/Day');
            $this->excel->getActiveSheet()->mergeCells('E6:E7');
            $this->excel->getActiveSheet()->setCellValue('F6','Item');
            $this->excel->getActiveSheet()->mergeCells('F6:F7');
            $this->excel->getActiveSheet()->setCellValue('G6','Item');
            $this->excel->getActiveSheet()->mergeCells('G6:AK6');
            $this->excel->getActiveSheet()->setCellValue('AL6','T/T');
            $this->excel->getActiveSheet()->mergeCells('AL6:AL7');
            $this->excel->getActiveSheet()->setCellValue('AM6','%');
            $this->excel->getActiveSheet()->mergeCells('AM6:AM7');

            // Model Information'

        $this->excel->getActiveSheet()->getStyle("A6:AM1000")->applyFromArray(
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


    // }
?>