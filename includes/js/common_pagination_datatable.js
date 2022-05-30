"use strict";
var KTCustomersList = (function () {
    var t,
        e,
        n;
 
    return {
        init: function () {
            (n = document.querySelector("#kt_customers_table")) &&
                (n.querySelectorAll("tbody tr").forEach((t) => {
                    const e = t.querySelectorAll("td");
                }),
                (t = $(n).DataTable({
                    order: [],
                })).on("draw", function () {
                    l();
                }),
                document.querySelector('[data-kt-customer-table-filter="search"]').addEventListener("keyup", function (e) {
                    t.search(e.target.value).draw();
                }),
                document.querySelector('[data-kt-customer-table-filter="reset"]').addEventListener("click", function () {
                    e.val(null).trigger("change"), t.search("").draw();
                }));
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTCustomersList.init();
});

var KTCustomersList_1 = (function () {
    var t,
        e,
        n;
 
    return {
        init: function () {
            (n = document.querySelector("#kt_customers_table_1")) &&
                (n.querySelectorAll("tbody tr").forEach((t) => {
                    const e = t.querySelectorAll("td");
                }),
                (t = $(n).DataTable({
                    order: [],
                })).on("draw", function () {
                    l();
                }),
                document.querySelector('[data-kt-customer-table-filter_1="search"]').addEventListener("keyup", function (e) {
                    t.search(e.target.value).draw();
                }),
                document.querySelector('[data-kt-customer-table-filter_1="reset"]').addEventListener("click", function () {
                    e.val(null).trigger("change"), t.search("").draw();
                }));
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTCustomersList_1.init();
});

var KTCustomersList_2 = (function () {
    var t,
        e,
        n;
 
    return {
        init: function () {
            (n = document.querySelector("#kt_customers_table_2")) &&
                (n.querySelectorAll("tbody tr").forEach((t) => {
                    const e = t.querySelectorAll("td");
                }),
                (t = $(n).DataTable({
                    order: [],
                })).on("draw", function () {
                    l();
                }),
                document.querySelector('[data-kt-customer-table-filter_2="search"]').addEventListener("keyup", function (e) {
                    t.search(e.target.value).draw();
                }),
                document.querySelector('[data-kt-customer-table-filter_2="reset"]').addEventListener("click", function () {
                    e.val(null).trigger("change"), t.search("").draw();
                }));
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTCustomersList_2.init();
});

var KTCustomersList_3 = (function () {
    var t,
        e,
        n;
 
    return {
        init: function () {
            (n = document.querySelector("#kt_customers_table_3")) &&
                (n.querySelectorAll("tbody tr").forEach((t) => {
                    const e = t.querySelectorAll("td");
                }),
                (t = $(n).DataTable({
                    order: [],
                })).on("draw", function () {
                    l();
                }),
                document.querySelector('[data-kt-customer-table-filter_3="search"]').addEventListener("keyup", function (e) {
                    t.search(e.target.value).draw();
                }),
                document.querySelector('[data-kt-customer-table-filter_3="reset"]').addEventListener("click", function () {
                    e.val(null).trigger("change"), t.search("").draw();
                }));
        },
    };
})();

KTUtil.onDOMContentLoaded(function () {
    KTCustomersList_3.init();
});
