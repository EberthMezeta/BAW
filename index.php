<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/index.css">
    <title>Buscador</title>
</head>
<body>
    <div id="tittle-container">
        <h1>Buscador de artículos de Wikipedia</h1>
    </div>
    <div id="barSearch-container">
        <label for="Search"><img src="./assets/images/lupa.svg"></label> <input type="text" name="" id="Search">
        <button id="searchButton">Buscar</button>
        <label for="Category">Categoria</label>
        <select name="" id="Category">
            <option value="">Relevancia</option>
            <option value="">Tamaño</option>
            <option value="">Fecha</option>
        </select>
    </div>
    <div id="articles-container">
        <?php
            
            
        ?>
    </div>
   <script src="./assets/javascript/index.js"></script>
</body>
</html>