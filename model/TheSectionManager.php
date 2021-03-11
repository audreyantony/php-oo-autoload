<?php


class TheSectionManager extends ManagerAbstract implements ManagerInterface
{

    // récupération de tous les champs de toutes les sections
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

    // récupérer le nom et desc d'une section en particulier
    public function getSectionName($id){
        $sql="SELECT theSectionName FROM TheSection WHERE idtheSection = ".$id.";";
        $recup = $this->db->query($sql);
        if(!$recup->rowCount()){
            return [];
        }
        $array = $recup->fetchAll(PDO::FETCH_ASSOC);
        // instanciations des résultats en objets de type TheSection
        foreach ($array as $item){
            $someSections[]= new TheSection($item);
        }
        return $someSections;
    }

    // récupération du titre et de l'id de toutes les sections (menu + choix dans formulaires) en classant par nom de section ascendant
    public function getAllWithoutTheSectionDesc(): array
    {
        $sql="SELECT idtheSection, theSectionName FROM TheSection ORDER BY theSectionName ASC";
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

    // récupération de tous les champs d'une section par son id
    public function getTheSectionById(int $id): array
    {

    }
}