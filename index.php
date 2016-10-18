<!DOCTYPE html>
<html>
<!-- InstanceBegin template="/Templates/mainLayout.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Berea Community Schools</title>
    <!-- InstanceEndEditable -->
    <link rel="stylesheet" type="text/css" href="/files/style.css"/>
    <link rel="shortcut icon" type="image/ico" href="/favicon.ico"/>
    <!-- InstanceBeginEditable name="head" -->
    <script>
		<?php
			$link = 'localhost';
			$user = 'dataAccess';
			$password = 'ReadOnlyAccess';
			$database = 'webmain';
			$table = 'slideshow';
			
			$connection = mysqli_connect($link,$user,$password,$database);

			$array;

			$query = mysqli_query($connection, "SELECT `name`, `id`, `type`, `description`, `order` FROM `webmain`.slideshow`;");
			
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
					$echo .=',';
				}
				$echo .= $array[$i];
			}
			$echo .= '];';

			echo $echo;

			mysqli_close($connection);
			/**/
		?>
	</script>
    <script src="/files/script.js" defer="defer"></script>
    <!-- InstanceEndEditable -->
</head>
<body>
<div id="contentWrapper">
    <div id="titleBar">
        <h1>Berea Independent School District</h1>
        <nav>
            <!--code for dropdown links-->
            <div class="navbarButtonContainer">
                <button class="navbarButton">Sports</button>
                <div class="navbarDropdown">
                    <a  href="/sports/fall.php">Fall Sports</a> <a  href="/sports/winter.php">Winter Sports</a> <a  href="/sports/spring.php">Spring Sports</a>
                </div>
            </div>
            <div class="navbarButtonContainer">
                <button class="navbarButton">Lorem ipsum dolor</button>
                <div class="navbarDropdown">
                    <a  href="http://google.com">Lorem ipsum dolor</a> <a  href="http://google.com">Lorem ipsum dolor</a> <a  href="http://google.com">Lorem ipsum dolor</a>
                </div>
            </div>
            <div class="navbarButtonContainer">
                <button class="navbarButton">Lorem ipsum dolor</button>
                <div class="navbarDropdown">
                    <a  href="http://google.com">Lorem ipsum dolor</a> <a  href="http://google.com">Lorem ipsum dolor</a> <a  href="http://google.com">Lorem ipsum dolor</a>
                </div>
            </div>
            <div class="navbarButtonContainer">
                <button class="navbarButton">Lorem ipsum dolor</button>
                <div class="navbarDropdown">
                    <a  href="http://google.com">Lorem ipsum dolor</a> <a  href="http://google.com">Lorem ipsum dolor</a> <a  href="http://google.com">Lorem ipsum dolor</a>
                </div>
            </div>
            <div class="navbarButtonContainer">
                <button class="navbarButton">Lorem ipsum dolor</button>
                <div class="navbarDropdown">
                    <a  href="http://google.com">Lorem ipsum dolor</a> <a  href="http://google.com">Lorem ipsum dolor</a> <a  href="http://google.com">Lorem ipsum dolor</a>
                </div>
            </div>
        </nav>
    </div>
    <div id="pageBody">
        <!-- InstanceBeginEditable name="content" -->
        <h3 class="contentHeader">Where every child has a passion for learning, purpose for the future, and pride in themselves, their school, and their community.</h3>
        <p class="contentParagraph">Here at Berea, our students lead with innovation. Thats what makes us so great!</p>
        <!--contentTable: A table system for arranging content. Note that width must be set for individual cells.-->
        <!--Also, note that each row in the same table must have the same number of cells of the same widths.-->
        <!--slideShow: basic slideshow system-->
        <div class="slideShow">
            <figure class="slideShow-imageContainer"> <img id="slideshow-image" src="./images/cyborgCorn.jpg" alt=""/> </figure>
            <figure>
                <button class="slideShow-next" onClick="cycleImages()">Next</button>
                <button class="slideShow-prev">Prev</button>
            </figure>
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
<!-- InstanceEnd -->
</html>