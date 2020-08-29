<?php

class Comments
{

    const AMOUNT_COMMENTS_BY_DEFAULT = 10;

    public static function addComment($articleId, $userName, $userEmail, $comment)
    {
        $db = Db::getDbConnection();

        $request = $db->prepare("INSERT INTO comments(article_id, user_name, user_email, comment) VALUES (?, ?, ?, ?)");
        $request->bind_param('ssss', $articleId, $userName, $userEmail, $comment);
        $request->execute();

        return true;
    }

    public static function getLatestComments($article_id, $page)
    {
        $db = Db::getDbConnection();

        $limit = intval(self::AMOUNT_COMMENTS_BY_DEFAULT);
        $offset = ($page - 1) * $limit;

        $request = $db->prepare("SELECT * FROM comments WHERE article_id = ? ORDER BY comment_id DESC LIMIT ? OFFSET ?");
        $request->bind_param('sss', $article_id, $limit, $offset);
        $request->execute();

        $result = $request->get_result();

        $i = 0;
        $comments = array();
        while($row = $result->fetch_assoc())
        {
            $comments[$i]['date'] = $row['date'];
            $comments[$i]['user_name'] = $row['user_name'];
            $comments[$i]['comment'] = $row['comment'];
            $i++;
        }

        return $comments;
    }

    public static function getTotalComments($article_id)
    {
        $db = Db::getDbConnection();

        $request = $db->prepare("SELECT COUNT(comment_id) FROM comments WHERE article_id=?");
        $request->bind_param('s', $article_id);
        $request->execute();

        $result = $request->get_result();

        return $result->fetch_array();
    }

}

?>