<?php
/*
 * On récupère de la classe abstraite les propriétés et méthodes, on doit utiliser les méthodes publiques obligatoires se trouvant dans l'interface
 */

class TheNewsManager extends ManagerAbstract implements ManagerInterface
{


    public function getOneById(int $id): array
    {
        // TODO: Implement getOneById() method.
        return ["coucou"];
    }

    public function create(object $obj): bool
    {
        // TODO: Implement create() method.
    }

    public function update($obj, int $id): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
    }


    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }
}