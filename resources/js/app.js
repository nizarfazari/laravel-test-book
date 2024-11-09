import './bootstrap';
import './utils';
import Swal from 'sweetalert2';
import axios from 'axios';

window.deleteItem = function(url, id, successMessage, errorMessage) {
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
            axios.delete(url, {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                }
            })
            .then(response => {
                if (response.data.success) {
                    Swal.fire(
                        'Deleted!',
                        successMessage,
                        'success'
                    ).then(() => {
                        window.location.reload(); // Optional: Refresh the page or you can remove this to update dynamically
                    });
                }
            })
            .catch(error => {
                console.error('Error deleting the item:', error);
                Swal.fire(
                    'Failed!',
                    errorMessage,
                    'error'
                );
            });
        }
    });
}




