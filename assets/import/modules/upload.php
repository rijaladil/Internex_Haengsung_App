<?php

ini_set("max_execution_time", 300);
// error_reporting(0);

require_once 'conn.php';
require_once __DIR__ . '/../vendor/autoload.php';

$file = $_FILES['ff'];

//use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$flag = 0;
if (!is_null($conn)) {
    try {
        $reader = new Xlsx();
        $spreadsheet = $reader->load($file['tmp_name']);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        $strs = "";
        $strs2 = "";
        $tempTime = "";
        $arrQueries = array();
        $idxRowQuery = -1;
        foreach ($sheetData as $k => $row) {
            if ($k >= 2) {
                if (intval($row['B']) === 0) {
                    continue;
                }

                $strs = "(";
                $strs2 = "";
                $tempTime = "";
                foreach ($row as $c => $content) {
                    if (in_array($c, array('A', 'B'))) {
                        if ($c == 'A') {
                            $tempVal = $spreadsheet->getActiveSheet()->getCell('A' . $k)->getValue();
                            if (strstr($tempVal, "=") == true) {
                                $tempVal = $spreadsheet->getActiveSheet()->getCell('A' . $k)->getCalculatedValue();
                            }
                            $strs .= "'" . $tempVal . "',";
                        } else {
                            $strs .= "'" . str_replace(",", "", $content) . "'" . ",";
                        }
                    } else {
                        $strsFinal = $strs;
                        $dd = $spreadsheet->getActiveSheet()->getCell($c . '1')->getValue();
                        $oD = Date::excelToDateTimeObject($dd);
                        if ($tempTime !== $oD->format("Y-m")) {
                            $strsFinal .= "'" . $oD->format("Y-m") . "', 'upload', 0);";
                            $tempTime = $oD->format("Y-m");

                            ++$idxRowQuery;
                            $strQuery = "INSERT INTO itx_t_master_plan (department, production_part_no, product, model, description, cycle, capaHour, capaDay, sum, yearDate, createUser, status_sent) VALUES " . $strsFinal;
                            $arrQueries[$idxRowQuery] = array();
                            $arrQueries[$idxRowQuery][0] = $strQuery;
                            $strs2 = "";
                        }

                        if (intval($content) === 0) {
                            continue;
                        }

                        $strs2 .= "INSERT INTO itx_t_master_plan_qty (masterplan_id, date, qty, status_close, createDate, createUser, editDate, editUser, mc_id) VALUES "
                                . "(:masterid, '" . $oD->format("Y-m-d") . "'," . $content . ",0,DATE(NOW()), 'upload', '0000-00-00', '', 0);";
                        $arrQueries[$idxRowQuery][1] = $strs2;
                    }
                }
                ++$idxRowQuery;
            }
        }
        //var_dump($arrQueries);


        foreach ($arrQueries as $queries) {
            if (isset($queries[1])) {
                // Begin transaction
                $conn->beginTransaction();

                $stmt = $conn->prepare($queries[0]);
                $stmt->execute();
                $stmt->closeCursor();
                    // $idPlan = $conn->lastInsertId();

                $stmt = $conn->prepare($queries[1]);
                    // $stmt->bindParam(':masterid', $idPlan);
                $stmt->execute();
                $stmt->closeCursor();

                // Commit
                $conn->commit();
                ++$flag;
            }
        }
    } catch (PDOException $pex) {
        $conn->rollBack();
        var_dump($pex);
    } catch (InvalidArgumentException $ex) {
        var_dump($ex);
    } catch (PhpOffice\PhpSpreadsheet\Exception $excep) {
        var_dump($excep);
    } catch (Exception $e) {
        var_dump($e);
    }
}

if ($flag > 0) {
    echo "<script language='JavaScript'>
            alert('Success Upload data !!');
            // document.location='SUKSES';
          </script>";
}
else {
    echo "<script language='JavaScript'>
          alert('Failed upload data !!');
        </script>";
}