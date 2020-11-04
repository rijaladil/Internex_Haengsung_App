
<?php

        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Summary');

        $styleAja = array (
                'alignment' => array('horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
            );

        // title
            // Company Name
            $this->excel->getActiveSheet()->setCellValue('A1', 'PT DAE BAEK');
            $this->excel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
            $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(26);
            $this->excel->getActiveSheet()->getStyle('A1:AS6')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

             // Judul
            $this->excel->getActiveSheet()->setCellValue('A2','History');
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
            $this->excel->getActiveSheet()->setCellValue('B6', 'Process');
            $this->excel->getActiveSheet()->setCellValue('C6', 'No MC');
            $this->excel->getActiveSheet()->setCellValue('D6', 'Machine Name');
            $this->excel->getActiveSheet()->setCellValue('E6', 'Call');
            $this->excel->getActiveSheet()->setCellValue('F6', 'Arrive');
            $this->excel->getActiveSheet()->setCellValue('G6', 'Complete');
            $this->excel->getActiveSheet()->setCellValue('H6', 'Downtime');
            $this->excel->getActiveSheet()->setCellValue('I6', 'Machine Call');
            $this->excel->getActiveSheet()->setCellValue('J6', 'Quality Call');
            $this->excel->getActiveSheet()->setCellValue('K6', 'Material Time');
            $this->excel->getActiveSheet()->setCellValue('L6', 'Help Call');


            $no       = 1;
            $rowStart = 7;
            foreach ($data as $key) {
                $this->excel->getActiveSheet()->setCellValue('A'.$rowStart, $no);
                $this->excel->getActiveSheet()->setCellValue('B'.$rowStart, $key['deptName']);
                $this->excel->getActiveSheet()->setCellValue('C'.$rowStart, $key['mcNo']);
                $this->excel->getActiveSheet()->setCellValue('D'.$rowStart, $key['mcName']);
                $this->excel->getActiveSheet()->setCellValue('E'.$rowStart, $key['call']);
                $this->excel->getActiveSheet()->setCellValue('F'.$rowStart, secToMinute($key['arrival']));
                $this->excel->getActiveSheet()->setCellValue('G'.$rowStart, secToMinute($key['completed']));
                $this->excel->getActiveSheet()->setCellValue('H'.$rowStart, secToMinute($key['downtime']));
                $this->excel->getActiveSheet()->setCellValue('I'.$rowStart, ($key['call_id'] == 1) ? '✓' : '');
                $this->excel->getActiveSheet()->setCellValue('J'.$rowStart, ($key['call_id'] == 4) ? '✓' : '');
                $this->excel->getActiveSheet()->setCellValue('K'.$rowStart, ($key['call_id'] == 2) ? '✓' : '');
                $this->excel->getActiveSheet()->setCellValue('L'.$rowStart, ($key['call_id'] == 3) ? '✓' : '');
                $rowStart++;
                $no++;
            }

        // design
        $this->excel->getActiveSheet()->getStyle("A6:L".$rowStart)->applyFromArray(
            array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN, PHPExcel_Style_Alignment::VERTICAL_CENTER,

                    )
                )
            )
        );

        function secToMinute($sec) {
            return ($sec == 0) ? '' : sprintf("%02d",floor($sec / 3600)) . ':' . sprintf("%02d",floor($sec / 60 % 60)) . ':' . sprintf("%02d",floor($sec % 60));
        }

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