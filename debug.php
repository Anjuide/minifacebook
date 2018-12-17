<?php
/* EXERCICE 1 */
function myFunction ($a){
    $pair = ($x % 2 == 0);
        return $pair;
    
}



/* EXERCICE 2 */
function toutVaBien ($moral){
    if ($moral == true){
        echo "tout va bien";
    }else{
        echo "ca ne va pas ";
    }
}

/* EXERCICE 3 */
$tab = array(1, 2, 3, 4,  5, 6, 7, 8, 9, 10);
var_dump($tab);
function somme ($tab){
    $resultat = 0;
    foreach ($tab as $entry){
       $resultat = $resultat + $entry  ;
       return $resultat;
    }
}

somme ($tab);

/* EXERCICE 4 */

class Elephant{
    private $age;

    public function __construct (){
        $this->age = 10;
    }
    public function getAge (){
        return $this->age;
    }
    public function grandir ($annees){
        if ($annees>$this->age){
            $this->age = $annees;
        }
        else{
            echo "Pk tu veux rajeunir?";
        }
    }
}
/* $jumbo = new Elephant();
$jumbo->grandir(11);
echo $jumbo->getAge(); */

?>