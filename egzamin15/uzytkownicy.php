<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
   <header id="jeden">
   <h2>Nasze osiedle</h2>
   </header> 


  <header id="dwa">
  <?php
$baza=mysqli_connect('localhost','root','','portal');
$zapytanie="select count(*) from dane;";
$wynik=mysqli_query($baza,$zapytanie);

while($wiersz=mysqli_fetch_row($wynik)){
    echo "<h5>Liczba użytkowników portalu: $wiersz[0]</h5> ";
}



?>
   </header> 

    <section id="lewy">
<h3>Logowanie</h3>
<form action="uzytkownicy.php" method="POST">
login </br><input type="text" name="login"></br>
hasło </br><input type="password" name="haslo" id="haslo">
</br> <button name="zaloguj">Zaloguj </button>

</form>
    </section>

    <aside id="prawy">
<h3>Wizytówka</h3>
<article>
    <?php

if(!empty($_POST['login'])&&!empty($_POST['haslo'])){
    
$login=$_POST['login'];
$haslo=$_POST['haslo'];

$zapytanie2="select haslo from uzytkownicy where login like '$login';";
$wynik2=mysqli_query($baza,$zapytanie2);


if($rows=mysqli_num_rows($wynik2) == 0){
    echo "login nie istnieje";
}else{

    $wiersz2=mysqli_fetch_row($wynik2);
    if(sha1( $haslo )!== $wiersz2[0]){
    echo "haslo nieprawidlowe";
    
}else{
   
$zapytanie3="select login, rok_urodz, przyjaciol, hobby, zdjecie from uzytkownicy
join dane on dane.id=uzytkownicy.id where login like '$login';";
$wynik3=mysqli_query($baza,$zapytanie3);


while($wiersz3=mysqli_fetch_row($wynik3)){

    $wiek=date('Y')-$wiersz3[1];
    echo "<img src='$wiersz3[4]' alt='osoba'>
    <h4>$wiersz3[0] ($wiek)</h4>
    <p>hobby: $wiersz3[3]</p>
    <h1><img src='icon-on.png' alt='serce'> $wiersz3[2]</h1>
    <a href='dane.html'><button id='przy'>Więcej informacji</button></a>
    ";
}
}

}



}





?>
</article>
    </aside>

    <footer>
Stronę wykonał: nr 7
    </footer>
</body>
</html>