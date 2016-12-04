<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/mainLayout.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
    <!-- InstanceBeginEditable name="doctitle" -->
<title>Berea Community Schools</title>
<!-- InstanceEndEditable -->
    <link rel="stylesheet" type="text/css" href="/files/style.css"/>
    <link rel="shortcut icon" type="image/ico" href="/favicon.ico"/>
    <!-- InstanceBeginEditable name="head" -->
    <script>
        <?php
            include '/files/connext.php';

            sportCalendar('winter');

            mysqli_close($connection);
        ?>
    </script>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="/files/sportcalendar.js" defer="defer"></script>
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
        <p>We have tons of cool winter sports!</p>
        <p>There is Basketball, Swimming, Volleyball, and more.</p>
        <div id="galleryWrapper">
        	<img class="galleryContent" src="/src/ZaneGolf.jpeg" alt="A man in the backswing of a golf swing"/>
        </div>
        <div class="sportCalendar">
            <h4>Basketball Schedule</h4>
            <table id="basketball">
                <tr>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Other</th>
                </tr>
            </table>
            <h4>Swim Schedule</h4>
            <table id="swim">
                <tr>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Other</th>
                </tr>
            </table>
            <h4>Volleyball</h4>
            <table id="volleyball">
                <tr>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Other</th>
                </tr>
            </table>
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