<?php
include 'shared/head.php';
include '../app/functions.php';
include '../app/config.php';
include 'shared/header.php';
include 'shared/asside.php';

$select = "SELECT count(*) as total_users FROM users";
$s = mysqli_query($conn , $select);
$row = mysqli_fetch_assoc($s);

$select1 = "SELECT count(*) as total_directions FROM main_directions";
$s1 = mysqli_query($conn , $select1);
$row1 = mysqli_fetch_assoc($s1);

$select2 = "SELECT count(*) as total_places FROM places";
$s2 = mysqli_query($conn , $select2);
$row2 = mysqli_fetch_assoc($s2);

$select3 = "SELECT count(*) as total_buses FROM main_direction_1";
$s3 = mysqli_query($conn , $select3);
$row3  = mysqli_fetch_assoc($s3);



auth_admin(2);

?>


<!-- Start loading page -->
<div class="loading-spiner">
  <span class="loader"></span>
</div>
<!-- End loading page -->



<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Total Places</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-house-exclamation"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $row2['total_places'] ?> </h6>
                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">  Buses <span>| Directions</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-bus-front"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $row1['total_directions'] ?> <span> | <?= $row3['total_buses'] ?></span></h6>
                    <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Users </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $row['total_users'] ?></h6>
                    <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">



        <!-- Website Traffic -->
        <div class="card">
      

          <div class="card-body pb-0">
            <h5 class="card-title">Website Traffic </h5>

            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Access From',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                        value: <?= $row['total_users'] ?>,
                        name: 'Total Users'
                      },
                      {
                        value:<?= $row3['total_buses'] ?> ,
                        name: 'Directions'
                      },
                      {
                        value: <?= $row1['total_directions'] ?>,
                        name: 'buses'
                      },
                      {
                        value: <?= $row2['total_places'] ?>,
                        name: 'Places'
                      }
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div><!-- End Website Traffic -->


      </div><!-- End Right side columns -->

    </div>
  </section>

</main><!-- End #main -->





<?php
include 'shared/footer.php';
include 'shared/script.php';

?>