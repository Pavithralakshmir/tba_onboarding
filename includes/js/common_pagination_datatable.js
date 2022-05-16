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
