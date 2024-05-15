document.addEventListener("DOMContentLoaded", function() {
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');

    searchForm.addEventListener('submit', function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Get the user's input from the search input field
        const query = searchInput.value.trim();

        // If the query is not empty, redirect to the results page with the query as a parameter
        if (query !== '') {
            window.location.href = `../pages/results.php?query=${encodeURIComponent(query)}`;
        }
    });
});
