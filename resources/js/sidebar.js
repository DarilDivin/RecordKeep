const sidebar = document.querySelector('.navigation');
const container = document.querySelector('.container');
const sidebarLockBtn = document.querySelectorAll('.lock');
const sidebarCloseBtn = document.querySelector('#sidebar-close');
const sidebarOpenBtn = document.querySelector('#sidebar-open');
//-------------------------------
const moreOptionsbtn = document.querySelector('.moreOptions');
const sidebarOptions = document.querySelector('.sidebarOptions')
const sidebarOptionContainerOverlay = document.querySelector('.sidebarOptionContainerOverlay')


// Function to toggle the lock state of the sidebar
const toggleLock = () => {
    sidebar.classList.toggle('locked');
    if(!sidebar.classList.contains('locked')) {
        sidebar.classList.add('hoverable');
    } else {
        sidebar.classList.remove('hoverable');
        container.classList.add('develop');
    }
};

// Function to hide the sidebar when the mouse leaves

const hideSidebar = () => {
    if(sidebar.classList.contains('hoverable')) {
        sidebar.classList.add('close');
        container.classList.remove('develop');
    }
};

// Function to show the sidebar when the mouse leaves

const showSidebar = () => {
    if(sidebar.classList.contains('hoverable')) {
        sidebar.classList.remove('close')
        container.classList.add('develop')
    }
};

// Function to show and hide the sidebar
const toggleSidebar = () => {
    sidebar.classList.toggle('close');
    if(sidebar.classList.contains('close')) {
        container.classList.remove('develop')
    } else {
        container.classList.add('develop')
    }
};


// Adding event listeners to buttons and sidebar for the corresponding actions
sidebarLockBtn.forEach(element =>
    element.addEventListener('click', toggleLock));
sidebar.addEventListener('mouseleave', hideSidebar);
sidebar.addEventListener('mouseenter', showSidebar);
sidebarOpenBtn.addEventListener('click', toggleSidebar);
sidebarCloseBtn.addEventListener('click', toggleSidebar);


//-------------------------------------------

const closeMoreOptions = () => {
    sidebarOptions.classList.remove('show');
}

moreOptionsbtn.addEventListener('click', () => {
    sidebarOptions.classList.toggle('show');
})

sidebarOptionContainerOverlay.addEventListener('click', closeMoreOptions);
