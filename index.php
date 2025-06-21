<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Меню с автокликом</title>
    <style>
        .menu { list-style: none; padding: 0; }
        .menu li { display: inline-block; margin-right: 15px; padding: 5px 10px; background: #f0f0f0; cursor: pointer; transition: background 0.3s; }
        .active { background: #007bff; color: #fff; }
    </style>
</head>
<body>

<ul class="menu">
    <li><a href="#1" id="item1" class="link">Пункт 1</a></li>
    <li><a href="#2" id="item2" class="link">Пункт 2</a></li>
    <li><a href="#3" id="item3" class="link">Пункт 3</a></li>
    <li><a href="#5" id="item5" class="link">Пункт 5</a></li>
</ul>

<a href="#4" id="item4">Пункт 4</a>



</body>
</html>