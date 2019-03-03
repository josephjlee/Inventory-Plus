
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

    .tooltip-inner {
        background-color: #00acd6 !important;
        /*!important is not necessary if you place custom.css at the end of your css calls. For the purpose of this demo, it seems to be required in SO snippet*/
        color: #fff;
    }

    .tooltip.top .tooltip-arrow {
        border-top-color: #00acd6;
    }

    .tooltip.right .tooltip-arrow {
        border-right-color: #00acd6;
    }

    .tooltip.bottom .tooltip-arrow {
        border-bottom-color: #00acd6;
    }

    .tooltip.left .tooltip-arrow {
        border-left-color: #00acd6;
    }
    @media print {
        body {
            width: 10px;/*width of index card*/
            height: 10px;/*height of index card*/
        }
        @page {
            size: A8 landscape;
            margin: 10%;
        }
        /* etc */
    }
</style>
<body>



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
                <li class="breadcrumb-item active">Create Invoice</li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">

                <div class="card-body">
                    <div class="table-responsive">

                        <div class="form-group">

                            <div class="col-12">


                                <div class="row">
                                    <div class="col-lg-3">
                                        <input type="text" value="" class="form-control" placeholder="Item name" id="item_name">
                                    </div>

                                    <div class="col-lg-3">
                                        <input type="text" value="" class="form-control" placeholder="Enter Barcode" id="barcode">

                                    </div>


                                    <div class="col-lg-3">
                                        <input type="text" value="" class="form-control" disabled="" id="txtDate">

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3">

                                        <input type="text" value="" class="form-control" placeholder="Quantity" max="5" id="qty">

                                    </div>

                                    <div class="col-lg-3">

                                        <input type="text" value=""  class="form-control" placeholder="Default Customer"  max="5" id="txtCustomer">
                                        <span id="new_customer"><i><a href="#">new customer</a></i></span>
                                    </div>



                                    <div class="col-lg-3">
                                        <input type="text" value="0000<?= $invoiceid[0]->IID + 1; ?>" class="form-control" disabled="" id="txtInvoice">

                                    </div>
                                    <div class="col-lg-4">
                                        <small><i>  <span id="iqty"  >0</span> </i></small>
                                        <input type="text" value="" class="form-control" disabled="" id="txtLocations">
                                       
                                        <input type="button" value="Add" class="btn btn-info"  id="btnadd">
                                    </div>


                                </div>
                                <div class="row">

                                </div>
                            </div>
                        </div>

                        <div id="printArea">

                            <div class="row">

                            </div>
                            <form method="post" id="invoice_form" >
                                <div class="table-responsive">

                                    <div class="col-12">


                                        <table id="invoice-item-table" class="table table-bordered">
                                            <tr>
                                                <th width="1%">Sr</th>
                                                <th width="1%">ID</th>
                                                <th width="2%">Name</th>
                                                <th width="1%">Quantity</th>
                                                <th width="4%">Price</th>



                                                <th width="4%" >Total</th>
                                                <th width="12.5%" ></th>
                                            </tr>

                                            <tr>

                                            </tr>
                                        </table>
                                        <div align="right">
                                            <div class="col-lg-4">
                                                <i> Total </i>
                                            </div>
                                            <div class="col-lg-4">
                                                <span id="final_total_amt">0.00</span>  
                                            </div>
                                            <div class="col-lg-4">

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rs</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="txtPay1" placeholder="Enter Payment" aria-label="Username" aria-describedby="basic-addon1">

                                                </div>
                                                <i><span style="font-size:12px">press end button for finish</span></i>
                                                <div class="col-1">
                                                    <span   id="btnBalance"  ><a href="#"></a></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <i>Balance</i>
                                            </div>
                                            <div class="col-lg-4">
                                                <b> <span id="final_balance">0.00</span></b>
                                            </div>

                                        </div>




                                        <div class="col-lg-4">
                                            <input type="submit" value="save" class="btn btn-danger" id="btnSave">
                                            <input type="button" value="save+print" class="btn btn-success" id="btnPrint">
                                        </div>

                                    </div>
                                </div>
                            </form>

                            <form method="post" id="hform" target="_blank" action="<?= base_url('index.php/Invoice/printBill') ?>">
                                <input type="hidden"  value="c" name="customer" id="tcustomer">
                                <input type="hidden" value="" name="date" id="tdate">
                                <input type="hidden" value="" name="amount" id="tamount">
                                <input type="hidden" value="10" name="id" id="tid">
                                <input type="submit" style="visibility: hidden" name="su" id="tbtid">

                            </form>
                        </div>

                        <?php $this->load->view('common/footer'); ?>


                        <script>
                            $(document).ready(function () {
                                var txtID = "";
                                var txtPrice = "";
                                var counter = 1;
                                var netTotal = 0;
                                var txtItemName = "";
                                var location = "";
                                var stQty=0;
                                $('[data-toggle="tooltip"]').tooltip();
                                var d = new Date();
                                var strDate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();

                                $("#txtDate").val(strDate);


                                $("#btnSave").prop("disabled", true);
                                $("#btnPrint").prop("disabled", true);

                                var exist = 0;

                                var txtCustomer = 0;



                                $("#qty").ForceNumericOnly();
                                $("#txtPay1").ForceNumericOnly();

                                horsey(document.querySelector('#txtCustomer'), {
                                    source:<?php
                        echo $customer;
                        ?>,
                                    getText: 'text',
                                    getValue: 'value',
                                    predictNextSearch(info) {
                                        //get the suggestion selected by the user
                                        //console.log(info.selection.value);

                                        txtCustomer = info.selection.value;
                                        // alert(txtModel);
                                    }
                                });

                                horsey(document.querySelector('#barcode'), {
                                    source:<?php
                        echo $barcode;
                        ?>,
                                    getText: 'text',
                                    getValue: 'value',
                                    predictNextSearch(info) {
                                        //get the suggestion selected by the user
                                        //console.log(info.selection.value);

                                        txtID = info.selection.value;
                                        // alert(txtModel);
                                    }
                                });




                                $(document).on('click', '#new_customer', function () {

                                    var name = "";
                                    var address = "";
                                    var tp = "";

                                    bootbox.prompt("Enter name", function (result) {
                                        name = result;

                                        bootbox.prompt("Enter Telephone", function (result) {
                                            tp = result;

                                            bootbox.prompt("Enter adress", function (result) {
                                                address = result;

                                                // if (name.length <= 0) {

                                                $.ajax({
                                                    url: "<?= base_url('index.php/Invoice/CustomerAdd') ?>",
                                                    type: "post",
                                                    data: {name: name, address: address, tp: tp},
                                                    success: function (response) {
                                                        // you will get response from your php page (what you echo or print) 

                                                        var array = response.split(',');
                                                        txtCustomer = array[0];
                                                        $("#txtCustomer").val(array[1]);
                                                        // alert(txtCustomer);

                                                    },
                                                    error: function (jqXHR, textStatus, errorThrown) {
                                                        alert(jqXHR);
                                                        console.log(textStatus, errorThrown);
                                                    }


                                                });
                                                //}
                                            });

                                        });

                                    });

                                });
                                $(document).on('click', '#btnadd', function () {
                                    if ($("#qty").val().length <= 0 | txtID.length <= 0) {
                                        bootbox.alert("Please enter item name and Quantity");
                                        $("#item_name").focus();
                                    } else {
                                        $.ajax({
                                            url: "<?= base_url('index.php/Invoice/getPrice') ?>",
                                            type: "post",
                                            data: {id: txtID},
                                            success: function (response) {
                                                // you will get response from your php page (what you echo or print)    



                                                var array = response.split(',');

                                                $("#item_name").val(array[1]);


                                                txtPrice = array[0];
                                                location = array[2];
                                                stQty=array[3];
                                                $("#iqty").html(stQty);
                                                $("#txtLocations").val(location);

                                                var txtTotal = txtPrice * $("#qty").val();

                                                var rowCount = $('#invoice-item-table >tbody >tr').length;



                                                checkRow(txtID);
                                                if( parseFloat(stQty)>=parseFloat($("#qty").val())){
                                                if (exist == 1) {

                                                    // setRowPrice("invoice-item-table",counter,3,$("#qty").val());

                                                    var c = counter - 1;


                                                    var cqty = $('#invoice-item-table').find('tr' + '#' + txtID).find('td:eq(3)').html();

                                                    cqty++;
                                                    var p = txtPrice * cqty;
                                                    $('#invoice-item-table').find('tr' + '#' + txtID).find('td:eq(3)').html(cqty);
                                                    $('#invoice-item-table').find('tr' + '#' + txtID).find('td:eq(5)').html(p);
                                                    TotalPriceCalc();

                                                } else {

                                                    var newRow = $("<tr id=" + txtID + ">");
                                                    var cols = "";
                                                    cols += '<td>' + counter + '</td>';
                                                    cols += '<td>' + txtID + '</td>';
                                                    cols += '<td> ' + $("#item_name").val() + ' </td>';
                                                    cols += '<td> ' + $("#qty").val() + ' </td>';
                                                    cols += '<td> ' + txtPrice + ' </td>';
                                                    cols += '<td class="txtTotal">' + txtTotal + '</td>';


                                                    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
                                                    newRow.append(cols);
                                                    $("#invoice-item-table").append(newRow);

                                                    TotalPriceCalc();
                                                    counter++;
                                                }
                                                }else{
                                                alert("not enougt stock");
                                                }
                                            },
                                            error: function (jqXHR, textStatus, errorThrown) {
                                                console.log(textStatus, errorThrown);
                                            }


                                        });
                                    }
                                    //alert(txtPrice);

                                });
                                function setRowPrice(tableId, rowId, colNum, newValue)
                                {
                                    $('#' + tableId).find('tr#' + rowId).find('td:eq(' + colNum + ')').html(newValue);
                                }
                                ;

                                function checkRow(id) {
                                    var c = $('#invoice-item-table tr td:nth-child(2):contains(' + id + ')').length;


                                    if (c == 0) {

                                        exist = 0;
                                        //  alert("no");
                                    } else {
                                        exist = 1;
                                        //  alert("yes");
                                    }




                                }

                                function TotalPriceCalc() {
                                    var total = 0;
                                    $(".txtTotal").each(function () {
                                        total += parseFloat($(this).text());
                                    });
                                    $("#final_total_amt").html(total);
                                }
                                $("#invoice-item-table").on("click", ".ibtnDel", function (event) {
                                    $(this).closest("tr").remove();
                                    counter -= 1
                                    TotalPriceCalc();
                                });



                                //order_item_tax1_rate1

                                horsey(document.querySelector('#item_name'), {
                                    source:<?php
                        echo $item;
                        ?>,
                                    getText: 'text',
                                    getValue: 'value',
                                    predictNextSearch(info) {
                                        //get the suggestion selected by the user
                                        //console.log(info.selection.value);

                                        // txtModel = info.selection.value;
                                        txtID = info.selection.value;
                                        // alert(txtModel);
                                    }
                                });

                                $(document).on('click', '#btnSave', function () {

                                    var payment = parseFloat($("#txtPay1").val());
                                    var tot = parseFloat($("#final_total_amt").text());

                                    if (payment < tot) {

                                        if ($('#txtCustomer').val().length <= 0) {
                                            alert("Please select a customer for make Debit");

                                        } else {
                                            save();
                                        }

                                    } else {
                                        save();
                                    }

                                });

                                function save() {
                                    var myTableArray = [];
                                    $("#invoice-item-table tr").each(function () {
                                        var arrayOfThisRow = [];
                                        var tableData = $(this).find('td');
                                        if (tableData.length > 0) {
                                            tableData.each(function () {
                                                arrayOfThisRow.push($(this).text());
                                            });
                                            myTableArray.push(arrayOfThisRow);
                                        }
                                    });

                                    //alert(myTableArray);

                                    $.ajax({
                                        type: "POST",
                                        url: "<?= base_url('index.php/Invoice/SaveTable') ?>",

                                        data: {
                                            customer: txtCustomer, pay: $("#txtPay1").val(), total: $("#final_total_amt").html(), balance: $("#final_balance").html(), qty: counter, o: myTableArray
                                        },
                                        success: function (response) {
                                            // you will get response from your php page (what you echo or print) 
                                            //window.location="";
//                                            var table = $('#invoice-item-table').tableToJSON("ignoreEmptyRows:true");
//                                            printJS({
//                                                printable: table,
//                                                properties: ['SrNo', 'ID', 'Name', 'Quantity', 'Price', 'Total'],
//                                                type: 'json',
//                                                gridHeaderStyle: 'color: red;  border: 2px solid #3971A5;width:10px',
//                                                gridStyle: 'border: 2px solid #3971A5;',
//                                                header: 'Invoice',
//                                                footer:'hi',
//                                                width:'12px',
//                                                font:'1px'
//                                            });







                                        },
                                        error: function (jqXHR, textStatus, errorThrown) {
                                            console.log(textStatus, errorThrown);
                                        }


                                    });
                                }
                                ///////////////////////////////////////

                                //
                                $('#barcode').on('keypress', function (e) {
                                    if (e.keyCode == 13)
                                    {
                                        $('#qty').select();
                                        $("#qty").focus();
                                    }
                                    if (e.keyCode == 35)
                                    {
                                        $('#txtPay1').select();
                                        $("#txtPay1").focus();
                                    }
                                });
                                $('#item_name').on('keypress', function (e) {
                                    if (e.keyCode == 13)
                                    {

                                        $('#qty').select();
                                        $("#qty").focus();

                                    }
                                    if (e.keyCode == 35)
                                    {
                                        $('#txtPay1').select();
                                        $("#txtPay1").focus();
                                    }
                                });

                                $('#qty').on('keypress', function (e) {
                                    if (e.keyCode == 13)
                                    {
                                        $('#btnadd').click();
                                        $('#item_name').select();
                                        $('#item_name').focus();
                                       // $("#table-hover td#" + location).css('background-color', "gray");
                                    }
                                    if (e.keyCode == 35)
                                    {
                                        $('#txtPay1').select();
                                        $("#txtPay1").focus();
                                    }
                                });
                                $('#txtPay1').on('keypress', function (e) {

                                    if (e.keyCode == 35)
                                    {

                                        if (txtID.length <= 0) {
                                            alert("First enter items");
                                        } else {
                                            if ($("#txtPay1").val().length <= 0) {
                                                alert("Enter payment");
                                            } else {

                                                $('#btnBalance').click();
                                                $('#btnSave').click();

                                                $("#tcustomer").val($("#txtCustomer").val());
                                                $("#tdate").val($("#txtDate").val());
                                                $("#tamount").val($("#final_total_amt").html());
                                                $("#tid").val($("#txtInvoice").val());
                                                window.location = "";
                                               $("#hform").submit();
                                            }
                                        }

                                    }

                                });
//

                                $(document).on('click', '#btnBalance', function () {

                                    var tot = parseFloat($("#final_total_amt").text());
                                    var payment = parseFloat($("#txtPay1").val());

                                    var bal = payment - tot;

                                    $("#final_balance").html(bal);
                                    $("#btnSave").removeAttr('disabled');
                                    $("#btnPrint").removeAttr('disabled');
                                });


                                $("#table-hover").on("click", "td", function () {

                                    location = $(this).attr('id');


                                    $.ajax({
                                        url: "<?= base_url('index.php/Invoice/getInfo') ?>",
                                        type: "post",
                                        data: {id: location},
                                        success: function (response) {
                                            // you will get response from your php page (what you echo or print)                 
                                            var array = response.split(',');

                                            txtID = array[2];
                                            $("#item_name").val(array[1]);
                                            $("#qty").val("1");
                                            $('#btnadd').click();
                                            $("#table-hovers td#" + location).css('background-color', "gray");

                                        },
                                        error: function (jqXHR, textStatus, errorThrown) {
                                            console.log(textStatus, errorThrown);
                                        }


                                    });

                                });

                            });



                        </script>


                    </div>




                    </body>

                    </html>
