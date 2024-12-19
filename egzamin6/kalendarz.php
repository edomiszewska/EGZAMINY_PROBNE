<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadania na lipiec</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <header id="pierwszy">
    <img src="logo1.png" alt="lipiec">
    
    </header>
    <header id="drugi">
        <h1>TERMINARZ</h1>
        <p>najbliższe zadania: </p>
        <?php

     $baza=mysqli_connect('localhost', 'root','','terminarz');

            $zapytanie="SELECT DISTINCT wpis from zadania where dataZadania between '2020-07-01' and '2020-07-07' and wpis not like '';";
            $wynik=mysqli_query($baza,$zapytanie);
            while($dane=mysqli_fetch_row($wynik)){
                echo "{$dane[0]}; ";
            };

    ?>
     </header>

        <main>
           
            <?php 
            
            $zapytanie2="SELECT dataZadania, wpis from zadania where miesiac like 'lipiec';";
            $wynik2=mysqli_query($baza,$zapytanie2);
            while($dane2=mysqli_fetch_row($wynik2)){
                echo "<section>
                <h6> {$dane2[0]}</h6>
                <p>{$dane2[1]}</p>
                </section>";
            };


            ?>
          
        </main>

        <footer>
    <a href="sierpien.html">Teminarz na sierpień</a>
    <p>Strone wykonal nr 7</p>
        </footer>
</body>
</html>