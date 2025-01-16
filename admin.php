<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  page_require_level(1);
?>
<?php
 $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('products');
 $c_sale          = count_by_id('sales');
 $c_user          = count_by_id('users');
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('5');
 $recent_sales    = find_recent_sale_added('5')
?>
<?php include_once('layouts/header.php'); ?>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
  <div class="col-span-2">
    <?php echo display_msg($msg); ?>
  </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
  <a href="users.php" class="text-black">
    <div class="bg-secondary1 p-6 rounded-lg shadow-lg flex items-center justify-between">
      <div class="bg-secondary1 p-4 rounded-full text-white">
        <i class="glyphicon glyphicon-user text-4xl"></i>
      </div>
      <div class="text-right">
        <h2 class="text-2xl font-bold"><?php echo $c_user['total']; ?></h2>
        <p class="text-sm text-muted">Users</p>
      </div>
    </div>
  </a>

  <a href="categorie.php" class="text-black">
    <div class="bg-red p-6 rounded-lg shadow-lg flex items-center justify-between">
      <div class="bg-red p-4 rounded-full text-white">
        <i class="glyphicon glyphicon-th-large text-4xl"></i>
      </div>
      <div class="text-right">
        <h2 class="text-2xl font-bold"><?php echo $c_categorie['total']; ?></h2>
        <p class="text-sm text-muted">Categories</p>
      </div>
    </div>
  </a>

  <a href="product.php" class="text-black">
    <div class="bg-blue2 p-6 rounded-lg shadow-lg flex items-center justify-between">
      <div class="bg-blue2 p-4 rounded-full text-white">
        <i class="glyphicon glyphicon-shopping-cart text-4xl"></i>
      </div>
      <div class="text-right">
        <h2 class="text-2xl font-bold"><?php echo $c_product['total']; ?></h2>
        <p class="text-sm text-muted">Products</p>
      </div>
    </div>
  </a>

  <a href="sales.php" class="text-black">
    <div class="bg-green p-6 rounded-lg shadow-lg flex items-center justify-between">
      <div class="bg-green p-4 rounded-full text-white">
        <i class="glyphicon glyphicon-usd text-4xl"></i>
      </div>
      <div class="text-right">
        <h2 class="text-2xl font-bold"><?php echo $c_sale['total']; ?></h2>
        <p class="text-sm text-muted">Sales</p>
      </div>
    </div>
  </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
  <div class="col-span-1">
    <div class="bg-white p-6 rounded-lg shadow-lg">
      <div class="border-b-2 border-blue-400 mb-4">
        <h3 class="text-lg font-bold text-gray-800">
          <span class="glyphicon glyphicon-th"></span>
          Highest Selling Products
        </h3>
      </div>
      <table class="min-w-full table-auto">
        <thead>
          <tr class="bg-gray-100">
            <th class="py-2 px-4 text-left">Title</th>
            <th class="py-2 px-4 text-left">Total Sold</th>
            <th class="py-2 px-4 text-left">Total Quantity</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products_sold as $product_sold): ?>
            <tr class="border-t">
              <td class="py-2 px-4"><?php echo remove_junk(first_character($product_sold['name'])); ?></td>
              <td class="py-2 px-4"><?php echo (int)$product_sold['totalSold']; ?></td>
              <td class="py-2 px-4"><?php echo (int)$product_sold['totalQty']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="col-span-1">
    <div class="bg-white p-6 rounded-lg shadow-lg">
      <div class="border-b-2 border-blue-400 mb-4">
        <h3 class="text-lg font-bold text-gray-800">
          <span class="glyphicon glyphicon-th"></span>
          Latest Sales
        </h3>
      </div>
      <table class="min-w-full table-auto">
        <thead>
          <tr class="bg-gray-100">
            <th class="py-2 px-4 text-left">#</th>
            <th class="py-2 px-4 text-left">Product Name</th>
            <th class="py-2 px-4 text-left">Date</th>
            <th class="py-2 px-4 text-left">Total Sale</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($recent_sales as $recent_sale): ?>
            <tr class="border-t">
              <td class="py-2 px-4 text-center"><?php echo count_id(); ?></td>
              <td class="py-2 px-4">
                <a href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>">
                  <?php echo remove_junk(first_character($recent_sale['name'])); ?>
                </a>
              </td>
              <td class="py-2 px-4"><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
              <td class="py-2 px-4">$<?php echo remove_junk(first_character($recent_sale['price'])); ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="col-span-1">
    <div class="bg-white p-6 rounded-lg shadow-lg">
      <div class="border-b-2 border-blue-400 mb-4">
        <h3 class="text-lg font-bold text-gray-800">
          <span class="glyphicon glyphicon-th"></span>
          Recently Added Products
        </h3>
      </div>
      <div class="space-y-4">
        <?php foreach ($recent_products as $recent_product): ?>
          <a href="edit_product.php?id=<?php echo (int)$recent_product['id']; ?>" class="block hover:bg-gray-100 p-4 rounded-lg shadow">
            <div class="flex items-center space-x-4">
              <img class="w-12 h-12 rounded-full" src="uploads/products/<?php echo ($recent_product['media_id'] === '0') ? 'no_image.png' : $recent_product['image']; ?>" alt="">
              <div>
                <h4 class="text-md font-semibold"><?php echo remove_junk(first_character($recent_product['name'])); ?></h4>
                <p class="text-sm text-gray-500"><?php echo remove_junk(first_character($recent_product['categorie'])); ?></p>
              </div>
              <span class="ml-auto bg-yellow-300 text-black px-3 py-1 rounded-full">
                $<?php echo (int)$recent_product['sale_price']; ?>
              </span>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>
