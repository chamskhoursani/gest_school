<?php

class HomeController extends MainController
{
    public function index()
    {
        $DBData = new DBData();

        // $categoryList = $DBData->getSidebarCategories();

        // $authorList = $DBData->getSidebarAuthors();

        // $articleList = $DBData->getAllArticles();

        return $this->show('register', [
            // 'categoryList' => $categoryList,
            // 'authorList' => $authorList,
            // 'articleList' => $articleList
        ]);
    }
}
