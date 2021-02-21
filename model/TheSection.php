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
}