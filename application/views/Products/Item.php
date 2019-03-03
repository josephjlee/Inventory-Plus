<?php $this->load->view('common/header'); ?>
<style>

    .table-hover>tbody>tr>td:hover, .table-hover>tbody>tr>td:hover{
        background-color: yellow!important;
        cursor:pointer;
    }
    .table-hover>tbody>tr>td:visited, .table-hover>tbody>tr>td:hover{
        background-color: yellow!important;
        cursor:pointer;
    }

    .table-hover>tbody>tr:hover>td, .table-hover>tbody>tr:hover>th{
        background-color: white;
    }


    .table-hover>tr{
        padding:10px;
    }

    .table-hover>tr.clicked {
        background-color: blue;
    }
</style>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <?php $this->load->view('common/navigation'); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Item</li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> New Item</div>
                <div class="card-body">
                    <div class="table-responsive">



                        <form>
                            <div class="form-group">

                                <div class="col-12">

                                    <div class="row">
                                        <div class="col-3">

                                            <i>Item Name</i>
                                            <input class='autocomp form-control' id="txtItemName" placeholder="Item name"/>


                                        </div>
                                        <div class="col-3">

                                            <i>Barcode</i>
                                            <input class='autocomp form-control' id="txtBarcode" placeholder="Barcode"/>


                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-3">
                                            <i>Model Name</i>

                                            <input class='autocomp form-control' id="txtModel" placeholder="Model name"/>


                                        </div>

                                        <div class="col-3">
                                            <i>Type Name</i>

                                            <input class='autocomp form-control' id="txtType" placeholder="Type name"/>


                                        </div>



                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-3">
                                            <i>Brand Name</i>

                                            <input class='autocomp form-control' id="txtBrand" placeholder="Brand name"/>


                                        </div>

                                        <div class="col-3">
                                            <i>Country Name</i>

                                            <input class='autocomp form-control' id="txtCountry" placeholder="Country name"/>


                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">

                                        <div class="col-3">



                                            <i>Buying Price</i>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rs</span>
                                                </div>
                                                <input type="text" class="form-control" id="txtBuy" placeholder="Buying Price" aria-label="Username" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">.00</span>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="col-3">

                                            <i>Selling Price</i>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rs</span>
                                                </div>
                                                <input type="text" class="form-control" id="txtSell" placeholder="Selling Price" aria-label="Username" aria-describedby="basic-addon1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">.00</span>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <br>
                                    <i>Location</i>
                                    <div class="row">
                                        <div class="col-3">


                                   
                                                <input type="text" class="form-control" id="txtLocatione" placeholder="Location" aria-label="Username" aria-describedby="basic-addon1">
                                      

                                        </div>


                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <i>Enter Description</i>
                                            <textarea class="form-control" id="txtdesc" placeholder="Enter ">
                                                
                                            </textarea>  

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-3 ">

                                            <button  class="btn btn-success" id="btnAdd" type="button"><span class="fa fa-save"></span> Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </form>


                    </div>
                </div>

            </div>




            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Update Item</div>
                <div class="card-body">
                    <div class="table-responsive">



                        <form>
                            <div class="form-group">

                                <div class="col-12">





                                    <div class="row">
                                        <div class="col-12">
                                            <div id="tbl">

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                        </form>


                    </div>
                </div>

            </div>
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- Logout Modal-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="modelText">

        </div>
        <style type="text/css">


            header{
                font-weight: bold;
                font-size: 30px;
            }

            header span{
                vertical-align: middle;
                font-size: .5em;
                color: #999;
            }

            header span a{
                font-size: .9em;
            }

            section:first-of-type header{
                font-size: 50px;
            }

            section{
                margin-bottom:30px;
            }

            ul>li{
                margin-bottom:2px;
            }

            button, select{
                margin-right:20px;
            }

            input{
                font-family: 'Montserrat', sans-serif !important;

            }

            .tabulator{
                height:90%;
            }

            #example-table-demo{
                margin-bottom:20px;
            }
        </style>
        <?php $this->load->view('common/footer'); ?>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script type="text/javascript">

            /**
             * 
             * 
             *  [{ list: [
             { value: '001', text: 'Bananas from Amazon Rainforest' },
             { value: '003', text: 'Banana Boat' },
             { value: 'apple', text: 'Red apples from New Zealand' },
             { value: 'apple-cider', text: 'Red apple cider beer' },
             { value: 'orange', text: 'Oranges from Moscow' },
             { value: 'orange-vodka', text: 'Classic orange vodka cocktail' },
             { value: 'lemon', text: 'Juicy lemons from Amalfitan Coast' }
             ]}]
             * 
             * **/

            $(document).ready(function () {

                var txtModel;
                var txtType;
                var txtBrand;
                var txtCountry;
                var location;

                horsey(document.querySelector('#txtModel'), {
                    source:<?php
        echo $model;
        ?>,
                    getText: 'text',
                    getValue: 'value',
                    predictNextSearch(info) {
                        //get the suggestion selected by the user
                        //console.log(info.selection.value);

                        txtModel = info.selection.value;
                        // alert(txtModel);
                    }
                });

                horsey(document.querySelector('#txtType'), {
                    source:<?php
        echo $type;
        ?>,
                    getText: 'text',
                    getValue: 'value',
                    predictNextSearch(info) {
                        //get the suggestion selected by the user
                        //console.log(info.selection.value);

                        txtType = info.selection.value;
                    }
                });


                horsey(document.querySelector('#txtBrand'), {
                    source:<?php
        echo $brand;
        ?>,
                    getText: 'text',
                    getValue: 'value',
                    predictNextSearch(info) {
                        //get the suggestion selected by the user
                        //console.log(info.selection.value);

                        txtBrand = info.selection.value;
                    }
                });


                horsey(document.querySelector('#txtCountry'), {
                    source:<?php
        echo $country;
        ?>,
                    getText: 'text',
                    getValue: 'value',
                    predictNextSearch(info) {
                        //get the suggestion selected by the user
                        //console.log(info.selection.value);

                        txtCountry = info.selection.value;
                    }
                });


        horsey(document.querySelector('#txtLocatione'), {
                    source:<?php
        echo $location;
        ?>,
                    getText: 'text',
                    getValue: 'value',
                    predictNextSearch(info) {
                        //get the suggestion selected by the user
                        //console.log(info.selection.value);

                        txtCountry = info.selection.value;
                    }
                });






                $("#tbl").load("<?= base_url('index.php/Items/load') ?>");




               


                $("#btnAdd").click(function () {
                    if ($("#txtItemName").val().length <= 0 | $("#txtBuy").val().length <= 0 | $("#txtSell").val().length <= 0 | $("#txtBrand").val().length <= 0 | $("#txtCountry").val().length <= 0 | $("#txtModel").val().length <= 0 | $("#txtType").val().length <= 0 | location <= 0) {
                        bootbox.alert("Please fill the fields");
                    } else {



                        $.ajax({
                            url: "<?= base_url('index.php/Items/add') ?>",
                            type: "post",
                            data: {name: $("#txtItemName").val(), description: $("#txtdesc").val(), model: txtModel, type: txtType, country: txtCountry, brand: txtBrand, buying: $("#txtBuy").val(), selling: $("#txtSell").val(), location: location, barcode: $("#txtBarcode").val()},
                            success: function (response) {
                                // you will get response from your php page (what you echo or print) 
                                alert("New Record Added");
                                $("#tbl").load("<?= base_url('index.php/Items/load') ?>");
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(textStatus, errorThrown);
                            }


                        });

                    }
                });







            });

        </script>
    </div>
</body>

</html>
