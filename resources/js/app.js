import './bootstrap';
import "../css/app.css";
import $ from 'jquery';
import 'datatables.net/js/dataTables.min.js';
import 'datatables.net-dt/css/dataTables.dataTables.min.css';
import 'datatables.net-dt/js/dataTables.dataTables.min.js';
import 'datatables.net-editor/js/dataTables.editor.min.js';
// import 'datatables.net-responsive-dt/css/responsive.dataTables.min.css';  // Responsive CSS
// import 'datatables.net-responsive-dt/js/responsive.dataTables.min.js'; // If you use responsive
import '@fortawesome/fontawesome-free/css/all.min.css';
import '@fortawesome/fontawesome-free/js/all.min.js';
import Swal from 'sweetalert2';

//Landing footer animation
document.addEventListener("DOMContentLoaded", function () {
    const footer = document.getElementById('footer');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                footer.classList.remove('translate-y-full', 'opacity-0');
                footer.classList.add('translate-y-0', 'opacity-100');
            }
        });
    });

    observer.observe(footer);
});
//Landing footer animation end

//Table js
$(document).ready(function() {
    // Initialize DataTable
    var table = $('#postss-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "/dashboard/data", // Your route to fetch data
            data: function(d) {
                d.month = $('#month-filter').val(); // Pass selected month
                d.status = $('#status-filter').val(); // Pass selected status
            }
        },
        columns: [
            { data: "id" },
            { data: "id_borrower" },
            { data: "item_key" },
            { data: "due_date" },
            { data: "status" },
            { data: "description" },
            { data: "it_approver" },
            { data: "it_receiver" },
            { 
                data: null,
                render: function(data, type, row) {
                    return '<button class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 edit-row" data-id="' + row.id + '"><i class="fa-solid fa-edit"></i></button>';
                }
            },
            { 
                data: null,
                render: function(data, type, row) {
                    return '<button class="bg-red-500 text-white font-bold py-2 px-4 rounded hover:bg-red-700 delete-row" data-id="' + row.id + '"><i class="fa-solid fa-trash"></i></button>';
                }
            },
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search..."
        },
        columnDefs: [
            { targets: [8], orderable: false },  // Disable sorting for the delete button column
            { targets: [9], orderable: false }   // Disable sorting for the edit button column
        ],
        drawCallback: function(settings) {
            $('.dataTables_paginate').addClass('p-4');
            $('.dataTables_length').addClass('p-4');
            $('label[for="dt-length-0"]').addClass('hidden');
        }
    });


    // Trigger filtering when month or status is changed
    $('#month-filter, #status-filter').on('change', function() {
        table.ajax.reload(); // Reload table data based on new filter values
    });
    // Add modal js
    document.getElementById('openModal').onclick = function() {
        const modal = document.getElementById('myModal');
        const modalContent = document.getElementById('modalContent');
        modal.classList.remove('hidden');
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }

    document.getElementById('closeModal').onclick = function() {
        const modal = document.getElementById('myModal');
        const modalContent = document.getElementById('modalContent');
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300); // duration of transition
    }
    document.getElementById('closeModals').onclick = function() {
        const editModal = document.getElementById('editModal');
        const modalContent = document.getElementById('modalContent');
        
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            editModal.classList.add('hidden'); // Hide the modal
        }, 300); // Match this time with the duration of the CSS transition
    }

    // Close the modal when clicking outside of it
    window.onclick = function(event) {
        const modal = document.getElementById('myModal');
        if (event.target === modal) {
            const modalContent = document.getElementById('modalContent');
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300); // Match this time with the duration of the CSS transition
        }
    }
    // create a function for displaying a console log 
    //ajax include csrf token
    $(document).ready(function() {
        // Set up the CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    // Close the edit modal when clicking outside of it
    window.onclick = function(event) {
        const editModal = document.getElementById('editModal');
        const modalContent = document.getElementById('modalContent');
        if (event.target === editModal) {
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                editModal.classList.add('hidden');
            }, 300); // Match this time with the duration of the CSS transition
        }
    }

    //delete button for table
    $(document).on('click', '.delete-row', function() {
        var rowId = $(this).data('id');

        // Use SweetAlert2 for confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/dashboard/delete/' + rowId, // Your delete route
                    type: 'DELETE',
                    success: function(result) {
                        // Optionally handle success response
                        table.ajax.reload(); // Refresh the table data
                        Swal.fire(
                            'Deleted!',
                            'record has been deleted.',
                            'success'
                        );
                    },
                    error: function(err) {
                        console.error(err); // Log the full error for debugging
                        Swal.fire(
                            'Error!',
                            'Error deleting record. Please try again.',
                            'error'
                        );
                    }
                });
            }
        });
    });
    $(document).on('click', '.edit-row', function() {
        var rowId = $(this).data('id');

        // Fetch the data for the selected row using the rowId
        $.ajax({
            url: '/dashboard/edit/' + rowId, // URL to get the row data
            type: 'GET',
            success: function(data) {
                // Populate a form with the data from the row
                $('#editModal #row-id').val(data.id); // Make sure to set the row id for update purposes
                $('#editModal #borrower-id').val(data.id_borrower);
                $('#editModal #item-key').val(data.item_key);
                $('#editModal #due-date').val(data.due_date);
                $('#editModal #status').val(data.status);
                $('#editModal #description').val(data.description);
                $('#editModal #it-receiver').val(data.it_receiver);

                // Show the modal
                const modal = document.getElementById('editModal');
                modal.classList.remove('hidden'); // Remove hidden class to show the modal
                // Optional: Set modal content scale and opacity for smooth transition
                const modalContent = document.getElementById('modalContent');
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            },
            error: function(err) {
                console.error(err);
                alert('Error fetching data for editing.');
            }
        });
    });

    $('#saveChanges').click(function() {
        var rowId = $('#row-id').val(); // Retrieve the row ID
        var formData = $('#editForm').serialize(); // Serialize form data

        $.ajax({
            url: '/dashboard/update/' + rowId, // Your update route for the row
            type: 'PUT',
            data: formData,
            success: function(result) {
                table.ajax.reload(); // Refresh the DataTable
                $('#editModal').modal('hide'); // Hide the modal
                Swal.fire('Updated!', 'Your record has been updated.', 'success'); // Success message
            },
            error: function(err) {
                console.error(err);
                alert('Error updating record. Please try again.');
            }
        });
    });

});
//Table js end