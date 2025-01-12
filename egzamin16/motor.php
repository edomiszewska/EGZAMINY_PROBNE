<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <img src="motor.png" alt="motocykl" id="motor">

    <header>
<h1>Motocykle- moja pasja</h1>
    </header>


    <section>
    <h2>Gdzie pojechać?</h2>
    <dl> 
        <?php
// pierwszy skrypt
$baza=mysqli_connect('localhost','root','','motory');
$zapytanie='SELECT nazwa, opis, poczatek, zrodlo FROM wycieczki
join zdjecia on zdjecia.id=wycieczki.zdjecia_id;';
$wynik=mysqli_query($baza,$zapytanie);

while($wiersz=mysqli_fetch_row($wynik)){
    echo "<dt>  $wiersz[0], rozpoczyna sie w $wiersz[2] <a href='$wiersz[3].jpg'>zobacz zdjęcie</a></dt>
    <dd>$wiersz[1]</dd>";
};

        ?>
    </dl>
    </section>

    <aside id="jeden">
    <h2>Co kupić?</h2>
    <ol>
        <li>Honda CBR125R</li>
        <li>Yamaha YBR125</li>
        <li>Honda VFR800i</li>
        <li>Honda CBR1100XX</li>
        <li>BMW R1200GS LC</li>
        

    </ol>
    </aside>

    
    <aside id="dwa">
    <h2>Statystyki</h2>
    
    <?php
// drugi skrypt
$zapytanie2='SELECT count(id) from wycieczki;';
$wynik2=mysqli_query($baza,$zapytanie2);

while($wiersz2=mysqli_fetch_row($wynik2)){
    echo "<p>Wpisanych wycieczek: $wiersz2[0]</p>";
};

mysqli_close($baza);

    ?>
    <p>Użytkowników forum:200</p>
    <p>Przesłanych zdjęć:1300</p>
    </aside>

    <footer>
<p>Stronę wykonał nr 7</p>
    </footer>
</body>
</html>