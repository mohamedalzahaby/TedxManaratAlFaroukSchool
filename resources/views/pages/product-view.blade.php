
<style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;
      margin: auto;
      text-align: center;
      font-family: arial;
    }
  
    .price {
      color: grey;
      font-size: 22px;
    }
  
    .card button {
      border: none;
      outline: 0;
      padding: 12px;
      color: white;
      background-color: #000;
      text-align: center ; 
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }
  
    .card button:hover {
      opacity: 0.7;
    }
  </style>
  
  <div class="card-columns" style="margin: 35px;" >
  
          <div class="card" style="border-color: #92a8d1;border-width: initial;">
              <img class="card-img-top" src="<?php echo $product['product_image'] ?>" alt="<?php echo $product['product_name'] ?>">
              <h5 class="card-title"style="color:blue"><?php echo $product['product_name'] ?></h5>
              <p class="price"><?php echo "$".$product['price'] ?></p>
              <form action="<?php echo $GLOBALS['ASSET'].$GLOBALS['addProduct']?>" method="POST">
                  <input type="hidden" name="category_id" value=<?php echo $_GET['category']; ?> />
                  <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>" />
                  <button type="submit" class="card button">Add to cart</button>
              </form>
          </div>
  </div>
  