<?php

// récupération des sections pour le menu
$sectionsForMenu = $TheSectionManager->getAll();

// Appel de la vue (objet de type Twig, la méthode render utilise un modèle Twig se trouvant dans view, suivi de paramètres)
echo $twig->render("indexPublic.html.twig",["menu"=>$sectionsForMenu]);