document.addEventListener("DOMContentLoaded", function() {
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');

    searchForm.addEventListener('submit', function(event) {
        
        event.preventDefault();

        
        const query = searchInput.value.trim();

        
        if (query !== '') {
            window.location.href = `../pages/results.php?query=${encodeURIComponent(query)}`;
        }
    });
});
