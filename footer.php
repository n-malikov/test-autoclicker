<script>
    const ids = ['item1', 'item2', 'item3', 'item4'];
    const hrefs = ids.map(id => {
        const el = document.getElementById(id);
        return { id, href: el ? el.getAttribute('href') : null };
    });

    // Найти стартовый индекс по текущему хешу
    let currentIndex = hrefs.findIndex(item => item.href === window.location.pathname);
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
        window.location.href = hrefs[currentIndex].href;
    }

    // Запуск автокликера по таймеру
    let autoInterval = setInterval(cycle, 3000);
    let autoTimeout;

</script>
