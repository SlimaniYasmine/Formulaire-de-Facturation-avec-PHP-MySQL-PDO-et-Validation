<?php
class facturemodel{
 protected $name;  /* nom de table*/
 protected $db;

 public function __construct($db,$name)
 {
     $this->db = $db;
     $this->name = $name;
 }
 public function insert($values)
 {
     $sql = "INSERT INTO $this->name (" . join(",", array_keys($values)) . ") VALUES(" . join(",", array_fill(0, count($values), "?")) . ")";
     $query = $this->db->prepare($sql);
     $query->execute(array_values($values));

 }
}

?>