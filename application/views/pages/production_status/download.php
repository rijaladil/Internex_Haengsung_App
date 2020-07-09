
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
            $this->excel->getActiveSheet()->setCellValue('A2','Production Status '.$department->name);
            $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
            $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

            // Date
            $this->excel->getActiveSheet()->setCellValue('A3', $date);
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

            $this->excel->getActiveSheet()->setCellValue('G6','Production Plan');
            $this->excel->getActiveSheet()->mergeCells('G6:AK6');
            $this->excel->getActiveSheet()->setCellValue('AL6','T/T');
            $this->excel->getActiveSheet()->mergeCells('AL6:AL7');
            $this->excel->getActiveSheet()->setCellValue('AM6','%');
            $this->excel->getActiveSheet()->mergeCells('AM6:AM7');

            $this->excel->getActiveSheet()->setCellValue('G7','1');
            $this->excel->getActiveSheet()->setCellValue('H7','2');
            $this->excel->getActiveSheet()->setCellValue('I7','3');
            $this->excel->getActiveSheet()->setCellValue('J7','4');
            $this->excel->getActiveSheet()->setCellValue('K7','5');
            $this->excel->getActiveSheet()->setCellValue('L7','6');
            $this->excel->getActiveSheet()->setCellValue('M7','7');
            $this->excel->getActiveSheet()->setCellValue('N7','8');
            $this->excel->getActiveSheet()->setCellValue('O7','9');
            $this->excel->getActiveSheet()->setCellValue('P7','10');
            $this->excel->getActiveSheet()->setCellValue('Q7','11');
            $this->excel->getActiveSheet()->setCellValue('R7','12');
            $this->excel->getActiveSheet()->setCellValue('S7','13');
            $this->excel->getActiveSheet()->setCellValue('T7','14');
            $this->excel->getActiveSheet()->setCellValue('U7','15');
            $this->excel->getActiveSheet()->setCellValue('V7','16');
            $this->excel->getActiveSheet()->setCellValue('W7','17');
            $this->excel->getActiveSheet()->setCellValue('X7','18');
            $this->excel->getActiveSheet()->setCellValue('Y7','19');
            $this->excel->getActiveSheet()->setCellValue('Z7','20');
            $this->excel->getActiveSheet()->setCellValue('AA7','21');
            $this->excel->getActiveSheet()->setCellValue('AB7','22');
            $this->excel->getActiveSheet()->setCellValue('AC7','23');
            $this->excel->getActiveSheet()->setCellValue('AD7','24');
            $this->excel->getActiveSheet()->setCellValue('AE7','25');
            $this->excel->getActiveSheet()->setCellValue('AF7','26');
            $this->excel->getActiveSheet()->setCellValue('AG7','27');
            $this->excel->getActiveSheet()->setCellValue('AH7','28');
            $this->excel->getActiveSheet()->setCellValue('AI7','29');
            $this->excel->getActiveSheet()->setCellValue('AJ7','30');
            $this->excel->getActiveSheet()->setCellValue('AK7','31');

            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(18);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
            // Model Information'

     $i = 1;
     $rowStart = 8;
  
      // for ($xx=1; $xx < 3; $xx++) {
  

            foreach ($data as $key) {
             $id = "'".$key['id']."'";

             $this->excel->getActiveSheet()->setCellValue('A'.$rowStart, $i);
             $this->excel->getActiveSheet()->getStyle('A'.$rowStart)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
             $this->excel->getActiveSheet()->mergeCells('A'.$rowStart.':A'.($rowStart+2));

             $this->excel->getActiveSheet()->setCellValue('B'.$rowStart, $key['production_part_no']);
             $this->excel->getActiveSheet()->getStyle('B'.$rowStart)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
             $this->excel->getActiveSheet()->mergeCells('B'.$rowStart.':B'.($rowStart+2));

             $this->excel->getActiveSheet()->setCellValue('C'.$rowStart, $key['model']);
             $this->excel->getActiveSheet()->getStyle('C'.$rowStart)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
             $this->excel->getActiveSheet()->mergeCells('C'.$rowStart.':C'.($rowStart+2));

             $this->excel->getActiveSheet()->setCellValue('D'.$rowStart, $key['description']);
             $this->excel->getActiveSheet()->getStyle('D'.$rowStart)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
             $this->excel->getActiveSheet()->mergeCells('D'.$rowStart.':D'.($rowStart+2));

             $this->excel->getActiveSheet()->setCellValue('E'.$rowStart, number_format($key['capaDay']));
             $this->excel->getActiveSheet()->getStyle('E'.$rowStart)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
             $this->excel->getActiveSheet()->mergeCells('E'.$rowStart.':E'.($rowStart+2));

             $this->excel->getActiveSheet()->setCellValue('F'.($rowStart), 'Plan');
             $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+1), 'Actual');
             $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+2), 'Ng');

             $this->excel->getActiveSheet()->setCellValue('G'.($rowStart), number_format($key['planDay1']));
             $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+1), number_format($key['actualDay1']));
             $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+2), number_format($key['ngQty1']));

             $this->excel->getActiveSheet()->setCellValue('H'.($rowStart), number_format($key['planDay2']));
             $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+1), number_format($key['actualDay2']));
             $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+2), number_format($key['ngQty2']));

             $this->excel->getActiveSheet()->setCellValue('I'.($rowStart), number_format($key['planDay3']));
             $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+1), number_format($key['actualDay3']));
             $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+2), number_format($key['ngQty3']));

             $this->excel->getActiveSheet()->setCellValue('J'.($rowStart), number_format($key['planDay4']));
             $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+1), number_format($key['actualDay4']));
             $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+2), number_format($key['ngQty4']));

             $this->excel->getActiveSheet()->setCellValue('K'.($rowStart), number_format($key['planDay5']));
             $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+1), number_format($key['actualDay5']));
             $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+2), number_format($key['ngQty5']));

             $this->excel->getActiveSheet()->setCellValue('L'.($rowStart), number_format($key['planDay6']));
             $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+1), number_format($key['actualDay6']));
             $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+2), number_format($key['ngQty6']));

             $this->excel->getActiveSheet()->setCellValue('M'.($rowStart), number_format($key['planDay7']));
             $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+1), number_format($key['actualDay7']));
             $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+2), number_format($key['ngQty7']));

             $this->excel->getActiveSheet()->setCellValue('N'.($rowStart), number_format($key['planDay8']));
             $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+1), number_format($key['actualDay8']));
             $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+2), number_format($key['ngQty8']));

             $this->excel->getActiveSheet()->setCellValue('O'.($rowStart), number_format($key['planDay9']));
             $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+1), number_format($key['actualDay9']));
             $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+2), number_format($key['ngQty9']));

             $this->excel->getActiveSheet()->setCellValue('P'.($rowStart), number_format($key['planDay10']));
             $this->excel->getActiveSheet()->setCellValue('P'.($rowStart+1), number_format($key['actualDay10']));
             $this->excel->getActiveSheet()->setCellValue('P'.($rowStart+2), number_format($key['ngQty10']));

             $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart), number_format($key['planDay11']));
             $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart+1), number_format($key['actualDay11']));
             $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart+2), number_format($key['ngQty11']));

             $this->excel->getActiveSheet()->setCellValue('R'.($rowStart), number_format($key['planDay12']));
             $this->excel->getActiveSheet()->setCellValue('R'.($rowStart+1), number_format($key['actualDay12']));
             $this->excel->getActiveSheet()->setCellValue('R'.($rowStart+2), number_format($key['ngQty12']));

             $this->excel->getActiveSheet()->setCellValue('S'.($rowStart), number_format($key['planDay13']));
             $this->excel->getActiveSheet()->setCellValue('S'.($rowStart+1), number_format($key['actualDay13']));
             $this->excel->getActiveSheet()->setCellValue('S'.($rowStart+2), number_format($key['ngQty13']));

             $this->excel->getActiveSheet()->setCellValue('T'.($rowStart), number_format($key['planDay14']));
             $this->excel->getActiveSheet()->setCellValue('T'.($rowStart+1), number_format($key['actualDay14']));
             $this->excel->getActiveSheet()->setCellValue('T'.($rowStart+2), number_format($key['ngQty14']));

             $this->excel->getActiveSheet()->setCellValue('U'.($rowStart), number_format($key['planDay15']));
             $this->excel->getActiveSheet()->setCellValue('U'.($rowStart+1), number_format($key['actualDay15']));
             $this->excel->getActiveSheet()->setCellValue('U'.($rowStart+2), number_format($key['ngQty15']));

             $this->excel->getActiveSheet()->setCellValue('V'.($rowStart), number_format($key['planDay16']));
             $this->excel->getActiveSheet()->setCellValue('V'.($rowStart+1), number_format($key['actualDay16']));
             $this->excel->getActiveSheet()->setCellValue('V'.($rowStart+2), number_format($key['ngQty16']));

             $this->excel->getActiveSheet()->setCellValue('W'.($rowStart), number_format($key['planDay17']));
             $this->excel->getActiveSheet()->setCellValue('W'.($rowStart+1), number_format($key['actualDay17']));
             $this->excel->getActiveSheet()->setCellValue('W'.($rowStart+2), number_format($key['ngQty17']));

             $this->excel->getActiveSheet()->setCellValue('X'.($rowStart), number_format($key['planDay18']));
             $this->excel->getActiveSheet()->setCellValue('X'.($rowStart+1), number_format($key['actualDay18']));
             $this->excel->getActiveSheet()->setCellValue('X'.($rowStart+2), number_format($key['ngQty18']));

             $this->excel->getActiveSheet()->setCellValue('Y'.($rowStart), number_format($key['planDay19']));
             $this->excel->getActiveSheet()->setCellValue('Y'.($rowStart+1), number_format($key['actualDay19']));
             $this->excel->getActiveSheet()->setCellValue('Y'.($rowStart+2), number_format($key['ngQt19y']));

             $this->excel->getActiveSheet()->setCellValue('Z'.($rowStart), number_format($key['planDay20']));
             $this->excel->getActiveSheet()->setCellValue('Z'.($rowStart+1), number_format($key['actualDay20']));
             $this->excel->getActiveSheet()->setCellValue('Z'.($rowStart+2), number_format($key['ngQty20']));

             $this->excel->getActiveSheet()->setCellValue('AA'.($rowStart), number_format($key['planDay21']));
             $this->excel->getActiveSheet()->setCellValue('AA'.($rowStart+1), number_format($key['actualDay21']));
             $this->excel->getActiveSheet()->setCellValue('AA'.($rowStart+2), number_format($key['ngQty21']));

             $this->excel->getActiveSheet()->setCellValue('AB'.($rowStart), number_format($key['planDay22']));
             $this->excel->getActiveSheet()->setCellValue('AB'.($rowStart+1), number_format($key['actualDay22']));
             $this->excel->getActiveSheet()->setCellValue('AB'.($rowStart+2), number_format($key['ngQty22']));

             $this->excel->getActiveSheet()->setCellValue('AC'.($rowStart), number_format($key['planDay23']));
             $this->excel->getActiveSheet()->setCellValue('AC'.($rowStart+1), number_format($key['actualDay23']));
             $this->excel->getActiveSheet()->setCellValue('AC'.($rowStart+2), number_format($key['ngQty23']));

             $this->excel->getActiveSheet()->setCellValue('AD'.($rowStart), number_format($key['planDay24']));
             $this->excel->getActiveSheet()->setCellValue('AD'.($rowStart+1), number_format($key['actualDay24']));
             $this->excel->getActiveSheet()->setCellValue('AD'.($rowStart+2), number_format($key['ngQty24']));

             $this->excel->getActiveSheet()->setCellValue('AE'.($rowStart), number_format($key['planDay25']));
             $this->excel->getActiveSheet()->setCellValue('AE'.($rowStart+1), number_format($key['actualDay25']));
             $this->excel->getActiveSheet()->setCellValue('AE'.($rowStart+2), number_format($key['ngQty25']));

             $this->excel->getActiveSheet()->setCellValue('AF'.($rowStart), number_format($key['planDay26']));
             $this->excel->getActiveSheet()->setCellValue('AF'.($rowStart+1), number_format($key['actualDay26']));
             $this->excel->getActiveSheet()->setCellValue('AF'.($rowStart+2), number_format($key['ngQty26']));

             $this->excel->getActiveSheet()->setCellValue('AG'.($rowStart), number_format($key['planDay27']));
             $this->excel->getActiveSheet()->setCellValue('AG'.($rowStart+1), number_format($key['actualDay27']));
             $this->excel->getActiveSheet()->setCellValue('AG'.($rowStart+2), number_format($key['ngQty27']));

             $this->excel->getActiveSheet()->setCellValue('AH'.($rowStart), number_format($key['planDay28']));
             $this->excel->getActiveSheet()->setCellValue('AH'.($rowStart+1), number_format($key['actualDay28']));
             $this->excel->getActiveSheet()->setCellValue('AH'.($rowStart+2), number_format($key['ngQty28']));

             $this->excel->getActiveSheet()->setCellValue('AI'.($rowStart), number_format($key['planDay29']));
             $this->excel->getActiveSheet()->setCellValue('AI'.($rowStart+1), number_format($key['actualDay29']));
             $this->excel->getActiveSheet()->setCellValue('AI'.($rowStart+2), number_format($key['ngQty29']));

             $this->excel->getActiveSheet()->setCellValue('AJ'.($rowStart), number_format($key['planDay30']));
             $this->excel->getActiveSheet()->setCellValue('AJ'.($rowStart+1), number_format($key['actualDay30']));
             $this->excel->getActiveSheet()->setCellValue('AJ'.($rowStart+2), number_format($key['ngQty30']));

             $this->excel->getActiveSheet()->setCellValue('AK'.($rowStart), number_format($key['planDay31']));
             $this->excel->getActiveSheet()->setCellValue('AK'.($rowStart+1), number_format($key['actualDay31']));
             $this->excel->getActiveSheet()->setCellValue('AK'.($rowStart+2), number_format($key['ngQty31']));

             $this->excel->getActiveSheet()->setCellValue('AL'.($rowStart), number_format($key['planQtyTot']));
             $this->excel->getActiveSheet()->setCellValue('AL'.($rowStart+1), number_format($key['actualQtyTot']));
             $this->excel->getActiveSheet()->setCellValue('AL'.($rowStart+2), number_format($key['ngQtyTot']));

             $this->excel->getActiveSheet()->setCellValue('AM'.$rowStart, number_format(((($key['actualQtyTot']-$key['ngQtyTot'])/$key['planQtyTot'])*100)),2);
             $this->excel->getActiveSheet()->getStyle('AM'.$rowStart)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
             $this->excel->getActiveSheet()->mergeCells('AM'.$rowStart.':AM'.($rowStart+2));

              $rowStart = $rowStart + 3;
              $i++;


     }

        $this->excel->getActiveSheet()->getStyle("A6:AM1000")->applyFromArray(
            array(
                'alignment' => array('horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
            )
        );

        $filename= 'Smart Andon Daebaek - Production Status- '.date('Ymdhis').'.xls'; //save our workbook as this file name
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