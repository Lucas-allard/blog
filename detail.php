<?php 

require 'connexion.php';

if (array_key_exists('id_article', $_GET) && is_numeric($_GET['id_article'])) {
    $id = $_GET['id_article'];
};


$req = $connexion -> prepare("
                            SELECT
                                `ID_article`,
                                `date`,
                                `title`,
                                `contentArticle`,
                                lastnameAuthor,
                                nameAuthor,
                                categorie,
                                image
                            FROM
                                article
                            INNER JOIN auteur ON article.ID_author = auteur.ID_author
                            INNER JOIN categorie ON article.ID_category = categorie.ID_category
                            WHERE ID_article = ? 
                            ");
$req -> execute(["$id"]);        
                    
$detailArticle = $req -> fetch();

$req3 = $connexion -> prepare('
                               SELECT
                                    `ID_comment`,
                                    `lastnameComment`,
                                    `nameComment`,
                                    `contentComment`,
                                    `ID_article`,
                                    `dateComment`
                                FROM
                                    commentaires
                                WHERE
                                    ID_article = ?
                                ORDER BY
                                    ID_comment
                                DESC     
                                ');

$req3 -> execute([$id]);

$commentList = $req3 -> fetchAll();


$template = "detail";

require 'layout.phtml';