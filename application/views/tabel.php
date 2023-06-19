<?php $this->load->view('layout/header');?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $subtitle ?></h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
     <section class="content">
      <div class="container-fluid">
                    <div class="row">
              <div class="col-md-12">
<div class="card">
              <div class="card-header">
                <div class="form-group">
                  <label>Minimal</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                <!-- /.form-group -->
                 </div>
                  <div class="card-body">
                  </div>
              <!-- /.col -->
            </div>
</div>

<div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Date picker</h3>
              </div>
              <div class="card-body">
                <!-- Date -->
                <div class="form-group">
                  
                  <input type='text' class="form-control" id='datetimepicker9' /> 
                    <span class="input-group-addon"> 
                            <span class="glyphicon glyphicon-calendar"></span>
                    </span>

                </div>
 
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          </div>
        </div>
        </section>

</div>
<!-- ./wrapper -->

<script type="text/javascript">
  $(function () {
    $('#datetimepicker9').datepicker({
      viewMode: 'years'
    });
  });
 </script>
 
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })


    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
  })
</script>
</body>
</html>

  
<?php $this->load->view('layout/footer');?> 