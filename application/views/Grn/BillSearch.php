<?php $this->load->view('common/header'); ?>
<style>

    #tbles>tbody>tr:hover{
        background-color: #63b6ff!important;
        cursor:pointer;
    }



</style>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

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
                <li class="breadcrumb-item active">Grn Search</li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> View</div>
                <div class="card-body">
                    <div class="table-responsive">



                        <form>
                            <div class="form-group">

                                <div class="col-12">




                                    <?php
                                    echo '<table id="tbles" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Bill No</th>
                <th>Date</th>
                    <th>Customer</th>
                 <th>Quntity</th>
                  <th>Bill Amount</th>
                   <th>Balance</th>
           
            </tr>
        </thead>
       <tbody> ';

                                    foreach ($invoice->result() as $row) {
                                        echo '<tr id=' . $row->IID . '>';
                                        echo '<td>' . $row->IID . '</td>';
                                        echo '<td>' . $row->date . '</td>';
                                        echo '<td>' . $row->cus . '</td>';
                                        echo '<td>' . $row->qty . '</td>';
                                        echo '<td>Rs.' . $row->billAmount . '</td>';
                                        echo '<td>Rs.' . $row->balance . '</td>';
                                        echo '</tr>';
                                    }

                                    echo '
        </tbody>
    </table>
    
               ';
                                    ?>


                                </div>
                            </div>



                        </form>


                    </div>
                </div>

            </div>




            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i>More..</div>
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











                $('#tbles').DataTable();




                $('#tbles').on('click', 'tr', function () {
                      var id = $(this).find("td").eq(0).html();
                      
                        $.ajax({
                url: "<?= base_url('index.php/Grn/search') ?>",
                type: "post",
                data: {id: id},
                success: function (response) {
                
              
                    $("#tbl").html(response);
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
