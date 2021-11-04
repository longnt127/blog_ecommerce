<?php
    if(!empty($_GET['msg'])){
        $msg = unserialize(urlencode($_GET['msg']));
        foreach($msg as $key => $value){
            echo '<span style="color:blue; font-weight:bold;">' .$value. '</span>';
        }
        
    }

    ?>


<h3 style="text-align: center;">Cập nhập danh muc san pham</h3>
    <?php 
    foreach($categorybyid as $key =>$cate){
    ?>

<div class="col-md-6">
    <form action="<?php echo BASE_URL ?>product/update_category_product/<?php echo $cate['id_category_product'] ?>" method="POST">
    <div class="form-group">
        <label for="email">Ten danh muc</label>
        <input type="text" value="<?php echo $cate['titlte_category_product'] ?>" name="titlte_category_product" class="form-control" placeholder="Ten danh muc" >
    </div>
    <div class="form-group">
        <label for="pwd">Danh muc</label>
        <input type="text" value="<?php echo $cate['desc_category_product'] ?>" name="desc_category_product" class="form-control" placeholder="Mieu ta" >
    </div>
    
    <button type="submit" class="btn btn-primary">Cập nhập danh muc</button>
    </form>
    <?php 
    }
    ?>
</div>