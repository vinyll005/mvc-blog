<?php

class HomeController
{

    public function actionIndex($page = 1)
    {
        $articles = Articles::getLatestArticles($page);
        
        require_once(ROOT.'/views/home/index.php');

        return true;
    }

}

?>