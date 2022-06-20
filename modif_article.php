<?php 

session_start();
require 'connexion.php';
    
if (isset($_SESSION["admin"])) {  
    if (array_key_exists('id_edit', $_GET) && is_numeric($_GET['id_edit'])) {
        $id = $_GET['id_edit'];
    }
    
    
    if (!isset($_POST['submit']) && empty($_POST['submit'])) 
    {
        $req_select = $connexion -> prepare('
                                            SELECT
                                                `title`,
                                                `contentArticle`,
                                                image,
                                                ID_author,
                                                ID_category
                                            FROM
                                                article
                                            WHERE
                                                ID_article = ?
                                            ');
        $req_select -> execute([$id]);
        
        $data = $req_select -> fetch();
        
        $queryAut = $connexion -> prepare('
                                            SELECT
                                                `ID_author`,
                                                `nameAuthor`,
                                                lastnameAuthor
                                            FROM
                                                    auteur
                                        ');
        $queryAut -> execute();
        $authors = $queryAut -> fetchAll();
        
      $queryCat = $connexion -> prepare('
                                        SELECT
                                            `ID_category`,
                                            `categorie`
                                        FROM
                                            categorie
                                        ');
        $queryCat -> execute();
        $categories = $queryCat -> fetchAll(); 
        
        $template = "modif_article";
    
        require 'layout.phtml';
        
    } 
    else
    {
        $id = $_POST["id_article"];
        $title = $_POST["title"];
        $title = trim($title);
        $title = stripslashes($title);
        $title = htmlspecialchars($title);
        $content = $_POST["content"];
        $content = trim($content);
        $content = stripslashes($content);
        $content = htmlspecialchars($content);
        $author = $_POST["author"];
        $categorie = $_POST["categorie"];

        
        
        if (isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])) {
            $image = $_FILES["image"]["name"];

            $req_edit = $connexion -> prepare('
                                                UPDATE 
                                                    article
                                                SET
                                                    title = ? ,
                                                    contentArticle = ?,
                                                    image = ?,
                                                    ID_category = ?,
                                                    ID_author = ?
                                                WHERE
                                                    ID_article = ?
                                                ');
        
            $test = $req_edit -> execute([$title, $content,$image, $categorie, $author, $id]);
            
             $uploads_dir = 'images';
            if (!empty($_FILES['image']['name'])) { //si le nom de l'image n'est pas vide
                $tmp_name = $_FILES["image"]["tmp_name"];
                $image = $_FILES["image"]["name"];
                move_uploaded_file($tmp_name, "$uploads_dir/$image");
                unlink("images/".$_POST["image_path"]);
            }
            
            
        } else {
             $req_edit = $connexion -> prepare('
                                                UPDATE 
                                                    article
                                                SET
                                                    title = ? ,
                                                    contentArticle = ?,
                                                    ID_category = ?,
                                                    ID_author = ?
                                                WHERE
                                                    ID_article = ?
                                                ');
        
            $test = $req_edit -> execute([$title, $content, $categorie, $author, $id]);
        }
        
        
        if($test)
        {
            header("location:admin.php");
        } else {
            echo "Veuillez remplir tous les champs !";
        }
    }
} else {
    header("location:admin.php");
}