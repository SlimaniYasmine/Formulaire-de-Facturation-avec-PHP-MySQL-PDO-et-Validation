<?php
   class uservalide { 
    private $data ;
    private $erreur = [];
    private static $champs = ['NF','CC','MT'];
    private static $champs1=['NF','RF','MT','CP'];

    public function __construct($post_data)
    {
        $this->data = $post_data;
    }
    public function validateform()
    {
       foreach(self::$champs as $champ)
       {
        if(!array_key_exists($champ,$this->data))
        {
            trigger_error("$champ n'existe pas dans data");
            return;
        }
       }
       $this->validateNF();
       $this->validateCC();
       $this->validateMT();
       return $this->erreur;
    }
    private function validateNF()
    {

        $val=trim($this->data['NF']);
        if(empty($val)){
            $this->addErreur('NF','Numéro de Facture ne peux pas etre vide !');
        }else
        {
            if(!preg_match('/^[a-zA-Z0-9]{11}$/',$val))
            {
                $this->addErreur('NF','le Numéro de Facture est composé de 11 alfa numérique !');
            }
            
        }

    }
    private function validateCC()
{

        $val=trim($this->data['CC']);
        if(empty($val)){
            $this->addErreur('CC','Numéro Client ne peux pas etre vide !');
          }    
        else{
            if(!preg_match('/^[0-9]{6}$/',$val))
            {
                $this->addErreur('CC','le Numéro de client est composé de 12 chiffre !');
            }}
    }
   

/**************************Validation Facture Sonlgaz********************************/

public function validateform1()
{
   foreach(self::$champs1 as $champ)
   {
    if(!array_key_exists($champ,$this->data))
    {
        trigger_error("$champ n'existe pas dans data");
        return;
    }
   }
   $this->validateNF1();
   $this->validateRF();
   $this->validateMT();
   $this->validateBP();
   return $this->erreur;
}
private function validateNF1()
{

        $val=trim($this->data['NF']);
        if(empty($val)){
            $this->addErreur('NF','le numero de facture ne peux pas etre vide !');
          }    
        else{
            if(!preg_match('/^[0-9]{12}$/',$val))
            {
                $this->addErreur('NF','le Numéro de facture est composé de 12 chiffre !');
            }}
    }
    private function validateRF()
    {

        $val=trim($this->data['RF']);
        if(empty($val)){
            $this->addErreur('RF','la référence ne peux pas etre vide !');
        }else
        {
            if(!preg_match('/^[a-zA-Z0-9]{12}$/',$val))
            {
                $this->addErreur('RF','la reference est composé de 11 alfa numérique !');
            }
            
        }

    }
    private function validateBP()
{

        $val=trim($this->data['CP']);
        if(empty($val)){
            $this->addErreur('CP','EBP ne peux pas etre vide !');
          }    
        else{
            if(!preg_match('/^[0-9]{3}$/',$val))
            {
                $this->addErreur('CP','EBP est composé de 12 chiffre !');
            }}
    }

/******************************Validation ADE**************************************** */
public function validateform2()
{
   foreach(self::$champs as $champ)
   {
    if(!array_key_exists($champ,$this->data))
    {
        trigger_error("$champ n'existe pas dans data");
        return;
    }
   }
   $this->validateNF2();
   $this->validateCC2();
   $this->validateMT();
   return $this->erreur;
}

private function validateNF2()
{

    $val=trim($this->data['NF']);
    if(empty($val)){
        $this->addErreur('NF','Numéro client ne peux pas etre vide !');
    }else
    {
        if(!preg_match('/^[a-zA-Z0-9]{14}$/',$val))
        {
            $this->addErreur('NF','Le numéro client est composé de 11 alfa numérique !');
        }
        
    }

}
private function validateCC2()
{

    $val=trim($this->data['CC']);
    if(empty($val)){
        $this->addErreur('CC',' Code client ne peux pas etre vide !');
    }else
    {
        if(!preg_match('/^[a-zA-Z0-9]{13}$/',$val))
        {
            $this->addErreur('CC','Le code client est composé de 11 alfa numérique !');
        }
        
    }

}







/******************************************* */

    private function validateMT()
    {
        $val=trim($this->data['MT']);
        if(empty($val)){
            $this->addErreur('MT','Montant ne peux pas etre vide');
        }else{
            if(!filter_var($val, FILTER_VALIDATE_FLOAT))
            {
                $this->addErreur('MT','le montant est un réel');
                }   
             }
    }
    private function addErreur($key,$val)
    {
        $this->erreur[$key]=$val;

    }
}
?>