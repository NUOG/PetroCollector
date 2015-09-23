<?php
require("config.php");

function getTablesName() {
  global $conn;
  $tables = $conn->prepare('SHOW TABLES;');
  $tables->execute();
  while ($row = $tables->fetch()) {
      echo '<option value="' . $row['Tables_in_other_petrocollector'] . '">' . $row['Tables_in_other_petrocollector'] . '</option>';
  }
  
}


?>
