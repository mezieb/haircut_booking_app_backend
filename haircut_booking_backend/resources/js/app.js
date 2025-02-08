// @ts-nocheck
import './bootstrap';


// for success message
document.addEventListener('DOMContentLoaded', function() {
    const successMessage = document.querySelector('.text-green-100');

    // Check if successMessage is not null and is an element with a style property
    if (successMessage) {
        setTimeout(function() {
            successMessage.style.display = 'none'; // Hide the success message after 5 seconds
        }, 5000); // Set the timeout duration (5000 milliseconds = 5 seconds)
    }
});
//  end of  success message

// For modal delete dialog
document.addEventListener('DOMContentLoaded', function() {
    const deleteConfirmationModal = document.getElementById('deleteConfirmationModal');

    // Function to toggle modal visibility
    window.toggleModal = function(show, formAction = '') {
        deleteConfirmationModal.style.display = show ? 'flex' : 'none'; // Show as flex or hide
        if (show) {
            document.getElementById('deleteForm').action = formAction; // Update form action for deletion
        }
    };

    // Attach delete button event listeners
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent the default form submission
            const formAction = this.closest('form').action; // Get the form action URL from the closest form
            toggleModal(true, formAction); // Show the modal
        });
    });
    
    // Handling cancel action
    document.getElementById('cancelDelete').addEventListener('click', function() {
        toggleModal(false); // Hide the modal
    });
});
// End of the modal delete dialog