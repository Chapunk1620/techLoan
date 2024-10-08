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
        "processing": true,
        "serverSide": true,
        "ajax": "/dashboard/data", // Direct URL or route
        "columns": [
            { "data": "id" },
            { "data": "id_borrower" },
            { "data": "borrower_name" },
            { "data": "item_key" },
            { "data": "date" }, // Assuming date is in this column
            { "data": "due_date" },
            { "data": "status" },
            { "data": "description" },
            { "data": "it_approver" },
            { "data": "it_receiver" }
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search..."
        },
        columnDefs: [
            { targets: [5], orderable: false }  // Disable sorting for columns 5
        ],
        drawCallback: function(settings) {
            $('.dataTables_paginate').addClass('p-4');
            $('.dataTables_length').addClass('p-4');
            $('label[for="dt-length-0"]').addClass('hidden');
        }
    });

    // Custom filtering function for month
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var month = $('#month-filter').val();
            var date = new Date(data[4]); // Assuming date is in the 5th column (index 4)
            var monthFromTable = date.getMonth() + 1; // Get month as number (1-12)

            if (month === "" || monthFromTable == month) {
                return true;
            }
            return false;
        }
    );

    // Custom filtering function for status
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var status = $('#status-filter').val();
            var postStatus = data[6]; // Assuming status is in the 7th column (index 6)

            if (status === "" || postStatus.includes(status)) {
                return true;
            }
            return false;
        }
    );

    // Event listener for month filter
    $('#month-filter').on('change', function() {
        table.draw();
    });

    // Event listener for status filter
    $('#status-filter').on('change', function() {
        table.draw();
    });
});


//Table js end