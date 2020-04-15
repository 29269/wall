const kleine = document.querySelectorAll('.small');
const groot = document.querySelectorAll('.big');


const alleBig = []

for (let i = 0; i < groot.length; i++) {
    alleBig.push(groot[i]);



    groot[i].remove();
}
const sluitknop = document.createElement('i');
sluitknop.className = 'fas fa-times-circle sk';
sluitknop.addEventListener('click', sluiten);


function box(nummer) {

    let modaall = document.createElement('div');
    modaall.id = 'modaall';
    modaall.addEventListener('click', sluiten);
    let inhoud = document.createElement('div');

    inhoud.className = 'modaallInhoud';
    inhoud.innerHTML = alleBig[nummer].innerHTML;
    inhoud.addEventListener('click', function(e) {
        e.stopPropagation();
    });

    gsap.to(inhoud, { marginTop: 0, duration: 1, ease: "steps(12)" });
    modaall.append(inhoud);
    inhoud.prepend(sluitknop);
    document.body.append(modaall);
}

for (let i = 0; i < kleine.length; i++) {
    kleine[i].addEventListener('click', function() {
        box(i)

    });
}

function sluiten() {
    document.getElementById('modaall').remove();
}