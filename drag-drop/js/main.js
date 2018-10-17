const fill = document.querySelector('.fill');

const empties = document.querySelectorAll('.empty');

// aplica o evento quando pega o componente
fill.addEventListener('dragstart', dragStart);

// aplica o evento quando solta o elemento
fill.addEventListener('dragend', dragEnd);


for(const empty of empties) {
    empty.addEventListener('dragover', dragOver);
    empty.addEventListener('dragenter', dragEnter);
    empty.addEventListener('dragleave', dragLeave);
    empty.addEventListener('drop', dragDrop);
}


function dragStart() {

    // seta uma classe para o componente
    this.className += ' hold';
   
    // exucuta uma função após um tempo determinado
    setTimeout(() => (this.className = 'invisible'), 0);

    console.log('start');
}

function dragEnd() {

    this.className = 'fill';

    console.log('end');

}

// evento ocorre equanto o componente é arrastado
function dragOver(e) {

    e.preventDefault();

    console.log('over');
}

// evento ocorre quando o componente atinge uma drag zone
function dragEnter(e) {

    e.preventDefault();

    this.className += ' hovered';

    console.log('enter');
}

function dragLeave() {

    this.className = 'empty';

    console.log('leave');
}

function dragDrop() {

    this.className = 'empty';
    
    this.append(fill);

    console.log('drop');
}