# php-oo-autoload
PHP en OO avec un autoload manuel et installation de Twig via composer

## Database
Importez en MariaDB en désactivant les clefs étrangères

        datas/import.sql

![strucure de la DB](https://github.com/WebDevCF2m2020/php-oo-autoload/raw/main/datas/phpooautoload.png)

## Création d'un autoload
Pour charger automatiquement des classes depuis le dossier model

    spl_autoload_register(function ($class_name) 
    {
        include "../model/"$class_name . '.php';
    }
    );

## Création d'un slug multi-langues
Pour avoir un Slug toujours valide

    public static function slugify($text)
    {
       // replace non letter or digits by -
       $text = preg_replace('~[^\pL\d]+~u', '-', $text);

       // transliterate
       $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

       // remove unwanted characters
       $text = preg_replace('~[^-\w]+~', '', $text);

       // trim
       $text = trim($text, '-');

       // remove duplicate -
       $text = preg_replace('~-+~', '-', $text);

       // lowercase
       $text = strtolower($text);

       if (empty($text)) {
       return 'n-a';
       }

       return $text;
    }

## Composer

Installez composer à cette URL:

https://getcomposer.org/

## Twig

Pour installer Twig:

    composer require "twig/twig:^3.0"

### Pour la documentation:

https://twig.symfony.com/doc/3.x/

### Vendor

On met le dossier vendor dans le .gitignore, en effet, pour réinstaller les dépendances il suffira, après avoir chargé le projet, de les  installer grâce au composer.json avec la commande :

    composer install

