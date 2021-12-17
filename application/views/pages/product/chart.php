<?php
$this->db->select('title, price');
$dataGrafikProduk = $this->db->get('product')->result();
foreach ($dataGrafikProduk as $key => $value) {
  $arrProd[] = ['label' => $value->title, 'y' => $value->price];
}
// print_r(json_encode($arrProd, JSON_NUMERIC_CHECK));
// die();
?>

<main role="main" class="container">

  <div class="row">
    <div class="col-md-10 mx-auto">
      <?php $this->load->view('layouts/_alert') ?>
    </div>
  </div>

  <div class="row">
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-header">
          <span>Grafik Produk</span>
        </div>
        <div class="card-body">
          <script type="text/javascript">
            window.onload = function() {

              var chart = new CanvasJS.Chart("chartContainer", {
                theme: "light1", // "light2", "dark1", "dark2"
                animationEnabled: false, // change to true		
                title: {
                  text: "District KPOP"
                },
                data: [{
                  // Change type to "bar", "area", "spline", "pie",etc.
                  type: "column",
                  dataPoints: <?= json_encode($arrProd, JSON_NUMERIC_CHECK); ?>

                }]
              });
              chart.render();

            }
          </script>
        </div>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
      </div>
    </div>
  </div>
</main>