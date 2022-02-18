(function() {
    Array.from(document.querySelectorAll('.x-c3')).forEach((el) => {
        c3.generate(JSON.parse(el.dataset.config));
    });
})();
