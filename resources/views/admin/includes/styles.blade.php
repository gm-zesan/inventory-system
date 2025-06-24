{{-- Google Font --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">


{{-- bootstrap Css  --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


{{-- Icon Library remixicon icon --}}
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">


{{-- Fontawesome Icon CSS --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



{{-- Select2 css --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container.select2-container--default {
        /* max-width: 600px;
        width: 100% !important; */
    }
    .select2-selection{
        height: 26px !important;
        border-radius: 4px !important;
        border: 1px solid #ced4da !important;
        margin-bottom: 10px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        margin-top: 2px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice__display{
        font-size: 12px;
        color: #1d1b31;
        font-weight: 500;
    }
    .select2-search--dropdown{
        padding: 0;
    }
    .select2-container--open .select2-dropdown--below{
        border: 1px solid #ced4da !important;
        border-top: none !important;
        border-radius: 4px !important;
        margin-top: -10px;
        z-index: 1062;
    }
    .select2-container--default .select2-selection--single:focus-visible{
        outline: none;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        font-size: 12px;
        line-height: 25px;
        z-index: 1062;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered:focus-visible{
        outline: none;
    }
    .select2-container--default .select2-search--dropdown .select2-search__field{
        padding: 4px 8px 4px 8px;
        border: none;
        border-bottom: 1px solid #ced4da;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        height: 26px;
        font-size: 12px;
    }
    .select2-container--default .select2-search--dropdown .select2-search__field:focus-visible{
        outline: none;
    }
    .select2-results__options .select2-results__option.select2-results__option--disabled{
        font-size: 12px;
        height: 26px;
        padding: 4px 8px 4px 8px;
    }
    .select2-results__options::-webkit-scrollbar {
        width: 3px;
        background-color: #F5F5F5!important;
        background-clip: padding-box;
    }
    .select2-results__options::-webkit-scrollbar-track {
        background-color: #F5F5F5!important;
        background-clip: padding-box;
    }
    .select2-results__options::-webkit-scrollbar-thumb {
        background-clip: padding-box;
        background-color: rgb(216 220 241);
    }
    .select2-results__option--selectable {
        font-size: 12px;
        color: #1d1b31;
        font-weight: 500;
        height: 26px;
        padding: 4px 8px 4px 8px;
    }
    .select2-results__option--selectable:last-child {
        border-radius: 0 0 3px 3px;
    }
    .select2-results__options .select2-results__option.select2-results__message{
        height: 26px;
        font-size: 12px;
        padding: 4px 8px;
        color: #ff0000;
    }


    .multi-select2 + .select2-container .select2-search__field::placeholder {
        font-size: 13px;
    }
    .multi-select2 + .select2-container .select2-selection--multiple {
        min-height: 28px;
        height: 100%!important;
    }
    .multi-select2
        + .select2-container--default
        .select2-selection--multiple
        .select2-selection__choice {
        margin-top: 0px;
        max-height: 100%;
        min-height: 22px;
        line-height: 1;
    }
    .multi-select2
        + .select2-container
        .select2-search--inline
        .select2-search__field {
        height: 19px;
    }

</style>


{{-- DatePicker plugin --}}
<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<style>
    #datepicker{
        font-size: 13px;
        line-height: 18px;
    }
    .datepicker{
        font-size: 13px;
        line-height: 18px;
    }
    .gj-icon{
        font-size: 18px!important;
        top: 8px!important;
        right: 8px!important;
    }
    .gj-editor [role=body] {
        height: 150px;
    }
</style>


{{-- <!-- Style css --> --}}
@vite(['resources/scss/admin/style.scss', 'resources/scss/admin/table.scss', 'resources/js/app.js'])

