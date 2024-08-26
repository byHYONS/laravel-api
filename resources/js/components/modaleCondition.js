//? importo modale.js:
import './modale.js';

//? per aprire una modale specifica:
document.addEventListener('DOMContentLoaded', function() {
    const actionBtns = document.querySelectorAll('.modale');

    actionBtns.forEach(Button => {
        Button.addEventListener('click', function(e){
            e.preventDefault();
          
            const slug = Button.getAttribute('data-slug');
            const actionType = Button.getAttribute('data-type');
            const modaleId = `modale-${actionType}-${slug}`;
            const modaleAction = document.getElementById(modaleId);

            if (modaleAction) {
                modaleAction.classList.remove('holding');
                document.body.classList.add('no-scroll');
                window.scrollTo(0, 0);
            }
        });
    });
});