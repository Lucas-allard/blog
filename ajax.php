<?php 

require 'connexion.php';

$query = $connexion -> prepare("
                                SELECT
                                    `lastnameComment`,
                                    `nameComment`,
                                    `contentComment`,
                                    dateComment,
                                    commentaires.`ID_article`,
                                    title
                                FROM
                                    commentaires
                                INNER JOIN article ON commentaires.ID_article = article.ID_article
                                ORDER BY
                                    `ID_comment`
                                DESC
                                LIMIT 5
                                ");

$query -> execute();

$comments = $query -> fetchAll();

echo json_encode($comments);// 