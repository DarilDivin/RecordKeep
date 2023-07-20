const list = document.querySelectorAll('.list');
const sidebar = document.querySelector('.navigation');
const container = document.querySelector('.container');
const addBtn = document.querySelector('.add');
const userFormContainer = document.querySelector('.addUserFormContainer');
const closeUserForm = document.querySelector('.closeUserForm');
const overlay = document.querySelector('.overlay');
const documentFormContainer = document.querySelector('.addDocumentFormContainer');
const closeDocumentForm = document.querySelector('.closeDocumentForm');


function activeLink() {
    list.forEach((item) => 
    item.classList.remove('active'));
    this.classList.add('active');
}
list.forEach((item) => 
item.addEventListener('click', activeLink));

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


addBtn.addEventListener('click', () => {
    documentFormContainer.classList.add('showForm')
})

const closeFormDoc = () => {
    documentFormContainer.classList.remove('showForm');
}

closeDocumentForm.addEventListener('click', closeFormDoc);
overlay.addEventListener('click', closeFormDoc);

