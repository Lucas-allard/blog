<?php 

require 'connexion.php';

if (isset($_POST["lastname"]) && !empty($_POST["lastname"]) && isset($_POST["name"]) && !empty($_POST["name"]) && isset($_POST["content"]) && !empty($_POST["content"])) {
    
    
    $lastname = $_POST["lastname"];
    $lastname = trim($lastname);
    $lastname = stripslashes($lastname);
    $lastname = htmlspecialchars($lastname);
    $name = $_POST["name"];
    $name = trim($name);
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    $content = $_POST["content"];
    $content = trim($content);
    $content = stripslashes($content);
    $content = htmlspecialchars($content);
    $id = $_POST["id_article"];
    
    $req2 = $connexion -> prepare('
                                    INSERT INTO commentaires(
                                        `lastnameComment`,
                                        `nameComment`,
                                        `contentComment`,
                                        `ID_article`,
                                        `dateComment`
                                    )
                                    VALUES(
                                        :lastnameComment,
                                        :nameComment,
                                        :contentComment,
                                        :ID_article,
                                        NOW()
                                    )
                                    ');
    $req2 -> bindParam(":lastnameComment", $lastname);      
    $req2 -> bindParam(":nameComment", $name);   
    $req2 -> bindParam(":contentComment", $content);   
    $req2 -> bindParam(":ID_article", $id);  
    $test = $req2 -> execute();
    
    if($test)
    {
        header("location:detail.php?id_article=$id");//??
    }
    
    
} else {
    echo "Veuillez remplir tous les champs !";
}




