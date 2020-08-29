<?php

class PagesController
{

    public function actionAbout()
    {
        require_once(ROOT.'/views/pages/about.php');

        return true;
    }

    public function actionBlog($page = 1)
    {

        $articles = Articles::getLatestArticles($page);

        $totalArticles = Articles::getTotalArticles();

        $pagination = new Pagination($totalArticles[0], $page, Articles::AMOUNT_ARTICLES_BY_DEFAULT, 'page-');

        require_once(ROOT.'/views/pages/blog.php');

        return true;
    }

    public function actionCategory($category, $page = 1)
    {
        $articles = Articles::getLatestArticlesByCategory($category, $page);

        $totalArticles = Articles::getTotalArticlesByCategory($category);

        $pagination = new Pagination($totalArticles[0], $page, Articles::AMOUNT_ARTICLES_BY_DEFAULT, 'page-');

        require_once(ROOT.'/views/pages/blog.php');

        return true;
    }

    public function actionContacts()
    {
        require_once(ROOT.'/views/pages/contacts.php');

        return true;
    }

    public function actionArticle($id, $page = 1)
    {
        $article = Articles::getArticleById($id);
        $latestArticles = Articles::getLatestArticles('1');

        $format = 'Y-m-d H:i:s';
        $date = DateTime::createFromFormat($format, $article['date']);

        if(isset($_POST['name']) && isset ($_POST['comment']) && isset($_POST['article_id']))
        {
            $name = htmlspecialchars(trim($_POST['name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $comment = htmlspecialchars(trim($_POST['comment']));
            Comments::addComment($_POST['article_id'], $name, $email, $comment);
        }

        $comments = Comments::getLatestComments($id, $page);
        $totalComments = Comments::getTotalComments($id);

        $pagination = new Pagination($totalComments[0], $page, Comments::AMOUNT_COMMENTS_BY_DEFAULT, 'page-');

        require_once(ROOT.'/views/pages/article.php');

        return true;
    }

}

?>