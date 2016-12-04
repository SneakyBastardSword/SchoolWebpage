<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
			$link = 'localhost';
			$user = 'dataAccess';
			$password = 'Fowel Condition';
			$database = 'webmain';
			$table = 'slideshow';
			
			$connection = mysqli_connect($link,$user,$password,$database);

            function slideshow(){
                $array = [];
                $query = mysqli_query($GLOBALS['connection'], "SELECT * FROM `webmain`.`slideshow`");

                if (mysqli_num_rows($query)>0){
				    $count = 0;
				    while($result = mysqli_fetch_assoc($query)){
					    $array[$count] = '"'.$result['id'].'.'.$result['type'].'"';
					    $count++;
				    }
			    }
                $echo = "var imageArray = [";
			    for ($i=0; $i < sizeof($array); $i++) { 
				    if($i!=0){
					    $echo .= ',';
                    }
                    $echo .= $array[$i];
                }
                $echo .= '];';
                echo $echo;
            }
            
            
            function calendar($limit='10'){
                $array =[];
                $query = mysqli_query($GLOBALS['connection'], 
                    "SELECT * FROM `webmain`.calendar`
                        ORDER BY `datestamp` DESC
                        LIMIT ".$limit.";");
                
                if(mysqli_num_rows($query) > 0){
                    $count = 0;
                    while($result = mysqli_fetch_assoc($query)){
                        $array[$count] = array($result['datestamp'], $result['content']);
                        $count++;
                    }
                }
                $echo = "var calendarList = [";
                for($i = 0; $i < sizeof($array); $i++){
                    if($i != 0){
                        $slideshow_echo .= ',';
                    }
                    $echo .= "[\"".$array[$i][0]."\",\"".$array[$i][1] + "\"]";
                }
                echo $echo;
            }


            function sportCalendar($season){
                $array =[];
                $query = mysqli_query($GLOBALS['connection'], 
                    'SELECT `sport`, `eventdate`, `season`, `notes`, `location`, `eventyear`
                        FROM webmain.sportevents
                            WHERE `season`="'.$season.'"
                            WHERE `eventyear`="2017"
                            ORDER BY eventdate ASC;');
                    
                $count = 0;
                while($result = mysqli_fetch_assoc($query)){
                    $array[$count] = array($result['sport'], $result['eventdate'], $result['notes'], $result['location']);
                    $count++;
                }

                $echo = '[';
                for($i = 0; $i < sizeof($array); $i++){
                    $echo .= "['".$array[$i][0]."','".$array[$i][1]."','".$array[$i][2]."','".$array[$i][3]."']";
                }
                
                $echo .= ']';
                echo $echo;
            }
?>