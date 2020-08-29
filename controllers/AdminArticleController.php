<?php

class AdminArticleController extends AdminBase
{

    public function actionArticle()
    {
        $articles = Articles::getArticles();

        require_once(ROOT.'/views/admin_article/index.php');

        return true;
    }

    public function actionCreateArticle()
    {
        if(isset($_POST['submit'])) {
            $id = Articles::addArticle($_POST['title'],$_POST['author'], $_POST['text'], $_POST['category'], $_POST['status']);

            if($id) {
                if(is_uploaded_file($_FILES["image"]["tmp_name"]))  {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/assets/images/article/{$id}.jpg");
                }
            }
            header("Location: /admin/article");
        }

        require_once(ROOT.'/views/admin_article/addArticle.php');

        return true;
    }

    public function actionChangeArticle($id)
    {
        $article = Articles::getArticleById($id);

        if(isset($_POST['submit'])) {

            $options = array();
            $options['title'] = $_POST['title'];
            $options['author'] = $_POST['author'];
            $options['text'] = $_POST['text'];
            $options['category'] = $_POST['category'];

            $update = Articles::updateArticle($id, $options);

            if($update)    {
                if(is_uploaded_file($_FILES["image"]["tmp_name"]))  {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/assets/images/article/{$id}.jpg");
                }
            }
            header("Location: /admin/article");
        }
        

        require_once(ROOT.'/views/admin_article/update.php');

        return true;
    }

    public function actionDeleteArticle($id)
    {
        Articles::deleteArticleById($id);

        header("Location: /admin/article");

        return true;
    }

    public function actionOfferedArticles()
    {
        $offeredArticles = Articles::getOfferedArticles();

        require_once(ROOT.'/views/admin_article/offer.php');

        return true;
    }

    public function actionCheckArticle($id)
    {
        $article = Articles::getOfferedArticleById($id);

        $format = 'Y-m-d H:i:s';
        $date = DateTime::createFromFormat($format, $article['date']);

        if(isset($_POST['button'])) {
            if($_POST['button'] === 'Accept')   {
                Articles::acceptOfferedArticle($id);
                header("Location: /admin/article/offer");
            }   elseif($_POST['button'] === 'Decline')  {
                Articles::deleteArticleById($id);
                header("Location: /admin/article/offer");
            }
        }

        require_once(ROOT.'/views/admin_article/check.php');

        return true;
    }

}

?>