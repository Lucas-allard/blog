<?php

require "connexion.php";

$query = $connexion -> prepare("
                                SELECT
                                    `ID_article`,
                                    `date`,
                                    `title`,
                                    `contentArticle`,
                                    lastnameAuthor,
                                    nameAuthor,
                                    categorie
                                FROM
                                    article
                                INNER JOIN auteur ON article.ID_author = auteur.ID_author
                                INNER JOIN categorie ON article.ID_category = categorie.ID_category
                                ORDER BY
                                    ID_article
                                DESC 
                                ");
$query -> execute();

$articleList = $query -> fetchAll();

$template = "accueil";

require "layout.phtml";
