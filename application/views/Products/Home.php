<?php $this->load->view('common/header'); ?>

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
                <li class="breadcrumb-item active">Tables</li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Data Table Example</div>
                <div class="card-body">
                    <div class="table-responsive">

                        <style>

                            .table-hover>tbody>tr>td:hover, .table-hover>tbody>tr>td:hover{
                                background-color: yellow!important;
                                cursor:pointer;
                            }

                            .table-hover>tbody>tr:hover>td, .table-hover>tbody>tr:hover>th{
                                background-color: inherit;
                            }

                            .table-hover>tr{
                                padding:10px;
                            }

                        </style>

                        <?php
                        //var_dump($items->result());
                        foreach ($items->result() as $row) {
                            echo $row->DID;
                            echo $row->name;
                        }
                        ?>


                        <table class="table-hover" style="padding:10px">

                            <tbody>
                                <tr>
                                    <td id="popover" data-content="10 spareparts" title="Trill Info"  data-img="//placehold.it/400x200">A:1</td>
                                    <td id="popover" data-content="10 spareparts" title="Trill Info"  data-img="//placehold.it/400x200">A:2</td>
                                    <td id="popover" data-content="10 spareparts" title="Trill Info"  data-img="//placehold.it/400x200">A:3</td>
                                </tr>
                                <tr >
                                    <td >B:1</td>
                                    <td>B:2</td>
                                    <td>B:3</td>
                                </tr>
                                <tr>
                                    <td>C:1</td>
                                    <td>C:2</td>
                                    <td>C:3</td>
                                </tr>
                                <tr>
                                    <td>D:1</td>
                                    <td>D:2</td>
                                    <td>D:3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © Your Website 2018</small>
                </div>
            </div>
        </footer>
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
<?php $this->load->view('common/footer'); ?>

        <script type="text/javascript">
            $(document).ready(function () {
                // Add custom JS here
                $('a[rel=popover]').popover({
                    html: true,
                    trigger: 'hover',
                    placement: 'bottom',
                    content: function () {
                        return '<img src="' + $(this).data('img') + '" />';
                    }
                });

                $("td[id=popover]").popover({
                    placement: "top",
                    trigger: "hover",
                    content: function () {
                        return '<img src="' + $(this).data('img') + '" />';
                    }

                });
            });

        </script>
    </div>
</body>

</html>
