document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');

    searchInput.addEventListener('input', function() {
        const query = this.value.trim().toLowerCase();
        
        
        searchResults.innerHTML = '';

        if (query.length > 0) {
            fetchSearchResults(query)
                .then(results => displaySearchResults(results));
        }
    });
});

function fetchSearchResults(query) {
    return fetch(`search.php?query=${query}`)
        .then(response => response.json());
}

function displaySearchResults(results) {
    const searchResults = document.getElementById('searchResults');
    
    if (results.length > 0) {
        results.forEach(result => {
            const li = document.createElement('li');
            li.textContent = result.title;
            searchResults.appendChild(li);
        });
    } else {
        const li = document.createElement('li');
        li.textContent = 'No results found';
        searchResults.appendChild(li);
    }
}
