// admin.js

document.addEventListener('DOMContentLoaded', function () {
    // Attach event listeners for user delete buttons
    const userDeleteButtons = document.querySelectorAll('.btn-delete-user');
    userDeleteButtons.forEach(function(button) {
      button.addEventListener('click', function(e) {
        e.preventDefault();
        const userId = this.getAttribute('data-id');
        if (confirm("Are you sure you want to delete this user? This action cannot be undone.")) {
          window.location.href = "/admin/delete?id=" + userId;
        }
      });
    });
  
    // Attach event listeners for event (show) delete buttons
    const showDeleteButtons = document.querySelectorAll('.btn-delete-show');
    showDeleteButtons.forEach(function(button) {
      button.addEventListener('click', function(e) {
        e.preventDefault();
        const showId = this.getAttribute('data-id');
        if (confirm("Are you sure you want to delete this show? This action cannot be undone.")) {
          window.location.href = "/adminshow/delete?id=" + showId;
        }
      });
    });
  });
  