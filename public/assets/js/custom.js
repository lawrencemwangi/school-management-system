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


//to toggle the dropdown menu in the admin sidebar
document.addEventListener('DOMContentLoaded', function() {
    // Select all dropdown toggle links
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(event) {
            event.preventDefault();
            const submenu = this.nextElementSibling;

            // Toggle visibility of the submenu
            if (submenu.style.display === 'block') {
                submenu.style.display = 'none';
            } else {
                submenu.style.display = 'block';
            }
        });
    });
});


// for add the fees category dynamically
document.addEventListener('DOMContentLoaded', function () {
    const feeCategoriesContainer = document.getElementById('fee-categories');

    // Add new category row
    document.getElementById('add-category').addEventListener('click', function () {
        const newCategoryRow = document.createElement('div');
        newCategoryRow.classList.add('fee-category-item');
        newCategoryRow.innerHTML = `
            <div class="groups">
                <div class="input_group">
                    <label for="fee_category[]">Fee Category</label>
                    <input type="text" name="fee_category[]" class="form-control" placeholder="e.g., Tuition Fee" required>
                </div>

                <div class="input_group">
                    <label for="amount[]">Amount</label>
                    <input type="number" name="amount[]" class="form-control" placeholder="e.g., 5000" required>
                </div>

                <div class="col-md-2">
                    <button type="button" class="btn btn-danger remove-category" style="margin-top: 30px;">Remove</button>
                </div>
            </div>
        `;
        feeCategoriesContainer.appendChild(newCategoryRow);

        // Add event listener for remove button
        newCategoryRow.querySelector('.remove-category').addEventListener('click', function () {
            newCategoryRow.remove();
        });
    });

    // Remove category row
    document.querySelectorAll('.remove-category').forEach(button => {
        button.addEventListener('click', function () {
            button.closest('.fee-category-item').remove();
        });
    });
});