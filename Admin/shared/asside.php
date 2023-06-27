<?php


?>


<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/Horus/Admin/index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <?php if ($_SESSION['admin-data']['ruleID'] == 1) : ?>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">



                    <li>
                        <a href="/Horus/Admin/listAdmin.php">
                            <i class="bi bi-circle"></i><span>List Admins</span>
                        </a>
                    </li>

                    <li>
                        <a href="/Horus/Admin/addAdmin.php">
                            <i class="bi bi-circle"></i><span>Add Admin</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Admin Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#bus-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Buses</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="bus-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">



                    <li>
                        <a href="/Horus/bus/addPlace.php">
                            <i class="bi bi-circle"></i><span>Add New Place </span>
                        </a>
                    </li>
                    <li>
                        <a href="/Horus/bus/addDirection.php">
                            <i class="bi bi-circle"></i><span>Add New Direction </span>
                        </a>
                    </li>
                    <li>
                        <a href="/Horus/bus/addBus.php">
                            <i class="bi bi-circle"></i><span>Add New Bus </span>
                        </a>
                    </li>
                    <li>
                        <a href="/Horus/bus/listPlaces.php">
                            <i class="bi bi-circle"></i><span>List Places </span>
                        </a>
                    </li>
                    <li>
                        <a href="/Horus/bus/listDirections.php">
                            <i class="bi bi-circle"></i><span>List Directions </span>
                        </a>
                    </li>
                    <li>
                        <a href="/Horus/bus/listBus.php">
                            <i class="bi bi-circle"></i><span>List Buses</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Horus/bus/seat.php">
                            <i class="bi bi-circle"></i><span>List Seats</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End user Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">



                    <li>
                        <a href="/Horus/user/listUser.php">
                            <i class="bi bi-circle"></i><span>List Users</span>
                        </a>
                    </li>

                    <li>
                        <a href="/Horus/user/addUser.php">
                            <i class="bi bi-circle"></i><span>Add User</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Problems</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li>
                        <a href="/Horus/user/listUser.php">
                            <i class="bi bi-circle"></i><span>List Users</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link collapsed" href="/Horus/user/transactions.php">
                <i class="bi bi-menu-button-wide"></i>
                <span>Transactions</span>
            </a>
        </li><!-- End user Nav -->
        <?php else : ?>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">



                    <li>
                        <a href="/Horus/user/listUser.php">
                            <i class="bi bi-circle"></i><span>List Users</span>
                        </a>
                    </li>

                    <li>
                        <a href="/Horus/user/addUser.php">
                            <i class="bi bi-circle"></i><span>Add User</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Bus Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#bus-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Buses</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="bus-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">



                    <li>
                        <a href="/Horus/Admin/addPlace.php">
                            <i class="bi bi-circle"></i><span>Add New Place </span>
                        </a>
                    </li>
                     <li>
                        <a href="/Horus/Admin/addBus.php">
                            <i class="bi bi-circle"></i><span>Add New Bus </span>
                        </a>
                    </li>

                  

                </ul>
            </li><!-- End Bus Nav -->


        <?php endif; ?>





        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="/Horus/Admin/profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="/Horus/Admin/contact.php">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

        




    </ul>

</aside><!-- End Sidebar-->