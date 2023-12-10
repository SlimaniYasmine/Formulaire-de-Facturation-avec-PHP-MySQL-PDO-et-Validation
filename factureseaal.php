<?php
require_once 'connect.php';
require_once 'uservalide.php';
require_once 'facturemodel.php';
$title = "Facture Seaal";
require_once 'header.php';
if(isset($_POST['submit']))
{
    $validation = new uservalide($_POST);
    $erreur=$validation->validateform();
   global $bd;
   if(empty($erreur))
   {
   if($_SERVER["REQUEST_METHOD"] === "POST")
   {
    $factureinput = [
                       "nfactures"=>$_POST["NF"],
                       "codeclients"=>$_POST["CC"],
                       "montants"=>$_POST["MT"],
    ];
    (new facturemodel($db,"factureseaal"))->insert($factureinput);
    echo "succée";
   }
}
}
?>

    <form id="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <fieldset>
            <legend>SEAL</legend>
        <div class="CInput">
            <label for="NF"> Numéro Facture </label>
            <input type="text" id="NF" name="NF" value="<?php if(isset($_POST['NF']))  htmlspecialchars($_POST['NF']) ?? '' ?>"  >
        </div>
        <div class="erreur">
        <?php echo $erreur['NF'] ?? '' ?>
        </div>   
        <div class="CInput">
            <label for="CC"> Code Client </label>
            <input type="text" id="CC" name="CC" value="<?php if(isset($_POST['CC']))  htmlspecialchars($_POST['CC']) ?? '' ?>">
        </div>
        <div class="erreur">
        <?php echo $erreur['CC'] ?? '' ?>
        </div>
        <div class="CInput">
            <label for="MT"> Montant </label>
            <input type="text" id="MT" name="MT" value="<?php if(isset($_POST['MT']))  htmlspecialchars($_POST['MT']) ?? '' ?>">
        </div>
        <div class="erreur">
        <?php echo $erreur['MT'] ?? '' ?>
        </div>
        <button name="submit" id="submit" class="submit">Valider</button>
    </fieldset>
    </form>

