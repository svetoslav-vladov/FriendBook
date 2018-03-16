<?php
    require_once "./include/pagelock.php";
?>



<div id="gridWrap">
    <div id="left-col-grid">
        <div id="profile-pic"></div>
        <div id="user-nav">
            <ul>
                <li><a href="#">News Feed</a></li>
                <li><a href="#">Profile page</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">friends</a></li>
            </ul>
        </div>
    </div>
    <div id="top-grid">
        <div id="search">
            <a href="./index.php"><img src="#" alt="friendbook logo"></a>
            <input type="text" name="search" placeholder="Search for someone...">
            <button>Search</button>
        </div>
        <nav>
            <ul>
                <li><a href="#"><img src="#" alt="friend alert"></a></li>
                <li><a href="#"><img src="#" alt="msg alert"></a></li>
                <li><a href="#"><img src="#" alt="news alert"></a></li>
                <li><a href="index.php?page=logout"><img src="#" alt="logout"></a></li>
            </ul>
        </nav>
    </div>
    <div id="content-grid">cen</div>
    <div id="right-col-grid">right</div>
</div>
