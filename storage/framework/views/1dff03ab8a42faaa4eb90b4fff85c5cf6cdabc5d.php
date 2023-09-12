<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="" href="" />
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <style type="text/css">
        * {
            font-size: 14px;
            line-height: 24px;
            font-family: 'Ubuntu', sans-serif;
            text-transform: capitalize;
        }
        .btn {
            padding: 7px 10px;
            text-decoration: none;
            border: none;
            display: block;
            text-align: center;
            margin: 7px;
            cursor:pointer;
        }

        .btn-info {
            background-color: #999;
            color: #FFF;
        }

        .btn-primary {
            background-color: #6449e7;
            color: #FFF;
            width: 100%;
        }
        tr {border-bottom: 1px dotted #ddd;}
        td,th {padding: 7px 0;}

        th, td {
        text-align: center; /* Mengatur isi sel berada di tengah */
    }

        table {width: 100%;}
        tfoot tr th:first-child {text-align: left;}

        .centered {
            text-align: center;
            align-content: center;
        }
        small{font-size:11px;}

        

    @media print {
        * {
            font-size: 12px; /* Ukuran font yang sesuai untuk cetak */
            line-height: 18px; /* Jarak antara baris yang sesuai untuk cetak */
        }
        body {
            max-width: 100%; /* Pastikan konten tidak melebihi lebar halaman saat mencetak */
            margin: 0; /* Hapus margin yang tidak perlu saat mencetak */
            padding: 0; /* Hapus padding yang tidak perlu saat mencetak */
        }
        .hidden-print {
            display: none; /* Sembunyikan elemen yang tidak perlu saat mencetak */
        }
        table {
            border-collapse: collapse; /* Gabungkan batas sel tabel untuk mencetak yang lebih rapi */
        }
        th, td {
            padding: 5px; /* Kurangi padding untuk sel tabel agar tidak memakan banyak ruang */
        }
    }

    </style>
  </head>
<body>

<div style="max-width:400px;margin:0 auto">
    
    <div class="hidden-print">
        <table>
            <tr>
                <td><a href="<?php echo e(route('pos.index')); ?>" class="btn btn-info"><i class="fa fa-arrow-left"></i> Back</a> </td>
                <td><button onclick="window.print();" class="btn btn-primary"><i class="dripicons-print"></i> Print</button></td>
            </tr>
        </table>
        <br>
    </div>
        
    <div id="receipt-data">
        <div class="centered">
            
            
            <p>Address: Jl. sesama
                <br>no telepon: 089232420
            </p>
            <p>PT Tokopedia</p>
        </div>
        <p>Tanggal: <?php echo e($tanggalFormatted); ?><br>
            no referensi: <?php echo e($receipt_first->receipt_no); ?><br>
            Customer: <?php echo e($receipt_first->customer_name); ?>

        </p>


        <table>
            <thead>
                <tr>
                    <th>no</th>
                    <th>product name</th>
                    <th>price</th>
                    <th>qty</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $receipts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receipt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($receipt->name_product); ?></td>
                    <td>Rp. <?php echo e(number_format($receipt->price)); ?></td>
                    <td><?php echo e($receipt->qty); ?></td>
                    <td>Rp. <?php echo e(number_format($receipt->total_price)); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr style="background-color:aquamarine">
                    <td colspan="4" style="text-align:left">Purchase</td>
                    <td>Rp. <?php echo e(number_format($total_price_receipt)); ?></td>
                </tr>
                <tr style="background-color:#FFD9B7">
                    <td colspan="4" style="text-align:left">Biaya Layanan</td>
                    <td>Rp. 0</td>
                </tr>
                <tr style="background-color:#FCBAAD">
                    <td colspan="4" style="text-align:left">PPN</td>
                    <td>Rp. 0</td>
                </tr>
                <tr style="background-color:#FFE17B">
                    <td colspan="4" style="text-align:left">Grand Total</td>
                    <td>Rp. <?php echo e(number_format($total_price_receipt)); ?></td>
                </tr>
                <tr style="background-color:#D5FFD0">
                    <td colspan="4" style="text-align:left">Customer Money</td>
                    <td>Rp. <?php echo e(number_format($receipt_first->customer_money)); ?></td>
                </tr>
                <tr style="background-color:#F0B86E">
                    <td colspan="4" style="text-align:left">Change Cashier</td>
                    <td>Rp. <?php echo e(number_format($receipt_first->change_cashier)); ?></td>
                </tr>
            </tbody>
        </table>
        
        
        <p>terimakasih telah berbelanja di tempat kami</p>
        <p>Struk ini adalah bukti pembayaran yang sah</p>
    </div>
</div>

<script type="text/javascript">
        window.print()
</script>

</body>
</html>
<?php /**PATH C:\laragon\www\posserverterbaru\resources\views/receipt/print-receipt.blade.php ENDPATH**/ ?>