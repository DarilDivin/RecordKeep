const imgs = document.getElementById('imgs')
const leftBtn = document.getElementById('left')
const rightBtn = document.getElementById('right') 

const img = document.querySelectorAll('#imgs .image')

// const menuHamburgerbtn = document.querySelector('.menuHamburger')
// const menuHamburger = document.querySelector('.nav_menu')


let idx = 0

let width;

// menuHamburgerbtn.addEventListener('click', () => {
//     menuHamburger.classList.toggle('displayMenu')
// })


window.addEventListener('resize', function() {
    width = imgs.clientWidth;
    console.log(width);
});

let interval = setInterval(run, 7000)

function run() {
    idx++
    changeImage(width)
}

function changeImage(width) {
    if(idx > img.length - 1) {
        idx = 0
    } else if(idx < 0) {
        idx = img.length - 1
    }

    // console.log(width);

    imgs.style.transform = `translateX(${-idx * width}px)`;
}

function resetInterval() {
    clearInterval(interval)
    interval = setInterval(run, 7000) 
}

rightBtn.addEventListener('click', () => {
    idx++
    changeImage(width)
    resetInterval()
})

leftBtn.addEventListener('click', () => {
    idx--
    changeImage(width)
    resetInterval()
})


menuHamburgerbtn.addEventListener('click', () => {
    menuHamburger.classList.toggle('displayMenu')
})
