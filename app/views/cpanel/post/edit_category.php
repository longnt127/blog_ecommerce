<?php
    if(!empty($_GET['msg'])){
        $msg = unserialize(urlencode($_GET['msg']));
        foreach($msg as $key => $value){
            echo '<span style="color:blue; font-weight:bold;">' .$value. '</span>';
        }
        
    }

    ?>


<h3 style="text-align: center;">Cập nhập danh mục bài viết</h3>
    <?php 
    foreach($categorybyid as $key =>$cate){
    ?>

<div class="col-md-6">
    <form action="<?php echo BASE_URL ?>post/update_category_post/<?php echo $cate['id_category_post'] ?>" method="POST">
    <div class="form-group">
        <label for="email">Tên bài viết</label>
        <input type="text" value="<?php echo $cate['tittle_category_post'] ?>" name="tittle_category_post" class="form-control" placeholder="Ten danh muc" >
    </div>
    <div class="form-group">
        <label for="pwd">Miêu tả bài viết</label>
        <input type="text" value="<?php echo $cate['desc_category_post'] ?>" name="desc_category_post" class="form-control" placeholder="Mieu ta" >
    </div>
    
    <button type="submit" class="btn btn-primary">Cập nhập bài viết</button>
    </form>
    <?php 
    }
    ?>
</div>