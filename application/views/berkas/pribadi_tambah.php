<?php $this->load->view('layout/header'); ?>
<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">


<style type="text/css">
        /*.help-block{color: red;}*/
        .has-error .checkbox,.has-error .checkbox-inline,.has-error .control-label,.has-error .help-block,.has-error .radio,.has-error .radio-inline,.has-error.checkbox label,.has-error.checkbox-inline label,.has-error.radio label,.has-error.radio-inline label{
            color:#a94442
        }

       .has-error .select2-container--default .select2-selection--single {
    border: 1px solid #dc3545;
    padding: 0.46875rem 0.75rem;
    height: calc(2.25rem + 2px);
}
    /*
        .has-error{
            border-color:#a94442;
            -webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);
            box-shadow:inset 0 1px 1px rgba(0,0,0,.075);
                display: block;
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    box-shadow: inset 0 0 0 transparent;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;*/
        }

        .has-error .form-control:focus{
            border-color:#843534;
            -webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483;
            box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483
        }
    </style>

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
                <div class="col-12">
                    <div class="card">
                         <!-- <div class="card-header">
                           <div class="col-12">
                                <p class="float-right">
                                <a href="<?php echo site_url('berkas/tambah/') . $tipe ?>" class="btn btn-info" role="button" aria-pressed="true"><i class="fas fa-plus"></i> Tambah</a>
                                </p>
                        
                            </div> 
                        </div>-->
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form class="form-horizontal" id="form">
                            <div class="card-body">
                                <div class="form-group row">
                                    <input type="hidden" id="" name="form" value="<?php echo $tipe ?>">
                                    <label for="nomor_sk" class="col-sm-4 col-form-label">Nomor SK</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nomor_sk" name="nomor_sk" required placeholder="">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_sk" class="col-sm-4 col-form-label">Nama SK</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nama_sk" name="nama_sk" required placeholder="">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal_sk" class="col-sm-4 col-form-label">Tanggal SK</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="date-own form-control" id="tanggal_sk" name="tanggal_sk" required placeholder="">
                                        <span class="help-block"></span>
                                    </div>
                                    <!-- 
                                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                            </div>
                                                        </div>
                                    -->                  </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-4 col-form-label">Nama Guru/Karyawan</label>
                                    <div class="col-sm-8 slct">
                                        <div class="form-group">
                                        <select class="form-control select2" id="nama" name="nama" required="">
                                            <option value="">Pilih Guru/Karyawan</option>
                                            <?php
                                            foreach ($user as $u) {
                                                echo "<option value='$u->id_user'>$u->nama</option>";
                                            }
                                            ?>
                                        </select>
                                        <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-4 col-form-label">Publish</label>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                        <select class="form-control select2" id="publish" name="publish" required="">
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                        <span class="help-block"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="file_sk" class="col-sm-4 col-form-label">File SK</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" accept="application/pdf" id="file_sk" name="file_sk" required placeholder="">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="button" id="btnSave" onclick="save()" class="btn btn-info" aria-pressed="true">Simpan</button>
                                <!-- <button type="button" class="btn btn-danger">Batal</button> -->
                                <a href="<?php echo site_url('berkas/home/') . $tipe ?>" class="btn btn-danger" role="button" aria-pressed="true">Batal</a>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>var $j = jQuery.noConflict();</script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<!-- daterangepicker -->
<!-- <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/moment/moment.min.js"></script> -->
<!-- <script src="<?php echo base_url() ?>/assets/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js"></script> -->

<script type="text/javascript">

    jQuery.noConflict();

    $(function () {
        jQuery('.date-own').datepicker({
            // minViewMode: 2,
            autoclose: true,
            format: 'dd/mm/yyyy',
            // orientation: "top auto",
        })(jQuery);
    });



</script>

<script type="text/javascript">

    var save_method; //for save method string
    var table;
    var base_url = '<?php echo base_url(); ?>';

    $(document).ready(function () {

        $(".slct").change(function () {
            $(this).removeClass('has-error');
            $(this).next().empty();
        });

        $("input").change(function () {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

        $("select2").change(function () {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

        $("textarea").change(function () {
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

    //$("#hidden").show();
    // $("#form").on('submit', function(e){
    //         e.preventDefault();
    //     }
    // });

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

    });
});

    function save() {
        // ajax adding data to database
        $("#hidden").show();
        $('.form-group').removeClass('has-error'); // clear error class
        // $('#btnSave').attr('disabled', true); //set button disable 

        // var formData = new FormData($('#form')[0]);
        var formData = $("#form");

    if (formData[0].checkValidity() === false) {
        $("#hidden").hide();
        if($('#nama').val()==""){
            // alert("vvv");
            $('.slct').addClass('has-error');
            //return false;
        }
      event.preventDefault()
      event.stopPropagation()
    } else {
        var formData = new FormData($('#form')[0]);
        $.ajax({
            url: "<?php echo site_url('berkas/ajax_add') ?>",
            type: "POST",
            // data: formData,
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data) {
                $("#hidden").hide();
                if (data.status) {//if success close modal and reload ajax table
                    toastr.success('Success adding / update data');
                    setTimeout(function () {
                        // location.reload();
                        location.href = '<?php echo site_url('berkas/home/').$tipe ?>';
                    }, 1000);
                } else {
                    //toastr.error('Error adding / update data');
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                // $('#btnSave').attr('disabled', false); //set button enable 
            },
            error: function (jqXHR, textStatus, errorThrown) {
                //alert('Error adding / update data');
                $("#hidden").hide();
                $('#btnSave').attr('disabled', false); //set button enable 
                toastr.error('Error adding / update data');
            }
        });
        
    }
     formData.addClass('was-validated');
}


</script>
<?php $this->load->view('layout/footer'); ?> 