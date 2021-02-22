<?php


class TheRole extends MappingTableAbstract
{

    protected int $idTheRole;
    protected string $theRoleName;
    protected int $theRoleValue;

    public function __construct(array $tab)
    {
        $this->hydrate($tab);
    }

    # GETTERS

    /**
     * @return int
     */
    public function getIdTheRole(): int
    {
        return $this->idTheRole;
    }

    /**
     * @return string
     */
    public function getTheRoleName(): string
    {
        return $this->theRoleName;
    }

    /**
     * @return int
     */
    public function getTheRoleValue(): int
    {
        return $this->theRoleValue;
    }

    /**
     * @param int $idTheRole
     */
    public function setIdTheRole(int $idTheRole): void
    {
        if(empty($idTheRole)){
            trigger_error("L'id du rôle ne peut être 0!",E_USER_NOTICE);
        }
        else{
            $this->idTheRole = $idTheRole;
        }
    }

    /**
     * @param string $theRoleName
     */
    public function setTheRoleName(string $theRoleName): void
    {
        $theRoleName = strip_tags(trim($theRoleName));
        if(empty($theRoleName)){
            trigger_error("Le rôle doit avoir un nom",E_USER_NOTICE);
        }
        elseif(strlen($theRoleName)>45){
            trigger_error("Le nom du rôle ne peut dépasser 45 caractères",E_USER_NOTICE);
        }
        else{
            $this->theRoleName = $theRoleName;
        }
    }

    /**
     * @param int $theRoleValue
     */
    public function setTheRoleValue(int $theRoleValue): void
    {
        if(empty($theRoleValue)){
            trigger_error("La valeur du rôle ne peut être vide",E_USER_NOTICE);
        }
        elseif($theRoleValue < 1 || $theRoleValue > 3){
            trigger_error("La valeur du rôle doit être comprise entre 1 et 3",E_USER_NOTICE);
        }
        else{
            $this->theRoleValue = $theRoleValue;
        }
    }



}