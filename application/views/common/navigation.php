
<style>
      /* Remove the navbar's default margin-bottom and rounded borders */ 
      .navbar {
      margin-bottom: 4px;
      border-radius: 0;
      }
      /* Add a gray background color and some padding to the footer */
      footer {
      background-color: #f2f2f2;
      padding: 25px;
      }
      .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
      }
      .navbar-brand
      {
      padding:5px 40px;
      }
      .navbar-brand:hover
      {
      background-color:#ffffff;
      }
      /* Hide the carousel text when the screen is less than 600 pixels wide */
      @media (max-width: 600px) {
      .carousel-caption {
      display: none; 
      }
      }
    </style>

<body>
    <style>
      .box
      {
      width: 100%;
      max-width: 1390px;
      border-radius: 5px;
      border:1px solid #ccc;
      padding: 15px;
      margin: 0 auto;                
      margin-top:50px;
      box-sizing:border-box;
      }
      
      
      #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a, #mainNav .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a {
    padding: 5px;
        padding-left: 1em;
}
    </style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Inventary Plus</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                <a class="nav-link" href="<?= base_url("index.php/Navigation/Invoice") ?>">
                    <i class="fa fa-fw fa-inr"></i>
                    <span class="nav-link-text">Invoice</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="<?= base_url("index.php/Navigation/Grn") ?>">
                    <i class="fa fa-fw fa-table"></i>
                    <span class="nav-link-text">GRN</span>
                </a>
            </li>
               <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-life-bouy"></i>
                    <span class="nav-link-text">Bill Search</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents2">
                    <li>
                        <a href="<?= base_url("index.php/Navigation/InvoiceSearch") ?>">Invoice</a>
                    </li>
                    <li>
                        <a href="<?= base_url("index.php/Navigation/GrnSearch") ?>">GRN</a>
                    </li>
                    <li>
                        <a href="<?= base_url("index.php/Navigation/Debitors") ?>">Debitors</a>
                    </li>
                     <li>
                        <a href="<?= base_url("index.php/Navigation/Creditors") ?>">Creditors</a>
                    </li>
                
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="<?= base_url("index.php/Navigation/Item") ?>">
                    <i class="fa fa-fw fa-list-alt"></i>
                    <span class="nav-link-text">Item</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-wrench"></i>
                    <span class="nav-link-text">Stock Configuration</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="<?= base_url("index.php/Navigation/Location") ?>">Location</a>
                    </li>
                    <li>
                        <a href="<?= base_url("index.php/Navigation/Country") ?>">Country</a>
                    </li>
                    <li>
                        <a href="<?= base_url("index.php/Navigation/Brand") ?>">Brand</a>
                    </li>
                    <li>
                        <a href="<?= base_url("index.php/Navigation/Type") ?>">Type</a>
                    </li>
                    <li>
                        <a href="<?= base_url("index.php/Navigation/Model") ?>">Model</a>
                    </li>
                 
                </ul>
            </li>
            
       
       
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
 
     
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>
    
</body>