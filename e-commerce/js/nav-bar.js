document.getElementById('navigation-bar').innerHTML = 
`
		<div class="header_inner d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><a href="home.php">Violet</a></div>
			<nav class="main_nav">
				<ul>
					<li><a href="categories.php?product_gender=male">Men Perfumes</a></li>
					<li><a href="categories.php?product_gender=female">Women Perfumes</a></li>
					<li><a href="categories.php?product_gender=unisex">Unisex Perfumes</a></li>
					<!--<li><a href="#">Niche Perfumes</a></li>-->
				</ul>
			</nav>	
			<!--<div class="header_content ml-auto">
				<div class="search header_search">
					<form>
						<input type="search" class="search_input" required="required">
						<button type="submit" id="search_button" class="search_button">
                        <img src="images/magnifying-glass.svg" alt=""></button>
					</form>
				</div>
				<div class="shopping">
					
					<a href="#">
						<div class="cart">
							<img src="images/shopping-bag.svg" alt="">
							<div class="cart_num_container">
								<div class="cart_num_inner">
									<div class="cart_num">1</div>
								</div>
							</div>
						</div>
					</a>
					
					
					<a href="#">
						<div class="avatar">
							<img src="images/avatar.svg" alt="">
						</div>
					</a>
				</div>
			</div>-->

			<div class="burger_container d-flex flex-column align-items-center justify-content-around menu_mm"><div></div><div></div><div></div></div>
		</div>
`;
document.getElementById('side-bar').innerHTML=
`<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
	<div class="logo menu_mm"><a href="#">Violet</a></div>
		<!--<div class="search">
			<form action="#">
				<input type="search" class="search_input menu_mm" required="required">
				<button type="submit" id="search_button_menu" class="search_button menu_mm"><img class="menu_mm" src="images/magnifying-glass.svg" alt=""></button>
			</form>
		</div>-->
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="categories.php?product_gender=male">Men Perfumes</a></li>
				<li class="menu_mm"><a href="categories.php?product_gender=female">Women Perfumes</a></li>
				<li class="menu_mm"><a href="categories.php?product_gender=unisex">Unisex Perfumes</a></li>
				<!--<li class="menu_mm"><a href="#">Niche Perfumes</a></li>-->
				<li class="menu_mm"><a href="#">Contact Us</a></li>
			</ul>
		</nav>`;

document.getElementById('footer').innerHTML = 
`	<div class="container">
    <div class="row">
        <div class="col text-center">
            <div class="footer_logo">
                <a href="home.php">Violet Perfumes</a>
            </div>
            
            <nav class="footer_nav">
                <ul>
                    <li><a href="categories.php?product_gender=male">Men Perfumes</a></li>
                    <li><a href="categories.php?product_gender=female">Women Perfumes</a></li>
                    <li><a href="categories.php?product_gender=unisex">Unisex Perfumes</a></li>
                </ul>
            </nav>
            
            <!-- Social Media Links -->
            <div class="footer_social">
                <ul>
                    <li><a href="https://www.facebook.com/VioletPerfumejo"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/violet_perfumejo/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
            </div>

            <!-- Email Contact Form -->
            <div class="contact_form mt-4">
                <h2>Contact Us</h2>
                <form action="submit_contact_form.php" method="POST">
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Send Message</button>
                </form>
            </div>

            <!-- Copyright -->
            <div class="copyright mt-4">
                <p>All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by Violet</p>
            </div>
        </div>
    </div>
</div>
`;