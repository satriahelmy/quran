<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- <div class="user-panel">
            <div class="pull-left image">
                <img src="asset/adminlte/dist/img/propic.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="treeview" id="nav-dashboard">
                <a href="{{url('dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview" id="nav-list-jenis_jabatan">
                <a href="#">
                    <i class="fa fa-user"></i> <span>User</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id='nav-list-jenis_jabatan'><a href="{{url('users')}}"><i class='fa fa-circle-o'></i> Daftar User</a></li>
                    <li id='nav-list-jenis_jabatan'><a href="{{url('users/create')}}"><i class='fa fa-circle-o'></i> Tambah User</a></li>
                </ul>
            </li>
            <li class="treeview" id="nav-list-jenis_jabatan">
                <a href="#">
                    <i class="fa fa-home"></i> <span>Unit</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id='nav-list-jenis_jabatan'><a href="{{url('units')}}"><i class='fa fa-circle-o'></i> Daftar Unit</a></li>
                    <li id='nav-list-jenis_jabatan'><a href="{{url('unit/create')}}"><i class='fa fa-circle-o'></i> Tambah Unit</a></li>
                </ul>
            </li>
            <li class="treeview" id="nav-list-jenis_jabatan">
                <a href="#">
                    <i class="fa fa-money"></i> <span>Cost Review</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id='nav-list-jenis_jabatan'><a href="{{url('groups')}}"><i class='fa fa-circle-o'></i> Per Group</a></li>
                    <li id='nav-list-jenis_jabatan'><a href="{{url('accounts')}}"><i class='fa fa-circle-o'></i> Per Account</a></li>
                </ul>
            </li>
            <!-- <li class="treeview" id="nav-list-jenis_jabatan">
                <a href="#">
                    <i class="fa fa-file"></i> <span>Account</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id='nav-list-jenis_jabatan'><a href="{{url('accounts')}}"><i class='fa fa-circle-o'></i> Daftar Account</a></li>
                    <li id='nav-list-jenis_jabatan'><a href="{{url('account/create')}}"><i class='fa fa-circle-o'></i> Tambah Account</a></li>
                    <li id='nav-list-jenis_jabatan'><a href="{{url('account/import')}}"><i class='fa fa-circle-o'></i> Import Account</a></li>
                </ul>
            </li>
            <li class="treeview" id="nav-list-jenis_jabatan">
                <a href="#">
                    <i class="fa fa-clone"></i> <span>Group Account</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id='nav-list-jenis_jabatan'><a href="{{url('groups')}}"><i class='fa fa-circle-o'></i> Daftar Group Account</a></li>
                    <li id='nav-list-jenis_jabatan'><a href="{{url('group/create')}}"><i class='fa fa-circle-o'></i> Tambah Group Account</a></li>
                </ul>
            </li> -->
            <li class="treeview" id="nav-list-jenis_jabatan">
                <a href="#">
                    <i class="fa fa-download"></i> <span>Details Account</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id='nav-list-jenis_jabatan'><a href="{{url('account_details')}}"><i class='fa fa-circle-o'></i> Daftar Detail Akun</a></li>
                    <li id='nav-list-jenis_jabatan'><a href="{{url('account_detail/create')}}"><i class='fa fa-circle-o'></i> Tambah Detail Akun</a></li>
                </ul>
            </li>
            <li class="treeview" id="nav-list-jenis_jabatan">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i> <span>KWH Jual</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id='nav-list-jenis_jabatan'><a href="{{url('kwhjual')}}"><i class='fa fa-circle-o'></i> Daftar KWH Jual</a></li>
                </ul>
            </li>
            <li class="treeview" id="nav-list-jenis_jabatan">
                <a href="#">
                    <i class="fa fa-arrows-alt"></i> <span>Target</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id='nav-list-jenis_jabatan'><a href="{{url('target')}}"><i class='fa fa-circle-o'></i> Daftar Target</a></li>
                </ul>
            </li>
            <li class="treeview" id="nav-list-jenis_jabatan">
                <a href="#">
                    <i class="fa fa-angellist"></i> <span>Komitmen</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id='nav-list-jenis_jabatan'><a href="{{url('komitmen')}}"><i class='fa fa-circle-o'></i> Daftar Komitmen</a></li>
                </ul>
            </li>
            <li class="treeview" id="nav-list-jenis_jabatan">
                <a href="#">
                    <i class="fa fa-server"></i> <span>PSA</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id='nav-list-jenis_jabatan'><a href="{{url('psa')}}"><i class='fa fa-circle-o'></i> Daftar PSA</a></li>
                </ul>
            </li>
            <li class="treeview" id="nav-list-jenis_jabatan">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Admin</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id='nav-list-jenis_jabatan'><a href="{{url('inisialisasi')}}"><i class='fa fa-circle-o'></i> Inisialisasi</a></li>
                </ul>
            </li>
            <!-- <li class="treeview" id="nav-list-jenis_jabatan">
                <a href="#">
                    <i class="fa fa-server"></i> <span>Report</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id='nav-list-jenis_jabatan'><a href="{{url('report/group')}}"><i class='fa fa-circle-o'></i> Report Group</a></li>
                </ul>
            </li> -->
        </ul>
    </section>
</aside>