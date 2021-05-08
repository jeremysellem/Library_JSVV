<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Search Results</title>
        <link rel="stylesheet" type="text/css" href="../css/search.css">
    </head>
    <body>
    <?php
        if (isset($_POST["send"]) && !empty($_POST["reseach"])) {
            $research = htmlspecialchars($_POST["reseach"]);

            $sql = "SELECT * FROM Library_JSVV.Livres where 
            (Titre like '%".$research."%') OR 
            (Auteur like '%".$research."%') OR
            (Categorie like '%".$research."%')" ;
            $result = $conn->query($sql);

            if($result->rowCount() > 0) {
                echo '<h3>Results : "'.$research.'"</h3>';
                echo '<div class="container-bloc" id="results">';
                foreach ($result as $row) {
                    echo '<figure>
                                <img src='.$row["Lien_image"].'>
                                <figcaption >'.$row["Titre"].'</figcaption>
                                <figcaption >'.$row["Auteur"].'</figcaption>
                                <span class="price">'.$row["Prix"].' EUR</span>
                                <a class="prod_button" href="article.php?id='.$row["Livre_ID"].' "> Description</a>
                                </figure>';
                }
                echo "</div>";
            }
            else {
                echo '<h3>Results : "'.$research.'"</h3>';
                echo "<div id='noresult'>No results found...</div>";
            }
        }
    ?>
    </body>
</html>