<?php 

session_start();
require "connexion.php";

if (isset($_SESSION["admin"])) {    
    if (!isset($_POST['submit']) && empty($_POST['submit'])) 
    {
       
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
        
        $template = "ajout_article";
        require "layout.phtml";
    }
    else if (isset($_POST["title"]) && !empty($_POST["title"]) && isset($_POST["content"]) && !empty($_POST["content"]) && isset($_POST["author"]) && !empty($_POST["author"]) && isset($_POST["categorie"])) 
    {
          
        $title = $_POST["title"];
        $title = trim($title);
        $title = stripslashes($title);
        $title = htmlspecialchars($title);
        $content = $_POST["content"];
        $content = trim($content);
        $content = stripslashes($content);
        $content = htmlspecialchars($content);
        $author = $_POST["author"];
        $author = trim($author);
        $author = stripslashes($author);
        $author = htmlspecialchars($author);
        $categorie = $_POST["categorie"];
        $categorie = trim($categorie);
        $categorie = stripslashes($categorie);
        $categorie = htmlspecialchars($categorie);
        $image = $_FILES["image"]["name"];
        var_dump($image);
        
        $req_push = $connexion -> prepare('
                                        INSERT INTO article(
                                            `title`,
                                            `contentArticle`,
                                            `ID_author`,
                                            ID_category,
                                            date, 
                                            image
                                        )
                                        VALUES(
                                            :title,
                                            :contentArticle,
                                            :ID_author,
                                            :ID_category,
                                            NOW(),
                                            :image
                                        )
                                        ');
        $req_push -> bindParam(":title", $title);      
        $req_push -> bindParam(":contentArticle", $content);   
        $req_push -> bindParam(":ID_author", $author);   
        $req_push -> bindParam(":ID_category", $categorie);  
        $req_push -> bindParam(":image", $image); 
        $test = $req_push -> execute();
        
        $uploads_dir = 'images';
        if (!empty($_FILES['image']['name'])) { //si le nom de l'image n'est pas vide
            $tmp_name = $_FILES["image"]["tmp_name"];
            $image = $_FILES["image"]["name"];
            move_uploaded_file($tmp_name, "$uploads_dir/$image");
        }
        
         if($test)
        {
            header("location:admin.php");
        }
        
            
        } else {
            echo "Veuillez remplir tous les champs !";
    }
} else {
        header("location:admin.php");
}
    
