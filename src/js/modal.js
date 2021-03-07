const modalTrigger = document.querySelectorAll('.modal-trigger');
const modalClose = document.querySelectorAll('.modal-close');
const modalBackdrop = document.querySelectorAll('.modal-backdrop');

for (let i=0; i < modalTrigger.length; i++) {
    modalTrigger[i].addEventListener('click', function(event){ 
        event.preventDefault();         
        setTimeout(function(){
            document.getElementById(modalTrigger[i].dataset.target).classList.add('display-block');
            document.getElementById(modalTrigger[i].dataset.target).classList.remove('display-none');
            document.getElementById(modalTrigger[i].dataset.target).setAttribute('aria-hidden', 'false');
        }, 1);

        setTimeout(function(){
            document.getElementById(modalTrigger[i].dataset.target).classList.add('fade-in');
            document.getElementById(modalTrigger[i].dataset.target).classList.remove('fade-out');
        }, 250);
    });
}

for (let i=0; i < modalClose.length; i++) {
    modalClose[i].addEventListener('click', function(event){
        event.preventDefault();
        setTimeout(function(){
            document.getElementById(modalClose[i].dataset.target).classList.add('fade-out');
            document.getElementById(modalClose[i].dataset.target).classList.remove('fade-in');
        }, 250);

        setTimeout(function(){
            document.getElementById(modalClose[i].dataset.target).classList.add('display-none');
            document.getElementById(modalClose[i].dataset.target).classList.remove('display-block');
            document.getElementById(modalClose[i].dataset.target).setAttribute('aria-hidden', 'true');
        }, 375);
    });
}

document.addEventListener('click', function(event) {
    let modal = document.querySelectorAll('.modal-backdrop');
    for (var i = 0; i < modal.length; i++) {
        let targetModal = modal[i].querySelector('.modal');

        if (modal[i].classList.contains('display-block')) {
            var isClickInside = targetModal.contains(event.target);

            if (!isClickInside) {
                modal[i].classList.add('display-none');
                modal[i].classList.remove('display-block');
                modal[i].setAttribute('aria-hidden', 'true');
            }
        }
    }
});
