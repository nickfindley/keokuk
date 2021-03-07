const msnry = new Masonry( '.masonry-container', {
    itemSelector: '.masonry',
    columnWidth: '.masonry',
    percentPosition: true
});

function scrollResetLayout() {
    msnry.layout();
};

var scrollcount = 0
function scrollListener(){
    setTimeout(function(){
        scrollcount ++
        if (scrollcount < 2) {
            scrollResetLayout();
            window.removeEventListener('scroll', scrollListener);
        }
    }, 1);
};
window.addEventListener('scroll', scrollListener);
