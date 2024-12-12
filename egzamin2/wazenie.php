<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ważenie samochodów ciężarowych</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    
<header id="pierw"><h1>Ważenie pojazdów we Wrocławiu</h1></header>
<header id="drug"><img src="obraz1.png" alt="waga"></header>

<section id="lewy">
    <h2>Lokalizacja wag</h2>
    <ul>
<?php
$baza=mysqli_connect('localhost', 'root', '', 'wazenietirow');

$zapytanie="SELECT lokalizacje.ulica from lokalizacje;";
$wynik=mysqli_query($baza, $zapytanie);
while($cos=mysqli_fetch_row($wynik)){
    echo "<li>ulica $cos[0] </li>";
};


?>
    </ul>
    <h2>Kontakt</h2>
    <a href="mailto:wazenie@wroclaw.pl">Napisz</a>
</section>

<main id="srodek">
    <h2>Alerty</h2>
    <table>
<tr>
<th>rejestracja</th>
<th>ulica</th>
<th>waga</th>
<th>dzien</th>
<th>czas</th>
</tr>
<?php
$baza=mysqli_connect('localhost', 'root', '', 'wazenietirow');

$zapytanie2="select rejestracja, waga, dzien, czas, ulica from wagi
join lokalizacje on lokalizacje.id=wagi.lokalizacje_id
where waga>5;";
$wynik2=mysqli_query($baza, $zapytanie2);
while($cos2=mysqli_fetch_row($wynik2)){
    echo "<tr><td>$cos2[0]</td>
    <td>$cos2[4]</td>
    <td>$cos2[1]</td>
    <td>$cos2[2]</td>
    <td>$cos2[3]</td>
    </tr>
    "
    ;
};


$zapytanie3="insert into wagi(lokalizacje_id, waga, rejestracja, dzien, czas) VALUES(5,FLOOR(1 + RAND() * (10 - 1 +1)), 'DW12345', CURRENT_DATE, CURRENT_TIME); ";
$wynik3=mysqli_query($baza,$zapytanie3);
header("refresh:10");
mysqli_close($baza);
?>
 </table>
</main>

<aside id="prawy"><img src="obraz2.jpg" alt="tir" id="tir"></aside>

<footer><p>Stronę wykonał nr 7</p></footer>



</body>
</html>