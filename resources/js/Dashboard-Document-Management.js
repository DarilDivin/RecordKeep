
const addBtn = document.querySelector('.add');
const userFormContainer = document.querySelector('.addUserFormContainer');
const closeUserForm = document.querySelector('.closeUserForm');
const overlay = document.querySelector('.overlay');
const documentFormContainer = document.querySelector('.addDocumentFormContainer');
const closeDocumentForm = document.querySelector('.closeDocumentForm');

addBtn.addEventListener('click', () => {
    documentFormContainer.classList.add('showForm')
})

const closeFormDoc = () => {
    documentFormContainer.classList.remove('showForm');
}

closeDocumentForm.addEventListener('click', closeFormDoc);
overlay.addEventListener('click', closeFormDoc);
