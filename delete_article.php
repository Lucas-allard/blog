<?php 

session_start();
require 'connexion.php';

if (isset($_SESSION["admin"])) {
    if (array_key_exists('id_delete', $_GET) && is_numeric($_GET['id_delete'])) {
        $id = $_GET['id_delete'];
        
        $req_delete_img = $connexion -> prepare('
                                        SELECT
                                            image
                                        FROM
                                            article
                                        WHERE
                                            ID_article = ?        
                                        ');
                                        
        $req_delete_img -> execute([$id]);
        
        
        
        $img_path = $req_delete_img -> fetch();
        $img_path = $img_path['image'];
        
        unlink("images/".$img_path);
        
        
        $req_delete = $connexion -> prepare('
                                            DELETE
                                            FROM
                                                article
                                            WHERE
                                                ID_article = ?        
                                            ');
                                            
        $req_delete -> execute([$id]);
    
        header("location:admin.php");
    }
} else {
    header("location:admin.php");    
}
