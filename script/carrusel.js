document.addEventListener('DOMContentLoaded', () => {
const carrusel = document.getElementById('carrusel')
const prevBtn = document.getElementById('prev_boton')
const sigBtn = document.getElementById('sig_boton')
const indicators = document.getElementById('indicators')

let currentIndex = 0
const objetos = document.querySelectorAll('.objeto_carrusel')
const totalObjetos = objetos.length

for(let i = 0 ; i < totalObjetos ; i++){
    const dot = document.createElement('div')
    dot.classList.add('indicators')
    if(i === 0) dot.classList.add('active')
    dot.addEventListener('click',() => goToSlide(i))
    indicators.appendChild(dot)
}

function updateIndicators(){
    document.querySelectorAll('.indicators').forEach((indicators, index) => {
        indicators.classList.toggle('active', index === currentIndex)
    })
}

function goToSlide(index){
    currentIndex= index
    carrusel.style.transform = `translateX(-${currentIndex * 100}%)`
    updateIndicators()
}

function sigSlide(){
    currentIndex = (currentIndex + 1) % totalObjetos
    goToSlide(currentIndex)
}

function prevSlide(){
    currentIndex = (currentIndex - 1 + totalObjetos) % totalObjetos
    goToSlide(currentIndex)
}

sigBtn.addEventListener('click', sigSlide)
prevBtn.addEventListener('click', prevSlide)

});