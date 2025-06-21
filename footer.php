<script>
    $(function () {
        const ids = ['item1', 'item2', 'item3', 'item4'];
        const hrefs = {};
        ids.forEach(id => {
            hrefs[id] = $(`#${id}`).attr('href');
        });
        console.log(hrefs);
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
