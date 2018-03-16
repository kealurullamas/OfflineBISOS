    <br><br><br>
    </div>
</div>
 <!-- /.content-wrapper-->
 <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
<!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/admin/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url(); ?>assets/admin/js/sb-admin-datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/sb-admin-charts.min.js"></script>

    <script src="<?php echo base_url('assets/admin/js/sb-admin-modal.js') ?>"></script>
    
    <!-- <script src="<?php echo base_url('assests/<a href="http://www.phpcodify.com/category/jquery/">jquery</a>/jquery-3.1.0.min.js')?>"></script> -->
    <script type="text/javascript">
      // function delete_person(id)
      // {
      //     if(confirm('Are you sure delete this data?'))
      //     {
      //         // ajax delete data to database
      //         $.ajax({
      //             url : "<?php echo site_url('admins/deletenews')?>/"+id,
      //             type: "POST",
      //             dataType: "JSON",
      //             success: function(data)
      //             {
      //                 //if success reload ajax table
      //                 $('#delete_modal').modal('hide');
      //                 // reload_table();
      //             },
      //             error: function (jqXHR, textStatus, errorThrown)
      //             {
      //                 alert('Error deleting data');
      //             }
      //         });
      
      //     }
      // }
  //     $(document).ready( function () {
  //     $('#dataTable').DataTable();
  // } );
    function delete_news(id, title){
          if(confirm('Are you sure to delete this news? (News Title: "'+title+'")'))
          {
            // ajax delete data from database
              $.ajax({
                url : "<?php echo site_url('admins/deletenews')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                  location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

          }
    }
    
    // function delete_announcement(id){
    //   $.ajax({
    //             url : "<?php echo site_url('admins/deleteannouncement')?>/"+id,
    //             type: "POST",
    //             dataType: "JSON",
    //             success: function(data)
    //             {
    //               location.reload();
    //             },
    //             error: function (jqXHR, textStatus, errorThrown)
    //             {
    //                 alert('Error deleting data');
    //             }
    //         });
    // }

    $('.confirm-delete').on('click', function(e) {
        e.preventDefault();

        var id = $(this).data('id');
        var url = $(this).data('url');
        $('#deleteModal').data('id', id).modal('show');
        $('#deleteModal').data('url', url);
    });

    $('#btnConfirm').click(function() {
        // handle deletion here
        var id = $('#deleteModal').data('id');
        var url = $('#deleteModal').data('url');
        $('#deleteModal').modal('hide');
        $.ajax({
                url : url+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                  location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
    });

      // $(document).on("click", ".open-deleteModal",function(){
      //     var rowId = $(this).data('id');
      //     $(".modal-body #delRowId").attr("href",ABSOLUTE_PATH+"admins/deletenews/"+rowId).click();
      // });
        // $(document).on("click", ".open-deleteModal", function () {
        //     var rowId = $(this).data('id');
        //     $(".modal-body #delRowId").val( rowId );
        //     $("#id").attr("href","<?php echo base_url('admins/deletenews/'); ?>"+rowid);
        //     });
    </script> 
  </div>
</body>

</html>