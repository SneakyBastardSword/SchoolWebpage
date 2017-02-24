<?php
 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
			
$link = 'localhost';
$user = 'dataAccess';
$password = 'Fowel Condition';
$database = 'webmain';

$connection = mysqli_connect($link,$user,$password,$database);

function jsvar_from_query($varname, $query, $echo=TRUE){
    $jsvar = 'var '.$varname.' = [';
    if (mysqli_num_rows($query)>0){
        $count = 0;
        while($result = mysqli_fetch_assoc($query)){
            $jsvar .= '{';
            foreach ($result as $key => $value){
                $jsvar .= '"'.$key.'": "'.$value.'",';
            }
            $jsvar .= '},';
            $count++;
        }
    }
    $jsvar .= '];';
    if($echo){
        echo $jsvar;
    }
    return $jsvar;
}

function query_as_jsvar($varname, $raw_query, $echo=TRUE){
    $parsed_query = mysqli_query($GLOBALS['connection'], $raw_query);
    return jsvar_from_query($varname, $parsed_query, $echo);
}
//commented out until other php/mysql bugs are fixed:
/*function clean_old_events($table){
    $query = mysqli_query($GLOBALS['connection'],
        'SELECT datestamp FROM '.$table);
    
    while($result = mysqli_fetch_assoc($query)){
        $eventTimestamp = $result['datestamp'];
        if(date("y-m-d") != $eventTimestamp){
            if(date('y') > substr($eventTimestamp, 0, 4)){
                mysqli_query($GLOBALS['connection'],
                    'ALTER TABLE '.$table.'')
            } elseif(date('m') > substr($eventTimestamp, 5, 2)){

            } elseif(date('d') > substr($eventTimestamp, 8, 2)){

            }
        }
    }
}*/

/*keep these handy for interfacing with legacy code
function slideshow(){
    query_as_jsvar('imageArray', "SELECT `id`, `type` FROM `webmain`.`slideshow`");
}

function calendar($limit='10'){
    query_as_jsvar('calendarList', "SELECT `datestamp`, `content` FROM `webmain`.`calendar`
                                        ORDER BY `datestamp` DESC
                                        LIMIT ".$limit.";");
}

function sportCalendar($season){
    query_as_jsvar('sportsArray', 'SELECT `sport`, `datestamp`, `season`, `notes`, `location`, `eventyear`
                                        FROM `webmain`.`sportevents`
                                        WHERE `season`="'.$season.'"
                                        WHERE `eventyear`="2017"
                                        ORDER BY datestamp ASC;');
}*/
?>