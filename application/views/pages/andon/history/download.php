
<?php

        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Summary');

        // design
        $this->excel->getActiveSheet()->getStyle("A6:P43")->applyFromArray(
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
            $this->excel->getActiveSheet()->setCellValue('A2','Summary');
            $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
            $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

            // Date
            $this->excel->getActiveSheet()->setCellValue('A3', $date);
            $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(16);
            $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        // width
            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(24);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(9);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(24);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(19);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(19);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(19);
            $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(19);
            $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(19);

            $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(15);

        // header
            $this->excel->getActiveSheet()->setCellValue('A6', 'No');
            $this->excel->getActiveSheet()->mergeCells('A6:A7');
            $this->excel->getActiveSheet()->setCellValue('B6', 'Process');
            $this->excel->getActiveSheet()->mergeCells('B6:B7');
            $this->excel->getActiveSheet()->setCellValue('C6', 'No MC');
            $this->excel->getActiveSheet()->mergeCells('C6:C7');
            $this->excel->getActiveSheet()->setCellValue('D6', 'Machine Name');
            $this->excel->getActiveSheet()->mergeCells('D6:D7');

            $this->excel->getActiveSheet()->setCellValue('E6', 'Production Status');
            $this->excel->getActiveSheet()->mergeCells('E6:I6');
            $this->excel->getActiveSheet()->setCellValue('J6', 'Result NG');
            $this->excel->getActiveSheet()->mergeCells('J6:N6');
            $this->excel->getActiveSheet()->setCellValue('L6', 'Operation');
            $this->excel->getActiveSheet()->mergeCells('L6:N6');
            $this->excel->getActiveSheet()->setCellValue('O6', 'Andon');
            $this->excel->getActiveSheet()->mergeCells('O6:P6');
            $this->excel->getActiveSheet()->setCellValue('E7', 'Last Month Actual');
            $this->excel->getActiveSheet()->setCellValue('F7', 'This Month Actual');
            $this->excel->getActiveSheet()->setCellValue('G7', 'Planning');
            $this->excel->getActiveSheet()->setCellValue('H7', 'Balance Qty');
            $this->excel->getActiveSheet()->setCellValue('I7', '%');
            $this->excel->getActiveSheet()->setCellValue('J7', 'NG Qty');
            $this->excel->getActiveSheet()->setCellValue('K7', 'NG %');
            $this->excel->getActiveSheet()->setCellValue('L7', 'Working Time');
            $this->excel->getActiveSheet()->setCellValue('M7', 'Loss Time');
            $this->excel->getActiveSheet()->setCellValue('N7', 'Operation %');
            $this->excel->getActiveSheet()->setCellValue('O7', 'Call');
            $this->excel->getActiveSheet()->setCellValue('P7', 'Downtime');


            // Model Information'





     $i = 1;
     $rowStart = 8;

      // for ($xx=1; $xx < 3; $xx++) {


            foreach ($data as $key) {
             $id = "'".$key['id']."'";


              $i++;


     }

      // FOOTER
            $this->excel->getActiveSheet()->setCellValue('A43', 'Total');
            $this->excel->getActiveSheet()->mergeCells('A43:D43');
            $this->excel->getActiveSheet()->getStyle('A43:P43')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->setCellValue('E43', $i);
            $this->excel->getActiveSheet()->setCellValue('F43', $i);
            $this->excel->getActiveSheet()->setCellValue('G43', $i);
            $this->excel->getActiveSheet()->setCellValue('H43', $i);
            $this->excel->getActiveSheet()->setCellValue('I43', $i);
            $this->excel->getActiveSheet()->setCellValue('J43', $i);
            $this->excel->getActiveSheet()->setCellValue('K43', $i);
            $this->excel->getActiveSheet()->setCellValue('L43', $i);
            $this->excel->getActiveSheet()->setCellValue('M43', $i);
            $this->excel->getActiveSheet()->setCellValue('N43', $i);
            $this->excel->getActiveSheet()->setCellValue('O43', $i);
            $this->excel->getActiveSheet()->setCellValue('P43', $i);


        $this->excel->getActiveSheet()->getStyle("A6:P43")->applyFromArray(
            array(
                'alignment' => array('horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
            )
        );

        $filename= 'Smart Andon Daebaek - Summary- '.date('Ymdhis').'.xls'; //save our workbook as this file name
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