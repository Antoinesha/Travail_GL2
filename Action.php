<?php

/* A ffichage d'erreur 
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startups_errorrs', TRUE);

*/


//----------------------------------------------------------------------------

/* On se connecte a la BD */

$host = "localhost"; $dbname = "enterprise_db"; $user = "root"; $pass = "";

$conn = new mysqli($host, $user, $pass, $dbname);

// Verifions la connection

if($conn->connect_error){
    die("Echec de la connexion : " .$conn->connect_error);
}

// Traiter les donnees du formulaire

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nom_prenom = mysqli_real_escape_string($conn, $_POST['nom_prenom']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telephone = mysqli_real_escape_string($conn, $_POST['telephone']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);

    $sql = "INSERT INTO client (nom_prenom, email, telephone, details) values ('$nom_prenom', '$email', '$telephone', '$details')";

    // Verification de chaque champ du formulaire 

    if (isset($_POST['nom_prenom']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['details'])) {

         if (!empty($_POST['nom_prenom']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['details'])) {

                if(preg_match('/^\d{9}$/', $telephone)){


            if (filter_var($email, FILTER_VALIDATE_EMAIL)){


                $stmt = $conn->prepare("INSERT INTO client (nom_prenom, email, telephone, details) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $nom_prenom, $email, $telephone, $details);
                if($stmt->execute()){

                      header("Location:Successfuly.html");
                        exit();
                } else {
                    echo "Erreur lors de l'insertion";
                }
                
                } else {
                    echo "Adresse email invalide.";
                }

                    } else {
                        echo "Le numero de telephone est invalide";
                    }
            
            
            } else {
            echo "Certians champs sont manquants";
                }

} else {

        echo "Veillez remplir tout les champs du formulaire";
    }
}




      // Verifie que les champs ne sont pas vide 

        


        
    // Executons la requete 
/*



 if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty('details')) {

            header("Location:Successfuly.html");

            exit();
        }
    
} else {

    echo "Veillez remplir tous les champs du formulaire";
        } else {

            echo "Certains champs du formulaire sont manquants";
        }


   if($conn->query($sql) === TRUE){
        echo "Les donnees sont enregistrees avec succes";

         

    } else{
        echo "Erreur lors de l'enregistrement : " .$conn->error;
        
        header("Location:indexAccueil.php");
    }
*/

/*
try{
    
    $bddm=new PDO("mysql:host={$host}; dbname={$dbname}; charset=utf8", $user, $pass);
    $bddm ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bddm ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

}

catch(PDOException $e){
    die("Une erreur a ete trouve: " .$e->getMessage());
}

//-----------------------------------------------------------------------------

if(isset($_POST['submit'])){

    // Test de la variable

    $nom_prenom = !empty($_POST['nom_prenom'])? $_POST['nom_prenom'] : NULL;
    $email = !empty($_POST['email'])? $_POST['email'] : NULL;
    $telephone = !empty($_POST['telephone'])? $_POST['telephone'] : NULL;
    $detail = !empty($_POST['detail'])? $_POST['detail'] :NULL;

    // On s'apprete pour insertion des donnees 

    $insert=$bddm->prepare("INSERT INTO client(nom_prenom, email, telephone, detail) values ($nom_prenom, $email, $telephone, $detail)") or die(print_r($bddm->errorInfo()));

    // Insertion avec le parametre binParam

    $insert->binParam(':nom_prenom', $nom_prenom);
    $insert->binParam(':email', $email);
    $insert->binParam(':telephone', $telephone);
    $insert->binParam(':detail', $telephone);
    $insert->execute();

  */  // On revoie le successfuly 

   


?>
  