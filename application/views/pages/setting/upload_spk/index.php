
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/import/css/style-upload.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/import/js/upload.js"></script>
<!-- <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
 -->
<div id="load"><img src="<?php echo base_url(); ?>assets/images/save.gif"></div>
<form id="import_form" enctype="multipart/form-data">

  <div class="file-upload">
    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Excel</button>

    <div class="excel-upload-wrap">
      <input class="file-upload-input" type='file' onchange="readURL(this);"  accept=".xlsx,.xls,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"  name="file"/>
      <div class="drag-text">
        <h3>Drag and drop a file or select add Excel</h3>
      </div>
    </div>
    <div class="file-upload-content">
      <img class="file-upload-excel" src="<?php echo base_url(); ?>assets/import/images/excel.png"/>
      <div class="x-excel-title"><span class="excel-title"></span></div>
      <div class="excel-title-wrap">
        <button type="submit" class="upload-excel">Upload</button>
        <button type="button" onclick="removeUpload()" class="remove-excel">Remove</button>
      </div>
    </div>
  </div>

</form>

    <script type="text/javascript">
        $('#import_form').on('submit', function(event){
            // modal_loading_show();
            event.preventDefault();
            $.ajax({
                url:"<?php echo base_url(); ?>setting/import",
                method:"POST",
                data:new FormData(this),
                dataType: 'json',
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){
                    console.log(data);
                    if (data['status'] == 'success') {
                        alert("Sukses");
                    }else{
                        alert("Upload gagal");
                    }

                //     document.getElementById('import_form').value = '';
                //     modal_loading_hide();
                //     if (data['status'] == 'success') {
                //         $('#modal_form').modal('hide');
                //         Swal.fire({
                //             title: 'Berhasil!',
                //             text: data['rows'] + ' data berhasil diimport',
                //             type: 'success'
                //         });
                //     }else{
                //         Swal.fire({
                //             title: 'Gagal!',
                //             text: 'Data gagal diimport',
                //             type: 'error'
                //         });
                //     }
                }
            })
        });
    </script>