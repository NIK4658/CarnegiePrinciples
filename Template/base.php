<!-- CarnegiePrinciples -->
<!-- WEBSITE AND BRAND DEVELOPED BY NICOLA MONTANARI -->
<!-- Jan 2023 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#FFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Dale Carnegie | Principles</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <main>
        <h1>Principle of the Week</h1>
        <h3> Principle #<?php echo $Principle[0]['ID']; ?> </h3>
        <h2>
            <?php echo $Principle[0]['Title']; ?>
        </h2>
        <?php
        foreach ($Notions as $Notion) {
            echo "<p>" . $Notion['Content'] . "</p>";
        }
        ?>
    </main>
</body>

</html>