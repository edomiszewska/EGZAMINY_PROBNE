<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
<header id="lewy">
<h1>Internetowy sklep z eko-warzywami</h1>
</header>    

<header id="prawy">
    <ol><li>owoce</li>
<li>warzywa</li>
<li><a href="https://terapiasokami.pl/" target="_blank">soki</a></li></ol>
</header> 

<main>
<?php
// skrypt 1

$baza=mysqli_connect('localhost','root','','dane2');
$zapytanie1="select nazwa, ilosc, opis, cena, zdjecie from produkty where rodzaje_id IN(1,2);
";

$wynik=mysqli_query($baza,$zapytanie1);

while($wiersz=mysqli_fetch_row($wynik)){

    echo "<section>
    <img src='$wiersz[0].jpg' alt='warzywniak'>
    <h5>$wiersz[0]</h5>
    <p>opis: $wiersz[2]</p>
    <p>na stanie: $wiersz[1]</p>
    <h2>$wiersz[3] zł</h2>
    
    
    </section>";
}







?>
</main>

<footer>
<form action="sklep.php" method="POST">
Nazwa: <input type="text" name="nazwa">
Cena: <input type="text" name="cena">
<button name="dodaj"  type="submit" >Dodaj produkt</button>

<?php

// skrypt 2

if(isset($_POST['nazwa'])&&isset($_POST['cena'])){
    
    $nazwa=$_POST['nazwa'];
    $cena=$_POST['cena'];
    $zapytanie2="insert into produkty(id,Rodzaje_id, Producenci_id, nazwa, ilosc, opis, cena, zdjecie) values ('','1','4','$nazwa','10','','$cena','owoce.jpg');";

    $wynik2=mysqli_query($baza,$zapytanie2);
    


    


}



mysqli_close($baza);

?><br>



Stronę wykonał: nr 7


</form>
</footer>

</body>
</html>