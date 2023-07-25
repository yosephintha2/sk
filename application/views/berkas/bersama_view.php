<?php $this->load->view('layout/header'); ?>
 <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">--> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">



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

                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="cari_nomor" placeholder="- Nomor SK -">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="cari_sk" placeholder="- Nama SK -">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <select class="form-control select2" id="cari_nama">
                                            <option value="">- Semua Guru/Karyawan -</option>
                                            <?php
                                            foreach ($user as $u) {
                                                echo "<option value='$u->id_user'>$u->nama</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <input class="date-own form-control" type="text" id="cari_tahun" placeholder="- Tahun SK -">
                                </div>
                                <div class="col-1">
                                    <button type="submit" id="btn-filter" class="btn btn-info"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                            <table id="tabel_sk" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                      <!-- <th class="text-center">No</th> -->
                                        <th class="text-center">No. SK</th>
                                        <th class="text-center">Nama SK</th>
                                        <th class="text-center">Jenis SK</th>
                                        <th class="text-center">Tanggal SK</th>
                                        <th class="text-center">Keterangan</th>
                                        <!-- <th class="text-center">Nama Guru/Karyawan</th> -->
                                        <th class="text-center">Publish</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>



<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>var $j = jQuery.noConflict();</script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">

    jQuery.noConflict();

    $(function () {
        jQuery('.date-own').datepicker({
            minViewMode: 2,
            autoclose: true,
            format: 'yyyy',
            // orientation: "top auto",
        })(jQuery);
    });


</script>

<script type="text/javascript">

    var save_method; //for save method string
    var table;
    var base_url = '<?php echo base_url(); ?>';

    $(document).ready(function () {
        
        table = $('#tabel_sk').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('berkas/ajax_list/') . $tipe ?>",
                "type": "POST",
                "data": function (data) {
                    data.cari_nomor = $('#cari_nomor').val();
                    data.cari_sk = $('#cari_sk').val();
                    data.cari_nama = $('#cari_nama').val();
                    data.cari_tahun = $('#cari_tahun').val();
                }
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
                        // { 
                        //     "targets": [ -2 ], //2 last column (photo)
                        //     "orderable": false, //set not orderable
                        // },
            ],

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        $('#btn-filter').click(function () { //button filter event click
            $('#tabel_sk').DataTable().ajax.reload();
            //table.ajax.reload();  //just reload table
            // table.DataTable( ).api().ajax.reload();

        });

        /*
         //datatablesc
         
         $('#tabel_sk').DataTable({
         "responsive": true, 
         "lengthChange": false, 
         "autoWidth": false,
         "searching": false,});
         function filterData () {
         $('#tabel_sk').DataTable().search(
         $('#cari_nomor').val()
         ).draw();
         }
         
         $('#cari_nomor').on('change', function () {
         filterData();
         });
         */

        /*
         $('#cari_nama').on('change', function(e){
         var status = $(this).val();
         $('#cari_nama').val(status)
         console.log(status)
         //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
         datatable.column(4).search(status).draw();
         })
         
         $('#cari_tahun').on('click', function(e){
         var status = $(this).val();
         $('#cari_tahun').val(status)
         console.log(status)
         //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
         datatable.column(3).search(status).draw();
         })
         
         $('#cari_sk').on('change', function(e){
         var status = $(this).val();
         $('#cari_sk').val(status)
         console.log(status)
         //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
         datatable.column(2).search(status).draw();
         })
         
         $('#cari_nomor').on('change', function(e){
         var status = $(this).val();
         $('#cari_nomor').val(status)
         console.log(status)
         //dataTable.column(6).search('\\s' + status + '\\s', true, false, true).draw();
         datatable.column(1).search(status).draw();
         })
         
         */

        // $("input").change(function(){
        //     $(this).parent().parent().removeClass('has-error');
        //     $(this).next().empty();
        // });

        // $("select").change(function(){
        //     $(this).parent().parent().removeClass('has-error');
        //     $(this).next().empty();
        // });

        // $("textarea").change(function(){
        //     $(this).parent().parent().removeClass('has-error');
        //     $(this).next().empty();
        // });
    });

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    });


    function add() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('[name="form"]').val('jenis_sk');
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Tambah Jenis SK'); // Set Title to Bootstrap modal title
    }

    function edit(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string


        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('setting/ajax_edit') ?>/" + id,
            type: "POST",
            data: {form: 'jenis_sk'},
            dataType: "JSON",
            success: function (data) {

                $('[name="id"]').val(data.id_jenis_berkas);
                $('[name="jenis_sk"]').val(data.jenis_berkas);
                $('[name="tipe_sk"]').val(data.tipe_berkas);
                $('[name="form"]').val('jenis_sk');
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Jenis SK'); // Set title to Bootstrap modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                // alert('Error get data from ajax');
                toastr.danger('Error get data from ajax');
            }
        });
    }

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
        //datatable.ajax.reload(); //reload datatable ajax 
        $('#tabel_sk').DataTable().ajax.reload();
    }

</script>
<?php $this->load->view('layout/footer'); ?> 