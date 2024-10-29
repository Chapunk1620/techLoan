import $ from 'jquery';
import './bootstrap';
import "../css/app.css";
import 'datatables.net/js/dataTables.min.js';
import 'datatables.net-dt/css/dataTables.dataTables.min.css';
import 'datatables.net-dt/js/dataTables.dataTables.min.js';
import 'datatables.net-editor/js/dataTables.editor.min.js';
import 'datatables.net-responsive-dt/css/responsive.dataTables.min.css';  // Responsive CSS
// import 'datatables.net-responsive-dt/js/responsive.dataTables.min.js';  // Responsive JS causes of bug
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
    // borrow table fetching all data
    var table = $('#postss-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: "/dashboard/data", // Your route to fetch data
            data: function(dataObj) {
                dataObj.month = $('#month-filter').val(); // Pass selected month
                dataObj.status = $('#status-filter').val(); // Pass selected status
                console.log("Month:", dataObj.month); // Debugging line
                console.log("Status:", dataObj.status); // Debugging line
            },
            error: function(xhr, error, code) {
                console.log("Error occurred:", error); // Debugging line
                console.log("Response:", xhr.responseText); // Debugging line
            }
        },
        columns: [
            { data: "id" },
            { data: "id_borrower" },
            { data: "item_key" },
            { data: "status" },
            { data: "created_at" },
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
        createdRow: function(row, data, dataIndex) {
            $(row).find('td').addClass('px-4 py-2 text-sm');
        },
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search..."
        },
        columnDefs: [
            { targets: [7], orderable: false },  // Disable sorting for the delete button column
            { targets: [8], orderable: false }   // Disable sorting for the edit button column
        ],
        drawCallback: function(settings) {
            $('.dataTables_paginate').addClass('p-4');
            $('.dataTables_length').addClass('p-4');
            $('label[for="dt-length-0"]').addClass('hidden');
        }
    });    

    // Event listener to redraw table when month or status filter changes
    $('#month-filter, #status-filter').change(function() {
        table.draw();
    });

    // Item Table
    $(document).ready(function() {
        var table = $('#items-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: "/dashboard/dataItems",
                data: function(dataObj) {
                    dataObj.month = $('#item-month-filter').val(); // Use the correct ID
                }
            },
            columns: [
                { data: "id" },
                { data: "item_key" },
                { data: "date_arrival" },
                { data: "created_at" },
                { data: "status" },
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
            createdRow: function(row, data, dataIndex) {
                $(row).find('td').addClass('px-4 py-2 text-sm');
            },
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search..."
            },
            columnDefs: [
                { targets: [5, 6], orderable: false }  // Disable sorting for the edit and delete button columns
            ],
            drawCallback: function(settings) {
                $('.dataTables_paginate').addClass('p-4');
                $('.dataTables_length').addClass('p-4');
                $('label[for="dt-length-0"]').addClass('hidden');
            }
        });
    
        // Event listener to redraw table when filter changes
        $('#item-month-filter').change(function() {
            table.draw();
        });
    });    
    // Trigger filtering when month or status is changed
    $('#month-filter, #status-filter').on('change', function() {
        table.ajax.reload(); // Reload table data based on new filter values
    });
    // item table end

    // Add modal js
    document.getElementById('openModal').onclick = function() {
        const modal = document.getElementById('myModal');
        const modalContent = document.getElementById('modalContent');
        modal.classList.remove('hidden');
        modalContent.classList.remove('scale-95', 'opacity-0');
        modalContent.classList.add('scale-100', 'opacity-100');
    }
    // close button of edit modal
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
    
        $.ajax({
            url: '/dashboard/edit/' + rowId,
            type: 'GET',
            success: function(data) {
                console.log(data.image_path); // Log the path for debugging
    
                // Populate the form
                $('#editModal #row-id').val(data.loan.id);
                $('#editModal #borrower-id').val(data.loan.id_borrower);
                $('#editModal #item-key').val(data.loan.item_key);
                $('#editModal #due-date').val(data.loan.due_date);
                $('#editModal #status').val(data.loan.status);
                $('#editModal #description').val(data.loan.description);
                $('#editModal #it-receiver').val(data.loan.it_receiver);
    
                // Set the image source, hide div if path is null or empty
                if (data.loan.image_path && data.loan.image_path.trim() !== 'null' && data.loan.image_path.trim() !== '') {
                    $('#current-image').show();
                    $('#current-condition').attr('src', data.loan.image_path);
                } else {
                    $('#current-image').hide();
                }
    
                // Show the modal
                const modal = document.getElementById('editModal');
                modal.classList.remove('hidden');
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
    //toast
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });
    //Saving Changes on Loan record
    $('#saveChanges').click(function() {
        var rowId = $('#row-id').val(); // Retrieve the row ID
        var formData = new FormData($('#editForm')[0]); // Use FormData to handle file uploads correctly
    
        $.ajax({
            url: '/dashboard/update/' + rowId, // Your update route for the row
            type: 'POST', // Use POST method with _method input for PUT
            data: formData,
            contentType: false, // Important for file uploads
            processData: false, // Important for file uploads
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(result) {
                table.ajax.reload(); // Refresh the DataTable
                const modal = document.getElementById('editModal'); // Get the edit modal element
                Swal.fire('Updated!', 'Your record has been updated.', 'success'); // Success message
                modal.classList.add('hidden');
                document.getElementById('after-condition').value = '';  //Clear value of after-condition input
            },
            error: function(err) {
                // Check if the response has a JSON body
                let errorMessage = 'Could not update the record.';
                if (err.responseJSON && err.responseJSON.error) {
                    // Use the error message returned from the server
                    errorMessage = err.responseJSON.error;
                } else if (err.responseJSON && err.responseJSON.errors) {
                    // If there are validation errors, format a specific message
                    errorMessage = Object.values(err.responseJSON.errors).map(errorArray => errorArray[0]).join(', ');
                }
                Toast.fire({
                    icon: 'error',
                    title: errorMessage // Set dynamic error message
                });
            }
        });
    });    
});
//Table js end
//start dashboard side left drawer
const drawerWrapper = document.getElementById('drawer-wrapper');
const drawer = document.getElementById('drawer');
const openDrawerButton = document.getElementById('openDrawerButton');
const closeDrawerButton = document.getElementById('closeDrawerButton');
const backdrop = document.getElementById('backdrop');

openDrawerButton.addEventListener('click', function() {
    drawerWrapper.classList.remove('hidden');
    requestAnimationFrame(() => {
        drawer.classList.remove('-translate-x-full');
        drawer.classList.add('translate-x-0');
        backdrop.classList.add('opacity-50');
        backdrop.classList.remove('opacity-0');
    });
});

const closeDrawer = function() {
    drawer.classList.remove('translate-x-0');
    drawer.classList.add('-translate-x-full');
    backdrop.classList.remove('opacity-50');
    backdrop.classList.add('opacity-0');
    setTimeout(() => {
        drawerWrapper.classList.add('hidden');
    }, 500); // Match this duration with the transition duration
};

closeDrawerButton.addEventListener('click', closeDrawer);
backdrop.addEventListener('click', closeDrawer);
//start dashboard side left drawer end