<?php
// 1. Hubungkan ke database
include('koneksi.php');

// 2. Tentukan berapa data per halaman
$page_rows = 5; 

// 3. Cek ada di halaman berapa sekarang (default ke 1 jika kosong)
$pagenum = isset($_GET['pn']) ? $_GET['pn'] : 1;

if ($pagenum < 1) {
    $pagenum = 1;
}

// 4. Hitung total baris data di database
$sql_count = "SELECT COUNT(userid) FROM user";
$query_count = mysqli_query($conn, $sql_count);
$row_count = mysqli_fetch_row($query_count);
$rows = $row_count[0];

// 5. Hitung halaman terakhir (Last Page)
$last = ceil($rows / $page_rows);

if ($last < 1) {
    $last = 1;
}

// Pastikan pagenum tidak melebihi halaman terakhir
if ($pagenum > $last) {
    $pagenum = $last;
}

// 6. Buat query LIMIT (Data yang akan ditampilkan di tabel)
// Rumus: LIMIT (halaman_sekarang - 1) * jumlah_per_halaman, jumlah_per_halaman
$limit = 'LIMIT ' . ($pagenum - 1) * $page_rows . ',' . $page_rows;

// Ini variabel $nquery yang dipanggil di index.php
$nquery = mysqli_query($conn, "SELECT * FROM user ORDER BY userid DESC $limit");

// 7. Buat Logika Tombol Pagination ($paginationCtrls)
$paginationCtrls = '';

if ($last != 1) {
    
    // Jika bukan halaman 1, tampilkan tombol Previous
    if ($pagenum > 1) {
        $previous = $pagenum - 1;
        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'" class="btn btn-default">Previous</a> &nbsp; ';
        
        // Render angka halaman kiri
        for ($i = $pagenum - 4; $i < $pagenum; $i++) {
            if ($i > 0) {
                $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-default">'.$i.'</a> &nbsp; ';
            }
        }
    }

    // Angka halaman saat ini (Aktif)
    // Class ini nanti di-replace oleh script di index.php menjadi style biru
    $paginationCtrls .= '<span class="btn btn-primary">'.$pagenum.'</span> &nbsp; ';

    // Render angka halaman kanan
    for ($i = $pagenum + 1; $i <= $last; $i++) {
        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'" class="btn btn-default">'.$i.'</a> &nbsp; ';
        if ($i >= $pagenum + 4) {
            break;
        }
    }

    // Jika bukan halaman terakhir, tampilkan tombol Next
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'" class="btn btn-default">Next</a> ';
    }
}
?>