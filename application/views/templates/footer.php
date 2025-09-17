
<script>
  $( document ).ready(function() {
        // Setup - add a text input to each footer cell
        $('#myTable thead tr').clone(true).appendTo( '#myTable thead' );
        $('#myTable thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    
        var table = $('#myTable').DataTable( {
            dom: 'Bflrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            orderCellsTop: true,
            fixedHeader: true,
            lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            order: [[0, 'desc']]
            
        } );

         // SIMPLE Setup - add a text input to each footer cell
         var tables = $('.myTableSimple').DataTable( {
            orderCellsTop: true,
            fixedHeader: true,
            lengthMenu: [ [5], [5] ],
            
        } );

        $('#sort_asc').click();
        $('#sorter').click();

    });
</script>

 <!-- Main Footer -->
 <footer class="main-footer">
    <strong>Copyright &copy; 2025 <a href="https://ncr.denr.gov.ph/">DENR NCR</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b>1.0.0
    </div>
  </footer>

<!-- view password -->
<script>
  function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<!-- image preview -->
<script>
  var loadFile = function(event) {
    var output = document.getElementById('img_prev');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>

    <!-- user type dropdown change -->
    <script>
      $('#user_type').on('change', function() {
        if(this.value == "admin"){
          $('#branch_id').hide();
          $('#branch_id_label').hide();
        }else{
          $('#branch_id').show();
          $('#branch_id_label').show();
        }
      });
    </script>


<!-- AdminLTE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js"></script>



<script>
  
    window.onbeforeunload = function () { $('#loading').show(); }

    $( document ).ready(function() {
        $('#loading').hide();
    });
</script>

</body>
</html>
