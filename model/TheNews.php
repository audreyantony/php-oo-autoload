<?php


class TheNews extends MappingTableAbstract
{

    protected int $idtheNews;
    protected string $theNewsTitle;


    public function __construct(array $tab)
    {
        $this->hydrate($tab);
    }

    /**
     * @return int
     */
    public function getIdtheNews(): int
    {
        return $this->idtheNews;
    }

    /**
     * @param int $idtheNews
     */
    public function setIdtheNews(int $idtheNews): void
    {
        $this->idtheNews = $idtheNews;
    }

    /**
     * @return string
     */
    public function getTheNewsTitle(): string
    {
        return $this->theNewsTitle;
    }

    /**
     * @param string $theNewsTitle
     */
    public function setTheNewsTitle(string $theNewsTitle): void
    {
        $this->theNewsTitle = $theNewsTitle;
    }

}