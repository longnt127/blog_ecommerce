<?php
    if(!empty($_GET['msg'])){
        $msg = unserialize(urlencode($_GET['msg']));
        foreach($msg as $key => $value){
            echo '<span style="color:blue; font-weight:bold;">' .$value. '</span>';
        }
        
    }

    ?>


<h3 style="text-align: center;">Thêm danh mục bài viết</h3>
<div class="col-md-6">
    <form action="<?php echo BASE_URL ?>post/insert_category" method="POST">
    <div class="form-group">
        <label for="email">Tên danh mục</label>
        <input type="text" name="tittle_category_post" class="form-control" placeholder="Ten danh muc" >
    </div>
    <div class="form-group">
        <label for="pwd">Danh muc</label>
        <input type="text" name="desc_category_post" class="form-control" placeholder="Mieu ta" >
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm danh mục</button>
    </form>
</div>