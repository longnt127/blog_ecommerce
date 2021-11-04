<?php
    if(!empty($_GET['msg'])){
        $msg = unserialize(urlencode($_GET['msg']));
        foreach($msg as $key => $value){
            echo '<span style="color:blue; font-weight:bold;">' .$value. '</span>';
        }
        
    }

    ?>


<h3 style="text-align: center;">Cập nhập bài viết </h3>
<div class="col-md-6">
<?php 
foreach($postbyid as $key => $pos){



?>
    <form action="<?php echo BASE_URL ?>post/update_post/<?php echo $pos['id_post'] ?>" method="POST" enctype="multipart/form-data"  >
    <div class="form-group">
        <label for="email">Tên bài viết</label>
        <input type="text" value="<?php echo $pos['tittle_post'] ?>" name="tittle_post" class="form-control" placeholder="Tên sản phẩm" >
    </div>
    <div class="form-group">
        <label for="email">Hình ảnh </label>
        <input type="file" name="image_post" class="form-control" placeholder="Hình ảnh sản phẩm" >
        <p><img src="<?php echo BASE_URL ?>public/uploads/post/<?php echo $pos['image_post'] ?>" height="100" width="100"></p>
    </div>
    
    <div class="form-group">
        <label for="pwd">Danh mục bài viết</label>
        <select class="form-control" name="category_post" >
            <?php 
            foreach($category as $key =>$cate){
            ?>  
            <option <?php if($cate['id_category_post'] == $pos['id_category_post']){echo 'selected';} ?> value="<?php echo $cate['id_category_post'] ?>"> <?php echo $cate['tittle_category_post'] ?> </option>
            <?php 
                }
            ?>
            
        </select>
    </div>
    <div class="form-group">
        <label for="pwd"> Chi tiết bài viết</label>
        <textarea id="editor" name="content_post"  rows="5" style="resize: none" class="form-control"> <?php echo $pos['content_post'] ?> </textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Cập nhập bài viết</button>
    </form>
    <?php
    }
    ?>
</div>