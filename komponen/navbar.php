<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <a href=""><i class="fa fa-window-close text-success" id="menu-toggle"></i> </a><b class="ml-2 text-success d-none d-md-block" style=" font-size:14px;">SISTEM INFORMASI INVETORY BARANG TB.AMANAH </b><b class="ml-2 text-success d-md-none text-left" style=" font-size:10px;">SISTEM INFORMASI INVETORY <br>BARANG TB.AMANAH </b>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                                <a class="nav-link mt-1" href="#!">
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#!" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src=" <?php if($sesen_hak_akses !== 'pemilik'){
                                    echo "images/user.png"; } else {
                                        echo "images/pemilik.png"; }  ?>" width="30px" alt="" class="mr-1" srcset=""> <?= $sesen_username ?> <b class="text-success"><?= $sesen_hak_akses ?></b></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     <?php if($sesen_hak_akses == 'superadmin'){
                                    echo "
                                    <a class='dropdown-item' href='datauser.php'>Profil</a>
                                    <a class='dropdown-item' href='#!'>Ganti Password</a>"; } ?>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!" id="jam"> </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="aksi/logout.php">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>