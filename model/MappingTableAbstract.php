<?php

/*
 * Création d'une classe abstraite (non instanciable), qui va nous servir pour avoir l'hydratateur pour tous ses enfants
 */
abstract class MappingTableAbstract
{

    // on veut obliger les enfants de cette classe à recréer un constructeur avec le modèle ci-dessous, utilisation du terme abstract
    abstract public function __construct(array $tab);

    // on utilise que protected ou public, car les enfants (ici indispensables) doivent pouvoir hériter de la méthode hydrate, le mot clefs final INTERDIT aux enfants/filles de redéfinir la méthode
    final protected function hydrate(Array $datas){
        foreach($datas as $key => $value){
            $methodSetters = "set".ucfirst($key);
            if(method_exists($this,$methodSetters)){
                $this->$methodSetters($value);
            }
        }
    }
}