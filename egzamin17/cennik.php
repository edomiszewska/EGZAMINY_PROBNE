<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wynajem pokoi</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <header>
        <h1>Pensjonat pod dobrym humorem</h1>
    </header>

    <section>
        <a href="index.html">GŁÓWNA</a>
        <img src="2.jpeg" alt="pokoje">
    </section>
<main>
    <a href="cennik.php">CENNIK</a>
    <table>
        <?php
// skrypt 1

$baza=mysqli_connect('localhost','root','','wynajem');
$zapytanie="select * from pokoje;";

$wynik=mysqli_query($baza,$zapytanie);
while($wiersz=mysqli_fetch_row($wynik)){
    echo "<tr>
    <td>
    $wiersz[0]
    </td>
<td>$wiersz[1]</td>
<td>$wiersz[2]</td>
    
    </tr>";
};
mysqli_close($baza);

?>
    </table>

</main>
    <aside>
        <a href="kalkulator.html">KALKULATOR</a>
        <img src="3.jpeg" alt="pokoje">
    </aside>

    <footer>
        <p>Stronę opracował nr 7</p>
    </footer>
</body>
</html>