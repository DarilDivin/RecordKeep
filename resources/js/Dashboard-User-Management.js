const list = document.querySelectorAll('.list');
const sidebar = document.querySelector('.navigation');
const container = document.querySelector('.container');

const addBtn = document.querySelector('.add');
const userFormContainer = document.querySelector('.addUserFormContainer');
const closeUserForm = document.querySelector('.closeUserForm');
const overlay = document.querySelector('.overlay');


function activeLink() {
    list.forEach((item) => 
    item.classList.remove('active'));
    this.classList.add('active');
}
list.forEach((item) => 
item.addEventListener('click', activeLink));


addBtn.addEventListener('click', () => {
    userFormContainer.classList.add('showForm')
})


const closeForm = () => {
    userFormContainer.classList.remove('showForm');
}

closeUserForm.addEventListener('click', closeForm);
overlay.addEventListener('click', closeForm);

sidebar.addEventListener('mouseenter', () => {
    if(!sidebar.classList.contains('hoverrable')) {
        sidebar.classList.add('hoverrable')
        container.classList.add('develop')
    }
})

sidebar.addEventListener('mouseleave', () => {
    if(sidebar.classList.contains('hoverrable')) {
        sidebar.classList.remove('hoverrable')
        container.classList.remove('develop')
    }
})