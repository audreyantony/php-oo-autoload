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
}