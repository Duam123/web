<?php
session_start();
$_SESSION['authenticated'] = true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scentra</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <nav class="nav-bar">
        <a id = "logo" href="#">Scentra</a>
        <div class="nav-bar-links">
            <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#container-4">Products</a></li>
            <li><a href="#container-3">Services</a></li>
            <li><a href="#footer">Contact Us</a></li>
        </ul>
        <button class="button-style">Order Now</button></div>
    </nav>
    <nav class="nav-bar-responsive">
        <a id = "logo" href="#">Scentra</a>
        <div class="nav-bar-links">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
              </svg>
        </div>
    </nav>
    
    <div class="container-1">
        <div class="container-text">
            <h1 class="large-text">We care about Fragrances</h1>
            <p>"Discover your essence with Scentra – where every fragrance tells a story."<br>This captures a sense of elegance and personal connection to the scents. Let me know if you need more options!</p>
            <button class="button-style">See more</button>
        </div>
        <div id="image-container-1">
            <!-- <img src="images/first-image.png" alt="image"> -->
        </div>
    </div>

    <div class="container-2">
        <div class="slogan">
            <h1 class="large-text">Scentra</h1>
            <p>Luxury Defined. One Drop at a Time.</p>
        </div>
        <div>
            <img src="images/second-image.jpg" alt="">
        </div>
        <div class="container-text">
            <h2 class="big-text">Why shop with Scentra</h2>
            <p>At Scentra, every fragrance is crafted to captivate, inspire, and become a part of your story. We believe in the power of scent to enhance moments, bring memories to life, and express your unique essence. Explore the world of Scentra and discover scents that are as unforgettable as you are.</p>
            <button class="button-style">Read More</button>
        </div>
    </div>

    <div class="container-3" id="container-3">
        <h1 class="large-text">Our Services</h1>
        <div class="container-3-services">
            <div>
                <img src="logos/recommendation.png" alt="">
                <h2>Quality</h2>
                <p>"At Scentra, we prioritize quality in every bottle. Our fragrances are crafted from premium ingredients, ensuring long-lasting scents that captivate and inspire. Experience the artistry of scent with every spritz."</p>
            </div>
            <div>
                <img src="logos/giftbox.png" alt="">
                <h2>Variety</h2>
                <p>"Explore a diverse array of fragrances, from floral and fruity to woody and spicy. Whether you seek a signature scent or a special occasion fragrance, Scentra has the perfect option to match your mood and style."</p>
            </div>
            <div>
                <img src="logos/perfume-spray.png" alt="">
                <h2>Gender-Friendly</h2>
                <p>"Discover unique collections tailored for every gender—crafted to match your style and essence."</p>
            </div>
            <div>
                <img src="logos/refund.png" alt="">
                <h2>Affordable</h2>
                <p>"Luxury scents, crafted for you—at prices you'll love."</p>
            </div>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="container-5">
        <h1 class="big-text">Our Categories</h1></div>
        <div class="categories">
    
        <a href="men_category.php" class="category" id="category-men">
            <span>Men</span>
        </a>
        <a href="women_category.php" class="category" id="category-women">
            <span>Women</span>
        </a>
        <a href="unisex_category.php" class="category" id="category-unisex">
            <span>Unisex</span>
        </a>
    </div>


    <div class="container-4" id="container-4">
        <h1 class="big-text">Our products</h1>
        <p>Find the perfect fragrance that reflects your personality and makes a statement.</p>
        

    <div class="container-4-collection">
        <img src="images/perfume-image1.jpg" alt="">
       <img src="images/perfume-image2.jpg" alt="">
        <img src="images/perfume-image3.jpg" alt="">
        <img src="images/perfume-image4.jpg" alt="">
        <img src="images/perfume-image5.jpg" alt="">
        <img src="images/perfume-image6.jpg" alt="">
    </div>
    </div>

    <footer id="footer">
        <div>
            <h1 class="big-text">Scentra</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo architecto ut veritatis illum quaerat. Ea similique harum repellat excepturi! Consequuntur iusto deserunt accusantium tempore ullam.</p>
            <p>&copy; 2024 Scentra - All rights Reserved</p>
            
        </div>
        <div>
            <h2 class="big-text">Shop at</h2>
            <p> only website available </p>
                <div id="social-logos">
                    <img src="logos/facebook.png" alt="">
                    <img src="logos/instagram.png" alt="">
                    <img src="logos/twitter.png" alt="">
                    <img src="logos/pinterest.png" alt="">
                </div>
        </div>
        <div>
            <h2 class="big-text">Contact Us </h2>
            <p>Tel: (+92) xxx xxx xxx</p>               
            <p>Email: info@scentra.com</p>                   
        </div>
    </footer>
</body>
</html>

<?php



?>