<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Data Siswa</title>
    <link rel="stylesheet" href="style-index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="logo smk brantas.png" alt="SMK BRANTAS KARANGKATES">
            <h2>Pendaftaran Peserta Didik Baru</h2>
        </div>

        <ul>
            <li>
                <a href="input.php">
                    <i class='bx bx-clipboard'></i>
                    <span class="links_name">Tambah Data</span>
                </a>
            </li>
            <li>
                <a href="index.php">
                    <i class='bx bxs-user' ></i>
                    <span class="links_name">Data Siswa</span>
                </a>
            </li>
        </ul>
    </nav>
    <div class="header">
    <img src="graduated.png">
    <h2>DATA SISWA</h2>
    </div>
        <table>
            <tr style="text-align:center;font-weight:bold;background-color:#279EFF;">
                <td>No</td>
                <td>ID</td>
                <td>Nama</td>
                <td>Asal Sekolah</td>
                <td>Jenis Kelamin</td>
                <td>Alamat</td>
                <td>Agama</td>
                <td>Jurusan</td>
                <td>Opsi</td>
            </tr>
            <?php 
                include 'config.php';
                $no = 1;
                $select = mysqli_query($koneksi, "select * from siswa");
                if (mysqli_num_rows($select) > 0) {
                    while ($hasil = mysqli_fetch_array($select)) {
                        ?>
                        <tr style="text-align:center;">
                            <td>
                                <?php echo $no++ ?>
                            </td>
                            <td>
                                <?php echo $hasil['id'] ?>
                            </td>
                            <td>
                                <?php echo $hasil['nama'] ?>
                            </td>
                            <td>
                                <?php echo $hasil['asal_sekolah'] ?>
                            </td>
                            <td>
                                <?php echo $hasil['jenis_kelamin'] ?>
                            </td>
                            <td>
                                <?php echo $hasil['alamat'] ?>
                            </td>
                            <td>
                                <?php echo $hasil['agama'] ?>
                            </td>
                            <td>
                                <?php echo $hasil['jurusan'] ?>
                            </td>
                            <td>
                                <a href="update.php?id=<?php echo $hasil['id'] ?>"><i class='bx bx-edit'></i>Edit</a> ||
                                <a href="delete.php" data-id="<?php echo $hasil['id'] ?>" class="delete-button"><i class='bx bx-trash'></i>Delete</a><!--dihapus dari id-->
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                <tr>
                    <td colspan="9" align="center">Data Kosong</td>
                </tr> 
            <?php } ?>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    $('.delete-bbutton').on('click', function (event){
                        event.preventDefault();
                        var id = $(this).data('id');

                            Swal.fire({
                                title: "Are you sure?",
                                text: "You won't be able to revert this!",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonText: "Yes, delete it!",
                                cancelButtonText: "No, cancel!",
                                reverseButtons: true
                        }).then((result)=> {
                            if (result.isConfirmed) {
                            window.location.href = "delete.php?id=" + id;
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                            Swal.fire({
                                title: "Cancelled",
                                text: "Your imaginary file is safe :)",
                                icon: "error"
                            });
                        }
                    });
                });
            });
            </script>
        </table>
</body>
</html>