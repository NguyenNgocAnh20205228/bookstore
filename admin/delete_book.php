<?php
require_once "../connect_db/connect_db.php";

$book_id=$_GET['id'];
$sql1 = "
             DELETE FROM product WHERE id = '".$book_id."';
              ";

$kq1 = mysqli_query($conn, $sql1);
echo "
            <script type='text/javascript'>
                window.alert('Bạn đã xoá sách thành công!');
                window.location.href='manger_book.php';
            </script>
    ";