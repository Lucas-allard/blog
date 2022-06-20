<?php 

require 'connexion.php';

$username = "lucas_admin";
$password = password_hash("azerty", PASSWORD_DEFAULT);

$req_add_admin = $connexion -> prepare('
                                        INSERT INTO admin(username, password)
                                        VALUE (?,?)
                                        ');
                                        
$req_add_admin -> execute([$username, $password]);                                    