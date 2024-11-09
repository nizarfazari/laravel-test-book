import Swal from 'sweetalert2';
import axios from 'axios';

window.deleteBook = function (id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/book/${id}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(response => {
                    if (response.data.success) {
                        // document.getElementById(`book-row-${id}`).remove();
                        Swal.fire(
                            'Deleted!',
                            'The book has been deleted.',
                            'success'
                        ).then(() => {
                            window.location.reload();
                        });

                        
                    }
                })
                .catch(error => {
                    console.error('Error deleting the book:', error);
                    Swal.fire(
                        'Failed!',
                        'There was an error deleting the book.',
                        'error'
                    );
                });
        }
    });
}


window.deleteAuthor = function (id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/author/${id}`, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
                .then(response => {
                    if (response.data.success) {
                        // document.getElementById(`book-row-${id}`).remove();
                        Swal.fire(
                            'Deleted!',
                            'The book has been deleted.',
                            'success'
                        ).then(() => {
                            window.location.reload();
                        });

                        
                    }
                })
                .catch(error => {
                    console.error('Error deleting the book:', error);
                    Swal.fire(
                        'Failed!',
                        'There was an error deleting the book.',
                        'error'
                    );
                });
        }
    });
}