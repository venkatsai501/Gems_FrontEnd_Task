document.getElementById('menuToggle').addEventListener('click', function() {
    var sidebar = document.getElementById('sidebar');
    // mobile view
    if (window.innerWidth <= 600) {
        if (sidebar.style.transform === 'translateX(0px)') {
            sidebar.style.transform = 'translateX(-100%)';
        } else {
            sidebar.style.transform = 'translateX(0px)';
        }
    }
});


window.addEventListener('resize', function() {
    var sidebar = document.getElementById('sidebar');
    if (window.innerWidth > 600) {
        sidebar.style.transform = 'translateX(0)'; // sidebar in desktop
    } else {
        // hide the sidebar mobile view
        sidebar.style.transform = 'translateX(-100%)';
    }
});

document.querySelectorAll('.category-btn').forEach(button => {
    button.addEventListener('click', function() {
        const category = this.getAttribute('data-category');
        document.querySelectorAll('.video').forEach(video => {
            if (category === 'all' || video.getAttribute('data-category') === category) {
                video.style.display = 'block';
            } else {
                video.style.display = 'none';
            }
        });
    });
});


document.getElementById('searchBar').addEventListener('input', filterVideos);

function filterVideos() {
    const category = document.querySelector('.category-btn.active').getAttribute('data-category');
    const searchQuery = document.getElementById('searchBar').value.toLowerCase();
    
    document.querySelectorAll('.video').forEach(video => {
        const videoCategory = video.getAttribute('data-category');
        const videoTitle = video.querySelector('.channel-name').innerText.toLowerCase();

        
        if ((category === 'all' || videoCategory === category) && (videoTitle.includes(searchQuery) || searchQuery === '')) {
            video.style.display = 'block';
        } else {
            video.style.display = 'none';
        }
    });
}

document.querySelectorAll('.category-btn').forEach(button => {
    button.addEventListener('click', function() {
        
        document.querySelectorAll('.category-btn').forEach(btn => {
            btn.classList.remove('active');
        });
       
        this.classList.add('active');

       
        filterVideos();
    });
});


