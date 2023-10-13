function addRatingRow() {
    const tableBody = document.getElementById('ratingTableBody');

    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>1</td>
        <td>username</td>
        <td>Artist</td>
        <td>Song</td>
        <td>Rating</td>
        <td><button>Action</button></td>
    `;

    tableBody.appendChild(newRow);
}