<?php

        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Production Model');

        // design
  
        $styleAja = array (
                        'alignment' => array('horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
            );

        // title
            // Company Name
            $this->excel->getActiveSheet()->setCellValue('A1', 'PT HAENGSUNG');
            $this->excel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
            $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(26);
            $this->excel->getActiveSheet()->getStyle('A1:AU7')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

             // Judul
            $this->excel->getActiveSheet()->setCellValue('A2','Production Model '.$department->name);
            $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
            $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

            // Date
            $this->excel->getActiveSheet()->setCellValue('A3', $start_date." to ". $end_date);
            $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(16);
            $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        // header
            $this->excel->getActiveSheet()->setCellValue('A6', 'No');
            $this->excel->getActiveSheet()->mergeCells('A6:A7');
            $this->excel->getActiveSheet()->setCellValue('B6', 'Line');
            $this->excel->getActiveSheet()->mergeCells('B6:B7');           
            $this->excel->getActiveSheet()->setCellValue('C6', 'Part No');
            $this->excel->getActiveSheet()->mergeCells('C6:C7');           
            $this->excel->getActiveSheet()->setCellValue('D6', 'Start Date');
            $this->excel->getActiveSheet()->mergeCells('D6:D7');            
            $this->excel->getActiveSheet()->setCellValue('E6', 'End Date');
            $this->excel->getActiveSheet()->mergeCells('E6:E7');

            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);

            // Model Information'
            $this->excel->getActiveSheet()->setCellValue('F6', 'Production');
            $this->excel->getActiveSheet()->mergeCells('F6:K6');
            $this->excel->getActiveSheet()->setCellValue('F7', 'Plan Qty');
            $this->excel->getActiveSheet()->setCellValue('G7', 'Table Qty');
            $this->excel->getActiveSheet()->setCellValue('H7', 'Input Qty');
            $this->excel->getActiveSheet()->setCellValue('I7', 'Output Qty');
            $this->excel->getActiveSheet()->setCellValue('J7', '+/-');
            $this->excel->getActiveSheet()->setCellValue('K7', '%');
            $this->excel->getActiveSheet()->setCellValue('L6', 'Ranking');
            $this->excel->getActiveSheet()->mergeCells('L6:L7');
           

            // DATA
        $i = 1;
        $rowStart = 8;

        foreach ($dataA as $key) {
            // $id = "'".$key['id']."'";
            $this->excel->getActiveSheet()->setCellValue('A'.$rowStart, $i);
            $this->excel->getActiveSheet()->setCellValue('B'.$rowStart, $key['line']);
            $this->excel->getActiveSheet()->setCellValue('C'.$rowStart, $key['part_no']);
            $this->excel->getActiveSheet()->setCellValue('D'.$rowStart, $key['start_date']);
            $this->excel->getActiveSheet()->setCellValue('E'.$rowStart, $key['end_date']);
            $this->excel->getActiveSheet()->setCellValue('F'.$rowStart, $key['plan_qty']);
            $this->excel->getActiveSheet()->setCellValue('G'.$rowStart, $key['table_qty']);
            $this->excel->getActiveSheet()->setCellValue('H'.$rowStart, $key['input_qty']);
            $this->excel->getActiveSheet()->setCellValue('I'.$rowStart, $key['output_qty']);
            $this->excel->getActiveSheet()->setCellValue('J'.$rowStart, $key['result']);
            $this->excel->getActiveSheet()->setCellValue('K'.$rowStart, number_format($key['persen'],2,",","."));
            $this->excel->getActiveSheet()->setCellValue('L'.$rowStart,$key['rank']);

            $rowStart++;
            $i++;
        }

        foreach ($dataB as $key) {
            // $id = "'".$key['id']."'";
            $this->excel->getActiveSheet()->setCellValue('A'.$rowStart, $i);
            $this->excel->getActiveSheet()->setCellValue('B'.$rowStart, $key['line']);
            $this->excel->getActiveSheet()->setCellValue('C'.$rowStart, $key['part_no']);
            $this->excel->getActiveSheet()->setCellValue('D'.$rowStart, $key['start_date']);
            $this->excel->getActiveSheet()->setCellValue('E'.$rowStart, $key['end_date']);
            $this->excel->getActiveSheet()->setCellValue('F'.$rowStart, $key['plan_qty']);
            $this->excel->getActiveSheet()->setCellValue('G'.$rowStart, $key['table_qty']);
            $this->excel->getActiveSheet()->setCellValue('H'.$rowStart, $key['input_qty']);
            $this->excel->getActiveSheet()->setCellValue('I'.$rowStart, $key['output_qty']);
            $this->excel->getActiveSheet()->setCellValue('J'.$rowStart, $key['result']);
            $this->excel->getActiveSheet()->setCellValue('K'.$rowStart, number_format($key['persen'],2,",","."));
            $this->excel->getActiveSheet()->setCellValue('L'.$rowStart,$key['rank']);

            $rowStart++;
            $i++;
        }


        foreach ($dataC as $key) {
            // $id = "'".$key['id']."'";
            $this->excel->getActiveSheet()->setCellValue('A'.$rowStart, $i);
            $this->excel->getActiveSheet()->setCellValue('B'.$rowStart, $key['line']);
            $this->excel->getActiveSheet()->setCellValue('C'.$rowStart, $key['part_no']);
            $this->excel->getActiveSheet()->setCellValue('D'.$rowStart, $key['start_date']);
            $this->excel->getActiveSheet()->setCellValue('E'.$rowStart, $key['end_date']);
            $this->excel->getActiveSheet()->setCellValue('F'.$rowStart, $key['plan_qty']);
            $this->excel->getActiveSheet()->setCellValue('G'.$rowStart, $key['table_qty']);
            $this->excel->getActiveSheet()->setCellValue('H'.$rowStart, $key['input_qty']);
            $this->excel->getActiveSheet()->setCellValue('I'.$rowStart, $key['output_qty']);
            $this->excel->getActiveSheet()->setCellValue('J'.$rowStart, $key['result']);
            $this->excel->getActiveSheet()->setCellValue('K'.$rowStart, number_format($key['persen'],2,",","."));
            $this->excel->getActiveSheet()->setCellValue('L'.$rowStart,$key['rank']);

            $rowStart++;
            $i++;
        }

        foreach ($datatot as $key) {
            // $id = "'".$key['id']."'";
            $this->excel->getActiveSheet()->setCellValue('A'.$rowStart, '');
            $this->excel->getActiveSheet()->setCellValue('B'.$rowStart, 'GRAND TOTAL');
            $this->excel->getActiveSheet()->setCellValue('C'.$rowStart, '');
            $this->excel->getActiveSheet()->setCellValue('D'.$rowStart, '');
            $this->excel->getActiveSheet()->setCellValue('E'.$rowStart, '');
            $this->excel->getActiveSheet()->setCellValue('F'.$rowStart, $key['tot_plan_qty']);
            $this->excel->getActiveSheet()->setCellValue('G'.$rowStart, $key['tot_table_qty']);
            $this->excel->getActiveSheet()->setCellValue('H'.$rowStart, $key['tot_input_qty']);
            $this->excel->getActiveSheet()->setCellValue('I'.$rowStart, $key['tot_output_qty']);
            $this->excel->getActiveSheet()->setCellValue('J'.$rowStart, $key['tot_result']);
            $this->excel->getActiveSheet()->setCellValue('K'.$rowStart, number_format($key['tot_persen'],2,",","."));
            $this->excel->getActiveSheet()->setCellValue('L'.$rowStart,$key['rank']);

            $rowStart++;
            $i++;
        }



        $this->excel->getActiveSheet()->getStyle("A6:L".$rowStart)->applyFromArray(
            array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN, PHPExcel_Style_Alignment::VERTICAL_CENTER,

                    )
                )
            )

        );

        $this->excel->getActiveSheet()->getStyle("A6:L".$rowStart)->applyFromArray(
            array(
                'alignment' => array('horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
            )

        );

        $filename= 'Smart Andon Haengsug - Production Model - '.date('Ymdhis').'.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache


        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
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