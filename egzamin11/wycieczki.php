<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki po Europie</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <header>
<h1>BIURO TURYSTYCZNE</h1>
    </header>

    <section id="dane">
    <h3>Wycieczki, na które są wolne miejsca</h3>

    <ul>
        <!-- skrypt 1 -->
        <?php
        $baza=mysqli_connect('localhost','root','','biuro');

        $zapytanie="select id, dataWyjazdu, cel, cena from wycieczki where dostepna like '1';";
        $wynik=mysqli_query($baza,$zapytanie);

        while($wiersz=mysqli_fetch_row($wynik)){
            echo "<li>$wiersz[0]. dnia $wiersz[1] jedziemy do $wiersz[2], cena $wiersz[3]</li>";
        }

        ?>
    </ul>
    </section>

    <section id="lewy">
    <h2>Bestselery</h2>
    <table>
        <tr><td>Wenecja</td><td>kwiecień</td>
       
       
    </tr>
        <tr> <td>Londyn</td>
    <td>lipiec</td>
</tr>

<tr><td>Rzym</td>
<td>wrzesień</td></tr>
    </table>
    </section>

    <main>
<h2>Nasze zdjęcia</h2>
<!-- skrypt 2 -->
<?php

$baza=mysqli_connect('localhost','root','','biuro');

$zapytanie2="select nazwaPliku, podpis from zdjecia order by podpis desc;";

$wynik2=mysqli_query($baza,$zapytanie2);

while($wiersz2=mysqli_fetch_row($wynik2)){
    echo "<img src='$wiersz2[0]' alt='$wiersz2[1]'>";
};

mysqli_close($baza);

?>
    </main>

    <aside id="prawy">
    <h2>Skontaktuj się</h2>
    <a href="mailto:turysta@wycieczki.pl">napisz do nas</a>
    <p>telefon: 111222333</p>
    </aside>

    <footer>
<p>Stronę wykonał nr 7</p>
    </footer>


</body>
</html>