<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwiaty</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    
    <header>
        <h1>Grupa Polskich Kwiaciarni</h1>
    </header>


    <section id="lewy">
        <h2>Menu</h2>
        <ol>
            <li><a href="index.html">Strona główna</a></li>
            <li><a href="https://www.kwiaty.pl/" target="_blank">Rozpoznaj kwiaty</a></li>
            <li><a href="znajdz.php">Znajdź kwiaciarnię</a> <ul>
                <li>w Warszawie</li>
                <li>w Malborku</li>
                <li>w Poznaniu</li>
            </ul></li>
           
        </ol>
    </section>

    <aside id="prawy">
        <h2>Znajdź kwiaciarnię</h2>
        <form action="znajdz.php" method="POST">
        Podaj nazwę miasta: <input type="text" name="miasto">
        <button  name="przy">Sprawdź</button>

<?php
$baza=mysqli_connect('localhost','root', '','kwiaciarnia');


if (isset($_POST['przy'])&& isset($_POST['miasto'])) {
    
    $miasto=$_POST['miasto'];
    $zapytanie="select nazwa, ulica from kwiaciarnie where miasto like '$miasto';";

    $wynik=mysqli_query($baza,$zapytanie);
    while ($wiersz = mysqli_fetch_row($wynik)) {
       
        echo "<h3>$wiersz[0], $wiersz[1]</h3>";
    }
};

mysqli_close($baza);



?>
        </form>
    </aside>

    <footer>
<p>Stronę opracował nr 7</p>
    </footer>
</body>
</html>