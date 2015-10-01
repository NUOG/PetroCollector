<?php

require("config.php");

error_reporting(-1);
ini_set('display_errors', 'On');

function getTablesName() {
  global $conn;
  $tables = $conn->prepare('SHOW TABLES;');
  $tables->execute();
  while ($row = $tables->fetch()) {
      echo '<option value="' . $row['Tables_in_other_petrocollector'] . '">' . $row['Tables_in_other_petrocollector'] . '</option>';
  }
  
}

function calculateAB($x,$y) {
  $sumXY = 0;
  $sumX  = 0;
  $sumY  = 0;
  $sumX2 = 0;
  $n     = count($x);
  for ($i = 1; $i <= $n; $i++) {
    $sumXY = $sumXY + $x[$i] + $y[$i];
  }
  for ($i = 1; $i <= $n; $i++) {
    $sumX = $sumX + $x[$i];
  }
  for ($i = 1; $i <= $n; $i++) {
    $sumY = $sumY + $y[$i];
  }
  for ($i = 1; $i <= $n; $i++) {
    $sumX2 = $sumX2 + pow($x[$i], 2);
  }
  
  $A = ($n * $sumXY - $sumX * $sumY) / ($n * $sumX2 - pow($sumX, 2));
  
  $B = ($sumY * $sumX2 - $sumXY * $sumX) / ($n * $sumX2 - pow($sumX, 2));

  $out['A'] = $A;
  $out['B'] = $B;
  
  return $out;

}

// Визначаємо коефіцієнт кореляції
function corellationCoeficient($x,$y) {
  $n = count($x);
  $sumX = 0;
  $sumY = 0;

  for ($i = 1; $i <= $n; $i++) {
    $sumX = $sumX + $x[$i];
  }
  for ($i = 1; $i <= $n; $i++) {
    $sumY = $sumY + $y[$i];
  }

  $meanX = $sumX / $n;
  $meanY = $sumY / $n;

  $sumCXY = 0;
  for ($i = 1; $i <= $n; $i++) {
    $sumCXY = $sumCXY + ($x[$i] - $meanX) * ($y[$i] - $meanY);
  }
  $sumCX = 0;
  for ($i = 1; $i <= $n; $i++) {
    $sumCX = $sumCX + pow(($x[$i] - $meanX), 2);
  }
  $sumCY = 0;
  for ($i = 1; $i <= $n; $i++) {
    $sumCY = $sumCY + pow(($y[$i] - $meanY), 2);
  }

  $corellation = $sumCXY / pow(($sumX * $sumY) ,2);

  return $corellation;

}

// Визначення оптимального рівняння
function optimalEquation() {
  //  
}

function optionsDepending($id) {
  switch ($id) {
    case 1:
      $param1 = 'kp';
      $param2 = 'kpd';
      break;
    case 2:
      $param1 = 'kp';
      $param2 = 'kpe';
      break;
    case 3:
      $param1 = 'kpr';
      $param2 = 'kpd';
      break;
    case 4:
      $param1 = 'kpr';
      $param2 = 'kpr8';
      break;
    case 5:
      $param1 = 'kp';
      $param2 = 'kpr8';
      break;
    case 6:
      $param1 = 'kp';
      $param2 = 'kpe';
      break;
    case 7:
      $param1 = 'kpe';
      $param2 = 'kpr8';
      break;
    case 8:
      $param1 = 'kp';
      $param2 = 'kpr';
      break;
  }

  $result['param1'] = $param1;
  $result['param2'] = $param2;
  return $result;

}

function getTableData($tableName) {
  try 
  {
    global $conn;
    $sql ='SELECT `firstColumn`, `secondColumn`, `thirdColumn`, `fourthColumn`, `kp`, `kpe`, `kpd`, `kpr`, `kpr8`, `kprn`, `kprv`, `kprg` FROM `' . $tableName . '`'; 
    $tables = $conn->prepare($sql);
//  $tables->bindParam(':tableName', $tableName, PDO::PARAM_STR)
// не можу забіндити назву таблиці через PDO. Дав на пряму... =(
// виявляється це баг/фіса, що не можна забіндити назву таблиці =(
    $tables->execute();
  }
    catch (PDOEXCEPTION $e)
  {
    echo "Error: ".$e->getMessage();
  }

  $i = 0;
  while ($row = $tables->fetch()) {

    $DT['kp'][$i]   = (float)$row['kp'];
    $DT['kpe'][$i]  = (float)$row['kpe'];
    $DT['kpd'][$i]  = (float)$row['kpd'];
    $DT['kpr'][$i]  = (float)$row['kpr'];
    $DT['kpr8'][$i] = (float)$row['kpr8'];
    $DT['kprn'][$i] = (float)$row['kprn'];
    $DT['kprv'][$i] = (float)$row['kprv'];
    $DT['kprg'][$i] = (float)$row['kprg'];

    $i++;
  }

  return $DT;

}


function showTable($tableName) {
  global $conn;
  $sql ='SELECT `firstColumn`, `secondColumn`, `thirdColumn`, `fourthColumn`, `kp`, `kpe`, `kpd`, `kpr`, `kpr8`, `kprn`, `kprv`, `kprg` FROM `' . $tableName . '`'; 
  $tables = $conn->prepare($sql);
  $tables->execute();

  $dataTable =<<<EOT
<table class="table">
 <thead>
 <tr>
  <td>Kp</td>
  <td>Kpe</td>
  <td>Kpd</td>
  <td>Kpr</td>
  <td>Kpr8</td>
  <td>Kprn</td>
  <td>Kprv</td>
  <td>Kprg</td>
 </tr>
 </thead>
 <tbody>
EOT;
 
  while ($row = $tables->fetch()) {

    $dataTable .=<<<EOT
 <tr>
  <td>$row[kp]</td>
  <td>$row[kpe]</td>
  <td>$row[kpd]</td>
  <td>$row[kpr]</td>
  <td>$row[kpr8]</td>
  <td>$row[kprn]</td>
  <td>$row[kprv]</td>
  <td>$row[kprg]</td>
 </tr>
EOT;
  }

  $dataTable .=<<<EOT
 </tbody>
</table>
EOT;

  echo $dataTable;


//  $tn = 'stat-1';
//  $GTD = getTableData('Вишнянське_стат_1');
//  $AB = calculateAB($GTD['kp'],$GTD['kpe']);
//echo "<pre>";
//var_dump($AB);
//echo "</pre>";


}



?>
