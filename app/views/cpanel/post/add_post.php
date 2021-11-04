<?php
    if(!empty($_GET['msg'])){
        $msg = unserialize(urlencode($_GET['msg']));
        foreach($msg as $key => $value){
            echo '<span style="color:blue; font-weight:bold;">' .$value. '</span>';
        }
        
    }

    ?>


<h3 style="text-align: center;">Thêm bài viết </h3>
<div class="col-md-6">
    <form action="<?php echo BASE_URL ?>post/insert_post" method="POST" enctype="multipart/form-data"  >
    <div class="form-group">
        <label for="email">Tên bài viết</label>
        <input type="text" name="tittle_post" class="form-control" placeholder="Tên sản phẩm" >
    </div>
    <div class="form-group">
        <label for="email">Hình ảnh </label>
        <input type="file" name="image_post" class="form-control" placeholder="Hình ảnh sản phẩm" >
        
    </div>
    
    <div class="form-group">
        <label for="pwd">Danh mục bài viết</label>
        <select class="form-control" name="category_post" >
            <?php 
            foreach($category as $key =>$cate){
            ?>  
            <option value="<?php echo $cate['id_category_post'] ?>"> <?php echo $cate['tittle_category_post'] ?> </option>
            <?php 
                }
            ?>
            
        </select>
    </div>
    <div class="form-group">
        <label for="pwd"> Chi tiết bài viết</label>
        <textarea id="editor" name="content_post"  rows="5" style="resize: none" class="form-control"></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Thêm bài viết</button>
    </form>
</div>