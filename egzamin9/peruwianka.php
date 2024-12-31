<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hodowla świnek morskich</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
<h1>Hodowla świnek morskich - zamów świnkowe maluszki</h1>
    </header>

    <main id="menu"> 
    <a href="peruwianka.php">Rasa Peruwianka</a>
    <a href="american.php">Rasa American</a>
    <a href="crested.php">Rasa Crested</a>

    </main>

    <section id="lewy">
    <img src="peruwianka.jpg" alt="Świnka morska rasy peruwianka">
    <?php
   $baza=mysqli_connect('localhost','root','','hodowla');

   $zapytanie2="select DISTINCT data_ur, miot, rasa from swinki join rasy on rasy.id=swinki.rasy_id where rasy_id='1';";

   $wynik2=mysqli_query($baza,$zapytanie2); 

   while($wiersz2=mysqli_fetch_row($wynik2)){
   echo "<h2>Rasa: $wiersz2[2]</h2>
   <p>Data urodzenia: $wiersz2[0]</p>
   <p>Oznaczenie miotu: $wiersz2[1]</p>";
};
    ?>

    <hr>
    <h2>Świnki w tym miocie</h2>

    <?php
  $baza=mysqli_connect('localhost','root','','hodowla');

  $zapytanie3="select imie, cena, opis from swinki where rasy_id='1';";

  $wynik3=mysqli_query($baza,$zapytanie3); 

  while($wiersz3=mysqli_fetch_row($wynik3)){
    echo "<h3>$wiersz3[0] - $wiersz3[1] zł</h3>
    <p>$wiersz3[2]</p>";
  }

?>
    </section>

    <aside id="prawy">
    <h3>Poznaj wszystkie rasy świnek morskich </h3>
   <ol>
        <?php
    $baza=mysqli_connect('localhost','root','','hodowla');

    $zapytanie="select rasa from rasy;";

    $wynik=mysqli_query($baza,$zapytanie);  

    while($wiersz=mysqli_fetch_row($wynik)){
        echo "
        <li>
        {$wiersz[0]}
        </li>
        ";
    };
        ?>
   </ol>
    </aside>

    <footer>
    <p>Stronę wykonał nr 7</p>
    </footer>



</body>
</html>