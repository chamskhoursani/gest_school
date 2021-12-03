<?php

class MainController
{
    public function show($viewName, $viewVars = [])
    {
        // $viewVars est disponible dans chaque fichier de vue
        // include __DIR__ . '/../views/header.tpl.php';
        include __DIR__ . '/../views/' . $viewName . '.tpl.php';
        // include __DIR__ . '/../views/footer.tpl.php';
    }
}
