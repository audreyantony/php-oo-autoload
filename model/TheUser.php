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
}