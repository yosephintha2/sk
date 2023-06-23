<?php $this->load->view('layout/header'); ?>
<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">


<style>

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
                        <div class="card-header">
                            <div class="col-12">
                                <!-- <p class="float-right"> -->
                                <a href="<?php echo site_url('berkas/tambah/') . $tipe ?>" class="btn btn-info" role="button" aria-pressed="true"><i class="fas fa-plus"></i> Tambah</a>
                                <!-- </p> -->
                                <!-- <br><br> -->
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <input type="hidden" id="" name="form" value="<?php echo $tipe ?>">
                                    <label for="nomor_sk" class="col-sm-4 col-form-label">Nomor SK</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nomor_sk" name="nomor_sk" required placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_sk" class="col-sm-4 col-form-label">Nama SK</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nama_sk" name="nama_sk" required placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal_sk" class="col-sm-4 col-form-label">Tanggal SK</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="date-own form-control" id="tanggal_sk" name="tanggal_sk" required placeholder="">
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
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                        <select class="form-control select2" id="nama" name="nama" required="">
                                            <option value="">- Guru/Karyawan -</option>
                                            <?php
                                            foreach ($user as $u) {
                                                echo "<option value='$u->id_user'>$u->nama</option>";
                                            }
                                            ?>
                                        </select>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Sign in</button>
                                <button type="submit" class="btn btn-default float-right">Cancel</button>
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


    });

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        //Date picker
        $('#reservation').datetimepicker({
            format: 'L'
        });
    });


    function save() {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable 
        var url;

        if (save_method == 'add') {
            url = "<?php echo site_url('setting/ajax_add') ?>";
        } else {
            url = "<?php echo site_url('setting/ajax_update') ?>";
        }

        // ajax adding data to database

        var formData = new FormData($('#form')[0]);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function (data) {

                if (data.status) {//if success close modal and reload ajax table
                    $('#modal_form').modal('hide');
                    toastr.success('Success adding / update data');
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                    //reload_table();
                    //location.reload();
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        // $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 

            },
            error: function (jqXHR, textStatus, errorThrown) {
                //alert('Error adding / update data');
                toastr.danger('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 

            }
        });
    }

    function del(id) {
        if (confirm('Are you sure delete this data?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('setting/ajax_delete') ?>/" + id,
                type: "POST",
                data: {form: 'jenis_sk'},
                dataType: "JSON",
                success: function (data) {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    toastr.success('Success deleting data');
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                    //reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // alert('Error deleting data');
                    toastr.danger('Error deleting data');
                }
            });

        }
    }

    function reload_table() {
        datatable.ajax.reload(); //reload datatable ajax 
    }

</script>
<?php $this->load->view('layout/footer'); ?> 