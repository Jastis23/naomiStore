<?php

/**
 * Created by PhpStorm.
 * User: Соловей
 * Date: 26.09.2016
 * Time: 20:26
 */
class DataBaseConnector
{
    private $pdo = null;
    private $dbName;

    public function  __construct($host, $dbname, $user, $password)
    {

        try
        {
            $this->dbName = $dbname;
            $dsh = "mysql:host=$host; dbname=$dbname";
            $this->pdo = new PDO($dsh,$user,$password);
        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }
    private function checkTableName($tableName)
    {

        $sqlForCheck = "SELECT TABLE_NAME FROM information_schema.tables WHERE table_schema = 'pdoLesson'";
        $tableNamesArray = $this->pdo->query($sqlForCheck);

        foreach ($tableNamesArray as $value)
        {
            if ($value[0] == $tableName)
            {
                return true;
            }
        }
        return false;
    }

    public  function getTable($tableName)
    {
        if ($this->checkTableName($tableName))
        {
            $this->checkTableName($tableName);
            $sql = "SELECT * FROM $tableName";
            $result = $this->pdo->query($sql);
            $countColumn = $result->columnCount();

            foreach ($result as $row) {
                for ($j = 0; $j < $countColumn; $j++) {
                    echo $row[$j] . " ";
                }
                echo "</br>";
            }
            echo $countColumn;
        }
        else
        {
            echo "Еблан, такой таблицы нет!";
        }
        //        $arrayTable = [];
//        $i = 0;
//        while($row = $result->fetch())
//        {
//            $arrayTable[$i]['id'] = $row['id'];
//            $arrayTable[$i]['message'] = $row['message'];
//            $arrayTable[$i]['type'] = $row['type'];
//            $arrayTable[$i]['creation_date'] = $row['creation_date'];
//            $i ++;
//        }
//        for ($j = 0; $j<count($arrayTable); $j++)
//        {
//            echo $arrayTable[$j]['id'] . "  " .
//                 $arrayTable[$j]['message'] . "  " .
//                 $arrayTable[$j]['type'] . "  " .
//                 $arrayTable[$j]['creation_date'] ."</br>";
//
//        }

    }
}