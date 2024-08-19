/* ***********************************
        * MODALE DELETE
*********************************** */

const actionBtn = document.querySelector('.modale');
const actionBtns = document.querySelectorAll('.modale');
const closeBtn = document.querySelector('.modale__exit');
const closeBtns = document.querySelectorAll('.modale__exit');
const modale = document.querySelector('.modale__modale');
const overLay = document.querySelector('.screen');

console.log(actionBtn);

//? per show page:
if (actionBtn) {

    actionBtn.addEventListener('click', function () {
        modale.classList.remove('holding');
        document.body.classList.add('no-scroll');
        overLay.classList.remove('screen');
    
    });

}

//? per index page:
actionBtns.forEach(Button => {
    Button.addEventListener('click', function(e){
        e.preventDefault();
      
        const buttonId = Button.getAttribute('data-slug');
        console.log(`Cancella: ${buttonId}`);

        const modaleAction = document.getElementById(`modale-${buttonId}`);
        console.log(modaleAction);

        if (modaleAction) {
            modaleAction.classList.remove('holding');
            document.body.classList.add('no-scroll');
            overLay.classList.remove('screen');

            window.scrollTo(0, 0);

        };

    });

});


//? per show:

if (closeBtn) {

    closeBtn.addEventListener('click', function(){
        console.log('ho cliccato il bottone closed');
        modale.classList.add('holding');
        document.body.classList.remove('no-scroll');
        overLay.classList.add('screen');
    
    });
}

//? index page:

closeBtns.forEach(Button => {
    Button.addEventListener('click', function(e) {
        e.preventDefault();

        const modale = Button.closest('.modale__modale');
        modale.classList.add('holding');
        document.body.classList.remove('no-scroll');
        overLay.classList.add('screen');

    })
})