import './bootstrap';
import "../css/app.css";
import $ from 'jquery';
import 'datatables.net/js/dataTables.min.js';
import 'datatables.net-dt/css/dataTables.dataTables.min.css';
import 'datatables.net-dt/js/dataTables.dataTables.min.js';
import 'datatables.net-editor/js/dataTables.editor.min.js';

import '@fortawesome/fontawesome-free/css/all.min.css';
import '@fortawesome/fontawesome-free/js/all.min.js';

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

$(document).ready(function() {
    var table = $('#posts-table').DataTable({
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search..."
        },
        // Adjust the pagination elements
        drawCallback: function(settings) {
            $('.dataTables_paginate').addClass('p-4');
            $('.dataTables_length').addClass('p-4');
            // Hide the label
            $('label[for="dt-length-0"]').addClass('hidden')
        }
    });

    // Custom filtering function for month
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var month = $('#month-filter').val();
            var date = new Date(data[3]); // Assuming date is in the 4th column (index 3)
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
            var postStatus = data[4]; // Assuming status is in the 5th column (index 4)

            if (status === "" || postStatus.includes(status)) {
                return true;
            }
            return false;
        }
    );

    // Event listener to the two range filtering inputs
    $('#month-filter, #status-filter').on('change', function() {
        table.draw();
    });
});
