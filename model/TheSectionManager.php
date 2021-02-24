<?php


class TheSectionManager extends ManagerAbstract implements ManagerInterface
{

    // récupération de toutes les sections
    public function getAll(): array
    {
        $sql="SELECT * FROM TheSection";
        $recup = $this->db->query($sql);
        if(!$recup->rowCount()){
            return [];
        }
        $array = $recup->fetchAll(PDO::FETCH_ASSOC);
        // instanciations des résultats en objets de type TheSection
        foreach ($array as $item){
            $sections[]= new TheSection($item);
        }
        return $sections;
    }
}