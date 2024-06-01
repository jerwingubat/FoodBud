<?php
if (!isset($_SESSION)) {
    session_start();
}

function db_connect()
{
    $hostname = "localhost";

    $dbname = "u916895930_pythondb";
    $username = "u916895930_pythondb";
    $password = "imBlessed@01";
 
    $db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

function db_insert($tableName, $data)
{
    $db = db_connect();
    $stringValues = "";
    $stringInit = "";
    $stringParam = "";
    $array = array();
    foreach ($data as $key => $value) {
        $stringInit .= $key . ",";
        $stringValues .= ":" . $key . ",";
        $array[":" . $key] = $value;
    }
    $boolean = "";
    $stringInit = substr($stringInit, 0, -1);
    $stringValues = substr($stringValues, 0, -1);
    $query = "INSERT INTO $tableName (" . $stringInit . ") VALUES(" . $stringValues . ")";
    try {
        $sth = $db->prepare($query);
        $sth->execute($array);
        $boolean = $db->lastInsertId();

    } catch (PDOException $e) {
        $boolean = $e;
    }

    return $boolean;
}


function db_get_result($tableName, $column, $where)
{
    $db = db_connect();
    $stringWhere = "";
    $value = "";
    $array = array();

    foreach ($where as $key => $values) {
        $stringWhere .= $key . "= '" . $values . "' AND ";
        $array[":" . $key] = $values;
    }

    $stringWhere = substr($stringWhere, 0, -4);
    $query = "SELECT " . $column . " FROM " . $tableName . " WHERE " . $stringWhere;

    try {
        $sth = $db->query($query);
        if (!empty($sth)) {
            $row = $sth->fetch(PDO::FETCH_ASSOC);
            $value = $row[$column];

        } else $value = "";
    } catch (PDOException $e) {

    }

    return $value;
}

function db_delete($tableName, $data)
{
    $db = db_connect();
    $stringWhere = "";

    $array = array();

    foreach ($data as $key => $values) {
        $stringWhere .= $key . "= :" . $key . " AND ";
        $array[":" . $key] = $values;
    }

    $boolean = "";
    $stringWhere = substr($stringWhere, 0, -4);
    $query = "DELETE FROM $tableName WHERE " . $stringWhere;

    try {
        $sth = $db->prepare($query);
        $sth->execute($array);
        $boolean = true;
    } catch (PDOException $e) {
        $boolean = $e;
    }

    return $boolean;
}

function isExists($tableName, $where)
{
    $db = db_connect();
    $boolean = "";
    $where_string = "";
    foreach ($where as $key => $values) {
        $where_string .= $key . "= '" . $values . "' AND";
    }
    $where_string = substr($where_string, 0, -4);

    try {
        $query = "SELECT * FROM $tableName WHERE " . $where_string;
        $sth = $db->query($query);
        if ($sth->rowCount() > 0) $boolean = true;
        else $boolean = false;
    } catch (PDOException $e) {
        $boolean = false;
    }

    return $boolean;
}

function db_error($e)
{
    echo json_encode(array("success" => false, "message" => $e));
}

//My Function
function my_query($qry)
{
    $db = db_connect();
    $query = $qry;
    $value = $db->query($query);
    return $value;
}


//Declaration
$db = db_connect();
date_default_timezone_set('Asia/Manila');
$dateTimeNow = date('Y-m-d H:i:sa');
$dateNow = date('Y-m-d');

//Change
$system_title = "System Title";
$shortTitle = "Title";

function custom_echo($x, $length)
{
    if(strlen($x)<=$length)
    {
        echo $x;
    }
    else
    {
        $y=substr($x,0,$length) . '...';
        echo $y;
    }
}

function newline($valNewline)
{
    $data="";
    for ($i=0; $i < $valNewline; $i++) {
        $data=$data."<br/>";
    }

    return $data;
}

function isMobileDevice(){
    $aMobileUA = array(
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );

    //Return true if Mobile User Agent is detected
    foreach($aMobileUA as $sMobileKey => $sMobileOS){
        if(preg_match($sMobileKey, $_SERVER['HTTP_USER_AGENT'])){
            return true;
        }
    }
    //Otherwise return false..
    return false;
}

function digit_format($amount)
{
    $amount = number_format($amount, 2, ".", ","); // returns: 1,23
    if ($amount == '0.00') {
        $amount = "";
    }
    //$amount = "<a class='text-align: right;'>".$amount."</a>";

    return $amount;
}

?>