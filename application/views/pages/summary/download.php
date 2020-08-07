
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
            $this->excel->getActiveSheet()->setCellValue('A2','Summary Actual Status');
            $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
            $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

            // Date
            $this->excel->getActiveSheet()->setCellValue('A3', $text_date);
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
      $totActualLast    = 0;
      $totActual        = 0;
      $totBallance      = 0;
      $totNg            = 0;
      $totWorkTime      = 0;
      $totLossTime      = 0;
      $totAndonTimes    = 0;
      $totAndonTime     = 0;
      $totPlanning      = 0;

      // for ($xx=1; $xx < 3; $xx++) {


      foreach ($data as $key) {

      $totActualLast = ($key['qtyActualLast']-$key['qtyNgLast']) + $totActualLast;
      $totActual     = ($key['qtyActual']-$key['qtyNg']) + $totActual;
      $totBallance   = (($key['qtyActual']-$key['qtyNg'])-($key['qtyActualLast']-$key['qtyNgLast']))+$totBallance;
      $totNg         = $key['qtyNg'] + $totNg;
      $totPlanning   = $key['planning'] + $totPlanning;
      $totWorkTime   = $key['workingTime'] + $totWorkTime;
      $totLossTime   = $key['lossTime'] + $totLossTime;
      $totAndonTimes = $key['andonTimes'] + $totAndonTimes;
      $totAndonTime  = $key['andonTime'] + $totAndonTime;
      $sumActual     = $key['qtyActual']-$key['qtyNg'];
      $planning      = $key['planning'];
      $sumActualLast = $key['qtyActualLast']-$key['qtyNgLast'];
      $sumBallance   = ($key['qtyActual']-$key['qtyNg'])-$key['planning'];

       $id = "'".$key['id']."'";

             $this->excel->getActiveSheet()->setCellValue('A'.$rowStart, $i++);
             $this->excel->getActiveSheet()->setCellValue('B'.$rowStart, $key['deptName']);
             $this->excel->getActiveSheet()->setCellValue('C'.$rowStart, $key['mcNo']);
             $this->excel->getActiveSheet()->setCellValue('D'.$rowStart, $key['mcName']);
             $this->excel->getActiveSheet()->setCellValue('E'.$rowStart, rupiah2dec($sumActualLast));
             $this->excel->getActiveSheet()->setCellValue('F'.$rowStart, rupiah2dec($planning));
             $this->excel->getActiveSheet()->setCellValue('G'.$rowStart, rupiah2dec($sumActual));
             $this->excel->getActiveSheet()->setCellValue('H'.$rowStart, rupiah2dec($sumBallance));
             $this->excel->getActiveSheet()->setCellValue('I'.$rowStart, convertToPercentages($planning,($sumActual-$key['qtyNg'])));
             $this->excel->getActiveSheet()->setCellValue('J'.$rowStart, rupiah2dec($key['qtyNg']*1));
             $this->excel->getActiveSheet()->setCellValue('I'.$rowStart, convertToPercentages($planning, ($sumActual-$key['qtyNg'])));
             $this->excel->getActiveSheet()->setCellValue('L'.$rowStart, secToMinute($key['workingTime']));
             $this->excel->getActiveSheet()->setCellValue('M'.$rowStart, secToMinute($key['lossTime']));
             $this->excel->getActiveSheet()->setCellValue('N'.$rowStart, ($key['workingTime'] > 0)? convertToPercentages(($key['workingTime']+$key['lossTime']), $key['workingTime']):'');
             $this->excel->getActiveSheet()->setCellValue('O'.$rowStart, rupiah2dec($key['andonTimes']));
             $this->excel->getActiveSheet()->setCellValue('P'.$rowStart, secToMinute($key['andonTime']));

      $rowStart++;


     }

      // FOOTER
            $this->excel->getActiveSheet()->setCellValue('A43', 'Total');
            $this->excel->getActiveSheet()->mergeCells('A43:D43');
            $this->excel->getActiveSheet()->getStyle('A43:P43')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->setCellValue('E43', rupiah2dec($totActualLast));//Tot Last Month Actual
            $this->excel->getActiveSheet()->setCellValue('F43', rupiah2dec($totPlanning));//Tot This Month Actual
            $this->excel->getActiveSheet()->setCellValue('G43', rupiah2dec($totActual));//Tot Planning
            $this->excel->getActiveSheet()->setCellValue('H43', rupiah2dec($totBallance));//Tot Balance Qty
            $this->excel->getActiveSheet()->setCellValue('I43', convertToPercentages($totPlanning, ($totActual-$totNg)));//Tot %
            $this->excel->getActiveSheet()->setCellValue('J43', rupiah2dec($totNg));//Tot NG Qty
            $this->excel->getActiveSheet()->setCellValue('K43', convertToPercentages($totActual, $totNg));//Tot NG%
            $this->excel->getActiveSheet()->setCellValue('L43', secToMinute($totWorkTime));//Tot Work Time
            $this->excel->getActiveSheet()->setCellValue('M43', secToMinute($totLossTime));//Tot Loss Time
            $this->excel->getActiveSheet()->setCellValue('N43', ($totWorkTime > 0)? number_format((float)(($totWorkTime/($totWorkTime+$totLossTime))*100), 2, '.', ''):'');//Tot Operation%
            $this->excel->getActiveSheet()->setCellValue('O43', rupiah2dec($totAndonTimes));//Tot Call
            $this->excel->getActiveSheet()->setCellValue('P43', secToMinute($totAndonTime));//Tot Downtime


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

      function cekData($data) {
            if (isset($data) && $data > 0) {
                  return $data;
            }else{
                  return "-";
            }
      }

      function secToMinute($sec) {
            return ($sec == 0) ? '' : sprintf("%02d",floor($sec / 3600)) . ':' . sprintf("%02d",floor($sec / 60 % 60)) . ':' . sprintf("%02d",floor($sec % 60));
      }

      function convertToPercentages($total, $val) {
            if ($val == 0 && $total == 0) {
                  return '';
            }elseif ($val != 0 && $total == 0) {
                  return number_format((float)100, 2, '.', '');
            }else{
                  // return number_format((float)100, 2, '.', '');
                  return number_format(($val/$total)*100, 2, '.', '');
            }
      }

      function rupiah2dec($total) {
            if ($total == 0) {
                  return "-";
            }else{
                  return number_format($total,0,',',',');
            }
      }
    // }
?>