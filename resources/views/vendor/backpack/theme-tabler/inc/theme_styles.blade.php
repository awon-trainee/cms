{{--
    we use a render blocking script in <head> to force the theme attribute to be in the document before it renders
    avoiding white flicks when for example, using the dark color mode.
--}}
<script>document.documentElement.setAttribute("data-bs-theme", localStorage.colorMode ?? 'light');</script>

@basset('https://unpkg.com/@tabler/core@1.0.0-beta19/dist/css/tabler.rtl.min.css')
@basset(base_path('vendor/backpack/theme-tabler/resources/assets/css/style.css'))
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&family=Changa:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    body, p, label, input,
    button, h1, h2, h3, h4, h5, h6, a, select
    {
        font-family: 'Cairo', sans-serif !important;
        text-align: right;
    }
    aside li.nav-item a.nav-link i, aside div.dropdown-menu a.dropdown-item i, header.top div ul.navbar-nav li.nav-item a.nav-link i, header.top div.dropdown-menu a.dropdown-item i{
        margin-left: 7px !important;
    }
    .navbar-collapse .dropdown-toggle:after, a.actions-buttons-column:after{
        margin-right: 3px !important;
    }

    table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting_asc_disabled, table.dataTable thead>tr>th.sorting_desc_disabled, table.dataTable thead>tr>td.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting_asc_disabled, table.dataTable thead>tr>td.sorting_desc_disabled{
        text-align: right ;
    }
    .card-table tbody tr:first-child td, .card-table tbody tr:first-child th, .card-table tfoot tr:first-child td, .card-table tfoot tr:first-child th, .card-table thead tr:first-child td, .card-table thead tr:first-child th{
        text-align: right ;
    }

    .pagination > li > a{
        text-align: center;
    }
</style>
