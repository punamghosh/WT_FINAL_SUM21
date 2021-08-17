<?php if($_SESSION['userType']=='employee'){?>
				<ul id="sideBar">
					<li>
						<a href="pending_customer.php">Pending Customers</a>
					</li>
					<li>
						<a href="customer_list.php">Customer List</a>
					</li>
					<li>
						<a href="pending_seller.php">Pending Seller</a>
					</li>
					<li>
						<a href="seller_list.php">Seller List</a>
					</li>
					<li>
						<a href="shop_request.php">Shop Requests</a>
					</li>
					<li>
						<a href="shop_list.php">Shop List</a>
					</li>
					<li>
						<a href="products.php">Products List</a>
					</li>
					<li>
						<a href="orders.php">Orders</a>
					</li>
					

				</ul>
			<?php } ?>