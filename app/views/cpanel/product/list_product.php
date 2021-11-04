<h3 style="text-align: center;">Liệt kê danh mục sản phẩm</h3>

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
        <th>Tên sản phẩm</th>
        <th>Hình sản phẩm</th>
        <th>Danh mục</th>
        <th>Giá sản phẩm </th>
        <th>Số lượng sản phẩm</th>
        <th>Hot</th>
        <th>Mô tả</th>
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        $i = 0;
        foreach($product as $key => $pro){
            $i++;
        ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $pro['tittle_product'] ?></td>
        <td> <img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $pro['image_product'] ?>" height="100" width="100"> </td>
        <td><?php echo $pro['titlte_category_product'] ?></td>
        <td><?php echo number_format($pro['price_product'],0,',','.').'đ'  ?></td>
        <td><?php echo $pro['quantity_product'] ?></td>
        <td><?php
        if($pro['product_hot'] == 0){
          echo 'Không có ';
        }else{
          echo 'Sản phẩm hot';
        }
        ?></td>

        <td><?php echo $pro['desc_product'] ?></td>
        <td> <a href="<?php echo BASE_URL ?>product/delete_product/<?php echo $pro['id_product'] ?>">Xóa</a> || <a href="<?php echo BASE_URL ?>product/edit_product/<?php echo $pro['id_product'] ?>"> Cập nhập</a></td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>