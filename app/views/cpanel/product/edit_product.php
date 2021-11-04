
<?php
    if(!empty($_GET['msg'])){
        $msg = unserialize(urlencode($_GET['msg']));
        foreach($msg as $key => $value){
            echo '<span style="color:blue; font-weight:bold;">' .$value. '</span>';
        }
        
    }

    ?>


<h3 style="text-align: center;">Cập nhập sản phẩm </h3>
<div class="col-md-6">
    <?php 
    foreach($productbyid as $key => $pro){
    ?>
    <form action="<?php echo BASE_URL ?>product/update_product/<?php $pro['id_product'] ?>" method="POST" enctype="multipart/form-data"  >
    <div class="form-group">
        <label for="email">Tên sản phẩm</label>
        <input type="text" name="tittle_product" value="<?php echo $pro['tittle_product'] ?>" class="form-control" placeholder="Tên sản phẩm" >
    </div>
    <div class="form-group">
        <label for="email">Hình ảnh sản phẩm</label>
        <input type="file" name="image_product" class="form-control" placeholder="Hình ảnh sản phẩm" >
        <p><img src="<?php echo BASE_URL ?>public/uploads/product/<?php echo $pro['image_product'] ?>" height="100" width="100"></p>
    </div>
    <div class="form-group">
        <label for="email">Giá sản phẩm</label>
        <input type="text" name="price_product" value="<?php echo $pro['price_product'] ?>" class="form-control" placeholder="Giá sản phẩm" >
    </div>
    <div class="form-group">
        <label for="email">Số lượng sản phẩm</label>
        <input type="text" name="quantity_product" value="<?php echo $pro['quantity_product'] ?>" class="form-control" placeholder="Số lượng sản phẩm" >
    </div>
    <div class="form-group">
        <label for="pwd">Danh mục danh mục</label>
        <select class="form-control" name="category_product" value="<?php echo $pro['category_product'] ?>" >
            <?php 
            foreach($category as $key =>$cate){
            ?>
            <option <?php if($pro['id_category_product'] == $cate['id_category_product']){ echo 'selected';} ?> value="<?php echo $cate['id_category_product'] ?>"> <?php echo $cate['titlte_category_product'] ?> </option>
            <?php 
                }
            ?>
            
        </select>
    </div>
    <div class="form-group">
        <label for="pwd">Sản phẩm hot</label>
        <select class="form-control" name="product_hot" >
            <?php
                if($pro['product_hot']==0){
            ?>
            <option selected value="0"> Không </option>
            <option value="1"> Có </option>
            <?php
                }else{
            ?>
            <option  value="0"> Không </option>
            <option selected value="1"> Có </option>
            <?php
                }   
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="pwd"> Miêu tả sản phẩm</label>
        <textarea id="editor" name="desc_product" rows="5" style="resize: none" class="form-control"  > <?php echo $pro['desc_product'] ?> </textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Cập nhập sản phẩm</button>
    </form>
    <?php
    }
    ?>
</div>