<?php $this->load->view('layout/header');?>
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
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
                    <a href="#" class="btn btn-info" role="button" aria-pressed="true"><i class="fas fa-plus"></i> Tambah</a>
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
                 <div class="col-4">
                    <div class="form-group">
                        <select class="form-control select2" id="cari_nama">
                            <option id="">- Semua Guru/Karyawan -</option>
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
             </div>
                <table id="tabel_sk" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <!-- <th class="text-center">No</th> -->
                    <th class="text-center">No. SK</th>
                    <th class="text-center">Nama SK</th>
                    <th class="text-center">Tanggal SK</th>
                    <th class="text-center">Nama Guru/Karyawan</th>
                    <th class="text-center">Publish</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                     <?php
                     $i = 0;
        foreach ($data as $r) {
            $i++;
            //$tipe_berkas = $this->conversion->tipe_berkas($r->tipe_berkas);

            // echo isset($r->keterangan) ? $r->keterangan:'-';exit();

          echo "<tr>";
          // echo "<td class='text-center'>$i</td>";
          echo "<td>$r->no_berkas</td>";
          echo "<td>$r->nama_berkas</td>";
          echo "<td>$r->tanggal_berkas</td>";
          echo "<td>$r->nama</td>";
          if($r->publish == 0)
            echo "<td><small class='badge badge-secondary'>Hide</small></td>";
            if($r->publish == 1)
                echo "<td><small class='badge badge-success'>Show</small></td>";

          // echo "<td>".(isset($r->keterangan) ? $r->keterangan:"-")."</td>";
          echo "<td class='text-center'>
                <a class='btn btn-outline-dark btn-sm' href='javascript:void(0)' title='Download'><i class='fas fa-file-pdf'></i></a>
                <a class='btn btn-outline-info btn-sm' href='javascript:void(0)' title='Edit' onclick='edit($r->id_berkas)'><i class='fas fa-edit'></i></a>
                  <a class='btn btn-outline-danger btn-sm' href='javascript:void(0)' title='Hapus' onclick='del($r->id_berkas)'><i class='fas fa-trash-alt'></i></a>
          </td>";
          echo "</tr>";
        }
        ?>
                  </tbody>
                </table>
              </div>
          </div>

          </div>
      </div>
  </div>
</section>
   </div>

  
   <div class="modal fade" id="modal_form">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Jenis SK</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="#" id="form" >
            <div class="modal-body">              
                <input type="hidden" value="" name="id"/> 
                <input type="hidden" value="jenis_sk" name="form"/> 
                <div class="form-group">
                    <label class="control-label">Jenis SK</label>
                    <input type="text" class="form-control" name="jenis_sk" placeholder="" required="">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                  <label class="control-label">Tipe SK</label>
          <!--         <?php //echo form_dropdown('tipe_sk', $tipe_sk, $this->input->post('tipe_sk'), "id='tipe_sk' class='form-control select2bs4' required") ?> -->
                                  
                  <?= form_dropdown('tipe_sk', $tipe_sk, $this->input->post('tipe_sk'), 
                        "id='tipe_sk' class='form-control' required") ?>
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <label class="control-label">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" placeholder="" required="">
                    <span class="help-block"></span>
                </div>
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-info">Save</button> -->
              <button type="button" id="btnSave" onclick="save()" class="btn btn-info">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
         format: 'yyyy'
       })(jQuery);
 });

    
</script>

<script type="text/javascript">

var save_method; //for save method string
var datatable;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {

    //datatables
    datatable = $("#tabel_sk").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "searching": false,
      "columnDefs": [
            {
                "targets": [4],
                "visible": false
            }
        ]

      // ,"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

/*
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


function add(){
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('[name="form"]').val('jenis_sk');
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Jenis SK'); // Set Title to Bootstrap modal title
}

function edit(id){
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string


    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('setting/ajax_edit')?>/" + id,
        type: "POST",
        data: {form: 'jenis_sk'},
        dataType: "JSON",
        success: function(data){

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

function save(){
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('setting/ajax_add')?>";
    } else {
        url = "<?php echo site_url('setting/ajax_update')?>";
    }

    // ajax adding data to database

    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data){

            if(data.status) {//if success close modal and reload ajax table
                $('#modal_form').modal('hide');
                toastr.success('Success adding / update data');
                setTimeout(function(){location.reload();}, 1000);
                //reload_table();
                //location.reload();
            }
            else{
                for (var i = 0; i < data.inputerror.length; i++) {
                    // $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error');
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        },
        error: function (jqXHR, textStatus, errorThrown){
            //alert('Error adding / update data');
            toastr.danger('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function del(id){
    if(confirm('Are you sure delete this data?')) {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('setting/ajax_delete')?>/"+id,
            type: "POST",
            data: {form: 'jenis_sk'},
            dataType: "JSON",
            success: function(data){
                //if success reload ajax table
                $('#modal_form').modal('hide');
                toastr.success('Success deleting data');
                setTimeout(function(){location.reload();}, 1000);
                //reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown){
                // alert('Error deleting data');
                toastr.danger('Error deleting data');
            }
        });

    }
}

function reload_table(){
    datatable.ajax.reload(); //reload datatable ajax 
}

</script>
<?php $this->load->view('layout/footer');?> 