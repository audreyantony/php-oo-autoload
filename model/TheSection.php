<?php


class TheSection extends MappingTableAbstract
{

    protected int $idtheSection;
    protected string $theSectionName;
    protected string $theSectionDesc;

    public function __construct(array $tab)
    {
        $this->hydrate($tab);
    }

    #GETTERS

    /**
     * @return int
     */
    public function getIdtheSection(): int
    {
        return $this->idtheSection;
    }

    /**
     * @return string
     */
    public function getTheSectionName(): string
    {
        return $this->theSectionName;
    }

    /**
     * @return string
     */
    public function getTheSectionDesc(): string
    {
        return $this->theSectionDesc;
    }

    # SETTERS

    /**
     * @param int $idtheSection
     */
    public function setIdtheSection(int $idtheSection): void
    {
        if(empty($idtheSection)){
            trigger_error("L'id section ne peut être 0",E_USER_NOTICE);
        }
        else{
            $this->idtheSection = $idtheSection;
        }
    }

    /**
     * @param string $theSectionName
     */
    public function setTheSectionName(string $theSectionName): void
    {
        $theSectionName = strip_tags(trim($theSectionName));
        if(empty($theSectionName)){
            trigger_error("Le nom de la section ne peut être vide",E_USER_NOTICE);
        }
        elseif(strlen($theSectionName)>100){
            trigger_error("Le nom de la section ne peut dépasser 100 caractères",E_USER_NOTICE);
        }
        else{
            $this->theSectionName = $theSectionName;
        }
    }

    /**
     * @param string $theSectionDesc
     */
    public function setTheSectionDesc(string $theSectionDesc): void
    {
        $theSectionDesc = strip_tags(trim($theSectionDesc));
        if(empty($theSectionDesc)){
            $this->theSectionDesc = "";
        }
        elseif(strlen($theSectionDesc)>800){
            trigger_error("La description ne peut dépasser 800 caractères",E_USER_NOTICE);
        }
        else{
            $this->theSectionDesc = $theSectionDesc;
        }
    }



}