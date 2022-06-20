<?php 
session_start();
require 'connexion.php'; 

if (isset($_SESSION["admin"])) {  
    if (array_key_exists('id_edit', $_GET) && is_numeric($_GET['id_edit'])) {
        $id = $_GET['id_edit'];
    }

    if (!isset($_POST['submit']) && empty($_POST['submit'])) 
    {
        $req_edit = $connexion -> prepare('
                                            SELECT
                                                `lastnameAuthor`,
                                                `nameAuthor`,
                                                `ID_author`
                                            FROM
                                                auteur
                                            WHERE
                                                ID_author = ?
                                            ');
        $req_edit -> execute([$id]);
        
        $author = $req_edit -> fetch();
                
                
        $template = "modif_author";
        
        require 'layout.phtml';
    } else 
    {
        
        $id = $_POST["id_author"];
        $new_lastname_author = $_POST["new_lastname_author"];
        $new_lastname_author = trim($new_lastname_author);
        $new_lastname_author = stripslashes($new_lastname_author);
        $new_lastname_author = htmlspecialchars($new_lastname_author);
        $new_name_author = $_POST["new_name_author"];
        $new_name_author = trim($new_name_author);
        $new_name_author = stripslashes($new_name_author);
        $new_name_author = htmlspecialchars($new_name_author);
        
        $req_push_edit = $connexion -> prepare('
                                                 UPDATE 
                                                    auteur
                                                SET
                                                    lastnameAuthor = ? ,
                                                    nameAuthor = ?
                                                WHERE
                                                    ID_author = ?
                                                ');
        
        $test = $req_push_edit -> execute([$new_lastname_author, $new_name_author, $id]);
        
        if($test)
        {
            header("location:admin.php");
        } else {
            echo "Veuillez remplir tous les champs !";
        }
    }
}
