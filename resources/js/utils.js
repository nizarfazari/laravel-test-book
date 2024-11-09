window.deleteBook = function(id) {
    const url = `/book/${id}`;
    const successMessage = 'The book has been deleted.';
    const errorMessage = 'There was an error deleting the book.';
    window.deleteItem(url, id, successMessage, errorMessage);
}

window.deleteAuthor = function(id) {
    const url = `/author/${id}`;
    const successMessage = 'The author has been deleted.';
    const errorMessage = 'There was an error deleting the author.';
    window.deleteItem(url, id, successMessage, errorMessage);
}
