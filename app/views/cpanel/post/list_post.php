<h3 style="text-align: center;">Liệt kê bài viết</h3>

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
        <th>Quản lý</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        $i = 0;
        foreach($post as $key => $pos){
            $i++;
        ?>
      <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $pos['tittle_post'] ?></td>
        <td> <img src="<?php echo BASE_URL ?>public/uploads/post/<?php echo $pos['image_post'] ?>" height="100" width="100"> </td>
        <td><?php echo $pos['tittle_category_post'] ?></td>
        
        
        
        <td> <a href="<?php echo BASE_URL ?>post/delete_post/<?php echo $pos['id_post'] ?>">Xóa</a> || <a href="<?php echo BASE_URL ?>post/edit_post/<?php echo $pos['id_post'] ?>"> Cập nhập</a></td>
      </tr>
      <?php
        }
      ?>
    </tbody>
  </table>