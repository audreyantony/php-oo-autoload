<?php

// récupération des sections pour le menu
$sectionsForMenu = $TheSectionManager->getAllWithoutTheSectionDesc();

// récupération de toutes les news quelque soient leur section ou auteur
$newsForHomepage = $TheNewsManager->getAll();


// Appel de la vue (objet de type Twig, la méthode render utilise un modèle Twig se trouvant dans view, suivi de paramètres)
echo $twig->render("publicView/index_public.html.twig",["menu"=>$sectionsForMenu,"news"=>$newsForHomepage]);