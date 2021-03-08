<?php


class TheUser extends MappingTableAbstract
{
    protected int $idtheUser;
    protected string $theUserLogin;
    protected string $theUserPwd;
    protected string $theUserMail;
    protected int $theRoleIdtheRole;

    public function __construct(array $tab)
    {
        $this->hydrate($tab);
    }



    # GETTERS

    /**
     * @return int
     */
    public function getIdtheUser(): int
    {
        return $this->idtheUser;
    }

    /**
     * @return string
     */
    public function getTheUserLogin(): string
    {
        return $this->theUserLogin;
    }

    /**
     * @return string
     */
    public function getTheUserPwd(): string
    {
        return $this->theUserPwd;
    }

    /**
     * @return string
     */
    public function getTheUserMail(): string
    {
        return $this->theUserMail;
    }

    /**
     * @return int
     */
    public function getTheRoleIdtheRole(): int
    {
        return $this->theRoleIdtheRole;
    }

    # SETTERS

    /**
     * @param int $idtheUser
     */
    public function setIdtheUser(int $idtheUser): void
    {
        if (empty($idtheUser)) {
            trigger_error("L'id de l'utilisateur ne peut être 0", E_USER_NOTICE);
        } else {
            $this->idtheUser = $idtheUser;
        }
    }

    /**
     * @param string $theUserLogin
     */
    public function setTheUserLogin(string $theUserLogin): void
    {
        $theUserLogin = strip_tags(trim($theUserLogin));
        if (empty($theUserLogin)) {
            trigger_error("Le login ne peut être vide", E_USER_NOTICE);
        } elseif (strlen($theUserLogin) > 80) {
            trigger_error("Le login ne peut dépasser 80 caractères", E_USER_NOTICE);
        } else {
            $this->theUserLogin = $theUserLogin;
        }
    }

    /**
     * @param string $theUserPwd
     */
    public function setTheUserPwd(string $theUserPwd): void
    {
        $theUserPwd = strip_tags(trim($theUserPwd));
        if (empty($theUserPwd)) {
            trigger_error("Le mot de passe ne peut être vide", E_USER_NOTICE);
        } elseif (strlen($theUserPwd) > 255) {
            trigger_error("Le mot de passe ne peut dépasser 255", E_USER_NOTICE);
        } else {
            $this->theUserPwd = $theUserPwd;
        }
    }

    /**
     * @param string $theUserMail
     */
    public function setTheUserMail(string $theUserMail): void
    {
        $theUserMail = filter_var($theUserMail, FILTER_VALIDATE_EMAIL);
        if ($theUserMail === false) {
            trigger_error("Une adresse mail valide est requise", E_USER_NOTICE);
        } else {
            $this->theUserMail = $theUserMail;
        }
    }

    /**
     * @param int $theRoleIdtheRole
     */
    public function setTheRoleIdtheRole(int $theRoleIdtheRole): void
    {
        if (empty($theRoleIdtheRole)) {
            trigger_error("Ce champ ne peut être vide", E_USER_NOTICE);
        } else {
            $this->theRoleIdtheRole = $theRoleIdtheRole;
        }
    }


}