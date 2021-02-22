<?php


abstract class ManagerAbstract
{

    protected MyPDO $db;

    public function __construct(MyPDO $c)
    {
        $this->db = $c;
    }

}