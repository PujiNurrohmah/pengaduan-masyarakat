<?php 
include 'koneksi.php';

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function registrasi($data){
	global $conn;
	$nik = $data["nik"];
	$nama = $data["nama"];
	$username = $data["username"];
	$password = $data["password"];
	$telp = $data["telp"]; 

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM masyarakat WHERE username='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
              alert('Username sudah terdaftar');
          </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO masyarakat 
                  VALUES
                  ('','$nik','$nama','$username','$password','$telp')");
    return mysqli_affected_rows($conn);


}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    
    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu');
             </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar');
             </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 20000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar');
            </script>";
        return false;
    }

    // lolos pengecekan,gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/bukti/' . $namaFileBaru);
    return $namaFileBaru;

}


function kirimPengaduan($data){
    global $conn;
    $tgl_pengaduan = date("Y-m-d");
    $nik = $data["nik"];
    $isi_laporan = $data["isi_laporan"];

    // upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO pengaduan VALUES ('','$tgl_pengaduan','$nik','$isi_laporan','$gambar','proses')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);

}

function updatePengaduan($data){
    global $conn;
    $id_pengaduan = $data["id_pengaduan"];
    $tgl_pengaduan = date("Y-m-d");
    $tanggapan = $data["tanggapan"];
    $id_petugas = $data["id_petugas"];
    $nik = $data["nik"];

    mysqli_query($conn,"UPDATE pengaduan SET status = 'selesai' WHERE id_pengaduan = '$id_pengaduan'");

    $query = "INSERT INTO tanggapan VALUES ('','$id_pengaduan','$tgl_pengaduan','$tanggapan','$id_petugas','$nik')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}