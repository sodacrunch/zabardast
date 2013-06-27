<!DOCTYPE html> 
<html> 
	<head> 
	<title>QRCODE testing!</title> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.js"></script>

	<body>
	
<div data-role="page" id="create">

	<div data-role="header">
	<center>
		<img src="images/logo.png">
	</center>
		<div data-role="navbar">
		<ul>
			<li><a href="a.html">Home</a></li>
			<li><a href="b.html">Create</a></li>
			<li><a href="b.html">QR Codes</a></li>
		</ul>
	</div><!-- /navbar -->
	</div><!-- /header -->

	<div data-role="content">	
		
<form method="post" action="qr.php">
<h3 style="margin:0;padding:0;">Create Schedule</h3><br>	
<b>Title:</b><br>
<input type="text" name="title" value="Welcome ceremony">
<br>
<b>Entry:</b><br>
<input type="text" name="entry" value="Discuss what will happen today as well as what activities will be covered.">
<br>
<b>Time:</b><br>
<div data-role="fieldcontain" style="margin:0;padding:0;">
	<select name="time" id="select-choice-1" style="margin:0;padding:0;">
		<option value="12:00 AM">12:00 AM</option>
		<option value="standard">1:00 AM</option>
		<option value="standard">2:00 AM</option>
		<option value="standard">3:00 AM</option>
		<option value="standard">4:00 AM</option>
		<option value="standard">5:00 AM</option>
		<option value="standard">6:00 AM</option>
		<option value="standard">7:00 AM</option>
		<option value="standard">8:00 AM</option>
		<option value="standard">9:00 AM</option>
		<option value="standard">10:00 AM</option>
		<option value="standard">11:00 AM</option>
		<option value="standard">12:00 PM</option>
		<option value="standard">1:00 PM</option>
		<option value="standard">2:00 PM</option>
		<option value="standard">3:00 PM</option>
		<option value="standard">4:00 PM</option>
		<option value="standard">5:00 PM</option>
		<option value="standard">6:00 PM</option>
		<option value="standard">7:00 PM</option>
		<option value="standard">8:00 PM</option>
		<option value="standard">9:00 PM</option>
		<option value="standard">10:00 PM</option>
		<option value="standard">11:00 PM</option>
	</select>
</div>
<br>


<input type="submit" value="Submit" name="subform" data-theme="e">


<br>

<?php 

if (isset($_POST['subform'])) {
$title = $_POST["title"];
$entry = $_POST["entry"];
$time = $_POST["time"];

$randfile = rand(1,1000);
$myFile = "$randfile.html";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = "<b>Title:</b> $title <br> <b>Entry:</b> $entry <br> <b>Time:</b> $time";
fwrite($fh, $stringData);
fclose($fh);


$urlToEncode = $myFile;

echo "<b>Title:</b> $title <br>";
echo "<b>Entry:</b> $entry <br>";
echo "<b>Time:</b> $time <br>";
echo "<b>Link:</b> $urlToEncode <br>";


function generateQR($url, $width = 150, $height = 150) {
        $image  = '<img src="http://chart.apis.google.com/chart?chs='.$width.'x'.$height.'&cht=qr&chl='.$url.'" alt="QR code" width="'.$width.'" height="'.$height.'"/>';
echo $image;
    }
	
generateQR($urlToEncode);
	
}
?>

	</div><!-- /content -->

	<div data-role="footer">
		<h1>Rabblesoft - 2011</h1>
	</div><!-- /footer -->
</div><!-- /page -->

</body>
</html>