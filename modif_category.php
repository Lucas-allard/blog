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
                                                categorie,
                                                `ID_category`
                                            FROM
                                                categorie
                                            WHERE
                                                ID_category = ?
                                            ');
        $req_edit -> execute([$id]);
        
        $category = $req_edit -> fetch();
                
                
        $template = "modif_category";
        
        require 'layout.phtml';
    } else 
    {
        
        $id = $_POST["id_category"];
        $new_category = $_POST["new_category"];
        $new_category = trim($new_category);
        $new_category = stripslashes($new_category);
        $new_category = htmlspecialchars($new_category);
     
        $req_push_edit = $connexion -> prepare('
                                                 UPDATE 
                                                    categorie
                                                SET
                                                    categorie = ? 
                                                WHERE
                                                    ID_category = ?
                                                ');
        
        $test = $req_push_edit -> execute([$new_category, $id]);
        
        if($test)
        {
            header("location:admin.php");
        } else {
            echo "Veuillez remplir tous les champs !";
        }
    }
}
