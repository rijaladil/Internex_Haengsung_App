<?php
        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Summary');

        // design
        $this->excel->getActiveSheet()->getStyle("A7:R500")->applyFromArray(
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
            $this->excel->getActiveSheet()->setCellValue('A1', 'PT. Haengsung');
            $this->excel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
            $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
            $this->excel->getActiveSheet()->getStyle('A1:R8')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $this->excel->getActiveSheet()->getStyle('E7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

            // Andon Title
            // $this->excel->getActiveSheet()->setCellValue('E1', 'JJS-Andon Smart System');
            $this->excel->getActiveSheet()->getStyle('E1')->getFont()->setSize(20);
            $this->excel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);
            // $this->excel->getActiveSheet()->mergeCells('E1:G2');
            $this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('E1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

            // Date
            $this->excel->getActiveSheet()->setCellValue('P1', date('Y-m-d H:i:s'));
            $this->excel->getActiveSheet()->getStyle('M1')->getFont()->setSize(12);
            $this->excel->getActiveSheet()->getStyle('M1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

        // header
            //set cell A1 content with some text
            $this->excel->getActiveSheet()->setCellValue('A3', 'Line');
            $this->excel->getActiveSheet()->setCellValue('A4', 'Date');

            $this->excel->getActiveSheet()->setCellValue('B3', ": ". ($line == 0 ? 'All Line' : $line));
            $this->excel->getActiveSheet()->setCellValue('B4', ": $tanggal");
            //change the font size
            $this->excel->getActiveSheet()->getStyle('A3:B5')->getFont()->setSize(11);
            //make the font become bold
            $this->excel->getActiveSheet()->getStyle('A3:A5')->getFont()->setBold(true);
            //set aligment to center for that merged cell (A1 to D1)
            $this->excel->getActiveSheet()->getStyle('A3:B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        // content
            //set cell A1 content with some text
            $this->excel->getActiveSheet()->setCellValue('A7', 'Line');
            $this->excel->getActiveSheet()->mergeCells('A7:A8');
            $this->excel->getActiveSheet()->setCellValue('B7', 'Item');
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
            $this->excel->getActiveSheet()->mergeCells('B7:B8');
            $this->excel->getActiveSheet()->setCellValue('C7', 'Specification');
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
             $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(13);
              $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
            $this->excel->getActiveSheet()->mergeCells('C7:C8');
            $this->excel->getActiveSheet()->setCellValue('D7', 'Item');
            $this->excel->getActiveSheet()->mergeCells('D7:E8');
            $this->excel->getActiveSheet()->setCellValue('F7', 'SMT Production / Andon Information');
            $this->excel->getActiveSheet()->getStyle('F7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excel->getActiveSheet()->mergeCells('F7:R7');
            $this->excel->getActiveSheet()->setCellValue('F8', '1');
            $this->excel->getActiveSheet()->setCellValue('G8', '2');
            $this->excel->getActiveSheet()->setCellValue('H8', '3');
            $this->excel->getActiveSheet()->setCellValue('I8', '4');
            $this->excel->getActiveSheet()->setCellValue('J8', '5');
            $this->excel->getActiveSheet()->setCellValue('K8', '6');
            $this->excel->getActiveSheet()->setCellValue('L8', '7');
            $this->excel->getActiveSheet()->setCellValue('M8', '8');
            $this->excel->getActiveSheet()->setCellValue('N8', '9');
            $this->excel->getActiveSheet()->setCellValue('O8', '10');
            $this->excel->getActiveSheet()->setCellValue('P8', '11');
            $this->excel->getActiveSheet()->setCellValue('Q8', '12');
            $this->excel->getActiveSheet()->setCellValue('R8', 'Result');


        // DATA

        $i = 1;
        $rowStart = 9;
        if ($line == 0) {

            for ($xx=1; $xx < 5; $xx++) {

                $data = $this->model_production->get_data($tanggal, $xx);
                    foreach ($data as $key) {
                        $id = "'".$key['id']."'";
                        //
                        $this->excel->getActiveSheet()->setCellValue('A'.$rowStart, $key['line_id']);
                        $this->excel->getActiveSheet()->getStyle('A'.$rowStart)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $this->excel->getActiveSheet()->getStyle('A'.$rowStart)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $this->excel->getActiveSheet()->mergeCells('A'.$rowStart.':A'.($rowStart+4));

                        $this->excel->getActiveSheet()->setCellValue('B'.$rowStart, 'DATE');
                        $this->excel->getActiveSheet()->setCellValue('B'.($rowStart+1), 'NUMBER');
                        $this->excel->getActiveSheet()->setCellValue('B'.($rowStart+2), 'FG P/NO');
                        $this->excel->getActiveSheet()->setCellValue('B'.($rowStart+3), 'PLANT QTY');
                        $this->excel->getActiveSheet()->setCellValue('B'.($rowStart+4), 'START TIME');

                        $this->excel->getActiveSheet()->setCellValue('C'.$rowStart, $key['date']);
                        $this->excel->getActiveSheet()->setCellValue('C'.($rowStart+1),$i++);
                        $this->excel->getActiveSheet()->setCellValue('C'.($rowStart+2), $key['spk']);
                        $this->excel->getActiveSheet()->setCellValue('C'.($rowStart+3), $key['target']);
                        $this->excel->getActiveSheet()->setCellValue('C'.($rowStart+4), $key['timeStart']);

                        $this->excel->getActiveSheet()->setCellValue('D'.$rowStart, 'Production');
                         $this->excel->getActiveSheet()->getStyle('D'.$rowStart)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $this->excel->getActiveSheet()->getStyle('D'.$rowStart)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $this->excel->getActiveSheet()->mergeCells('D'.$rowStart.':D'.($rowStart+1));
                        
                        $this->excel->getActiveSheet()->setCellValue('D'.($rowStart+2), 'Andon');
                         $this->excel->getActiveSheet()->getStyle('D'.($rowStart+2))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $this->excel->getActiveSheet()->getStyle('D'.($rowStart+2))->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                        $this->excel->getActiveSheet()->mergeCells('D'.($rowStart+2).':D'.($rowStart+4));

                        $this->excel->getActiveSheet()->setCellValue('E'.($rowStart), 'Result Qty');
                        $this->excel->getActiveSheet()->setCellValue('E'.($rowStart+1), 'Rate %');
                        $this->excel->getActiveSheet()->setCellValue('E'.($rowStart+2), 'Machine L/T');
                        $this->excel->getActiveSheet()->setCellValue('E'.($rowStart+3), 'Material L/T');
                        $this->excel->getActiveSheet()->setCellValue('E'.($rowStart+4), 'Total L/T');

                        //  1
                        $this->excel->getActiveSheet()->setCellValue('F'.($rowStart), $key['val1']);
                        $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+1), (round(($key['val1']/$key['target'])*100)) );
                        $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+2), seconds($key['mcLt1']) );
                        $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+3), seconds($key['mtLt1']) );
                        $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+4), seconds($key['tot1']) );

                        // 2
                        $this->excel->getActiveSheet()->setCellValue('G'.($rowStart), $key['val2']);
                        $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+1), (round(($key['val2']/$key['target'])*100)) );
                        $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+2), seconds($key['mcLt2']) );
                        $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+3), seconds($key['mtLt2']) );
                        $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+4), seconds($key['tot2']) );

                        // 3
                        $this->excel->getActiveSheet()->setCellValue('H'.($rowStart), $key['val3']);
                        $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+1), (round(($key['val3']/$key['target'])*100)) );
                        $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+2), seconds($key['mcLt3']) );
                        $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+3), seconds($key['mtLt3']) );
                        $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+4), seconds($key['tot3']) );

                         // 4
                        $this->excel->getActiveSheet()->setCellValue('I'.($rowStart), $key['val4']);
                        $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+1), (round(($key['val4']/$key['target'])*100)) );
                        $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+2), seconds($key['mcLt4']) );
                        $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+3), seconds($key['mtLt4']) );
                        $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+4), seconds($key['tot4']) );

                         // 5
                        $this->excel->getActiveSheet()->setCellValue('J'.($rowStart), $key['val5']);
                        $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+1), (round(($key['val5']/$key['target'])*100)) );
                        $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+2), seconds($key['mcLt5']) );
                        $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+3), seconds($key['mtLt5']) );
                        $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+4), seconds($key['tot5']) );

                        //  6
                        $this->excel->getActiveSheet()->setCellValue('K'.($rowStart), $key['val6']);
                        $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+1), (round(($key['val6']/$key['target'])*100)) );
                        $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+2), seconds($key['mcLt6']) );
                        $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+3), seconds($key['mtLt6']) );
                        $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+4), seconds($key['tot6']) );

                        // 7
                        $this->excel->getActiveSheet()->setCellValue('L'.($rowStart), $key['val7']);
                        $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+1), (round(($key['val7']/$key['target'])*100)) );
                        $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+2), seconds($key['mcLt7']) );
                        $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+3), seconds($key['mtLt7']) );
                        $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+4), seconds($key['tot7']) );

                        // 8
                        $this->excel->getActiveSheet()->setCellValue('M'.($rowStart), $key['val8']);
                        $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+1), (round(($key['val8']/$key['target'])*100)) );
                        $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+2), seconds($key['mcLt8']) );
                        $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+3), seconds($key['mtLt8']) );
                        $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+4), seconds($key['tot8']) );

                         // 9
                        $nilai = convertToMc10($key['val9'], $key['val10'], $key['line_id']);
                        $this->excel->getActiveSheet()->setCellValue('N'.($rowStart), isset($key['val9'])? $nilai : 0 );
                        $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+1),round( ( isset($key['val9']) ? ($nilai/$key['target'])*100 : 0) ),1);
                        $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+2), seconds( (isset($key['mcLt9']) ? $key['mcLt9'] : 0) ));
                        $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+3), seconds( (isset($key['mtLt9']) ? $key['mtLt9'] : 0) ));
                        $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+4), seconds( (isset($key['tot9']) ? $key['tot9'] : 0) ));

                         // 10
                        $this->excel->getActiveSheet()->setCellValue('O'.($rowStart), isset($key['val10'])? $key['val10'] : 0);
                        $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+1), round( ( isset($key['val10']) ? ($key['val10']/$key['target'])*100 : 0) ),1);
                        $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+2), seconds( (isset($key['mcLt10']) ? $key['mcLt10'] : 0) ));
                        $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+3), seconds( (isset($key['mtLt10']) ? $key['mtLt10'] : 0) ));
                        $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+4), seconds( (isset($key['tot10']) ? $key['tot10'] : 0) ));

                         // 11
                        $this->excel->getActiveSheet()->setCellValue('P'.($rowStart), '-');
                        $this->excel->getActiveSheet()->setCellValue('P'.($rowStart+1), '-');
                        $this->excel->getActiveSheet()->setCellValue('P'.($rowStart+2), '-');
                        $this->excel->getActiveSheet()->setCellValue('P'.($rowStart+3), '-');
                        $this->excel->getActiveSheet()->setCellValue('P'.($rowStart+4), '-' );

                         // 12
                        $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart), '-');
                        $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart+1), '-' );
                        $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart+2),'-');
                        $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart+3), '-' );
                        $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart+4), '-' );

                         // RESULT
                        $this->excel->getActiveSheet()->setCellValue('R'.($rowStart),  $key['val1']);
                        $this->excel->getActiveSheet()->setCellValue('R'.($rowStart+1), round(($key['val3']/$key['target'])*100),0);
                        $this->excel->getActiveSheet()->setCellValue('R'.($rowStart+2), seconds($key['mcLt_sum']) );
                        $this->excel->getActiveSheet()->setCellValue('R'.($rowStart+3), seconds ($key['mtLt_sum']) );
                        $this->excel->getActiveSheet()->setCellValue('R'.($rowStart+4), seconds ($key['total']) );

                        $rowStart = $rowStart + 5;
                    }
            }
        }

            $this->excel->getActiveSheet()->getStyle("A7:R1000")->applyFromArray(
                array(
                    'alignment' => array('horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
                )
            );


        $filename= 'Smart Andon - Haengsung - '.date('Ymdhis').'.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');

        function seconds($seconds) {

            // CONVERT TO HH:MM:SS
            $hours = floor($seconds/3600);
            $remainder_1 = ($seconds % 3600);
            $minutes = floor($remainder_1 / 60);
            $seconds = ($remainder_1 % 60);

            // PREP THE VALUES
            if(strlen($hours) == 1) {
                $hours = "0".$hours;
            }
            if(strlen($minutes) == 1) {
                $minutes = "0".$minutes;
            }
            if(strlen($seconds) == 1) {
                $seconds = "0".$seconds;
            }
            return $hours.":".$minutes;
        }

        function convertToMc10($jum9, $jum10, $line){
            if ($line == 1 || $line == 2) {
                return $jum10;
            }else{
                return $jum9;
            }
        }


?>