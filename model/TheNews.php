<?php


class TheNews extends MappingTableAbstract
{

    protected int $idtheNews;
    protected string $theNewsTitle;
    protected string $theNewsSlug;
    protected string $theNewsText;
    protected string $theNewsDate;
    protected int $theUserIdtheUser;


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

                $this->setTheNewsSlug(TheNewsManager::slugify($theNewsTitle));
            }
        }
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







}