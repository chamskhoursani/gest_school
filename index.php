<?php

/*
Le fichier .htaccess permet de rediriger toutes les requêtes HTTP vers le fichier index.php ce qui nous de permet de n'avoir qu'un seul point d'entrée
index.php est le FrontController
*/
// require __DIR__ . '/model/Category.php';
// require __DIR__ . '/model/Author.php';
// require __DIR__ . '/model/Article.php';

require __DIR__ . '/database/db_data.php';


require __DIR__ . '/controller/MainController.php';
require __DIR__ . '/controller/HomeController.php';

$controller = new HomeController();

if (isset($_GET['_url'])) {
    $url = $_GET['_url'];
} else {
    $url = '/';
}

/*
Router / Dispatcher : il appelle la bonne méthode de controller en fonction de l'URL qui est appelée.
Le Dispatcher compare l'URL virtuelle appelée avec des routes. Les routes sont les URLs prévues par notre application, les URLs que notre application saura gérer.
*/
if ($url === '/') { // Accueil
    $controller->index();
} else {
    /*
    Si aucune ne route ne correspond à l'URL définie dans la requête HTTP, nous envoyons une erreur 404 (Not Found)
    https://www.php.net/manual/fr/function.http-response-code.php
    */
    http_response_code(404);
    // $controller->page404();
}