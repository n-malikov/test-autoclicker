<script>
    $(function () {
        const ids = ['item1', 'item2', 'item3', 'item4'];
        const hrefList = [];

        // ===== Helpers для куков =====
        function setCookie(name, value, days = 1) {
            const expires = new Date(Date.now() + days * 864e5).toUTCString();
            document.cookie = `${name}=${value}; expires=${expires}; path=/`;
        }

        function getCookie(name) {
            return document.cookie.split('; ').reduce((r, v) => {
                const parts = v.split('=');
                return parts[0] === name ? decodeURIComponent(parts[1]) : r;
            }, null);
        }

        // ===== Вывод источника клика =====
        const clickSource = getCookie('clickSource');
        console.log('Click source:', clickSource || 'none');

        // ===== Сбор ссылок из массива =====
        ids.forEach(id => {
            const href = $(`#${id}`).attr('href');
            if (href) {
                hrefList.push(href);
            }
        });

        // ===== Определение текущего и следующего индекса =====
        const currentPath = window.location.pathname;
        const currentSlug = currentPath.split('/').filter(Boolean).pop();

        let currentIndex = hrefList.findIndex(href => {
            const slug = href.split('/').filter(Boolean).pop();
            return slug === currentSlug;
        });

        if (currentIndex === -1) {
            currentIndex = 0;
        } else {
            currentIndex = (currentIndex + 1) % hrefList.length;
        }

        // ===== Переменные для таймера =====
        let redirectTimeout = null;

        function startRedirectTimer(delay) {
            clearTimeout(redirectTimeout);
            redirectTimeout = setTimeout(() => {
                setCookie('clickSource', 'auto');
                const nextHref = hrefList[currentIndex];
                console.log(`Redirecting to: ${nextHref} after ${delay / 1000} seconds`);
                window.location.href = nextHref;
            }, delay);
        }

        // ===== Глобальный обработчик всех внутренних ссылок =====
        $('a').on('click', function () {
            const href = $(this).attr('href');
            if (href && !href.startsWith('http') && !href.startsWith('mailto:') && !href.startsWith('#')) {
                setCookie('clickSource', 'user');
            }
        });

        // ===== Отслеживание активности пользователя =====
        let activityTimeout;
        const activityDelay = 10000;

        function onUserActivity() {
            clearTimeout(activityTimeout);
            clearTimeout(redirectTimeout);
            activityTimeout = setTimeout(() => {
                console.log('User was active — delaying redirect by 10 seconds');
                startRedirectTimer(activityDelay);
            }, 0); // Немедленно установить задержку после активности
        }

        // Слушатели активности
        ['mousemove', 'keydown', 'scroll', 'click'].forEach(event => {
            window.addEventListener(event, onUserActivity, { passive: true });
        });

        // ===== Старт начального таймера на основе куки или по умолчанию =====
        const initialDelay = clickSource === 'user' ? 10000 : 7000;
        startRedirectTimer(initialDelay);
    });



    // ===== Секундомер =====
    let seconds = 0;
    function updateTimer() {
        seconds++;
        const minutes = Math.floor(seconds / 60);
        const secs = seconds % 60;
        document.getElementById('timer').textContent = `${minutes}:${secs.toString().padStart(2, '0')}`;
    }
    setInterval(updateTimer, 1000);

</script>
