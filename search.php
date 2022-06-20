<?php

require 'connexion.php';

if (array_key_exists('search', $_GET))
{
    $search = $_GET['search'];
}
$query = $connexion -> prepare('
                                SELECT
                                    `ID_article`,
                                    `title`,
                                    lastnameAuthor,
                                    nameAuthor,
                                    categorie,
                                    date,
                                    contentArticle
                                FROM
                                    article
                                INNER JOIN auteur ON article.ID_author = auteur.ID_author
                                INNER JOIN categorie ON article.ID_category = categorie.ID_category
                                WHERE
                                    `title` LIKE ?
                            ');
$query -> execute([$search."%"]);

$articles = $query -> fetchAll();

// var_dump($articles);

echo json_encode($articles);