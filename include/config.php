<?php
    // GET TABLES
    $usersDB = file_get_contents("./data/users.json");
    $postsDB = file_get_contents("./data/posts.json");
    $wallsDB = file_get_contents("./data/walls.json");
    $news_feedDB = file_get_contents("./data/news_feed.json");
    $commentsDB = file_get_contents("./data/comments.json");

    // DB users
    if(strlen($usersDB) == 0){
        $usersDB = array();
    }
    else{
        $usersDB = json_decode($usersDB, true);
    }

    // DB posts
    if(strlen($postsDB) == 0){
        $postsDB = array();
    }
    else{
        $postsDB = json_decode($postsDB, true);
    }

    // DB walls
    if(strlen($wallsDB) == 0){
        $wallsDB = array();
    }
    else{
        $wallsDB = json_decode($wallsDB, true);
    }

    // DB news_feed
    if(strlen($news_feedDB) == 0){
        $news_feedDB = array();
    }
    else{
        $news_feedDB = json_decode($news_feedDB, true);
    }

    // DB comment
    if(strlen($commentsDB) == 0){
        $commentsDB = array();
    }
    else{
        $commentsDB = json_decode($commentsDB, true);
    }
