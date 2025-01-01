<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis aut</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>

<header>
<h1><i>KupAuto!</i> Internetowy Komis Samochodowy </h1>
</header>

<main id="jeden">
    <!-- skrypt 1 -->
<?php
$baza=mysqli_connect('localhost', 'root','','kupauto');

$zapytanie="select model, rocznik, przebieg, paliwo, cena, zdjecie from samochody where id like '10';";
$wynik=mysqli_query($baza, $zapytanie);

while($wiersz=mysqli_fetch_row($wynik)){
    echo "<img src='$wiersz[5]' alt='oferta dnia'>
    <h4>Oferta Dnia: Toyota $wiersz[0]</h4>
    <p>Rocznik: $wiersz[1], przebieg: $wiersz[2], rodzaj paliwa: $wiersz[3]</p>
    <h4>Cena: $wiersz[4]</h4>
    ";
}


?>
</main>


<main id="dwa">
    <h2>Oferty wyróżnione</h2>
    <!-- skrypt 2 -->
    <?php
$baza=mysqli_connect('localhost', 'root','','kupauto');

$zapytanie2="select nazwa, model, rocznik, cena, zdjecie from marki
join samochody on samochody.marki_id=marki.id where wyrozniony like'1' limit 4;";

$wynik2=mysqli_query($baza,$zapytanie2);

while($wiersz2=mysqli_fetch_row($wynik2)){
    echo " <section>
    <img src='$wiersz2[4]' alt='$wiersz2[1]'>
    <h4>$wiersz2[0] $wiersz2[1]</h4>
    <p>Rocznik: $wiersz2[2]</p>
    <h4>Cena: $wiersz2[3]</h4>
    </section>

  

    ";
}

$wynik2=mysqli_query($baza, $zapytanie2);

?>
</main>

<main id="trzy">
    <h2>Wybierz markę</h2>
    <form action="KupAuto.php" method="POST">
<!-- skrypt 3 -->
<select name="auta" id="auta">
    
    <?php
$baza=mysqli_connect('localhost', 'root','','kupauto');

$zapytanie3="select nazwa from marki;";

$wynik3=mysqli_query($baza,$zapytanie3);

while($wiersz3=mysqli_fetch_row($wynik3)){
    echo "<option value='$wiersz3[0]'>$wiersz3[0]</option>";
}

?>
     
</select>
<button id="przy" name="przy">Wyszukaj</button>
    </form>
<!-- skrypt 4 -->
<?php
$baza=mysqli_connect('localhost', 'root','','kupauto');





if(isset($_POST['przy'])&&isset($_POST['auta'])){

    $marka=$_POST['auta'];
    
$zapytanie4="select model, cena, zdjecie from samochody JOIN marki on marki.id=samochody.marki_id where marki.nazwa like '$marka';";
$wynik4=mysqli_query($baza,$zapytanie4);
while($wiersz4=mysqli_fetch_row($wynik4)){
    echo "<article>
    <img src='$wiersz4[2]' alt='$wiersz4[0]'>
    <h4>$marka $wiersz4[0]</h4>
    
    <h4>Cena: $wiersz4[1]</h4>
    </article>";
}

}


mysqli_close($baza);


?>
    



</main>

<footer>
<p>Stronę wykonał nr 7</p>
<a href="http:///firmy.pl/komis">Znajdź nas także</a>
</footer>
    
</body>
</html>