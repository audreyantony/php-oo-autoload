<?php
/*
 * On récupère de la classe abstraite les propriétés et méthodes, on doit utiliser les méthodes publiques obligatoires se trouvant dans l'interface
 */

class TheNewsManager extends ManagerAbstract implements ManagerInterface
{

    public function getAll(): array
    {
        $sql="SELECT * FROM TheNews ORDER BY theNewsDate DESC";
        $recup = $this->db->query($sql);
        if(!$recup->rowCount()){
            return [];
        }
        $array = $recup->fetchAll(PDO::FETCH_ASSOC);
        // instanciations des résultats en objets de type TheSection
        foreach ($array as $item){
            $news[]= new TheNews($item);
        }
        return $news;
    }
}