<style>
.cool-link {
    display: inline-block;
    color: #000;
    text-decoration: none;
}

.cool-link::after {
    content: '';
    display: block;
    width: 0;
    height: 2px;
    background: #FEC625;
    transition: width .3s;
}

.cool-link:hover::after {
    width: 100%;
    //transition: width .3s;
}
</style>
<div class="container">
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-white fixed-top">
            <div class="container"> <a class="navbar-brand d-flex align-items-center" href="#" style="color: #191919;">
                <img src="images/logo.svg" alt="logo" class="mr-1" width="40px">  
            <span class="ml-3 font-weight-bold  d-none d-md-block" style="font-size:14px">HALAMAN ADMIN </span> 
              <span class="ml-3 font-weight-bold d-md-none" style="font-size:10px"> </span>
            </a> <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse" data-target="#navbar4">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar4">
            <ul class="navbar-nav mr-auto pl-lg-4">
            </ul>
            <ul class="navbar-nav ml-auto mt-3 mt-lg-0">
                <li class="nav-item px-lg-2  mt-2" > <a class="nav-link cool-link" href="index.php"> <span class="d-inline-block d-lg-none icon-width" style="font-family: 'Lato', sans-serif;"><i class="fa fa-home"></i></span><b style="font-family: 'Lato', sans-serif; font-size:13px" class="navbarx">HOME</b></a> </li>                        
                  <li class="nav-item px-lg-2 active dropdown d-menu mt-2">
                            <a class="nav-link cool-link" href="profil.php" aria-haspopup="true" aria-expanded="false"><span class="d-inline-block d-lg-none icon-width"><i class="fa fa-user"></i></span><b style="font-family: 'Lato', sans-serif; font-size:13px" class="navbarx">DATA UTAMA</b>
                          
                            <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                            </a>
                            </li>
                            <li class="nav-item  px-lg-2 active dropdown d-menu mt-2">
                            <a class="nav-link cool-link" href="datakegiatan.php" aria-haspopup="true" aria-expanded="false"><span class="d-inline-block d-lg-none icon-width"><i class="fa fa-book"></i></span><b style="font-family: 'Lato', sans-serif; font-size:13px" class="navbarx ">TRANSAKSI </b>
                          
                            <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                            </a>
                            </li>
                            <li class="nav-item px-lg-2 active dropdown d-menu mt-2">
                            <a class="nav-link cool-link" href="datapublikasi.php" aria-haspopup="true" aria-expanded="false"><span class="d-inline-block d-lg-none icon-width"><i class="fa fa-book"></i></span><b style="font-family: 'Lato', sans-serif; font-size:13px" class="navbarx ">LAPORAN</b>
                          
                            <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                            </a>
                            </li>
                           
                            
                            <li class="nav-item px-lg-2 active dropdown d-menu mt-2">
                            <a class="nav-link cool-link" href="aksi/logout.php" aria-haspopup="true" aria-expanded="false"><span class="d-inline-block d-lg-none icon-width"><i class="fa fa-sign-out"></i></span><b style="font-family: 'Lato', sans-serif; font-size:13px" class="navbarx "> LOG OUT</b>
                            <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                            </a>
                            </li>
                         
                            </div>
                                

            </ul>
            </div>
            </div>
            </nav>
    </div>