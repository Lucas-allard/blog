<?php 

require 'connexion.php';

session_start();
$id_session = session_id();

if (isset($_POST["username"]) && !empty($_POST["username"]))
{
    
    $username = $_POST["username"];
    $username = trim($username);
    $username = stripslashes($username);
    $username = htmlspecialchars($username);
    $password = $_POST["password"];
    $password = trim($password);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    
    $req_connexion = $connexion -> prepare('
                                            SELECT
                                                `username`,
                                                `password`,
                                                `ID_admin`
                                            FROM
                                                admin
                                            WHERE username = ?
                                            ');
    $req_connexion -> execute([$username]);
    
    $info_connexion = $req_connexion -> fetch();
    
    if ($info_connexion) 
    {
        if (password_verify($password, $info_connexion["password"])) 
        {
            $_SESSION["admin"] = $username; 
            header("location:admin.php");
        } else
        {
            echo 'mot de passe invalide';
        }
    } else 
    {
        echo "vous n'êtes pas inscrit";
    }
}
   
    $req_admin = $connexion -> prepare('
                                SELECT DISTINCT
                                    `title`,
                                    `date`,
                                    image,
                                    `contentArticle`,
                                    article.ID_article,
                                    article.`ID_category`,
                                    article.`ID_author`,
                                    lastnameAuthor,
                                    nameAuthor,
                                    categorie
                                FROM
                                    article
                                INNER JOIN auteur ON article.ID_author = auteur.ID_author
                                INNER JOIN categorie ON article.ID_category = categorie.ID_category
                                ORDER BY
                                    article.ID_article
                                DESC
                                ');
                                
    $req_admin -> execute();
    
    $articleAdminList = $req_admin -> fetchAll();
    
    $req_authors = $connexion -> prepare('
                                                SELECT
                                                    `lastnameAuthor`,
                                                    `nameAuthor`,
                                                    ID_author
                                                FROM
                                                    auteur
                                                    ');
    $req_authors -> execute();
    
    $authorsData = $req_authors -> fetchAll();
    
    $req_categories = $connexion -> prepare('
                                                SELECT
                                                    `categorie`,
                                                    ID_category
                                                FROM
                                                    categorie
                                                    ');
    $req_categories -> execute();
    
    $categoriesData = $req_categories -> fetchAll();

    if (isset($_POST["new_lastname_author"]) && !empty($_POST["new_lastname_author"]) && isset($_POST["new_lastname_author"]) && !empty($_POST["new_lastname_author"])) {
    
        $newLastNameAuthor = $_POST["new_lastname_author"];
        $newLastNameAuthor = trim($newLastNameAuthor);
        $newLastNameAuthor = stripslashes($newLastNameAuthor);
        $newLastNameAuthor = htmlspecialchars($newLastNameAuthor);
        $newNameAuthor = $_POST["new_name_author"];
        $newNameAuthor = trim($newNameAuthor);
        $newNameAuthor = stripslashes($newNameAuthor);
        $newNameAuthor = htmlspecialchars($newNameAuthor);
    
        
        $req_add_author = $connexion -> prepare('
                                                INSERT INTO auteur(
                                      
                                                    lastnameAuthor,
                                                    nameAuthor
                                                    )
                                                VALUES(
                                                    :lastnameAuthor,
                                                    :nameAuthor)
                                                ');
        $req_add_author -> bindParam(":lastnameAuthor", $newLastNameAuthor);   
        $req_add_author -> bindParam(":nameAuthor", $newNameAuthor);   
        $test = $req_add_author -> execute();
        
        if($test)
        {
            header("location:admin.php");
        }
    }
    
     if (isset($_POST["new_category"]) && !empty($_POST["new_category"])) {
    
        $newCategory = $_POST["new_category"];
        $newCategory = trim($newCategory);
        $newCategory = stripslashes($newCategory);
        $newCategory = htmlspecialchars($newCategory);

    
        
        $req_add_category = $connexion -> prepare('
                                                INSERT INTO categorie(
                                                    categorie
                                                    )
                                                VALUES(
                                                    :categorie
                                                )
                                                ');
        $req_add_category -> bindParam(":categorie", $newCategory);   
        $test = $req_add_category -> execute();
        
        if($test)
        {
            header("location:admin.php");
        }
    }
    $template = "admin";
    require 'layout.phtml';    