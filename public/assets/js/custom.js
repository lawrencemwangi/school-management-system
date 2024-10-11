//code for message duration for the system success and fail 
(function () {
    const alertElements = document.getElementsByClassName("alert");

    for (let alertIndex = 0; alertIndex < alertElements.length; alertIndex++) {
        const currentAlert = alertElements[alertIndex];
        const duration = parseInt(currentAlert.dataset.duration);

        setTimeout(function () {
            currentAlert.style.opacity = "0";
            currentAlert.style.display = "none";
        }, duration);
    }
})();

//Delete button toogle on typing the password 
document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById('password');
    const deleteButton = document.getElementById('deleteButton');

    passwordInput.addEventListener('input', function() {
        if (passwordInput.value.trim() !== '') {
            deleteButton.style.display = 'inline';
        } else {
            deleteButton.style.display = 'none';
        }
    });
});

// admin asidebar toggle
document.getElementById('navbar-toggle-icon').addEventListener('click', function() {
    let sidebar = document.getElementById('sidebar');
    let toggleIcon = document.getElementById('navbar-toggle-icon');
    let profileDetails = document.querySelector('.aside_profile');

    // Toggle the 'collapsed' class on the sidebar and profile
    sidebar.classList.toggle('collapsed');
    profileDetails.classList.toggle('collapsed');

    // Change the icon for the toggle button
    if (sidebar.classList.contains('collapsed')) {
        toggleIcon.innerHTML = '&gt;'; 
    } else {
        toggleIcon.innerHTML = '&lt;'; 
    }
});



// script for list the student in the attendence list dynamically
// $(document).ready(function() {
//     $('#class_id').change(function() {
//         let class_id = $(this).val();
        
//         if (class_id) {
//             $.ajax({
//                 url: "{{ route('attendance.fetch-students') }}", 
//                 method: "POST",
//                 data: {
//                     _token: "{{ csrf_token() }}",
//                     class_id: class_id
//                 },
//                 success: function(response) {
//                     $('#students-section').html(response);
//                     $('#submit-btn').show();
//                 }
//             });
//         } else {
//             $('#students-section').html('<p>Please select a class to see the students.</p>');
//             $('#submit-btn').hide(); 
//         }
//     });
// });


