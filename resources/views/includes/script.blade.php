<script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownLinks = document.querySelectorAll('a[data-has-submenu="true"]');
            const subMenuLinks = document.querySelectorAll('a[data-has-submenu="false"]');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
    
            dropdownLinks.forEach(link => {
                link.addEventListener('click', (event) => {
                    event.preventDefault();
                    const dropdown = link.nextElementSibling;
                    dropdown.classList.toggle('hidden');
                });
            });
    
            // Hide sidebar and submenu when a link with no submenu is clicked
            subMenuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    sidebar.classList.add('hidden');
                    dropdownLinks.forEach(dropdownLink => {
                        const dropdown = dropdownLink.nextElementSibling;
                        dropdown.classList.add('hidden');
                    });
                });
            });
    
            // Toggle sidebar on small screens
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('hidden');
                sidebar.classList.toggle('show');
            });
        });
    </script>

