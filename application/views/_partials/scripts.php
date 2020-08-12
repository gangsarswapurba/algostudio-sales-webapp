<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<!-- popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.4.4/umd/popper.min.js" integrity="sha512-eUQ9hGdLjBjY3F41CScH3UX+4JDSI9zXeroz7hJ+RteoCaY+GP/LDoM8AO+Pt+DRFw3nXqsjh9Zsts8hnYv8/A==" crossorigin="anonymous"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<!-- bootstrap -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<!-- datatables -->
<!-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/sp-1.1.1/sl-1.3.1/datatables.min.js"></script>
<!-- summernote -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.min.js"></script>
<!-- chartjs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
<script>
function getRandomInt(max) {
  return Math.floor(Math.random() * Math.floor(max));
}

var amount_orders = [];
var to_date = new Date().getDate();
var days_in_month = new Date(new Date().getYear(), new Date().getMonth(), 0).getDate();
var days_label = []

for (var i = 0; i < days_in_month; i++) {
  if (i < to_date) {
    amount_orders[i] = getRandomInt(10);
  } else {
    amount_orders[i] = 0;
  }
}

for (var j = 1; j <= days_in_month; j++) {
  days_label.push(j);
}

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: days_label,
        datasets: [{
            label: 'Penjualan tanggal ke #',
            data: amount_orders,
            borderWidth: 1,
            backgroundColor: '#71c7ec'
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
<!-- custom js-->
<?php $custom_js_file = base_url('assets/js/custom.js') ?>
<?php $created_time = filemtime(FCPATH . 'assets/js/custom.js') ?>
<script src="<?= $custom_js_file . '?v=' . $created_time ?>"></script>
