<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
</head>
<body>
    <!-- si la variable $content existe, on affiche ?? sinon on affiche ce qu'il y a dans '' -->
    <?= $content ?? 'Pas de contenu'?>
</body>
</html>