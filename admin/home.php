<?php

include "proses/connect.php";

$query_chart = mysqli_query($conn,"SELECT nama,tb_penjualan.*,bayar.waktu_bayar,tb_pelanggan.nama_pelanggan, tb_produk.id_produk, SUM(harga*jumlah_produk) AS harganya, SUM(tb_detailpjl.jumlah_produk) AS total_jumlah FROM tb_produk 
LEFT JOIN tb_detailpjl ON tb_detailpjl.produk_id = tb_produk.id_produk
LEFT JOIN tb_penjualan ON tb_penjualan.id_penjualan = tb_detailpjl.penjualan_id
LEFT JOIN tb_pelanggan ON tb_pelanggan.id_pelanggan = tb_penjualan.pelanggan_id
JOIN bayar ON bayar.id_bayar = tb_penjualan.id_penjualan
GROUP BY tb_produk.id_produk ORDER BY tb_produk.id_produk ASC ");

while ($record_chart = mysqli_fetch_array($query_chart)) {
    $result_chart[] = $record_chart;
}
if(empty($result_chart)) {
    $pesan = "<b>Selamat Datang ".$_SESSION['nama_admin']."</b> <br> Tidak dapat menampilkan chart <b>Karena</b> tidak ada produk yang terjual";
}else{
$array_menu = array_column($result_chart,"nama");
$array_menu_qoute = array_map(function ($menu){
  return "'". $menu ."'";
}, $array_menu);
$string_menu = implode(",", $array_menu_qoute);

$array_jumlah_pesanan = array_column($result_chart, "total_jumlah");
$string_jumlah_pesanan = implode(',', $array_jumlah_pesanan);
}
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Admin Dashboard</h4>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                                <h4>Welcome Back, <?php echo $_SESSION['nama_admin'] ?></h4>
                                                <p class="mb-0">Admin Dashboard, Kasir</p>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-end text-end">
                                            <img src="asset/image/customer-support.jpg" class="img-fluid illustration-img"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 d-flex">  
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                        <?php if (empty($result_chart)) { ?>
                                            
                                                <h5 class="">Home</h5>
                                                <div class="">
                                                    <p class=""> <?php echo (empty($result_chart)) ? $pesan : "" ; ?> </p>
                                                </div>
                                            
                                            <?php }else{ ?>
                                                <div>
                                                    <canvas id="myChart"></canvas>
                                                </div>
                                                <script>
                                                    const ctx = document.getElementById('myChart');

                                                    new Chart(ctx, {
                                                        type: 'bar',
                                                        data: {
                                                            labels: [<?php echo $string_menu ?>],
                                                            datasets: [{
                                                                label: 'Jumlah produk terjual',
                                                                data: [<?php echo $string_jumlah_pesanan ?>],
                                                                borderWidth: 1,
                                                                backgroundColor:['rgba(255, 0, 0, 0.39)', 'rgba(0, 0, 255, 0.37)', 'rgba(231, 255, 0, 0.37)', 'rgba(0, 255, 3, 0.37)', 'rgba(236, 0, 255, 0.37)', 'rgba(255, 189, 0, 0.37)']
                                                            }]
                                                        },
                                                        options: {
                                                            scales: {
                                                                y: {
                                                                    beginAtZero: true
                                                                }
                                                            }
                                                        }
                                                    });
                                                </script>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                   <?php if (empty($result_chart)) {
                    echo "<b>Tidak dapat menampilkan <b>Tabel Penjualan</b> Karena tidak ada <b>Data Penjualan</b></b>";
                    } else {
                    foreach ($result_chart as $row) {
                    ?>

                    <?php 
                    }
                    ?>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Tabel Penjualan
                            </h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Id Penjualan</th>
                                    <th scope="col">Tanggal Penjualan</th>
                                    <th scope="col">Waktu Bayar</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Pelanggan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                foreach ($result_chart as $row) {
                                ?>
                                    <tr>
                                    <th scope="row">
                                        <?php echo $no++ ?>
                                    </th>
                                    <td>
                                        <?php echo $row['id_penjualan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['tanggal_penjualan'] ?>
                                    </td>
                                    <td>
                                        <?php echo date('d/m/Y H:i:s', strtotime($row['waktu_bayar'])) ?>
                                    </td>
                                    <td>
                                        <?php echo 'Rp ', number_format($row['harganya'], 2, ',', '.')  ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nama_pelanggan'] ?>
                                    </td>
                                    </tr>

                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </main>