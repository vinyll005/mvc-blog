<?php

return array(

    // User pages
    'register' => 'user/register',
    'login' => 'user/login',
    'logout' => 'user/logout',
    'user/article' => 'user/article',

    // Other pages
    'about' => 'pages/about',
    'blog/page-([0-9]+)' => 'pages/blog/$1',
    'blog/([a-z]+)/page-([0-9]+)' => 'pages/category/$1/$2',
    'blog' => 'pages/blog',
    'blog/([a-z]+)' => 'pages/category/$1',
    'contacts' => 'pages/contacts',

    //Article page
    'article/([0-9]+)/page-([0-9]+)' => 'pages/article/$1/$2',
    'article/([0-9]+)' => 'pages/article/$1',

    //Admin pages
    'admin' => 'admin/index',
    'admin/article' => 'adminArticle/article',
    'admin/article/add' => 'adminArticle/createArticle',
    'admin/article/offer' => 'adminArticle/offeredArticles',
    'admin/article/check/([0-9]+)' => 'adminArticle/checkArticle/$1',
    'admin/article/change/([0-9]+)' => 'adminArticle/changeArticle/$1',
    'admin/article/delete/([0-9]+)' => 'adminArticle/deleteArticle/$1',

    // Home page
    '' => 'home/index',
    )

?>