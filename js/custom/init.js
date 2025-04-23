window.addEventListener('DOMContentLoaded', event => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

    $('#sidebarnav >li >a.has-arrow').on('click', function (e) {
        e.preventDefault();
    });
    $('[data-toggle="popover"]').popover({
        html: true,
    });
    $('.tooltip').tooltip("dispose");
    $('[data-toggle="tooltip"]').tooltip({
        html: true
    });
    $('.datatables').setDatatable();

    const selectList = [].slice.call(document.querySelectorAll('.tomselect'));
    selectList.forEach(function (element) {
        const hasRemoveButton = element.hasAttribute('data-remove-button');
        new TomSelect(element, {
            allowEmptyOption: true,
            create: true,
            plugins: hasRemoveButton ? ['remove_button'] : [],
            onFocus: function () {
                this.control_input.select();
            },
            // onItemRemove: function (value) {
            //     const option = element.querySelector(`option[value='${value}']`);
            //     let optionID = element.getAttribute('data-id');
            //     optionID = optionID == null || optionID == undefined ? 0 : optionID;
            //     if (option && optionID > 0) {
            //         option.setAttribute('data-selected', 1);
            //     }
            // }
        });
    });
});