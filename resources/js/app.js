import './bootstrap';
import "../css/app.css";
import $ from 'jquery';
import 'datatables.net/js/dataTables.min.js';
import 'datatables.net-dt/css/dataTables.dataTables.min.css';


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
    $('#posts-table').DataTable({
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search..."
        }
    });
});