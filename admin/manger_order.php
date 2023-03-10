<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!----======== CSS ======== -->
<!--  <link rel="stylesheet" href="../style3.css">-->

  <!----===== Iconscout CSS ===== -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="admin1.css">
    <link rel="stylesheet" href="admin3.css">
    <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <!-- ================================================================================================== -->
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"
    />
    <!-- ================================================================================================== -->
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <!-- ================================================================================================== -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <!--<title>Admin Dashboard Panel</title>-->
</head>
<body>
<?php
require_once('nav.php');
require_once("../connect_db/connect_db.php");


$updateOrder = (isset($_GET['updateOrder'])) ? $_GET['updateOrder'] : '';
if ($updateOrder) {
    $upID = $_GET['updateOrder'];
    $sql_up = "select * from product where id= " . $upID . "";
    $query_up = mysqli_query($conn, $sql_up);
    $result_up = mysqli_fetch_array($query_up);
} else {
    $result_up['id'] = '';
    $result_up['title'] = '';
    $result_up['author_name'] = '';
    $result_up['publisher_name'] = '';
    $result_up['publication_date'] = '';
    $result_up['category'] = '';
    $result_up['price'] = '';
    $result_up['quantity'] = '';
    $result_up['thumbnail'] = '';
    $result_up['quantity'] = '';
    $result_up['description'] = '';

}


?>
<section class="dashboard">
  <div class="top">
    <i class="uil uil-bars sidebar-toggle"></i>

    <div class="search-box">
      <i class="uil uil-search"></i>
      <input type="text" placeholder="Search here...">
    </div>

    <!--<img src="images/profile.jpg" alt="">-->
  </div>
    <div class=" mb-4" style="padding-top: 70px; display: none">
        <div class="frms container" id="form-id">
                <div class="form-row">
<!--                    <div class="form-group col-md-4">-->
<!--                        <label for="code">M?? S???n Ph???m: </label>-->
<!--                        <input type="text" class="form-control" id="code" placeholder="Code" name="" value="">-->
<!--                    </div>-->
                    <div class="form-group col-md-4">
                        <label for="name">T??n nh???n h??ng </label>
                        <input type="text" class="form-control" id="name" placeholder="T??n s??ch" name="title" required="" value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="material">S??? ??i???n tho???i  </label>
                        <input type="text" class="form-control" id="material" placeholder="T??c gi???" name="author_name" required="" value="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="publisher_name"> ?????a ch???</label>
                        <input type="text" class="form-control" id="publisher_name" placeholder="Nh?? xu???t b???n" name="publisher_name" required="" value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="publication_date">T???ng ti???n </label>
                        <input type="number" class="form-control" id="entry" placeholder="Ng??y xu???t b???n" name="publication_date" required="" value="">
                    </div>
<!--                    <div class="form-group col-md-4">-->
<!--                        <label for="amount">S??ch  </label>-->
<!--                        <input type="text" class="form-control" id="amount" placeholder="Th??? Lo???i" name="category" required="" value="">-->
<!--                    </div>-->
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="amount">S??ch </label>
                        <input type="text" class="form-control" id="amount" placeholder="S??? l?????ng" name="" required="" value="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="amount">S??? l?????ng </label>
                        <input type="number" class="form-control" id="amount" placeholder="Gi?? ti???n" name="quantity" required="" value="">
                    </div>

                </div>
                <div class="form-group col-md-4">
                    <label for="publication_date">T???ng ti???n </label>
                    <input type="number" class="form-control" id="entry" placeholder="T???ng ti???n" name="publication_date" required="" value="">
                </div>
<!--                <div class="form-group col-md-3">-->
<!--                    <label for="image">H??nh S???n Ph???m: </label>-->
<!--                    <input type="file" class="form-control-file btn-outline-info" id="thumbnail" name="thumbnail" required="" value="">-->
<!--                </div>-->
<!--                <div class="form-group col-md-4">-->
<!--                    <label for="amount">M?? t??? </label>-->
<!--                    <textarea type="text" name="description" class="form-control" id="amount" placeholder="M?? t???" style="    width: 212%;    height: 108px;"> </textarea>-->
<!--                </div>-->
                <div class="text-center" id="actbutton">
                    <button type="submit" class="btn btn-outline-success btn-sm" id="add_new">C???p nh???t ????n h??ng</button>
                </div>
        </div>
    </div>
  <div class="dash-content">
    <div class="overview">
      <div class="activity">
        <div class="title">
          <i class="uil uil-clock-three"></i>
          <span class="text">Qu???n l?? ????n h??ng</span>
        </div>
          <div class="category-right-top-item">
              <select name="" id="" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value)">
                  <option value=""> L???c ????n h??ng theo t??i kho???n</option>
                  <option value="?filter_user=" <?php if(1){echo'selected';} ?> > T???t c??? ????n h??ng</option>
                  <?php
                  $filter_user = (isset($_GET['filter_user'])) ? $_GET['filter_user'] : '';
                  $sql_order="select * from customer where role_id=1";
                  $customer_query=mysqli_query($conn,$sql_order);
                  while ($row=mysqli_fetch_array($customer_query)){?>
                      <option value="?filter_user=<?php echo$row['id']; ?> " <?php if($filter_user==$row['id']){echo'selected';} ?>>  <?php echo $row['email']; ?></option>
                  <?php } ?>

              </select>

          </div>
          <style>
              .activity table td {
                  border: 1px solid rgba(0,0,0,0.1);
              }
          </style>
        <table width="100%" style="text-align: center" >
            <thead class="thead-light ">
          <tr >
                <th>M?? Order</th>
                <th>T??n nh???n h??ng</th>
                <th>Ng??y t???o</th>
                <th>S??T</th>
                <th>?????a ch???</th>
                <th>Ph????ng th???c thanh to??n</th>
                <th>Tr???ng th??i</th>
                <th>T???ng ti???n</th>
                <th>Chi ti???t </th>
