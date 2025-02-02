<?php
if(!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = ""){
        if(PHP_VERSION < 6){
            $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
        }
        global $mysqli;
        $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($mysqli, $theValue) : mysqli_escape_string($mysqli, $theValue);
            
        switch ($theType){
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
            }
            return $theValue;
    }

}
?>