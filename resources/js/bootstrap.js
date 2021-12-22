window._ = require("lodash");

try {
    window.Popper = require("@popperjs/core").default;
    window.$ = window.jQuery = require("jquery");

    require("bootstrap");
    require("@coreui/coreui");
    require("@popperjs/core");
} catch (e) {}
