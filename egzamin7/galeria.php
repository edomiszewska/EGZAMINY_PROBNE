<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
<h1>Zdjęcia</h1>
    </header>

    <section id="lewy">
    <h2>Tematy zdjęć</h2>

        <ol>
            <li>
                Zwierzęta
            </li>
            <li>Krajobrazy</li>
            <li>Miasta</li>
            <li>Przyroda</li>
            <li>Samochody</li>
        </ol>

    </section>

    <main>
       
    
<?php

$baza=mysqli_connect('localhost','root','','galeria');

$zapytanie="
select plik, tytul, polubienia, imie, nazwisko from zdjecia join autorzy on autorzy.id=zdjecia.autorzy_id order by nazwisko;
";
$wynik=mysqli_query($baza,$zapytanie);



while ($wiersz = mysqli_fetch_row($wynik)) {
    echo "
    <article>
        <img src='$wiersz[0]' alt='zdjęcie'>
        <h3>$wiersz[1]</h3>
    ";

    if ($wiersz[2] > 40) {
        echo "<p>Autor: $wiersz[3] $wiersz[4].<br>Wiele osób polubiło ten obraz</p>";
    } else {
        echo "<p>Autor: $wiersz[3] $wiersz[4].</p>";
    }
    echo "<a href='$wiersz[0]' download >Pobierz</a>";

    echo "</article>";
};
?>

    </main>

    <aside id="prawy">
<h2>Najbardziej lubiane</h2>
<?php


$baza=mysqli_connect('localhost','root','','galeria');

$zapytanie2="select tytul, plik from zdjecia where polubienia>=100;";

$wynik2=mysqli_query($baza, $zapytanie2);

while($wiersz2=mysqli_fetch_row($wynik2)){
    echo "<img src='$wiersz2[1]' alt='$wiersz2[0]'>";
};

mysqli_close($baza);
?>

<b>Zobacz wszystkie nasze zdjęcia</b>
    </aside>



    <footer>
<h5>Stronę wykonał nr 7</h5>
    </footer>
</body>
</html>