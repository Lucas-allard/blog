<?php 

session_start();
require 'connexion.php';

if (isset($_SESSION["admin"])) {
    if (array_key_exists('id_delete', $_GET) && is_numeric($_GET['id_delete'])) {
        $id = $_GET['id_delete'];
        
        $req_delete_category = $connexion -> prepare('
                                        SELECT
                                            categorie
                                        FROM
                                            categorie
                                        WHERE
                                            ID_category = ?        
                                        ');
                                        
        $req_delete_category -> execute([$id]);
        
        $req_delete = $connexion -> prepare('
                                            DELETE
                                            FROM
                                                categorie
                                            WHERE
                                                ID_category = ?        
                                            ');
                                            
        $req_delete -> execute([$id]);
    
        header("location:admin.php");
    }
} else {
    header("location:admin.php");    
}
