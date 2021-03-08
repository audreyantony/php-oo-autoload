<?php

/*
 * Création d'une classe abstraite (non instanciable), qui va nous servir pour avoir l'hydratateur pour tous ses enfants
 */

abstract class MappingTableAbstract
{

    // on veut obliger les enfants de cette classe à recréer un constructeur avec le modèle ci-dessous, utilisation du terme abstract
    abstract public function __construct(array $tab);

    // on utilise que protected ou public, car les enfants (ici indispensables) doivent pouvoir hériter de la méthode hydrate, le mot clefs final INTERDIT aux enfants/filles de redéfinir la méthode
    final protected function hydrate(array $datas)
    {
        foreach ($datas as $key => $value) {
            $methodSetters = "set" . ucfirst($key);
            if (method_exists($this, $methodSetters)) {
                $this->$methodSetters($value);
            }
        }
    }

    // création d'un générateur d'attributs (propriétées) grâce à la méthode magique __set, ne crée que des attributs non existants dans la classe

    public function __set($name, $value)
    {
        // si la propriété est non déclarée (d'office non publique), on peut la créer,
        if (!property_exists($this, $name)) {
            $this->$name = $value;
        } else {
            // sinon on indique qu'on doit passer par le setter
            trigger_error("Vous essayer de réécrire un attribut protected ou private existant sans passer par son setter ! (__set)", E_USER_NOTICE);
        }
    }

    // création d'un récupérateur d'attributs (propriétées) grâce à la méthode magique __get, ne récupère que des attributs existants dans la classe

    public function __get($name)
    {
        return $this->$name;
    }

}