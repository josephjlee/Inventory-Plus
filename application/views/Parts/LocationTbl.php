
<input type="hidden" class="form-control" id="txtId" placeholder="">
<div class="row">

    <br>
    <?php
    echo '<table id="tbles" class="display" style="width:100%">
        ';
    $count = 0;
    $strc = "";
    foreach ($data->result() as $row) {

        if($row->lid!=0){
        if ($count >= $row->cols) {
            $strc .= '<tr id=' . $row->lid . '>';
        }
        if ($count < $row->cols) {
            $strc .= '<td><input type="text" value="' . $row->Name . '" class="form-control" id="' . $row->lid . '" placeholder="name"></td>';
         $count++;
            
        }

        if ($count >= $row->cols) {
            $strc .= '</tr>';
            $count = 0;
        }
       
        echo $strc;
        $strc = "";
        }
    }

    echo '
        </tbody>
    </table>
    
               ';
    ?>


    <script type="text/javascript">


        $(document).ready(function () {

            $('#tbles').DataTable();

            $('#tbles').on('click', 'tr', function () {

                var id = $(this).find("td").eq(0).html();
                var name = $(this).find("td").eq(1).html();
                var status = $(this).find("td").eq(3).html();
                var desc = $(this).find("td").eq(2).html();
                // alert(name);

                $("#txtId").val(id);
                $("#txtName2").val(name);
                $("#txtDesc2").val(desc);
                if (status == "true") {
                    $("#state").prop('checked', true);
                }
                if (status == "false") {
                    $("#state").prop("checked", false)
                }




            });





            $("#update").click(function () {




                $.ajax({
                    url: "<?= base_url('index.php/Brand/Update') ?>",
                    type: "post",
                    data: {id: $("#txtId").val(), name: $("#txtName2").val(), description: $("#txtDesc2").val(), status: $('#state').is(":checked")},
                    success: function (response) {
                        // you will get response from your php page (what you echo or print)                 
                        $("#tbl").load("<?= base_url('index.php/Brand/load') ?>");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }


                });


            });
        });

    </script>
