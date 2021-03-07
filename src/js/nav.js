// https://gomakethings.com/how-to-add-transition-animations-to-vanilla-javascript-show-and-hide-methods/

var show = function(elem) {
    var getHeight = function () {
        elem.style.display = 'block';
        var height = elem.scrollHeight + 'px';
        elem.style.display = '';
        return height;
    };

    var height = getHeight();
	elem.classList.add('show');
	elem.style.height = height;

    window.setTimeout(function () {
		elem.style.height = '';
        elem.style.opacity = '1';
        elem.style.transform = 'scale(1.0)';
	}, 750);
}

var hide = function (elem) {
    elem.style.height = elem.scrollHeight + 'px';

	window.setTimeout(function () {
		elem.style.height = '0';
        elem.style.opacity = '0';
        elem.style.transform = 'scale(1.5)';
	}, 1);

    window.setTimeout(function () {
		elem.classList.remove('show');
	}, 750);
};

var toggle = function (elem, timing) {
	if (elem.classList.contains('show')) {
		hide(elem);
		return;
	}
	show(elem);
};

const toggler = document.getElementsByClassName('nav-toggler');
const navCollapse = document.getElementsByClassName('nav-collapse');

for (var i=0, len=toggler.length; i<len; i=i+1) {
    toggler[i].addEventListener('click', function (event) {
        event.preventDefault();
        var navCollapse = document.getElementsByClassName('nav-collapse');
        for (var i=0, len=navCollapse.length; i<len; i=i+1) {
            toggle(navCollapse[i]);
        }

        console.log('clicked');

    }, false);
}


window.addEventListener('resize', function() {
    var viewportWidth = window.innerWidth || document.documentElement.clientWidth;
    if (viewportWidth > 768) {
        for (var i=0, len=navCollapse.length; i<len; i=i+1) {
            navCollapse[i].style.cssText = 'height: auto; opacity: 1; transform: scale(1);';
            navCollapse[i].classList.remove('show');
        }
    }
});
