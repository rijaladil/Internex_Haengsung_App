
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
            $this->excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
            $this->excel->getActiveSheet()->getRowDimension('6')->setRowHeight(20);
            $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(26);
            $this->excel->getActiveSheet()->getStyle('A1:AS7')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

             // Judul
            $this->excel->getActiveSheet()->setCellValue('A2','Andon Summary');
            $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
            // $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);

            // $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

            // Date
            $this->excel->getActiveSheet()->setCellValue('A3', 'Tanggal : '.$date);
            $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
            // $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(16);
            // $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        // width
            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(24);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(24);
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
            $this->excel->getActiveSheet()->setCellValue('C6', 'No Machine');
            $this->excel->getActiveSheet()->mergeCells('C6:C7');
            $this->excel->getActiveSheet()->setCellValue('D6', 'Machine Name');
            $this->excel->getActiveSheet()->mergeCells('D6:D7');
            $this->excel->getActiveSheet()->setCellValue('E6', '');
            $this->excel->getActiveSheet()->mergeCells('E6:E7');
            $this->excel->getActiveSheet()->setCellValue('F6', 'Actual Today');
            $this->excel->getActiveSheet()->mergeCells('F6:J6');
            $this->excel->getActiveSheet()->setCellValue('F7', 'Machine Call');
            $this->excel->getActiveSheet()->setCellValue('G7', 'Quality Call');
            $this->excel->getActiveSheet()->setCellValue('H7', 'Material Call');
            $this->excel->getActiveSheet()->setCellValue('I7', 'Help Call');
            $this->excel->getActiveSheet()->setCellValue('J7', 'Total');
            $this->excel->getActiveSheet()->setCellValue('K6', 'Actual Monthly');
            $this->excel->getActiveSheet()->mergeCells('K6:O6');
            $this->excel->getActiveSheet()->setCellValue('K7', 'Machine Call');
            $this->excel->getActiveSheet()->setCellValue('L7', 'Quality Call');
            $this->excel->getActiveSheet()->setCellValue('M7', 'Material Call');
            $this->excel->getActiveSheet()->setCellValue('N7', 'Help Call');
            $this->excel->getActiveSheet()->setCellValue('O7', 'Total');

            $no       = 1;
            $rowStart = 8;

            foreach ($data as $key) {

                $this->excel->getActiveSheet()->setCellValue('A'.$rowStart, $no++);
                $this->excel->getActiveSheet()->mergeCells('A'.$rowStart.':A'.($rowStart+1));

                $this->excel->getActiveSheet()->setCellValue('B'.$rowStart, $key['deptName']);
                $this->excel->getActiveSheet()->mergeCells('B'.$rowStart.':B'.($rowStart+1));

                $this->excel->getActiveSheet()->setCellValue('C'.$rowStart, $key['mcNo']);
                $this->excel->getActiveSheet()->mergeCells('C'.$rowStart.':C'.($rowStart+1));

                $this->excel->getActiveSheet()->setCellValue('D'.$rowStart, $key['mcName']);
                $this->excel->getActiveSheet()->mergeCells('D'.$rowStart.':D'.($rowStart+1));

                $this->excel->getActiveSheet()->setCellValue('E'.$rowStart, 'Call');
                $this->excel->getActiveSheet()->setCellValue('E'.($rowStart+1), 'Downtime');

                $this->excel->getActiveSheet()->setCellValue('F'.$rowStart, $key['count1']);
                $this->excel->getActiveSheet()->setCellValue('G'.$rowStart, $key['count4']);
                $this->excel->getActiveSheet()->setCellValue('H'.$rowStart, $key['count2']);
                $this->excel->getActiveSheet()->setCellValue('I'.$rowStart, $key['count3']);
                $this->excel->getActiveSheet()->setCellValue('J'.$rowStart, ($key['count1']+$key['count2']+$key['count3']+$key['count4']));

                $this->excel->getActiveSheet()->setCellValue('K'.$rowStart, $key['countLastMonth1']);
                $this->excel->getActiveSheet()->setCellValue('L'.$rowStart, $key['countLastMonth4']);
                $this->excel->getActiveSheet()->setCellValue('M'.$rowStart, $key['countLastMonth2']);
                $this->excel->getActiveSheet()->setCellValue('N'.$rowStart, $key['countLastMonth3']);
                $this->excel->getActiveSheet()->setCellValue('O'.$rowStart, ($key['countLastMonth1']+$key['countLastMonth4']+$key['countLastMonth2']+$key['countLastMonth3']));

                $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+1), secToMinute($key['downtime1']));
                $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+1), secToMinute($key['downtime4']));
                $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+1), secToMinute($key['downtime2']));
                $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+1), secToMinute($key['downtime3']));
                $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+1), secToMinute($key['downtime1']+$key['downtime4']+$key['downtime2']+$key['downtime3']));

                $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+1), secToMinute($key['downtimeLast1']));
                $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+1), secToMinute($key['downtimeLast4']));
                $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+1), secToMinute($key['downtimeLast2']));
                $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+1), secToMinute($key['downtimeLast3']));
                $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+1), secToMinute($key['downtimeLast1']+$key['downtimeLast4']+$key['downtimeLast2']+$key['downtimeLast3']));

                // $this->excel->getActiveSheet()->setCellValue('C'.$rowStart, $key['mcNo']);
                // $this->excel->getActiveSheet()->setCellValue('D'.$rowStart, $key['mcName']);
                // $this->excel->getActiveSheet()->setCellValue('E'.$rowStart, $key['call']);
                // $this->excel->getActiveSheet()->setCellValue('F'.$rowStart, secToMinute($key['arrival']));
                // $this->excel->getActiveSheet()->setCellValue('G'.$rowStart, secToMinute($key['completed']));
                // $this->excel->getActiveSheet()->setCellValue('H'.$rowStart, secToMinute($key['downtime']));
                // $this->excel->getActiveSheet()->setCellValue('I'.$rowStart, ($key['call_id'] == 1) ? 'Ok' : '');
                // $this->excel->getActiveSheet()->setCellValue('J'.$rowStart, ($key['call_id'] == 4) ? 'Ok' : '');
                // $this->excel->getActiveSheet()->setCellValue('K'.$rowStart, ($key['call_id'] == 2) ? 'Ok' : '');
                // $this->excel->getActiveSheet()->setCellValue('L'.$rowStart, ($key['call_id'] == 3) ? 'Ok' : '');
                $rowStart+=2;
            }

        // design
        $this->excel->getActiveSheet()->getStyle("A6:O".($rowStart-1))->applyFromArray(
            array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN, PHPExcel_Style_Alignment::VERTICAL_CENTER,

                    )
                ),
               'alignment' => array(
                   'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                   'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
               )
            )
        );

        function secToMinute($sec) {
            return ($sec == 0) ? '-' : sprintf("%02d",floor($sec / 3600)) . ':' . sprintf("%02d",floor($sec / 60 % 60)) . ':' . sprintf("%02d",floor($sec % 60));
        }

        $this->excel->getActiveSheet()->getStyle("A6:P".$rowStart)->applyFromArray(
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