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

    public function getAllHomePage(): array
    {
        $sql="SELECT n.theNewsTitle, n.theNewsSlug, LEFT(n.theNewsText,180) AS theNewsText, n.theNewsDate, n.theUserIdtheUser,
                    u.theUserLogin,
                    GROUP_CONCAT(s.theSectionName SEPARATOR '|||') as theSectionName, GROUP_CONCAT(s.idtheSection) as idtheSection
                FROM TheNews n 
                    INNER JOIN TheUser u
                        ON u.idtheUser = n.theUserIdtheUser
                    LEFT JOIN theNews_has_theSection h
                        ON h.theNews_idtheNews = n.idtheNews
                    LEFT JOIN thesection s 
                        ON s.idtheSection = h.theSection_idtheSection
                GROUP BY n.idtheNews
                ORDER BY n.theNewsDate DESC
                ";

        $recup = $this->db->query($sql);
        if(!$recup->rowCount()){
            return [];
        }
        $array = $recup->fetchAll(PDO::FETCH_ASSOC);
        // instanciations des résultats en objets de type TheSection
        foreach ($array as $item){
            // instanciation avec les valeurs SQL
             $instanceNews =new TheNews($item);
             // on coupe le texte récupéré grâce à son getter "$instanceNews->getTheNewsText()" en utilisant le méthode statique "TheNews::cuteTheText($instanceNews->getTheNewsText(),160)" donc à 160 caractères, puis je réattribue le tout avec "$instanceNews->setTheNewsText(...)"
             $instanceNews->setTheNewsText(TheNewsManager::cuteTheText($instanceNews->getTheNewsText(),160));
             $news[]=$instanceNews;
        }
        return $news;
    }

    # method public static cuteTheText
    public static function cuteTheText(string $text, int $nb){
        // on coupe à la longueur maximale voulue
        $cuteText = substr($text,0,$nb);
        // on trouve le dernier espace dans ce texte
        $positionLastSpace = strrpos($cuteText, " ");
        // on coupe la chaine avec ce dernier caractère
        $final = substr($cuteText, 0,$positionLastSpace);
        return $final;

    }

    # method public static slugify
    public static function slugify($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }


}