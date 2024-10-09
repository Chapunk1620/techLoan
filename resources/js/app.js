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
            { data: "borrower_name" },
            { data: "item_key" },
            { data: "date" },
            { data: "due_date" },
            { data: "status" },
            { data: "description" },
            { data: "it_approver" },
            { data: "it_receiver" }
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search..."
        },
        columnDefs: [
            { targets: [9], orderable: false }  // Disable sorting for columns 5
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
        }, 300); // Match this time with the duration of the CSS transition
    }

    // Optional: Close the modal when clicking outside of it
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
});
//Table js end