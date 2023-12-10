<?php
require_once 'connect.php';
require_once 'uservalide.php';
require_once 'facturemodel.php';
$title = "Facture Sonlgaz";
require_once 'header.php';
if(isset($_POST['submit']))
{
    $validation = new uservalide($_POST);
    $erreur=$validation->validateform1();

   if(empty($erreur))
   {
   if($_SERVER["REQUEST_METHOD"] === "POST")
   {
    $factureinput = [
                       "nfacture"=>$_POST["NF"],
                       "ref"=>$_POST["RF"],
                       "montantnet"=>$_POST["MT"],
                       "CLEEBP"=>$_POST["CP"],
    ];
    (new facturemodel($db,"facturesonlz"))->insert($factureinput);
    echo "succée";
   }
 }
}
?>
 <form id="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <fieldset>
            <legend>SONLGAZ</legend>
        <div class="CInput">
            <label for="NF"> Numéro Facture </label>
            <input type="text" id="NF" name="NF" value="<?php if(isset($_POST['NF']))  htmlspecialchars($_POST['NF']) ?? '' ?>"  >
        </div>
        <div class="erreur">
        <?php echo $erreur['NF'] ?? '' ?>
        </div>   
        <div class="CInput">
            <label for="RF"> Référence</label>
            <input type="text" id="RF" name="RF" value="<?php if(isset($_POST['RF']))  htmlspecialchars($_POST['RF']) ?? '' ?>">
        </div>
        <div class="erreur">
        <?php echo $erreur['RF'] ?? '' ?>
        </div>
        <div class="CInput">
            <label for="MT"> Montant </label>
            <input type="text" id="MT" name="MT" value="<?php if(isset($_POST['MT']))  htmlspecialchars($_POST['MT']) ?? '' ?>">
        </div>
        <div class="erreur">
        <?php echo $erreur['MT'] ?? '' ?>
        </div>
        <div class="CInput">
            <label for="CP">Clé EBP</label>
            <input type="text" id="CP" name="CP" value="<?php if(isset($_POST['CP']))  htmlspecialchars($_POST['CP']) ?? '' ?>">
        </div>
        <div class="erreur">
        <?php echo $erreur['CP'] ?? '' ?>
        </div>

        <button name="submit" id="submit" class="submit">Valider</button>
    </fieldset>
    </form>