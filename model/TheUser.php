<?php


class TheUser extends MappingTableAbstract
{

    public function __construct(array $tab)
    {
        $this->hydrate($tab);
    }
}