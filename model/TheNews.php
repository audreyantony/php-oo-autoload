<?php


class TheNews extends MappingTableAbstract
{

    protected int $idtheNews;
    protected string $theNewsTitle;
    protected string $theNewsSlug;
    protected string $theNewsText;
    protected string $theNewsDate;
    protected int $theUserIdtheUser;

    // from TheUser
    protected string $theUserLogin;

    // from TheSection
    protected ?string $idtheSection;
    protected ?string $theSectionName;

    # Constructor
    public function __construct(array $tab)
    {
        $this->hydrate($tab);
    }

    # GETTERS

    /**
     * @return int
     */
    public function getIdtheNews(): int
    {
        return $this->idtheNews;
    }

    /**
     * @return string
     */
    public function getTheNewsTitle(): string
    {
        return $this->theNewsTitle;
    }

    /**
     * @return string
     */
    public function getTheNewsSlug(): string
    {
        return $this->theNewsSlug;
    }

    /**
     * @return string
     */
    public function getTheNewsText(): string
    {
        return $this->theNewsText;
    }

    /**
     * @return string
     */
    public function getTheNewsDate(): string
    {
        return $this->theNewsDate;
    }

    /**
     * @return int
     */
    public function getTheUserIdtheUser(): int
    {
        return $this->theUserIdtheUser;
    }

    /**
     * Getter from TheUser
     * @return string
     */
    public function getTheUserLogin(): string
    {
        return $this->theUserLogin;
    }
    /**
     * Getter from TheSection
     *
     */
    public function getIdtheSection(): ?string
    {
        return $this->idtheSection;
    }

    /**
     * Getter from TheSection
     *
     */
    public function getTheSectionName(): ?string
    {
        return $this->theSectionName;
    }

    # SETTERS

    /**
     * @param int $idtheNews
     */
    public function setIdtheNews(int $idtheNews): void
    {
        if(empty($idtheNews)){
            trigger_error("Votre id ne peut pas être 0!",E_USER_NOTICE);
        }
        else{
            $this->idtheNews = $idtheNews;
        }
    }

    /**
     * @param string $theNewsTitle
     */
    public function setTheNewsTitle(string $theNewsTitle): void
    {
        $theNewsTitle = strip_tags(trim($theNewsTitle));
        if(empty($theNewsTitle)){
            trigger_error("Votre titre ne peut être vide",E_USER_NOTICE);
        }
        elseif(strlen($theNewsTitle)>180){
            trigger_error("Votre titre ne peut dépasser les 180 caractères",E_USER_NOTICE);
        }
        else{
            $this->theNewsTitle = $theNewsTitle;
            // if the slug's param is not exist (undefined == NOT isset !!! not NULL)
            if(!isset($this->theNewsSlug)) {

                $this->setTheNewsSlug($this->slugify($theNewsTitle));
            }
        }
    }

    /**
     * from TheSection
     * @param int $idtheSection
     */
    public function setIdtheSection(?string $idtheSection): void
    {

            $this->idtheSection = $idtheSection;

    }

    /**
     * from TheSection
     * @param string $theSectionName
     */
    public function setTheSectionName(?string $theSectionName): void
    {
        $theSectionName = strip_tags(trim($theSectionName));

            $this->theSectionName = $theSectionName;
    }

    /**
     * @param string $theNewsSlug
     */
    public function setTheNewsSlug(string $theNewsSlug): void
    {
        // slug valid
        if(preg_match('/^[a-z0-9]+(-?[a-z0-9]+)*$/i', $theNewsSlug)){
            $this->theNewsSlug = $theNewsSlug;
        } else {
            trigger_error("Ce slug n'est pas valide !",E_USER_NOTICE);
        }
    }

    /**
     * @param string $theNewsText
     */
    public function setTheNewsText(string $theNewsText): void
    {
        $theNewsText = strip_tags(trim($theNewsText));
        if(empty($theNewsText)){
            trigger_error("Votre texte ne peut être vide",E_USER_NOTICE);
        }
        else{
            $this->theNewsText = $theNewsText;
        }
    }

    /**
     * @param string $theNewsDate
     */
    public function setTheNewsDate(string $theNewsDate): void
    {
        $regex = preg_grep("/^(\d{4})-(\d{2})-([\d]{2})$/",[$theNewsDate]);
        if(empty($regex)){
            trigger_error("Format de date non valide",E_USER_NOTICE);
        }
        else{
            $this->theNewsDate = $theNewsDate;
        }
    }

    /**
     * @param int $theUserIdtheUser
     */
    public function setTheUserIdtheUser(int $theUserIdtheUser): void
    {
        if(empty($theUserIdtheUser)){
            trigger_error("L'id de l'utilisateur ne peut pas être 0!",E_USER_NOTICE);
        }
        else{
            $this->theUserIdtheUser = $theUserIdtheUser;
        }
    }

    /**
     * from TheUser
     * @param string $theUserLogin
     */
    public function setTheUserLogin(string $theUserLogin): void
    {
        $theUserLogin = strip_tags(trim($theUserLogin));
        if(empty($theUserLogin)){
            trigger_error("Le login ne peut être vide",E_USER_NOTICE);
        }
        elseif(strlen($theUserLogin)>80){
            trigger_error("Le login ne peut dépasser 80 caractères",E_USER_NOTICE);
        }
        else{
            $this->theUserLogin = $theUserLogin;
        }
    }

    # methode cuteTheText
    public static function cuteTheText(string $text, int $nb){
        // on coupe à la longueur maximale voulue
        $cuteText = substr($text,0,$nb);
        // on trouve le dernier espace dans ce texte
        $positionLastSpace = strrpos($cuteText, " ");
        // on coupe la chaine avec ce dernier caractère
        $final = substr($cuteText, 0,$positionLastSpace);
        return $final;

    }

    # method slug
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