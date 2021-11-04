<h3 style="text-align: center;">Liệt kê đơn hàng</h3>

<?php
    if(!empty($_GET['msg'])){
        $msg = unserialize(urlencode($_GET['msg']));
        foreach($msg as $key => $value){
            echo '<span style="color:blue; font-weight:bold">'.$value.'</span>';
        }       
    }
    ?>

<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>code đơn hàng</th>
        <th>Ngày đặt</th>
        <td>Tình trạng</td>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        $i = 0;
        foreach($order as $key => $ord){
            $i++;
        ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $ord['order_code'] ?></td>
        <td><?php echo $ord['order_date'] ?></td>
        <td><?php if($ord['order_status'] == 0){echo 'đơn hàng mới';}else{echo 'đã xử lý';} ?></td>
        <td> <a href="<?php echo BASE_URL ?>order/order_details/<?php echo $ord['order_code'] ?>">Xem</a> </td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>