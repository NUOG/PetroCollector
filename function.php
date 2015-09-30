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


function showTable() {
  global $conn;
  $tables = $conn->prepare('SELECT `firstColumn`, `secondColumn`, `thirdColumn`, `fourthColumn`, `kp`, `kpe`, `kpd`, `kpr`, `kpr8`, `kprn`, `kprv`, `kprg` FROM `Вишнянське_стат_1`');
  $tables->execute();

  $dataTable =<<<EOT
<table>
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
</table>
EOT;

  echo $dataTable;


//  $tn = 'stat-1';
  $GTD = getTableData('Вишнянське_стат_1');
  $AB = calculateAB($GTD['kp'],$GTD['kpe']);
echo "<pre>";
var_dump($AB);
echo "</pre>";


}



?>
