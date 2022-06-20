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
                                    DATE,
                                    contentArticle,
                                    article.ID_category,
                                    CONCAT(lastnameAuthor, nameAuthor)
                                FROM
                                    article
                                INNER JOIN auteur ON article.ID_author = auteur.ID_author
                                INNER JOIN categorie ON article.ID_category = categorie.ID_category
                                WHERE
                                    CONCAT(lastnameAuthor, nameAuthor) LIKE ?
                            ');
$query -> execute(["%".$search."%"]);

$author = $query -> fetchAll();

echo json_encode($author);