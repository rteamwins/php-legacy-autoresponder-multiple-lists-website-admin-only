<?php
include "admincontrol.php";
include "../header.php";
$action = $_POST["action"];
$show = "";
if ($action == "saveheader")
{
$headercontent = $_POST["headercontent"];
$headercontent = stripslashes($headercontent);
$headercontent = str_replace('\\', '', $headercontent);
$headerfile = fopen("../header.php","w");
fwrite($headerfile, $headercontent);
fclose($headerfile);
$show = "Your header.php file was saved!";
} # if ($action == "saveheader")
##############################################################
if ($action == "savefooter")
{
$footercontent = $_POST["footercontent"];
$footercontent = stripslashes($footercontent);
$footercontent = str_replace('\\', '', $footercontent);
$footerfile = fopen("../footer.php","w");
fwrite($footerfile, $footercontent);
fclose($footerfile);
$show = "Your footer.php file was saved!";
} # if ($action == "savefooter")
##############################################################
?>
<table cellpadding="4" cellspacing="4" border="0" align="center" width="600">
<tr><td align="center" colspan="2"><div class="heading">Edit&nbsp;Layout</div></td></tr>
<?php
if ($show != "")
{
?>
<tr><td align="center" colspan="2"><br><?php echo $show ?></td></tr>
<?php
}

$header = "../header.php";
$headerfp = @fopen($header, "r");
$header = fread($headerfp, filesize($header));
$header = htmlspecialchars($header);
fclose($headerfp);

$footer = "../footer.php";
$footerfp = @fopen($footer, "r");
$footer = fread($footerfp, filesize($footer));
$footer = htmlspecialchars($footer);
fclose($footerfp);

?>
<tr><td align="center" colspan="2"><br>
<form action="editlayout.php" method="post">
<table width="600" border="0" cellpadding="2" cellspacing="2" bgcolor="#989898" align="center">
<tr bgcolor="#d3d3d3"><td align="center">Edit header.php File</td></tr>
<tr bgcolor="#eeeeee"><td align="center"><textarea rows="40" cols="80" name="headercontent"><?php echo $header ?></textarea></td></tr>
<tr bgcolor="#d3d3d3"><td align="center"><input type="hidden" name="action" value="saveheader">
<input type="submit" name="SAVE" class="sendit"></form>
</td></tr>
</table>
</td></tr>

<tr><td align="center" colspan="2"><br>&nbsp;</td></tr>

<tr><td align="center" colspan="2"><br>
<form action="editlayout.php" method="post">
<table width="600" border="0" cellpadding="2" cellspacing="2" bgcolor="#989898" align="center">
<tr bgcolor="#d3d3d3"><td align="center">Edit footer.php File</td></tr>
<tr bgcolor="#eeeeee"><td align="center"><textarea rows="40" cols="80" name="footercontent"><?php echo $footer ?></textarea></td></tr>
<tr bgcolor="#d3d3d3"><td align="center"><input type="hidden" name="action" value="savefooter">
<input type="submit" name="SAVE" class="sendit"></form>
</td></tr>
</table>
</td></tr>

<tr><td align="center" colspan="2"><br><a href="controlpanel.php">Return To Main Control Panel</a></td></tr>
</table>
<br><br>
<?php
include "../footer.php";
exit;
?>