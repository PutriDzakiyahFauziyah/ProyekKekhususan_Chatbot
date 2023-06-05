<?php

// Persiapan koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "csv_db 6") or die("Database Error");

// Ambil pesan dari AJAX
$getMesg = mysqli_real_escape_string($conn, $_POST['isi_pesan']);

// Cek pertanyaan ke dalam tabel
$check_data = mysqli_query($conn, "SELECT answers FROM faqs WHERE questions LIKE '%$getMesg%' ");

// Jika pertanyaan/data ditemukan, maka tampilkan jawaban
if(mysqli_num_rows($check_data) > 0){
    // Hasil query tampung ke dalam variabel data
    $fetch_data = mysqli_fetch_assoc($check_data);

    // Tampung jawaban ke dalam variabel untuk dikirim kembali ke ajax
    $replay = $fetch_data['answers'];
    echo $replay;
}else{
    echo "Maaf, kami tidak mengerti pertanyaan anda";
}

?>