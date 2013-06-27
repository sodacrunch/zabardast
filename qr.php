<!DOCTYPE html> 
<html> 
	<head> 
	<title>QRCODE testing !!!!</title> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/mobile/1.0a4.1/jquery.mobile-1.0a4.1.js"></script>

	<body>
	
<div data-role="page">

	<div data-role="header">
	<center>
		<img src="images/logo.png">
	</center>
	</div><!-- /header -->

	<div data-role="content">	
<h3 style="margin:0;padding:0;">Schedule Results</h3><br>	
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


$urlToEncode = "http://www.rabblesoft.com/dev/qrcoder/".$myFile;

echo "<b>Title:</b><br>$title <br><br>";
echo "<b>Entry:</b><br>$entry <br><br>";
echo "<b>Time:</b><br>$time <br><br>";
echo "<b>Link:</b><br>$urlToEncode <br><br>";
echo "<b>QR Code:</b><br>";


function generateQR($url, $width = 250, $height = 250) {
        $image  = '<img src="http://chart.apis.google.com/chart?chs='.$width.'x'.$height.'&cht=qr&chl='.$url.'" alt="QR code" style="margin: 0 auto;" width="'.$width.'" height="'.$height.'"/>';
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