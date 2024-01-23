(function($) {
  'use strict';
  $(function() {
    $('#order-listing').DataTable({
      "aLengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
      ],
      "iDisplayLength": 15,
      "language": {
          "lengthMenu": "แสดง _MENU_  รายการ",
          "search": "",
          "zeroRecords": "",
          "info": "ข้อมูล _START_-_END_ จาก <font color=\"red\"><b>_TOTAL_</b></font>  รายการที่พบ",
          "infoEmpty": "<font color=\"red\"><b>ไม่พบข้อมูล</b></font>",
          "sEmptyTable": "",
          "infoFiltered": "(กรองจาก <font color=\"red\"><b>_MAX_</b></font> รายการ)"
      },
    // "ordering": true,
        columnDefs: [{
          orderable: false,
          targets: "no-sort"
        }],
        stateSave: true
    });
    $('#order-listing').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'ค้นหา');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });
  });
})(jQuery);
// (function($) {
//   'use strict';
//   $(function() {
//     $('#order-listing').DataTable({
//       "aLengthMenu": [
//         [5, 10, 15, -1],
//         [5, 10, 15, "All"]
//       ],
//       "iDisplayLength": 10,
//       "language": {
//         search: ""
//       }
//     });
//     $('#order-listing').each(function() {
//       var datatable = $(this);
//       // SEARCH - Add the placeholder for Search and Turn this into in-line form control
//       var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
//       search_input.attr('placeholder', 'Search');
//       search_input.removeClass('form-control-sm');
//       // LENGTH - Inline-Form control
//       var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
//       length_sel.removeClass('form-control-sm');
//     });
//   });
// })(jQuery);