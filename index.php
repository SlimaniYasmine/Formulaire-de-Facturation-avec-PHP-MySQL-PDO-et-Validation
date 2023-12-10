<?php
$title = "Home";
require_once('header.php');
?>
<form action="" method="POST" class="redrection">
<div class="choix">
<button name="btn-d" class="btn-d" value="btn1">ADE</button>
<button name="btn-sl" class="btn-sl" value="btn2">SONLGAZ</button>
<button name="btn-sg" class="btn-sg" value="btn3">SEAAL</button>
</div>
</form>
<?php
if(isset($_POST['btn-d']))
{
 header("Location: factureade.php");
 exit();
}
if((isset($_POST['btn-sl'])))
{
 header("Location: facturesonlgaz.php");
 exit();
}

if(isset(($_POST['btn-sg']))){
    header("Location: factureseaal.php");
    exit();
}
?>
<?php
require_once('footer.php');
?>