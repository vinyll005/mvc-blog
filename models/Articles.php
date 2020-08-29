<?php

class Articles
{

    const AMOUNT_ARTICLES_BY_DEFAULT = 6;

    public static function addArticle($title, $author, $text, $category, $status)
    {
        $db = Db::getDbConnection();

        $request = $db->prepare("INSERT INTO articles (title, author, text, category, status) VALUES (?, ?, ?, ?, ?)");
        $request->bind_param('sssss', $title, $author, $text, $category, $status);
        $request->execute();

        return $db->insert_id;
    }

    public static function getArticles()
    {
        $db = Db::getDbConnection();

        $request = $db->query("SELECT * FROM articles WHERE status='1' ORDER BY article_id DESC");

        $i = 0;
        $articles = array();
        while($row = $request->fetch_assoc())    {
            $articles[$i]['id'] = $row['article_id'];
            $articles[$i]['title'] = $row['title'];
            $articles[$i]['text'] = $row['text'];
            $articles[$i]['author'] = $row['author'];
            $articles[$i]['date'] = $row['date'];
            $articles[$i]['category'] = $row['category'];
            $i++;
        }

        return $articles;
    }

    public static function getOfferedArticles()
    {
        $db = Db::getDbConnection();

        $request = $db->query("SELECT * FROM articles WHERE status='0' ORDER BY article_id DESC");

        $i = 0;
        $articles = array();
        while($row = $request->fetch_assoc())    {
            $articles[$i]['id'] = $row['article_id'];
            $articles[$i]['title'] = $row['title'];
            $articles[$i]['text'] = $row['text'];
            $articles[$i]['author'] = $row['author'];
            $articles[$i]['date'] = $row['date'];
            $articles[$i]['category'] = $row['category'];
            $i++;
        }

        return $articles;
    }

    public static function getLatestArticles($page)
    {
        $db = Db::getDbConnection();

        $limit = intval(self::AMOUNT_ARTICLES_BY_DEFAULT);
        $offset = ($page -1) * $limit;
        // $sort_by = 'id';

        $request = $db->prepare("SELECT * FROM articles WHERE status='1' ORDER BY article_id DESC LIMIT ? OFFSET ?");
        $request->bind_param('ss', $limit, $offset);
        $request->execute();

        $result = $request->get_result();

        $i = 0;
        $articles = array();
        while($row = $result->fetch_assoc())    {
            $articles[$i]['id'] = $row['article_id'];
            $articles[$i]['title'] = $row['title'];
            $articles[$i]['text'] = $row['text'];
            $articles[$i]['author'] = $row['author'];
            $articles[$i]['date'] = $row['date'];
            $articles[$i]['category'] = $row['category'];
            $i++;
        }

        return $articles;
    }

    public static function getLatestArticlesByCategory($category, $page)
    {
        $db = Db::getDbConnection();

        $limit = intval(self::AMOUNT_ARTICLES_BY_DEFAULT);
        $offset = ($page -1) * $limit;
        $sort_by = 'id';

        $request = $db->prepare("SELECT * FROM articles WHERE category=? AND status='1' ORDER BY ? DESC LIMIT ? OFFSET ?");
        $request->bind_param('ssss', $category, $sort_by, $limit, $offset);
        $request->execute();

        $result = $request->get_result();

        $i = 0;
        $articles = array();
        while($row = $result->fetch_assoc())    {
            $articles[$i]['id'] = $row['article_id'];
            $articles[$i]['title'] = $row['title'];
            $articles[$i]['text'] = $row['text'];
            $articles[$i]['author'] = $row['author'];
            $articles[$i]['date'] = $row['date'];
            $articles[$i]['category'] = $row['category'];
            $i++;
        }

        return $articles;
    }

    public static function getArticleById($id)
    {
        $db = Db::getDbConnection();

        $request = $db->prepare("SELECT * FROM articles WHERE article_id = ? AND status='1'");
        $request->bind_param('s', $id);
        $request->execute();

        $result = $request->get_result();

        return $result->fetch_assoc();
    }

    public static function getOfferedArticleById($id)
    {
        $db = Db::getDbConnection();

        $request = $db->prepare("SELECT * FROM articles WHERE article_id = ? AND status='0'");
        $request->bind_param('s', $id);
        $request->execute();

        $result = $request->get_result();

        return $result->fetch_assoc();
    }

    public static function updateArticle($id, $options)
    {
        $db = Db::getDbConnection();

        $request = $db->prepare("UPDATE articles SET title=?, text=?, author=?, category=? WHERE article_id=?");
        $request->bind_param('sssss', $options['title'], $options['text'], $options['author'], $options['category'], $id);

        return $request->execute();
    }

    public static function deleteArticleById($id)
    {
        $db = Db::getDbConnection();

        $request = $db->prepare("DELETE FROM articles WHERE article_id=?");
        $request->bind_param('s', $id);
        $request->execute();

        $deleteComments = $db->prepare("DELETE FROM comments WHERE article_id=?");
        $deleteComments->bind_param('s', $id);
        $deleteComments->execute();

        return true;
    }

    public static function getImage($id)
    {
        $path = '/assets/images/article/';

        $image = $path.$id.'.jpg';

        if(file_exists($_SERVER['DOCUMENT_ROOT'].$image))   {
            return $image;
        }
        return false;
    }

    public static function getTotalArticles()
    {
        $db = Db::getDbConnection();

        $request = $db->query("SELECT COUNT(article_id) FROM articles WHERE status='1'");

        return $request->fetch_array();
    }
    
    public static function getTotalArticlesByCategory($category)
    {
        $db = Db::getDbConnection();

        $request = $db->prepare("SELECT COUNT(article_id) FROM articles WHERE category=? AND status='1'");
        $request->bind_param('s', $category);
        $request->execute();
        $result = $request->get_result();

        return $result->fetch_array();
    }

    public static function acceptOfferedArticle($id)
    {
        $db = Db::getDbConnection();

        $request = $db->prepare("UPDATE articles SET status='1' WHERE article_id=?");
        $request->bind_param('s', $id);
        $request->execute();

        $result = $request->get_result();

        return $result;
    }
    

}

?>