<!--                <th>S???a</th>-->
                <th>T??nh N??ng</th>
          </tr>
            <?php

            $status = (isset($_GET['status'])) ? $_GET['status'] : '';
            if(isset($_GET['status'])) {
                if ($status == 0) {
                    $sql_status = " update order_1 set status = '0' where id='".$_GET['ID']."' ";
                } elseif ($status == 1) {
                    $sql_status = " update order_1 set status = '1' where id='".$_GET['ID']."' ";
                }elseif( $status == 2){
                    $sql_status = " update order_1 set status = '2' where id='".$_GET['ID']."' ";
                }else{
                    $sql_status = " update order_1 set status = '3' where id='".$_GET['ID']."' ";
                }
                mysqli_query($conn,$sql_status);
            }
            ?>

            <?php

            $sql_filter_user="select * from order_1 where user_id like '%$filter_user'";
            $filter_user_query=mysqli_query($conn,$sql_filter_user);
            while ($row=mysqli_fetch_array($filter_user_query)){?>
            <tr>
                <td> <?php echo $row['id'] ?></td>
                <td> <?php echo $row['full_name'] ?></td>
                <td> <?php echo date('d/m/Y',strtotime($row['order_date'])) ?></td>
                <td> <?php echo $row['phone_number'] ?></td>
                <td> <?php echo $row['address'].'-sdt:'.$row['phone_number'] ?> </td>
                <td> COD</td>
                <?php

                ?>
                <td>  <select class="form-control" name="" id="" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value)" >
                        <option value="?status=0&ID=<?php echo $row['id']; ?>&filter_user=<?php echo$filter_user ?>" <?php if( $row['status']==0 ){ echo "selected"; } ?> <div> Ch??? </div> </option>
                        <option value="?status=1&ID=<?php echo $row['id']; ?>&filter_user=<?php echo$filter_user ?>" <?php if($row['status']==1){ echo "selected"; } ?> > <div> Ch???p Nh???n </div></option>
                        <option value="?status=2&ID=<?php echo $row['id']; ?>&filter_user=<?php echo$filter_user ?>" <?php if($row['status']==2){ echo "selected"; } ?> ><div> Ho??n Th??nh </div></option>
                        <option value="?status=3&ID=<?php echo $row['id']; ?>&filter_user=<?php echo$filter_user ?>"<?php if($row['status']==3){ echo "selected"; } ?> ><div> H???y </div></option>

                    </select>
                </td>
                <td>
                    <a><?php echo $row['total_money'] ?><sup>??</sup></a>
                </td>
                <td>
                    <table style="width: 345px;">
<!--                        <tr>-->
<!--                            <th> Sach </th>-->
<!--                            <th>So Luong</th>-->
<!---->
<!--                        </tr>-->
                    <?php $sql_product ="SELECT product_id , quantity FROM order_detail WHERE order_id = ".$row['id']." ";
                        $product_query=mysqli_query($conn,$sql_product);
                        while ($row1=mysqli_fetch_array($product_query)){
                                $sql_product1 ="SELECT title FROM product WHERE id = ".$row1['product_id']." ";

                                $product_query1=mysqli_query($conn,$sql_product1);
                                $row2=mysqli_fetch_array($product_query1);
                                ?>

                                <tr>
                                    <td><?php echo $row2['title'].' - soluong: '.$row1['quantity']  ?></td>
<!--                                    --><?php //echo $row1['quantity'] ?>

                                </tr>

                            <?php } ?>
                    </table>
                 </td>
<!--                <td><a href="manger_order.php?updateOrder=--><?php //echo$row['id'] ?><!--">S</a></td>-->
                <td>
<!--                    <a href="delete_order.php?delete=--><?php //echo $row['id']  ?><!--"  onclick="return confirm('b???n c?? ch???c mu???n xo?? ????n n??y ?')">X</a>-->

                    <a href="delete_order.php?delete=<?php echo $row['id']  ?>" onclick="return confirm('b???n c?? ch???c mu???n xo?? ????n h??ng n??y ?')" >
                        <button class="btn btn-primary btn-sm trash" title="X??a" ><i
                                class="fas fa-trash-alt" style="color: white"></i>
                        </button>
                    </a>
                </td>

            </tr>
            <?php } ?>

            </thead>
        </table>
      </div>
    </div>
</section>
<script src="admin.js"></script>

<!--<script src="script.js"></script>-->
</body>
</html>