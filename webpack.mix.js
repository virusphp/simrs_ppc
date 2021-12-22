const mix = require("laravel-mix");
require("laravel-mix-merge-manifest");
mix.mergeManifest();
// Default
mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .version();

//global default + chartjs
mix.combine(
    ["public/css/app.css", "node_modules/sweetalert2/dist/sweetalert2.min.css"],
    "public/css/app.css"
);

mix.combine(
    [
        "public/js/app.js",
        "node_modules/chart.js/dist/chart.min.js",
        "node_modules/sweetalert2/dist/sweetalert2.all.min.js",
    ],
    "public/js/app.js"
);

//global autocomplete, datepicker dan lain lain
mix.styles(
    [
        "public/lib/select2/css/select2.min.css",
        "public/lib/jquery-ui/jquery-ui.min.css",
        "public/lib/DataTables/dataTables.bootstrap.min.css",
        "public/lib/DataTables/buttons.bootstrap.min.css",
        "public/css/autocompleted.css",
        "public/lib/datetimepicker/css/tempusdominus-bootstrap-4.min.css",
    ],
    "public/css/form.css"
);

mix.scripts(
    [
        "public/lib/select2/js/select2.min.js",
        "public/lib/jquery-ui/jquery-ui.min.js",
        "public/lib/DataTables/datatables.min.js",
        "public/vendor/datatables/buttons.server-side.js",
        "public/lib/datetimepicker/js/tempusdominus-bootstrap-4.min.js",
        "public/lib/jquery-validation/jquery.validate.min.js",
        "public/lib/jquery-validation/localization/messages_id.js",
    ],
    "public/js/form.js"
);

mix.sourceMaps();
