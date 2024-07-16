document.addEventListener('DOMContentLoaded', function() {
    var menuToggle = document.getElementById('menu-toggle');
    var body = document.body;

    menuToggle.addEventListener('click', function(e) {
    e.preventDefault();
    body.classList.toggle('sb-sidenav-toggled');
});

    // Set initial state based on screen size
    function setInitialState() {
        if (window.screen.width >= 992) {
            body.classList.remove('sb-sidenav-toggled');
        } else {
            body.classList.add('sb-sidenav-toggled');
        }
    }

    setInitialState();

    // Update state on window resize
    window.addEventListener('resize', setInitialState);
});
