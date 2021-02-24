<?php
/*
 * L'interface est un guide nous obligeant à utiliser certaines méthodes, dans le soucis de donner des normes comprises par tous. Fonctionne comme une classe abstraite, sauf qu'on utilise implement pour l'utiliser comme modèle, les méthodes sont toutes "abstract" (mais inutile de l'écrire) et toutes publiques
 */
interface ManagerInterface{

    // CRUD

    # R
    public function getAll():array;

}