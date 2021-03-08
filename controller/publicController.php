<?php

// récupération des sections pour le menu
$sectionsForMenu = $TheSectionManager->getAllWithoutTheSectionDesc();

// si on veut voir le détail d'une rubrique et ses articles


// si on veut voir le détail d'une news
if(isset($_GET['page'])){

    $slugNews = htmlspecialchars(strip_tags(trim($_GET['page'])),ENT_QUOTES);
    $recupOneNews = $TheNewsManager->getDetailNews($slugNews);

    // Appel de la vue (objet de type Twig, la méthode render utilise un modèle Twig se trouvant dans view, suivi de paramètres)
    echo $twig->render("publicView/detail_news_public.html.twig",["menu"=>$sectionsForMenu,"news"=>$recupOneNews]);

   exit();
}


// récupération de toutes les news quelque soient leur section ou auteur
$newsForHomepage = $TheNewsManager->getAllHomePage();


// Appel de la vue (objet de type Twig, la méthode render utilise un modèle Twig se trouvant dans view, suivi de paramètres)
echo $twig->render("publicView/index_public.html.twig",["menu"=>$sectionsForMenu,"news"=>$newsForHomepage]);