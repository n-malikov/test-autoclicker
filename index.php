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
<a href="#4" id="item4" class="link">Пункт 4</a>

<script>
  const ids = ['item1', 'item2', 'item3', 'item4'];
  const hrefs = ids.map(id => {
    const el = document.getElementById(id);
    return { id, href: el ? el.getAttribute('href') : null };
  });

  // Найти стартовый индекс по текущему хешу
  let currentIndex = hrefs.findIndex(item => item.href === window.location.hash);
  if (currentIndex === -1) currentIndex = 0;

  // Подсветка активного пункта
  function updateActive(index) {
    ids.forEach(id => document.getElementById(id).classList.remove('active'));
    const el = document.getElementById(hrefs[index].id);
    if (el) el.classList.add('active');
  }
  updateActive(currentIndex);

  // Функция автоклика (смены хеша и переключения индекса)
  function cycle() {
    currentIndex = (currentIndex + 1) % hrefs.length;
    const el = document.getElementById(hrefs[currentIndex].id);
    if (el) {
      el.click();
    }
    updateActive(currentIndex);
  }

  // Запуск автокликера по таймеру
  let autoInterval = setInterval(cycle, 3000);
  let autoTimeout;

  window.addEventListener('hashchange', () => {
    clearInterval(autoInterval);
    if (typeof autoTimeout !== 'undefined') {
      clearTimeout(autoTimeout);
    }
    let idx = hrefs.findIndex(item => item.href === window.location.hash);
    currentIndex = idx === -1 ? 0 : idx;
    updateActive(currentIndex);
    // перезапуск автокликера через 3 секунды после ручного клика
    autoTimeout = setTimeout(() => {
      cycle();
      autoInterval = setInterval(cycle, 3000);
    }, 3000);
  });
</script>

</body>
</html>
