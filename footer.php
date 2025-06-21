<script>
    $(function () {
        const ids = ['item1', 'item2', 'item3', 'item4'];
        const hrefList = [];

        // Собираем ссылки в массив
        ids.forEach(id => {
            const href = $(`#${id}`).attr('href');
            if (href) {
                hrefList.push(href);
            }
        });

        // Получаем текущий slug
        const currentPath = window.location.pathname;
        const currentSlug = currentPath.split('/').filter(Boolean).pop();

        // Находим индекс текущего slug в массиве ссылок
        let currentIndex = hrefList.findIndex(href => {
            const slug = href.split('/').filter(Boolean).pop();
            return slug === currentSlug;
        });

        // Если не найден, начинаем с начала
        if (currentIndex === -1) {
            currentIndex = 0;
        } else {
            // Переходим к следующему, по кругу
            currentIndex = (currentIndex + 1) % hrefList.length;
        }

        // Переход через 7 секунд
        setTimeout(() => {
            const nextHref = hrefList[currentIndex];
            console.log('Redirecting to:', nextHref);
            window.location.href = nextHref;
        }, 7000);
    });




    // секундомер:
    let seconds = 0;
    function updateTimer() {
        seconds++;
        const minutes = Math.floor(seconds / 60);
        const secs = seconds % 60;
        document.getElementById('timer').textContent = `${minutes}:${secs.toString().padStart(2, '0')}`;
    }
    setInterval(updateTimer, 1000);

</script>
