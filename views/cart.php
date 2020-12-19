<?php
	//Route Protection
	session_start();
	if(!$_SESSION['user_details']) {
		header('Location: /views/forms/login.php');
	}

	
	require_once '../controllers/helpers.php';
	$title = 'Cart';
	function get_content() {
	$products = get_products('../data/products.json');
?>
	<div class="container">
		<?php if(isset($_SESSION['cart'])): ?>
			<h2 class="py-4">My Cart</h2>
			<table class="table table-responsive">
				<thead class="thead-dark">
					<tr>
						<th>Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Subtotal</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$total = 0;
						foreach($products as $i => $product):
							if(isset($_SESSION['cart'][$i])):
								$subtotal = $product ->price * $_SESSION['cart'][$i];
								$total += $subtotal;
					 ?>
					 	<tr>
					 		<td><?php echo $product->name ?></td>
					 		<td><?php echo $product->price ?></td>
					 		<td>
					 			<form method="POST" action="/controllers/update_cart.php">
					 			<input type="hidden" name="id" value="<?php echo $i ?>"> 
					 				<input 
					 				type="number" 
					 				name="quantity"
					 				class="form-control input-quantity" 
					 				value="<?php echo $_SESSION['cart'][$i] ?>">
					 			</form>
					 			<?php echo $_SESSION['cart'][$i] ?>
					 		</td>
					 		<td><?php echo $subtotal ?></td>
					 		<td>
					 			<a href="/controllers/delete_cart_item.php?id=<?php echo$i ?>" class="btn btn-danger">Delete</a>
					 		</td>
					 	</tr>


					 <?php 
					 		endif;
					 	endforeach;
					  ?>
					  <tr>
					  	<td colspan="3">
						  <form method="POST" action="/controllers/checkout.php">
						  <input 
						  type="hidden" 
						  name="total" 
						  value="<?php echo $total ?>">
						  <button class="btn btn-primary">Checkout</button>
						  </form>
					  		<a href="/controllers/clear_cart.php" class="btn btn-danger">Clear Cart</a>
					  	</td>
					  	<td>Total: <b><?php  echo $total ?></b></td>
					  </tr>
				</tbody>	
			</table>
		<?php else: ?>
			<h2 class="py-4">Your cart is empty</h2>
			<a href="/">Go back to shopping</a>
		<?php endif; ?>
	</div>
<?php
	}
	require_once 'partials/layout.php';
?>

<script type="text/javascript">
	let quantityInputs = document.querySelectorAll('.input-quantity');
	quantityInput.foreach( quantityInput => {
	quantityInput.onchange = () =>{
		quantityInput.parentElement.submit();

		}
	})
</script>