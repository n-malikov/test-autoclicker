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



<script>
  // Собираем элементы по их id
  const ids = ['item1', 'item2', 'item3', 'item4'];
  // Получаем значение href для каждого элемента и формируем новый массив
  const hrefs = ids.map(id => {
    const el = document.getElementById(id);
    return { id, href: el ? el.getAttribute('href') : null };
  });
  console.log(hrefs); // Выведет массив объектов [{id: "item1", href: "#1"}, …]
  let currentIndex = 0;
  setInterval(() => {
    const {id} = hrefs[currentIndex];
    const element = document.getElementById(id);
    if (element) {
      element.click();
    }
    currentIndex = (currentIndex + 1) % hrefs.length;
  }, 3000);
</script>
</body>
</html>
