<?php

$sql = "SELECT * FROM ecrit INNER JOIN user on idAmi=user.id WHERE idAmi=? order by dateEcrit DESC ";
        $q = $pdo->prepare($sql);
        $q->execute(array($_GET['id']));

while($line=$q->fetch()) {

    if($line['image']==""){
    echo "<div>
            <div> <h3>".$line['login']."</h3> <p>".$line['dateEcrit']."</p><a href='index.php?action=aime&id=".$line['id']."'> <img src='divers/pouce1.png' alt='pouce'></a></div>
            <div><h2>".$line['titre']."</h2> <p>".$line['contenu']."</p> </div>
            </div>";
    }else{
        echo "<div>
            <div> <h3>".$line['idAmi']."</h3> <p>".$line['dateEcrit']."</p> <a href='index.php?action=aime&id=".$line['id']."'> <img src='divers/pouce1.png' alt='pouce'></a></div>
            <div>
                <div><img src='".$line['image']."' alt='imagepost'> </div>
                <div><h2>".$line['titre']."</h2> <p>".$line['contenu']."</p></div> </div>
            </div>";
    }

   
    
}

?>