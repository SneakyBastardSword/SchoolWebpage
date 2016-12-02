<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/mainLayout.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Berea Community Schools</title>
    <!-- InstanceEndEditable -->
    <link rel="stylesheet" type="text/css" href="/files/style.css"/>
    <link rel="shortcut icon" type="image/ico" href="/files/favicon.ico"/>
    <!-- InstanceBeginEditable name="head" -->
    <script>
		<?php
    
			
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
			$link = 'localhost';
			$user = 'dataAccess';
			$password = 'ReadOnlyAccess';
			$database = 'webmain';
			$table = 'slideshow';
			
			$connection = mysqli_connect($link,$user,$password,$database);

			$slideshow_array = array();
            $calendar_array = array();

            $calendar_query = mysql_query($connection,
                "SELECT * FROM `webmain`.calendar`
                    ORDER BY `datestamp` DESC
                    LIMIT 10;");
			$slideshow_query = mysqli_query($connection,
                "SELECT * FROM `webmain`.slideshow`;");
			
			if (mysqli_num_rows($slideshow_query)>0){
				$count = 0;
				while($result = mysqli_fetch_assoc($slideshow_query)){
					 $slideshow_array[$count] = '"'.$result['id'].'.'.$result['type'].'"';
					 $count++;
				}
			}
            
            if(mysqli_num_rows($calendar_query) > 0){
                $count = 0;
                while($result = mysqli_fetch_assoc($calendar_query)){
                    $calendar_array[$count] = array($result['datestamp'], $result['content']);
                    $count++;
                }
            }

			$slideshow_echo = "var imageArray = [";
			for ($i=0; $i < sizeof($slideshow_array); $i++) { 
				if($i!=0){
					$slideshow_echo .= ',';
				}
				$slideshow_echo .= $slideshow_array[$i];
			}
			$slideshow_echo .= '];';

			echo $slideshow_echo;

            $calendar_echo = "var calendarList = [";
            for($i = 0; $i < sizeof($calendar_array); $i++){
                if($i != 0){
                    $slideshow_echo .= ',';
                }
                $calendar_echo .= "[\"".$calendar_array[$i][0]."\",\"".$calendar_array[$i][1] + "\"]";
            }

            echo $calendar_echo;

			mysqli_close($connection);
			/**/
		?>
	</script>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="/files/slideshow.js" defer="defer"></script>
    <script src="/files/calendar.js" defer="defer"></script>
    <!-- InstanceEndEditable -->
</head>
<body>
<div id="contentWrapper">
    <div id="titleBar">
        <h1><a href="/">Berea Independent School District</a></h1>
        <nav>
            <!--code for dropdown links-->
            <div class="navbarButtonContainer">
                <button class="navbarButton">Sports</button>
                <div class="navbarDropdown">
                    <a  href="/pages/sports/fall.php">Fall Sports</a>
                    <a  href="/pages/sports/winter.php">Winter Sports</a>
                    <a  href="/pages/sports/spring.php">Spring Sports</a>
                </div>
            </div>
            <div class="navbarButtonContainer">
                <button class="navbarButton">Student Resources</button>
                <div class="navbarDropdown">
                    <a  href="https://infinitecampus.kyschools.us/campus/portal/berea.jsp">Student Campus Portal</a>
                    <a  href="/pages/lunch.php">Lunch Schedule</a>
                    <a  href="/pages/govt.php">Student Government</a>
                </div>
            </div>
            <div class="navbarButtonContainer">
                <button class="navbarButton">Parent Resources</button>
                <div class="navbarDropdown">
                    <a  href="/pages/staff.php">Staff Listings</a>
                    <a  href="/pages/events.php">Events Calender</a>
                </div>
            </div>
        </nav>
    </div>
    <div id="pageBody">
        <!-- InstanceBeginEditable name="content" -->
        <h3 class="contentHeader">Where every child has a passion for learning, purpose for the future, and pride in themselves, their school, and their community.</h3>
        <p class="contentParagraph">Here at Berea, our students lead with innovation. Thats what makes us so great!</p>
        <p class="contentParagraph">We at Berea Community School pride ourselves on our commitment to making sure that every single child gets the best education that they possibly can, allowing them to reach their potential to the absolute fullest. It is through that commitment that we have succeeded in creating an incredible learning enviroment for students of all ages and walks of life</p>
        <!--contentTable: A table system for arranging content. Note that width must be set for individual cells.-->
        <!--Also, note that each row in the same table must have the same number of cells of the same widths.-->
        <!--slideShow: basic slideshow system-->
        <div class="slideShow">
            <figure class="slideShow-imageContainer"> <img id="slideshow-image" src="" alt="Image Loading"/> </figure>
            <figure>
                <button class="slideShow-next" onClick={cycleImages(1)}>Next</button>
                <button class="slideShow-prev" onClick={cycleImages(-1)}>Prev</button>
            </figure>
        </div>
        <div class="contentGrid">
            <div class="contentGrid-row">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Mh5LY4Mz15o" frameborder="0" allowfullscreen></iframe>
                <div class="calendar">
                    <h3>Upcoming Events:</h3>
                    <ul>
                    </ul>
                    <a href="/pages/events.php">See All</a>
                </div>
            </div>
        </div>
        <!-- InstanceEndEditable -->
    </div>
</div>
<div id="copyright-schmopyright">
    <p>Copyright (c) 2016 Ethan Wilton and Conner Bondurant</p>
    <p>Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the &quot;Software&quot;), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:</p>
    <p>The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.</p>
    <p>THE SOFTWARE IS PROVIDED &quot;AS IS&quot;, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.</p>
</div>
</body>
<!-- InstanceEnd --></html>