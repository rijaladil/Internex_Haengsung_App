<?php

        //activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Production Status (Day)');


        $styleAja = array (
                        'alignment' => array('horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
            );

        // title
            // Company Name
            $this->excel->getActiveSheet()->setCellValue('A1', 'PT HAENGSUNG');
            $this->excel->getActiveSheet()->getRowDimension('1')->setRowHeight(30);
            $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(26);
            $this->excel->getActiveSheet()->getStyle('A1:AS7')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

             // Judul
            $this->excel->getActiveSheet()->setCellValue('A2','Production Status (Day) '.$department->name);
            $this->excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
            $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

            // Date
            $this->excel->getActiveSheet()->setCellValue('A3', $date);
            $this->excel->getActiveSheet()->getStyle('A3')->getFont()->setSize(16);
            $this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

        // width
            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);

        // header
            $this->excel->getActiveSheet()->setCellValue('A6', 'Process');
            $this->excel->getActiveSheet()->mergeCells('A6:A7');

            $this->excel->getActiveSheet()->setCellValue('B6', 'Line / MC');
            $this->excel->getActiveSheet()->mergeCells('B6:B7');
            $this->excel->getActiveSheet()->setCellValue('C6', 'Item');
            $this->excel->getActiveSheet()->mergeCells('C6:C7');
            

            $this->excel->getActiveSheet()->setCellValue('D6','Production Plan');
            $this->excel->getActiveSheet()->mergeCells('D6:AH6');
            $this->excel->getActiveSheet()->setCellValue('AI6','Total');
            $this->excel->getActiveSheet()->mergeCells('AI6:AI7');

            $this->excel->getActiveSheet()->setCellValue('D7','1');
            $this->excel->getActiveSheet()->setCellValue('E7','2');
            $this->excel->getActiveSheet()->setCellValue('F7','3');
            $this->excel->getActiveSheet()->setCellValue('G7','4');
            $this->excel->getActiveSheet()->setCellValue('H7','5');
            $this->excel->getActiveSheet()->setCellValue('I7','6');
            $this->excel->getActiveSheet()->setCellValue('J7','7');
            $this->excel->getActiveSheet()->setCellValue('K7','8');
            $this->excel->getActiveSheet()->setCellValue('L7','9');
            $this->excel->getActiveSheet()->setCellValue('M7','10');
            $this->excel->getActiveSheet()->setCellValue('N7','11');
            $this->excel->getActiveSheet()->setCellValue('O7','12');
            $this->excel->getActiveSheet()->setCellValue('P7','13');
            $this->excel->getActiveSheet()->setCellValue('Q7','14');
            $this->excel->getActiveSheet()->setCellValue('R7','15');
            $this->excel->getActiveSheet()->setCellValue('S7','16');
            $this->excel->getActiveSheet()->setCellValue('T7','17');
            $this->excel->getActiveSheet()->setCellValue('U7','18');
            $this->excel->getActiveSheet()->setCellValue('V7','19');
            $this->excel->getActiveSheet()->setCellValue('W7','20');
            $this->excel->getActiveSheet()->setCellValue('X7','21');
            $this->excel->getActiveSheet()->setCellValue('Y7','22');
            $this->excel->getActiveSheet()->setCellValue('Z7','23');
            $this->excel->getActiveSheet()->setCellValue('AA7','24');
            $this->excel->getActiveSheet()->setCellValue('AB7','25');
            $this->excel->getActiveSheet()->setCellValue('AC7','26');
            $this->excel->getActiveSheet()->setCellValue('AD7','27');
            $this->excel->getActiveSheet()->setCellValue('AE7','28');
            $this->excel->getActiveSheet()->setCellValue('AF7','29');
            $this->excel->getActiveSheet()->setCellValue('AG7','30');
            $this->excel->getActiveSheet()->setCellValue('AH7','31');

            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            // Model Information'

     $i = 1;
     $rowStart = 8;
  
      // for ($xx=1; $xx < 3; $xx++) {
  

            foreach ($data as $key) {
             // $id = "'".$key['id']."'";

             $this->excel->getActiveSheet()->setCellValue('A'.$rowStart, $key['dept']);
             $this->excel->getActiveSheet()->getStyle('A'.$rowStart)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
             $this->excel->getActiveSheet()->mergeCells('A'.$rowStart.':A'.($rowStart+5));

             $this->excel->getActiveSheet()->setCellValue('B'.$rowStart, $key['machine']);
             $this->excel->getActiveSheet()->getStyle('B'.$rowStart)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
             $this->excel->getActiveSheet()->mergeCells('B'.$rowStart.':B'.($rowStart+5));


             $this->excel->getActiveSheet()->setCellValue('C'.($rowStart), 'Plan');
             $this->excel->getActiveSheet()->setCellValue('C'.($rowStart+1), 'Table');
             $this->excel->getActiveSheet()->setCellValue('C'.($rowStart+2), 'Input');
             $this->excel->getActiveSheet()->setCellValue('C'.($rowStart+3), 'Output');
             $this->excel->getActiveSheet()->setCellValue('C'.($rowStart+4), '+/-');
             $this->excel->getActiveSheet()->setCellValue('C'.($rowStart+5), '%');

             $this->excel->getActiveSheet()->setCellValue('D'.($rowStart), ($key['planDay1']));
             $this->excel->getActiveSheet()->setCellValue('D'.($rowStart+1), ($key['result_table_Day1']));
             $this->excel->getActiveSheet()->setCellValue('D'.($rowStart+2), ($key['result_input_Day1']));
             $this->excel->getActiveSheet()->setCellValue('D'.($rowStart+3), ($key['result_output_Day1']));
             $this->excel->getActiveSheet()->setCellValue('D'.($rowStart+4), ($key['result_output_Day1'])-$key['planDay1']);
             $this->excel->getActiveSheet()->setCellValue('D'.($rowStart+5), empty($key['planDay1']) ? '' : number_format(($key['result_output_Day1']/$key['planDay1'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('E'.($rowStart), ($key['planDay2']));
             $this->excel->getActiveSheet()->setCellValue('E'.($rowStart+1), ($key['result_table_Day2']));
             $this->excel->getActiveSheet()->setCellValue('E'.($rowStart+2), ($key['result_input_Day2']));
             $this->excel->getActiveSheet()->setCellValue('E'.($rowStart+3), ($key['result_output_Day2']));
             $this->excel->getActiveSheet()->setCellValue('E'.($rowStart+4), ($key['result_output_Day2'])-$key['planDay2']);
             $this->excel->getActiveSheet()->setCellValue('E'.($rowStart+5), empty($key['planDay2']) ? '' : number_format(($key['result_output_Day2']/$key['planDay2'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('F'.($rowStart), ($key['planDay3']));
             $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+1), ($key['result_table_Day3']));
             $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+2), ($key['result_input_Day3']));
             $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+3), ($key['result_output_Day3']));
             $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+4), ($key['result_output_Day3'])-$key['planDay3']);
             $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+5), empty($key['planDay3']) ? '' : number_format(($key['result_output_Day3']/$key['planDay3'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('G'.($rowStart), ($key['planDay4']));
             $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+1), ($key['result_table_Day4']));
             $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+2), ($key['result_input_Day4']));
             $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+3), ($key['result_output_Day4']));
             $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+4), ($key['result_output_Day4'])-$key['planDay4']);
             $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+5), empty($key['planDay4']) ? '' : number_format(($key['result_output_Day4']/$key['planDay4'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('H'.($rowStart), ($key['planDay5']));
             $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+1), ($key['result_table_Day5']));
             $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+2), ($key['result_input_Day5']));
             $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+3), ($key['result_output_Day5']));
             $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+4), ($key['result_output_Day5'])-$key['planDay5']);
             $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+5), empty($key['planDay5']) ? '' : number_format(($key['result_output_Day5']/$key['planDay5'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('I'.($rowStart), ($key['planDay6']));
             $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+1), ($key['result_table_Day6']));
             $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+2), ($key['result_input_Day6']));
             $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+3), ($key['result_output_Day6']));
             $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+4), ($key['result_output_Day6'])-$key['planDay6']);
             $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+5), empty($key['planDay6']) ? '' : number_format(($key['result_output_Day6']/$key['planDay6'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('J'.($rowStart), ($key['planDay7']));
             $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+1), ($key['result_table_Day7']));
             $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+2), ($key['result_input_Day7']));
             $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+3), ($key['result_output_Day7']));
             $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+4), ($key['result_output_Day7'])-$key['planDay7']);
             $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+5), empty($key['planDay7']) ? '' : number_format(($key['result_output_Day7']/$key['planDay7'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('K'.($rowStart), ($key['planDay8']));
             $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+1), ($key['result_table_Day8']));
             $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+2), ($key['result_input_Day8']));
             $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+3), ($key['result_output_Day8']));
             $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+4), ($key['result_output_Day8'])-$key['planDay8']);
             $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+5), empty($key['planDay8']) ? '' : number_format(($key['result_output_Day8']/$key['planDay8'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('L'.($rowStart), ($key['planDay9']));
             $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+1), ($key['result_table_Day9']));
             $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+2), ($key['result_input_Day9']));
             $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+3), ($key['result_output_Day9']));
             $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+4), ($key['result_output_Day9'])-$key['planDay9']);
             $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+5), empty($key['planDay9']) ? '' : number_format(($key['result_output_Day9']/$key['planDay9'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('M'.($rowStart), ($key['planDay10']));
             $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+1), ($key['result_table_Day10']));
             $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+2), ($key['result_input_Day10']));
             $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+3), ($key['result_output_Day10']));
             $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+4), ($key['result_output_Day10'])-$key['planDay10']);
             $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+5), empty($key['planDay10']) ? '' : number_format(($key['result_output_Day10']/$key['planDay10'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('N'.($rowStart), ($key['planDay11']));
             $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+1), ($key['result_table_Day11']));
             $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+2), ($key['result_input_Day11']));
             $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+3), ($key['result_output_Day11']));
             $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+4), ($key['result_output_Day11'])-$key['planDay11']);
             $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+5), empty($key['planQtyTot']) ? '' : number_format(($key['result_output_Day11']/$key['planDay11'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('O'.($rowStart), ($key['planDay12']));
             $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+1), ($key['result_table_Day12']));
             $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+2), ($key['result_input_Day12']));
             $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+3), ($key['result_output_Day12']));
             $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+4), ($key['result_output_Day12'])-$key['planDay12']);
             $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+5), (empty($key['planDay12']) ? '' : number_format($key['result_output_Day12']/$key['planDay12'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('P'.($rowStart), ($key['planDay13']));
             $this->excel->getActiveSheet()->setCellValue('P'.($rowStart+1), ($key['result_table_Day13']));
             $this->excel->getActiveSheet()->setCellValue('P'.($rowStart+2), ($key['result_input_Day13']));
             $this->excel->getActiveSheet()->setCellValue('P'.($rowStart+3), ($key['result_output_Day13']));
             $this->excel->getActiveSheet()->setCellValue('P'.($rowStart+4), ($key['result_output_Day13'])-$key['planDay13']);
             $this->excel->getActiveSheet()->setCellValue('P'.($rowStart+5), empty($key['planDay13']) ? '' : number_format(($key['result_output_Day13']/$key['planDay13'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart), ($key['planDay14']));
             $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart+1), ($key['result_table_Day14']));
             $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart+2), ($key['result_input_Day14']));
             $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart+3), ($key['result_output_Day14']));
             $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart+4), ($key['result_output_Day14'])-$key['planDay14']);
             $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart+5), empty($key['planDay14']) ? '' : number_format(($key['result_output_Day14']/$key['planDay14'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('R'.($rowStart), ($key['planDay15']));
             $this->excel->getActiveSheet()->setCellValue('R'.($rowStart+1), ($key['result_table_Day15']));
             $this->excel->getActiveSheet()->setCellValue('R'.($rowStart+2), ($key['result_input_Day15']));
             $this->excel->getActiveSheet()->setCellValue('R'.($rowStart+3), ($key['result_output_Day15']));
             $this->excel->getActiveSheet()->setCellValue('R'.($rowStart+4), ($key['result_output_Day15'])-$key['planDay15']);
             $this->excel->getActiveSheet()->setCellValue('R'.($rowStart+5), empty($key['planDay15']) ? '' : number_format(($key['result_output_Day15']/$key['planDay15'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('S'.($rowStart), ($key['planDay16']));
             $this->excel->getActiveSheet()->setCellValue('S'.($rowStart+1), ($key['result_table_Day16']));
             $this->excel->getActiveSheet()->setCellValue('S'.($rowStart+2), ($key['result_input_Day16']));
             $this->excel->getActiveSheet()->setCellValue('S'.($rowStart+3), ($key['result_output_Day16']));
             $this->excel->getActiveSheet()->setCellValue('S'.($rowStart+4), ($key['result_output_Day16'])-$key['planDay16']);
             $this->excel->getActiveSheet()->setCellValue('S'.($rowStart+5), empty($key['planDay16']) ? '' : number_format(($key['result_output_Day16']/$key['planDay16'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('T'.($rowStart), ($key['planDay17']));
             $this->excel->getActiveSheet()->setCellValue('T'.($rowStart+1), ($key['result_table_Day17']));
             $this->excel->getActiveSheet()->setCellValue('T'.($rowStart+2), ($key['result_input_Day17']));
             $this->excel->getActiveSheet()->setCellValue('T'.($rowStart+3), ($key['result_output_Day17']));
             $this->excel->getActiveSheet()->setCellValue('T'.($rowStart+4), ($key['result_output_Day17'])-$key['planDay17']);
             $this->excel->getActiveSheet()->setCellValue('T'.($rowStart+5), empty($key['planDay17']) ? '' : number_format(($key['result_output_Day17']/$key['planDay17'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('U'.($rowStart), ($key['planDay18']));
             $this->excel->getActiveSheet()->setCellValue('U'.($rowStart+1), ($key['result_table_Day18']));
             $this->excel->getActiveSheet()->setCellValue('U'.($rowStart+2), ($key['result_input_Day18']));
             $this->excel->getActiveSheet()->setCellValue('U'.($rowStart+3), ($key['result_output_Day18']));
             $this->excel->getActiveSheet()->setCellValue('U'.($rowStart+4), ($key['result_output_Day18'])-$key['planDay18']);
             $this->excel->getActiveSheet()->setCellValue('U'.($rowStart+5), (empty($key['planDay18']) ? '' : number_format($key['result_output_Day18']/$key['planDay18'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('V'.($rowStart), ($key['planDay19']));
             $this->excel->getActiveSheet()->setCellValue('V'.($rowStart+1), ($key['result_table_Day19']));
             $this->excel->getActiveSheet()->setCellValue('V'.($rowStart+2), ($key['result_input_Day19']));
             $this->excel->getActiveSheet()->setCellValue('V'.($rowStart+3), ($key['result_output_Day19']));
             $this->excel->getActiveSheet()->setCellValue('V'.($rowStart+4), ($key['result_output_Day19'])-$key['planDay19']);
             $this->excel->getActiveSheet()->setCellValue('V'.($rowStart+5), empty($key['planDay19']) ? '' : number_format(($key['result_output_Day19']/$key['planDay19'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('W'.($rowStart), ($key['planDay20']));
             $this->excel->getActiveSheet()->setCellValue('W'.($rowStart+1), ($key['result_table_Day20']));
             $this->excel->getActiveSheet()->setCellValue('W'.($rowStart+2), ($key['result_input_Day20']));
             $this->excel->getActiveSheet()->setCellValue('W'.($rowStart+3), ($key['result_output_Day20']));
             $this->excel->getActiveSheet()->setCellValue('W'.($rowStart+4), ($key['result_output_Day20'])-$key['planDay20']);
             $this->excel->getActiveSheet()->setCellValue('W'.($rowStart+5), empty($key['planDay20']) ? '' : number_format(($key['result_output_Day20']/$key['planDay20'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('X'.($rowStart), ($key['planDay21']));
             $this->excel->getActiveSheet()->setCellValue('X'.($rowStart+1), ($key['result_table_Day21']));
             $this->excel->getActiveSheet()->setCellValue('X'.($rowStart+2), ($key['result_input_Day21']));
             $this->excel->getActiveSheet()->setCellValue('X'.($rowStart+3), ($key['result_output_Day21']));
             $this->excel->getActiveSheet()->setCellValue('X'.($rowStart+4), ($key['result_output_Day21'])-$key['planDay21']);
             $this->excel->getActiveSheet()->setCellValue('X'.($rowStart+5), empty($key['planDay21']) ? '' : number_format(($key['result_output_Day21']/$key['planDay21'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('Y'.($rowStart), ($key['planDay22']));
             $this->excel->getActiveSheet()->setCellValue('Y'.($rowStart+1), ($key['result_table_Day22']));
             $this->excel->getActiveSheet()->setCellValue('Y'.($rowStart+2), ($key['result_input_Day22']));
             $this->excel->getActiveSheet()->setCellValue('Y'.($rowStart+3), ($key['result_output_Day22']));
             $this->excel->getActiveSheet()->setCellValue('Y'.($rowStart+4), ($key['result_output_Day22'])-$key['planDay22']);
             $this->excel->getActiveSheet()->setCellValue('Y'.($rowStart+5), empty($key['planDay22']) ? '' : number_format(($key['result_output_Day22']/$key['planDay22'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('Z'.($rowStart), ($key['planDay23']));
             $this->excel->getActiveSheet()->setCellValue('Z'.($rowStart+1), ($key['result_table_Day23']));
             $this->excel->getActiveSheet()->setCellValue('Z'.($rowStart+2), ($key['result_input_Day23']));
             $this->excel->getActiveSheet()->setCellValue('Z'.($rowStart+3), ($key['result_output_Day23']));
             $this->excel->getActiveSheet()->setCellValue('Z'.($rowStart+4), ($key['result_output_Day23'])-$key['planDay23']);
             $this->excel->getActiveSheet()->setCellValue('Z'.($rowStart+5), empty($key['planDay23']) ? '' : number_format(($key['result_output_Day23']/$key['planDay23'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AA'.($rowStart), ($key['planDay24']));
             $this->excel->getActiveSheet()->setCellValue('AA'.($rowStart+1), ($key['result_table_Day24']));
             $this->excel->getActiveSheet()->setCellValue('AA'.($rowStart+2), ($key['result_input_Day24']));
             $this->excel->getActiveSheet()->setCellValue('AA'.($rowStart+3), ($key['result_output_Day24']));
             $this->excel->getActiveSheet()->setCellValue('AA'.($rowStart+4), ($key['result_output_Day24'])-$key['planDay24']);
             $this->excel->getActiveSheet()->setCellValue('AA'.($rowStart+5), empty($key['planDay24']) ? '' : number_format(($key['result_output_Day24']/$key['planDay24'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AB'.($rowStart), ($key['planDay25']));
             $this->excel->getActiveSheet()->setCellValue('AB'.($rowStart+1), ($key['result_table_Day25']));
             $this->excel->getActiveSheet()->setCellValue('AB'.($rowStart+2), ($key['result_input_Day25']));
             $this->excel->getActiveSheet()->setCellValue('AB'.($rowStart+3), ($key['result_output_Day25']));
             $this->excel->getActiveSheet()->setCellValue('AB'.($rowStart+4), ($key['result_output_Day25'])-$key['planDay25']);
             $this->excel->getActiveSheet()->setCellValue('AB'.($rowStart+5), empty($key['planDay25']) ? '' : number_format(($key['result_output_Day25']/$key['planDay25'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AC'.($rowStart), ($key['planDay26']));
             $this->excel->getActiveSheet()->setCellValue('AC'.($rowStart+1), ($key['result_table_Day26']));
             $this->excel->getActiveSheet()->setCellValue('AC'.($rowStart+2), ($key['result_input_Day26']));
             $this->excel->getActiveSheet()->setCellValue('AC'.($rowStart+3), ($key['result_output_Day26']));
             $this->excel->getActiveSheet()->setCellValue('AC'.($rowStart+4), ($key['result_output_Day26'])-$key['planDay26']);
             $this->excel->getActiveSheet()->setCellValue('AC'.($rowStart+5), empty($key['planDay26']) ? '' : number_format(($key['result_output_Day26']/$key['planDay26'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AD'.($rowStart), ($key['planDay27']));
             $this->excel->getActiveSheet()->setCellValue('AD'.($rowStart+1), ($key['result_table_Day27']));
             $this->excel->getActiveSheet()->setCellValue('AD'.($rowStart+2), ($key['result_input_Day27']));
             $this->excel->getActiveSheet()->setCellValue('AD'.($rowStart+3), ($key['result_output_Day27']));
             $this->excel->getActiveSheet()->setCellValue('AD'.($rowStart+4), ($key['result_output_Day27'])-$key['planDay27']);
             $this->excel->getActiveSheet()->setCellValue('AD'.($rowStart+5), empty($key['planDay27']) ? '' : number_format(($key['result_output_Day27']/$key['planDay27'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AE'.($rowStart), ($key['planDay28']));
             $this->excel->getActiveSheet()->setCellValue('AE'.($rowStart+1), ($key['result_table_Day28']));
             $this->excel->getActiveSheet()->setCellValue('AE'.($rowStart+2), ($key['result_input_Day28']));
             $this->excel->getActiveSheet()->setCellValue('AE'.($rowStart+3), ($key['result_output_Day28']));
             $this->excel->getActiveSheet()->setCellValue('AE'.($rowStart+4), ($key['result_output_Day28'])-$key['planDay28']);
             $this->excel->getActiveSheet()->setCellValue('AE'.($rowStart+5), empty($key['planDay28']) ? '' : number_format(($key['result_output_Day28']/$key['planDay28'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AF'.($rowStart), ($key['planDay29']));
             $this->excel->getActiveSheet()->setCellValue('AF'.($rowStart+1), ($key['result_table_Day29']));
             $this->excel->getActiveSheet()->setCellValue('AF'.($rowStart+2), ($key['result_input_Day29']));
             $this->excel->getActiveSheet()->setCellValue('AF'.($rowStart+3), ($key['result_output_Day29']));
             $this->excel->getActiveSheet()->setCellValue('AF'.($rowStart+4), ($key['result_output_Day29'])-$key['planDay29']);
             $this->excel->getActiveSheet()->setCellValue('AF'.($rowStart+5), empty($key['planDay29']) ? '' : number_format(($key['result_output_Day29']/$key['planDay29'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AG'.($rowStart), ($key['planDay30']));
             $this->excel->getActiveSheet()->setCellValue('AG'.($rowStart+1), ($key['result_table_Day30']));
             $this->excel->getActiveSheet()->setCellValue('AG'.($rowStart+2), ($key['result_input_Day30']));
             $this->excel->getActiveSheet()->setCellValue('AG'.($rowStart+3), ($key['result_output_Day30']));
             $this->excel->getActiveSheet()->setCellValue('AG'.($rowStart+4), ($key['result_output_Day30'])-$key['planDay30']);
             $this->excel->getActiveSheet()->setCellValue('AG'.($rowStart+5), empty($key['planDay30']) ? '' : number_format(($key['result_output_Day30']/$key['planDay30'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AH'.($rowStart), ($key['planDay31']));
             $this->excel->getActiveSheet()->setCellValue('AH'.($rowStart+1), ($key['result_table_Day31']));
             $this->excel->getActiveSheet()->setCellValue('AH'.($rowStart+2), ($key['result_input_Day31']));
             $this->excel->getActiveSheet()->setCellValue('AH'.($rowStart+3), ($key['result_output_Day31']));
             $this->excel->getActiveSheet()->setCellValue('AH'.($rowStart+4), ($key['result_output_Day31'])-$key['planDay31']);
             $this->excel->getActiveSheet()->setCellValue('AH'.($rowStart+5), empty($key['planDay31']) ? '' : number_format(($key['result_output_Day30']/$key['planDay31'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AI'.($rowStart), ($key['planQtyTot']));
             $this->excel->getActiveSheet()->setCellValue('AI'.($rowStart+1), ($key['tableQtyTot']));
             $this->excel->getActiveSheet()->setCellValue('AI'.($rowStart+2), ($key['inputQtyTot']));
             $this->excel->getActiveSheet()->setCellValue('AI'.($rowStart+3), ($key['outputQtyTot']));
             $this->excel->getActiveSheet()->setCellValue('AI'.($rowStart+4), ($key['outputQtyTot'])-$key['planQtyTot']);
             $this->excel->getActiveSheet()->setCellValue('AI'.($rowStart+5), empty($key['planQtyTot']) ? '' : number_format(($key['outputQtyTot']/$key['planQtyTot'])*100),2,",",".");
             
             $rowStart = $rowStart + 6;
             $i++;

             }
      // TOTAL
              foreach ($datatot as $key) {
             // $id = "'".$key['id']."'";

             $this->excel->getActiveSheet()->setCellValue('A'.$rowStart, 'TOTAL');
             $this->excel->getActiveSheet()->getStyle('A'.$rowStart)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
             $this->excel->getActiveSheet()->mergeCells('A'.$rowStart.':B'.($rowStart+5));



             $this->excel->getActiveSheet()->setCellValue('C'.($rowStart), 'Plan');
             $this->excel->getActiveSheet()->setCellValue('C'.($rowStart+1), 'Table');
             $this->excel->getActiveSheet()->setCellValue('C'.($rowStart+2), 'Input');
             $this->excel->getActiveSheet()->setCellValue('C'.($rowStart+3), 'Output');
             $this->excel->getActiveSheet()->setCellValue('C'.($rowStart+4), '+/-');
             $this->excel->getActiveSheet()->setCellValue('C'.($rowStart+5), '%');

             $this->excel->getActiveSheet()->setCellValue('D'.($rowStart), ($key['planDay1']));
             $this->excel->getActiveSheet()->setCellValue('D'.($rowStart+1), ($key['result_table_Day1']));
             $this->excel->getActiveSheet()->setCellValue('D'.($rowStart+2), ($key['result_input_Day1']));
             $this->excel->getActiveSheet()->setCellValue('D'.($rowStart+3), ($key['result_output_Day1']));
             $this->excel->getActiveSheet()->setCellValue('D'.($rowStart+4), ($key['result_output_Day1'])-$key['planDay1']);
             $this->excel->getActiveSheet()->setCellValue('D'.($rowStart+5), empty($key['planDay1']) ? '' : number_format(($key['result_output_Day1']/$key['planDay1'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('E'.($rowStart), ($key['planDay2']));
             $this->excel->getActiveSheet()->setCellValue('E'.($rowStart+1), ($key['result_table_Day2']));
             $this->excel->getActiveSheet()->setCellValue('E'.($rowStart+2), ($key['result_input_Day2']));
             $this->excel->getActiveSheet()->setCellValue('E'.($rowStart+3), ($key['result_output_Day2']));
             $this->excel->getActiveSheet()->setCellValue('E'.($rowStart+4), ($key['result_output_Day2'])-$key['planDay2']);
             $this->excel->getActiveSheet()->setCellValue('E'.($rowStart+5), empty($key['planDay2']) ? '' : number_format(($key['result_output_Day2']/$key['planDay2'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('F'.($rowStart), ($key['planDay3']));
             $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+1), ($key['result_table_Day3']));
             $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+2), ($key['result_input_Day3']));
             $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+3), ($key['result_output_Day3']));
             $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+4), ($key['result_output_Day3'])-$key['planDay3']);
             $this->excel->getActiveSheet()->setCellValue('F'.($rowStart+5), empty($key['planDay3']) ? '' : number_format(($key['result_output_Day3']/$key['planDay3'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('G'.($rowStart), ($key['planDay4']));
             $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+1), ($key['result_table_Day4']));
             $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+2), ($key['result_input_Day4']));
             $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+3), ($key['result_output_Day4']));
             $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+4), ($key['result_output_Day4'])-$key['planDay4']);
             $this->excel->getActiveSheet()->setCellValue('G'.($rowStart+5), empty($key['planDay4']) ? '' : number_format(($key['result_output_Day4']/$key['planDay4'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('H'.($rowStart), ($key['planDay5']));
             $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+1), ($key['result_table_Day5']));
             $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+2), ($key['result_input_Day5']));
             $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+3), ($key['result_output_Day5']));
             $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+4), ($key['result_output_Day5'])-$key['planDay5']);
             $this->excel->getActiveSheet()->setCellValue('H'.($rowStart+5), empty($key['planDay5']) ? '' : number_format(($key['result_output_Day5']/$key['planDay5'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('I'.($rowStart), ($key['planDay6']));
             $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+1), ($key['result_table_Day6']));
             $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+2), ($key['result_input_Day6']));
             $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+3), ($key['result_output_Day6']));
             $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+4), ($key['result_output_Day6'])-$key['planDay6']);
             $this->excel->getActiveSheet()->setCellValue('I'.($rowStart+5), empty($key['planDay6']) ? '' : number_format(($key['result_output_Day6']/$key['planDay6'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('J'.($rowStart), ($key['planDay7']));
             $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+1), ($key['result_table_Day7']));
             $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+2), ($key['result_input_Day7']));
             $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+3), ($key['result_output_Day7']));
             $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+4), ($key['result_output_Day7'])-$key['planDay7']);
             $this->excel->getActiveSheet()->setCellValue('J'.($rowStart+5), empty($key['planDay7']) ? '' : number_format(($key['result_output_Day7']/$key['planDay7'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('K'.($rowStart), ($key['planDay8']));
             $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+1), ($key['result_table_Day8']));
             $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+2), ($key['result_input_Day8']));
             $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+3), ($key['result_output_Day8']));
             $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+4), ($key['result_output_Day8'])-$key['planDay8']);
             $this->excel->getActiveSheet()->setCellValue('K'.($rowStart+5), empty($key['planDay8']) ? '' : number_format(($key['result_output_Day8']/$key['planDay8'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('L'.($rowStart), ($key['planDay9']));
             $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+1), ($key['result_table_Day9']));
             $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+2), ($key['result_input_Day9']));
             $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+3), ($key['result_output_Day9']));
             $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+4), ($key['result_output_Day9'])-$key['planDay9']);
             $this->excel->getActiveSheet()->setCellValue('L'.($rowStart+5), empty($key['planDay9']) ? '' : number_format(($key['result_output_Day9']/$key['planDay9'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('M'.($rowStart), ($key['planDay10']));
             $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+1), ($key['result_table_Day10']));
             $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+2), ($key['result_input_Day10']));
             $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+3), ($key['result_output_Day10']));
             $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+4), ($key['result_output_Day10'])-$key['planDay10']);
             $this->excel->getActiveSheet()->setCellValue('M'.($rowStart+5), empty($key['planDay10']) ? '' : number_format(($key['result_output_Day10']/$key['planDay10'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('N'.($rowStart), ($key['planDay11']));
             $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+1), ($key['result_table_Day11']));
             $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+2), ($key['result_input_Day11']));
             $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+3), ($key['result_output_Day11']));
             $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+4), ($key['result_output_Day11'])-$key['planDay11']);
             $this->excel->getActiveSheet()->setCellValue('N'.($rowStart+5), empty($key['planQtyTot']) ? '' : number_format(($key['result_output_Day11']/$key['planDay11'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('O'.($rowStart), ($key['planDay12']));
             $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+1), ($key['result_table_Day12']));
             $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+2), ($key['result_input_Day12']));
             $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+3), ($key['result_output_Day12']));
             $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+4), ($key['result_output_Day12'])-$key['planDay12']);
             $this->excel->getActiveSheet()->setCellValue('O'.($rowStart+5), (empty($key['planDay12']) ? '' : number_format($key['result_output_Day12']/$key['planDay12'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('P'.($rowStart), ($key['planDay13']));
             $this->excel->getActiveSheet()->setCellValue('P'.($rowStart+1), ($key['result_table_Day13']));
             $this->excel->getActiveSheet()->setCellValue('P'.($rowStart+2), ($key['result_input_Day13']));
             $this->excel->getActiveSheet()->setCellValue('P'.($rowStart+3), ($key['result_output_Day13']));
             $this->excel->getActiveSheet()->setCellValue('P'.($rowStart+4), ($key['result_output_Day13'])-$key['planDay13']);
             $this->excel->getActiveSheet()->setCellValue('P'.($rowStart+5), empty($key['planDay13']) ? '' : number_format(($key['result_output_Day13']/$key['planDay13'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart), ($key['planDay14']));
             $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart+1), ($key['result_table_Day14']));
             $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart+2), ($key['result_input_Day14']));
             $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart+3), ($key['result_output_Day14']));
             $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart+4), ($key['result_output_Day14'])-$key['planDay14']);
             $this->excel->getActiveSheet()->setCellValue('Q'.($rowStart+5), empty($key['planDay14']) ? '' : number_format(($key['result_output_Day14']/$key['planDay14'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('R'.($rowStart), ($key['planDay15']));
             $this->excel->getActiveSheet()->setCellValue('R'.($rowStart+1), ($key['result_table_Day15']));
             $this->excel->getActiveSheet()->setCellValue('R'.($rowStart+2), ($key['result_input_Day15']));
             $this->excel->getActiveSheet()->setCellValue('R'.($rowStart+3), ($key['result_output_Day15']));
             $this->excel->getActiveSheet()->setCellValue('R'.($rowStart+4), ($key['result_output_Day15'])-$key['planDay15']);
             $this->excel->getActiveSheet()->setCellValue('R'.($rowStart+5), empty($key['planDay15']) ? '' : number_format(($key['result_output_Day15']/$key['planDay15'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('S'.($rowStart), ($key['planDay16']));
             $this->excel->getActiveSheet()->setCellValue('S'.($rowStart+1), ($key['result_table_Day16']));
             $this->excel->getActiveSheet()->setCellValue('S'.($rowStart+2), ($key['result_input_Day16']));
             $this->excel->getActiveSheet()->setCellValue('S'.($rowStart+3), ($key['result_output_Day16']));
             $this->excel->getActiveSheet()->setCellValue('S'.($rowStart+4), ($key['result_output_Day16'])-$key['planDay16']);
             $this->excel->getActiveSheet()->setCellValue('S'.($rowStart+5), empty($key['planDay16']) ? '' : number_format(($key['result_output_Day16']/$key['planDay16'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('T'.($rowStart), ($key['planDay17']));
             $this->excel->getActiveSheet()->setCellValue('T'.($rowStart+1), ($key['result_table_Day17']));
             $this->excel->getActiveSheet()->setCellValue('T'.($rowStart+2), ($key['result_input_Day17']));
             $this->excel->getActiveSheet()->setCellValue('T'.($rowStart+3), ($key['result_output_Day17']));
             $this->excel->getActiveSheet()->setCellValue('T'.($rowStart+4), ($key['result_output_Day17'])-$key['planDay17']);
             $this->excel->getActiveSheet()->setCellValue('T'.($rowStart+5), empty($key['planDay17']) ? '' : number_format(($key['result_output_Day17']/$key['planDay17'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('U'.($rowStart), ($key['planDay18']));
             $this->excel->getActiveSheet()->setCellValue('U'.($rowStart+1), ($key['result_table_Day18']));
             $this->excel->getActiveSheet()->setCellValue('U'.($rowStart+2), ($key['result_input_Day18']));
             $this->excel->getActiveSheet()->setCellValue('U'.($rowStart+3), ($key['result_output_Day18']));
             $this->excel->getActiveSheet()->setCellValue('U'.($rowStart+4), ($key['result_output_Day18'])-$key['planDay18']);
             $this->excel->getActiveSheet()->setCellValue('U'.($rowStart+5), (empty($key['planDay18']) ? '' : number_format($key['result_output_Day18']/$key['planDay18'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('V'.($rowStart), ($key['planDay19']));
             $this->excel->getActiveSheet()->setCellValue('V'.($rowStart+1), ($key['result_table_Day19']));
             $this->excel->getActiveSheet()->setCellValue('V'.($rowStart+2), ($key['result_input_Day19']));
             $this->excel->getActiveSheet()->setCellValue('V'.($rowStart+3), ($key['result_output_Day19']));
             $this->excel->getActiveSheet()->setCellValue('V'.($rowStart+4), ($key['result_output_Day19'])-$key['planDay19']);
             $this->excel->getActiveSheet()->setCellValue('V'.($rowStart+5), empty($key['planDay19']) ? '' : number_format(($key['result_output_Day19']/$key['planDay19'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('W'.($rowStart), ($key['planDay20']));
             $this->excel->getActiveSheet()->setCellValue('W'.($rowStart+1), ($key['result_table_Day20']));
             $this->excel->getActiveSheet()->setCellValue('W'.($rowStart+2), ($key['result_input_Day20']));
             $this->excel->getActiveSheet()->setCellValue('W'.($rowStart+3), ($key['result_output_Day20']));
             $this->excel->getActiveSheet()->setCellValue('W'.($rowStart+4), ($key['result_output_Day20'])-$key['planDay20']);
             $this->excel->getActiveSheet()->setCellValue('W'.($rowStart+5), empty($key['planDay20']) ? '' : number_format(($key['result_output_Day20']/$key['planDay20'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('X'.($rowStart), ($key['planDay21']));
             $this->excel->getActiveSheet()->setCellValue('X'.($rowStart+1), ($key['result_table_Day21']));
             $this->excel->getActiveSheet()->setCellValue('X'.($rowStart+2), ($key['result_input_Day21']));
             $this->excel->getActiveSheet()->setCellValue('X'.($rowStart+3), ($key['result_output_Day21']));
             $this->excel->getActiveSheet()->setCellValue('X'.($rowStart+4), ($key['result_output_Day21'])-$key['planDay21']);
             $this->excel->getActiveSheet()->setCellValue('X'.($rowStart+5), empty($key['planDay21']) ? '' : number_format(($key['result_output_Day21']/$key['planDay21'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('Y'.($rowStart), ($key['planDay22']));
             $this->excel->getActiveSheet()->setCellValue('Y'.($rowStart+1), ($key['result_table_Day22']));
             $this->excel->getActiveSheet()->setCellValue('Y'.($rowStart+2), ($key['result_input_Day22']));
             $this->excel->getActiveSheet()->setCellValue('Y'.($rowStart+3), ($key['result_output_Day22']));
             $this->excel->getActiveSheet()->setCellValue('Y'.($rowStart+4), ($key['result_output_Day22'])-$key['planDay22']);
             $this->excel->getActiveSheet()->setCellValue('Y'.($rowStart+5), empty($key['planDay22']) ? '' : number_format(($key['result_output_Day22']/$key['planDay22'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('Z'.($rowStart), ($key['planDay23']));
             $this->excel->getActiveSheet()->setCellValue('Z'.($rowStart+1), ($key['result_table_Day23']));
             $this->excel->getActiveSheet()->setCellValue('Z'.($rowStart+2), ($key['result_input_Day23']));
             $this->excel->getActiveSheet()->setCellValue('Z'.($rowStart+3), ($key['result_output_Day23']));
             $this->excel->getActiveSheet()->setCellValue('Z'.($rowStart+4), ($key['result_output_Day23'])-$key['planDay23']);
             $this->excel->getActiveSheet()->setCellValue('Z'.($rowStart+5), empty($key['planDay23']) ? '' : number_format(($key['result_output_Day23']/$key['planDay23'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AA'.($rowStart), ($key['planDay24']));
             $this->excel->getActiveSheet()->setCellValue('AA'.($rowStart+1), ($key['result_table_Day24']));
             $this->excel->getActiveSheet()->setCellValue('AA'.($rowStart+2), ($key['result_input_Day24']));
             $this->excel->getActiveSheet()->setCellValue('AA'.($rowStart+3), ($key['result_output_Day24']));
             $this->excel->getActiveSheet()->setCellValue('AA'.($rowStart+4), ($key['result_output_Day24'])-$key['planDay24']);
             $this->excel->getActiveSheet()->setCellValue('AA'.($rowStart+5), empty($key['planDay24']) ? '' : number_format(($key['result_output_Day24']/$key['planDay24'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AB'.($rowStart), ($key['planDay25']));
             $this->excel->getActiveSheet()->setCellValue('AB'.($rowStart+1), ($key['result_table_Day25']));
             $this->excel->getActiveSheet()->setCellValue('AB'.($rowStart+2), ($key['result_input_Day25']));
             $this->excel->getActiveSheet()->setCellValue('AB'.($rowStart+3), ($key['result_output_Day25']));
             $this->excel->getActiveSheet()->setCellValue('AB'.($rowStart+4), ($key['result_output_Day25'])-$key['planDay25']);
             $this->excel->getActiveSheet()->setCellValue('AB'.($rowStart+5), empty($key['planDay25']) ? '' : number_format(($key['result_output_Day25']/$key['planDay25'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AC'.($rowStart), ($key['planDay26']));
             $this->excel->getActiveSheet()->setCellValue('AC'.($rowStart+1), ($key['result_table_Day26']));
             $this->excel->getActiveSheet()->setCellValue('AC'.($rowStart+2), ($key['result_input_Day26']));
             $this->excel->getActiveSheet()->setCellValue('AC'.($rowStart+3), ($key['result_output_Day26']));
             $this->excel->getActiveSheet()->setCellValue('AC'.($rowStart+4), ($key['result_output_Day26'])-$key['planDay26']);
             $this->excel->getActiveSheet()->setCellValue('AC'.($rowStart+5), empty($key['planDay26']) ? '' : number_format(($key['result_output_Day26']/$key['planDay26'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AD'.($rowStart), ($key['planDay27']));
             $this->excel->getActiveSheet()->setCellValue('AD'.($rowStart+1), ($key['result_table_Day27']));
             $this->excel->getActiveSheet()->setCellValue('AD'.($rowStart+2), ($key['result_input_Day27']));
             $this->excel->getActiveSheet()->setCellValue('AD'.($rowStart+3), ($key['result_output_Day27']));
             $this->excel->getActiveSheet()->setCellValue('AD'.($rowStart+4), ($key['result_output_Day27'])-$key['planDay27']);
             $this->excel->getActiveSheet()->setCellValue('AD'.($rowStart+5), empty($key['planDay27']) ? '' : number_format(($key['result_output_Day27']/$key['planDay27'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AE'.($rowStart), ($key['planDay28']));
             $this->excel->getActiveSheet()->setCellValue('AE'.($rowStart+1), ($key['result_table_Day28']));
             $this->excel->getActiveSheet()->setCellValue('AE'.($rowStart+2), ($key['result_input_Day28']));
             $this->excel->getActiveSheet()->setCellValue('AE'.($rowStart+3), ($key['result_output_Day28']));
             $this->excel->getActiveSheet()->setCellValue('AE'.($rowStart+4), ($key['result_output_Day28'])-$key['planDay28']);
             $this->excel->getActiveSheet()->setCellValue('AE'.($rowStart+5), empty($key['planDay28']) ? '' : number_format(($key['result_output_Day28']/$key['planDay28'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AF'.($rowStart), ($key['planDay29']));
             $this->excel->getActiveSheet()->setCellValue('AF'.($rowStart+1), ($key['result_table_Day29']));
             $this->excel->getActiveSheet()->setCellValue('AF'.($rowStart+2), ($key['result_input_Day29']));
             $this->excel->getActiveSheet()->setCellValue('AF'.($rowStart+3), ($key['result_output_Day29']));
             $this->excel->getActiveSheet()->setCellValue('AF'.($rowStart+4), ($key['result_output_Day29'])-$key['planDay29']);
             $this->excel->getActiveSheet()->setCellValue('AF'.($rowStart+5), empty($key['planDay29']) ? '' : number_format(($key['result_output_Day29']/$key['planDay29'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AG'.($rowStart), ($key['planDay30']));
             $this->excel->getActiveSheet()->setCellValue('AG'.($rowStart+1), ($key['result_table_Day30']));
             $this->excel->getActiveSheet()->setCellValue('AG'.($rowStart+2), ($key['result_input_Day30']));
             $this->excel->getActiveSheet()->setCellValue('AG'.($rowStart+3), ($key['result_output_Day30']));
             $this->excel->getActiveSheet()->setCellValue('AG'.($rowStart+4), ($key['result_output_Day30'])-$key['planDay30']);
             $this->excel->getActiveSheet()->setCellValue('AG'.($rowStart+5), empty($key['planDay30']) ? '' : number_format(($key['result_output_Day30']/$key['planDay30'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AH'.($rowStart), ($key['planDay31']));
             $this->excel->getActiveSheet()->setCellValue('AH'.($rowStart+1), ($key['result_table_Day31']));
             $this->excel->getActiveSheet()->setCellValue('AH'.($rowStart+2), ($key['result_input_Day31']));
             $this->excel->getActiveSheet()->setCellValue('AH'.($rowStart+3), ($key['result_output_Day31']));
             $this->excel->getActiveSheet()->setCellValue('AH'.($rowStart+4), ($key['result_output_Day31'])-$key['planDay31']);
             $this->excel->getActiveSheet()->setCellValue('AH'.($rowStart+5), empty($key['planDay31']) ? '' : number_format(($key['result_output_Day30']/$key['planDay31'])*100),2,",",".");

             $this->excel->getActiveSheet()->setCellValue('AI'.($rowStart), ($key['planQtyTot']));
             $this->excel->getActiveSheet()->setCellValue('AI'.($rowStart+1), ($key['tableQtyTot']));
             $this->excel->getActiveSheet()->setCellValue('AI'.($rowStart+2), ($key['inputQtyTot']));
             $this->excel->getActiveSheet()->setCellValue('AI'.($rowStart+3), ($key['outputQtyTot']));
             $this->excel->getActiveSheet()->setCellValue('AI'.($rowStart+4), ($key['outputQtyTot'])-$key['planQtyTot']);
             $this->excel->getActiveSheet()->setCellValue('AI'.($rowStart+5), empty($key['planQtyTot']) ? '' : number_format(($key['outputQtyTot']/$key['planQtyTot'])*100),2,",",".");
             
             $rowStart = $rowStart + 6;
             $i++;

             }
             
         $this->excel->getActiveSheet()->getStyle("A6:AI".$rowStart)->applyFromArray(
            array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN, PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                )
            )
        );

        $this->excel->getActiveSheet()->getStyle("A6:AI".$rowStart)->applyFromArray(
            array(
                'alignment' => array('horizontal'=>PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
            )
        );

        $filename= 'Smart Andon Haengsung - Production Status (Day)- '.date('Ymdhis').'.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        ob_end_clean();
        $objWriter->save('php://output');


    // }
?>