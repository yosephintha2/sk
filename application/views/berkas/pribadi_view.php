<?php $this->load->view('layout/header');?>


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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- <button type="button" class="btn btn-info"  onclick="add()">
                  <i class="fas fa-plus"></i> Tambah
                </button> -->
                <a href="#" class="btn btn-info" role="button" aria-pressed="true"><i class="fas fa-plus"></i> Tambah</a>

                <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                  <i class="fas fa-plus"></i> Tambah
                </button> -->
                <!-- <h3 class="card-title">DataTable with default features</h3> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	   <table id="tabel_sk" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">No. SK</th>
                    <th class="text-center">SK</th>
                    <th class="text-center">Tanggal SK</th>
                    <th class="text-center">Nama</th>
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
          echo "<td class='text-center'>$i</td>";
          echo "<td>$r->no_berkas</td>";
          echo "<td>$r->nama_berkas</td>";
          echo "<td>$r->tanggal_berkas</td>";
          echo "<td>$r->nama</td>";
          echo "<td>$r->publish</td>";
          // echo "<td>".(isset($r->keterangan) ? $r->keterangan:"-")."</td>";
          echo "<td class='text-center'><a class='btn btn-sm btn-info' href='javascript:void(0)' title='Edit' onclick='edit($r->id_berkas)'><i class='fas fa-edit'></i></a>
				  <a class='btn btn-sm btn-danger' href='javascript:void(0)' title='Hapus' onclick='del($r->id_berkas)'><i class='fas fa-trash-alt'></i></a>
          </td>";
          echo "</tr>";
        }
        ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
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

      <script type="text/javascript">

var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';

 $(function () {
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});

$(document).ready(function() {

    //datatables
    table = $("#tabel_sk").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
      // ,"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
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
    table.ajax.reload(); //reload datatable ajax 
}

</script>
<?php $this->load->view('layout/footer');?> 