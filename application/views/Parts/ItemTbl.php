
<input type="hidden" class="form-control" id="txtId" placeholder="">
<div class="row">
<br>
<?php
echo '<table id="tbleses" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            
              
                                    <th>Buying</th>
                                        <th>Selling</th>
                                            <th>Location</th>
                 <th>Visibility</th>
           
            </tr>
        </thead>
       <tbody> ';

foreach ($data->result() as $row) {
    echo '<tr id=' . $row->ID . '>';

    echo '<td>' . $row->ID . '</td>';

    echo '<td>' . $row->name . '</td>';

    echo '<td>' . $row->buyprice . '</td>';
    echo '<td>' . $row->sellprice . '</td>';
    echo '<td>' . $row->location . '</td>';
    echo '<td>' . $row->status . '</td>';
    echo '</tr>';
}

echo '
        </tbody>
    </table>
    
               ';
?>

<br>
<hr>
 
            <i>Visibility</i>
 
    <div class="col-3">

        <label class="switch">
            
            <input type="checkbox" id="state">
            <span class="slider round"></span>
        </label>
    </div>

</div>
<br>
<form>
    <div class="form-group">

        <div class="col-12">

            <div class="row">
                <div class="col-3">

                    <i>Item Name</i>
                    <input class='autocomp form-control' id="txtItemNames" placeholder="Item name"/>


                </div>
                <div class="col-3">

                    <i>Barcode</i>
                    <input class='autocomp form-control' id="txtBarcodes" placeholder="Barcode"/>


                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-3">
                    <i>Model Name</i>

                    <input class='autocomp form-control' id="txtModels" placeholder="Model name"/>


                </div>

                <div class="col-3">
                    <i>Type Name</i>

                    <input class='autocomp form-control' id="txtTypes" placeholder="Type name"/>


                </div>



            </div>
            <br>

            <div class="row">
                <div class="col-3">
                    <i>Brand Name</i>

                    <input class='autocomp form-control' id="txtBrands" placeholder="Brand name"/>


                </div>

                <div class="col-3">
                    <i>Country Name</i>

                    <input class='autocomp form-control' id="txtCountrys" placeholder="Country name"/>


                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-3">

                    <i>Buying Price</i>
                    <input class='autocomp form-control' id="txtBuys" placeholder="Buying Price"/>


                </div>
                <div class="col-3">

                    <i>Selling Price</i>
                    <input class='autocomp form-control' id="txtSells" placeholder="Selling Price"/>


                </div>

            </div>
            <br>
            <i>Location</i>
            <div class="row">
 <div class="col-3">
 <input type="text" class="form-control" id="txtLocatione2" placeholder="Location" aria-label="Username" aria-describedby="basic-addon1">
 </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <i>Enter Description</i>
                    <textarea class="form-control" id="txtdescs" placeholder="Enter ">
                                                
                    </textarea>  

                </div>
            </div>
            <br>

        </div>
    </div>



</form>
<div class="row">

    <div class="col-3 ">

        <button  class="btn btn-success" id="update" type="button"><span class="fa fa-reply"></span> update</button>
    </div>
</div>



<script type="text/javascript">


    $(document).ready(function () {
        var txtModels;
        var txtTypes;
        var txtBrands;
        var txtCountrys;
        var locations;


        horsey(document.querySelector('#txtModels'), {
            source:<?php
echo $model;
?>,
            getText: 'text',
            getValue: 'value',
            predictNextSearch(info) {
                //get the suggestion selected by the user
                //console.log(info.selection.value);

                txtModels = info.selection.value;
                
            }
        });

        horsey(document.querySelector('#txtTypes'), {
            source:<?php
echo $type;
?>,
            getText: 'text',
            getValue: 'value',
            predictNextSearch(info) {
                //get the suggestion selected by the user
                //console.log(info.selection.value);

                txtTypes = info.selection.value;
            }
        });


        horsey(document.querySelector('#txtBrands'), {
            source:<?php
echo $brand;
?>,
            getText: 'text',
            getValue: 'value',
            predictNextSearch(info) {
                //get the suggestion selected by the user
                //console.log(info.selection.value);

                txtBrands = info.selection.value;
            }
        });


        horsey(document.querySelector('#txtCountrys'), {
            source:<?php
echo $country;
?>,
            getText: 'text',
            getValue: 'value',
            predictNextSearch(info) {
                //get the suggestion selected by the user
                //console.log(info.selection.value);

                txtCountrys = info.selection.value;
            }
        });
        
                horsey(document.querySelector('#txtLocatione2'), {
            source:<?php
echo $location;
?>,
            getText: 'text',
            getValue: 'value',
            predictNextSearch(info) {
                //get the suggestion selected by the user
                //console.log(info.selection.value);

                locations = info.selection.value;
            }
        });
        
        //
        
  

        $('#tbleses').DataTable();

        $('#tbleses').on('click', 'tr', function () {


            var id = $(this).find("td").eq(0).html();
            var name = $(this).find("td").eq(1).html();
            var buying = $(this).find("td").eq(2).html();
            var selling = $(this).find("td").eq(3).html();
            locations = $(this).find("td").eq(4).html();
            var status = $(this).find("td").eq(5).html();
            // alert(name);


            $("#table-hovers td#" + locations).css('background-color', "red");

            $("#txtItemNames").val(name);

            $("#txtId").val(id);

            $("#txtBuys").val(buying);
            $("#txtSells").val(selling);
            
            
            
          

            if (status == "true") {
                $("#state").prop('checked', true);
            }
            if (status == "false") {
                $("#state").prop("checked", false)
            }

            $.ajax({
                url: "<?= base_url('index.php/Items/GetVals') ?>",
                type: "post",
                data: {id: $("#txtId").val()},
                success: function (response) {
                    // you will get response from your php page (what you echo or print)                 
                    var array = response.split(']');
              
                    $("#txtModels").val(array[0]);
                    $("#txtTypes").val(array[1]);
                    $("#txtCountrys").val(array[2]);
                    $("#txtBrands").val(array[3]);
                    $("#txtdescs").val(array[4]);

                    txtModels = array[5];
                    //alert(array);
                    txtTypes = array[6];
                    txtCountrys = array[7];
                    txtBrands = array[8];
                    
                    $("#txtBarcodes").val(array[9]);
                      $("#txtLocatione2").val(array[10]);

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }


            });



        });





        $("#update").click(function () {

 

            $.ajax({
                url: "<?= base_url('index.php/Items/Update') ?>",
                type: "post",
                data: {id:$("#txtId").val(),name: $("#txtItemNames").val(), description: $("#txtdescs").val(),model:txtModels,type:txtTypes,country:txtCountrys,brand:txtBrands,buying:$("#txtBuys").val(),selling:$("#txtSells").val(),location:locations, status: $('#state').is(":checked"),barcode:$("#txtBarcodes").val()},
                success: function (response) {
                    // you will get response from your php page (what you echo or print)                 
                $("#tbl").load("<?=base_url('index.php/Items/load') ?>");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }


            });
            

        });
    });

</script>
