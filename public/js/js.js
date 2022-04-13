    // Datatables
    $('#dataTables').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
    
    // Summernote
    $('#step').summernote({
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']]
      ]
    });

    // select2
    $(function () {
        $('.select2').select2({
        theme: 'bootstrap4'
        })
    });

  