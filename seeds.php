<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Thuo Kevin</title>
    <link rel="stylesheet" href="style.css">
</head>

<style type="text/css">
    /* Reset CSS */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        scroll-behavior: smooth;
        font-family: 'Times New Roman', Times, serif;
    }

    body {
        background: #34353a;
        color: #fff;
    }

    /* Header Styles */
    header {
        position: sticky;
        top: 0;
        left: 0;
        width: 100%;
        padding: 20px 5%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 1000;
        backdrop-filter: blur(20px);
        background-color: rgba(34, 35, 40, 0.8);
    }

    header .logo {
        color: #fff;
        text-decoration: none;
        font-weight: 700;
        font-size: 2em;
    }

    header .logo img {
        width: 80px;
        height: auto;
        border-radius: 10px;
    }

    header ul {
        display: flex;
        gap: 20px;
    }

    header ul li {
        list-style: none;
    }

    header ul li a {
        text-decoration: none;
        color: #fff;
        font-weight: 500;
        font-size: 1.1em;
    }

    header ul li.active a,
    header ul li:hover a {
        color: #30fe6c;
    }

    /* Section Styles */
    section {
        padding: 80px 5%;
        display: none;
    }

    .sectext {
        text-align: center;
        margin-bottom: 40px;
    }

    .sectext h2 {
        font-size: 2.5em;
        color: #30fe6c;
        margin-bottom: 20px;
    }

    .sectext p {
        max-width: 700px;
        margin: 0 auto;
        color: #aaa;
        font-size: 1.1em;
        line-height: 1.5em;
    }

    /* Product Card Styles */
    .content {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }
    .cart-count {
    background-color: red;
    color: white;
    border-radius: 50%;
    padding: 2px 6px;
    font-size: 12px;
    position: absolute;
    top: -10px;
    right: -10px;
    min-width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

    .product-card {
        background: #2e2f34;
        padding: 20px;
        border-radius: 10px;
        width: calc(25% - 20px);
        min-width: 250px;
        display: flex;
        flex-direction: column;
        align-items: center;
        transition: transform 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .product-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .product-card h3 {
        color: #30fe6c;
        margin-bottom: 10px;
    }

    .product-card p {
        color: #aaa;
        margin-bottom: 15px;
    }

    .add-to-cart {
        background: #30fe6c;
        color: #222;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .add-to-cart:hover {
        background: #28d659;
    }

    /* Contact Section Styles */
    #Contact .content {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    #Contact .content a {
        background: #2e2f34;
        padding: 20px;
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #fff;
        border-radius: 5px;
        transition: 0.3s;
        width: calc(50% - 10px);
        min-width: 250px;
    }

    #Contact .content a:hover {
        background: #30fe6c;
        color: #222;
    }

    #Contact .content a ion-icon {
        font-size: 1.5em;
        margin-right: 10px;
        color: #30fe6c;
    }

    #Contact .content a:hover ion-icon {
        color: #222;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        header {
            padding: 15px 5%;
        }

        header ul {
            display: none;
        }

        .menu {
            display: block;
            width: 30px;
            height: 20px;
            position: relative;
            cursor: pointer;
        }

        .menu::before,
        .menu::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background: #fff;
            transition: 0.3s;
        }

        .menu::before {
            top: 0;
        }

        .menu::after {
            bottom: 0;
        }

        .product-card {
            width: calc(50% - 10px);
        }

        #Contact .content a {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .product-card {
            width: 100%;
        }
    }
</style>

<body>
    <header>
        <a href="#" class="logo"><img src="logo.png" alt="Logo"></a>
        <div class="menu"></div>
        <ul class="nav">
            <li><a href="#" data-target="#Marketplace">Home</a></li>
            <li><a href="#" data-target="#Maize">Maize</a></li>
            <li><a href="#" data-target="#Grass">Grass</a></li>
            <li><a href="#" data-target="#Kales">Kales</a></li>
            <li><a href="#" data-target="#Beans">Beans</a></li>
            <li>
                    <a href="cart.php" style="position: relative;">
                        <ion-icon name="cart-outline"></ion-icon>
                        <span class="cart-count" style="display: none;">0</span>
                    </a>
                </li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </header>

    <section id="Marketplace">
        <div class="sectext">
            <h2>Seed Marketplace</h2>
            <p>Discover premium seeds for your agricultural needs</p>
        </div>
    </section>

    <section id="Maize">
        <div class="sectext">
            <h2>Maize Seeds</h2>
            <p>High-yield, drought-resistant varieties</p>
        </div>
        <div class="content">
            <!-- Add maize seed products here -->
            <div class="product-card">
                <img src="hybridmaiza.jpg" alt="Maize Seed 1">
                <h3>Premium Maize Seed</h3>
                <p>High-yield variety</p>
                <button class="add-to-cart" data-product-id="1">Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="maize4.jpg" alt="Maize Seed 1">
                <h3>Premium Maize Seed</h3>
                <p>High-yield variety</p>
                <button class="add-to-cart" data-product-id="2">Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="earlymaize.jpg" alt="Maize Seed 1">
                <h3>Premium Maize Seed</h3>
                <p>High-yield variety</p>
                <button class="add-to-cart" data-product-id="3">Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="maize4.jpg" alt="Maize Seed 1">
                <h3>Premium Maize Seed</h3>
                <p>High-yield variety</p>
                <button class="add-to-cart" data-product-id="4">Add to Cart</button>
            </div>
            <!-- Add more maize seed products as needed -->
        </div>
    </section>

    <section id="Grass">
        <div class="sectext">
            <h2>Grass Seeds</h2>
            <p>Quick-growing, durable lawn and landscaping seeds</p>
        </div>
        <div class="content">
            <!-- Add grass seed products here -->
            <div class="product-card">
                <img src="grass2.jpg" alt="Grass Seed 1">
                <h3>Lush Lawn Grass Seed</h3>
                <p>Ideal for landscaping</p>
                <button class="add-to-cart" data-product-id="5">Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="grass2.jpg" alt="Grass Seed 1">
                <h3>Lush Lawn Grass Seed</h3>
                <p>Ideal for landscaping</p>
                <button class="add-to-cart" data-product-id="6">Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="grass2.jpg" alt="Grass Seed 1">
                <h3>Lush Lawn Grass Seed</h3>
                <p>Ideal for landscaping</p>
                <button class="add-to-cart" data-product-id="7">Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="grass2.jpg" alt="Grass Seed 1">
                <h3>Lush Lawn Grass Seed</h3>
                <p>Ideal for landscaping</p>
                <button class="add-to-cart" data-product-id="8">Add to Cart</button>
            </div>
            <!-- Add more grass seed products as needed -->
        </div>
    </section>

    <section id="Kales">
        <div class="sectext">
            <h2>Kale Seeds</h2>
            <p>Nutrient-rich, easy-to-grow varieties</p>
        </div>
        <div class="content">
            <!-- Add kale seed products here -->
            <div class="product-card">
                <img src="kales.jpg" alt="Kale Seed 1">
                <h3>Nutrient-Rich Kale Seed</h3>
                <p>Great for small gardens</p>
                <button class="add-to-cart" data-product-id="9">Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="kales2.jpg" alt="Kale Seed 1">
                <h3>Nutrient-Rich Kale Seed</h3>
                <p>Great for small gardens</p>
                <button class="add-to-cart" data-product-id="10">Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="kales.jpg" alt="Kale Seed 1">
                <h3>Nutrient-Rich Kale Seed</h3>
                <p>Great for small gardens</p>
                <button class="add-to-cart" data-product-id="11">Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="kales2.jpg" alt="Kale Seed 1">
                <h3>Nutrient-Rich Kale Seed</h3>
                <p>Great for small gardens</p>
                <button class="add-to-cart" data-product-id="12">Add to Cart</button>
            </div>
            <!-- Add more kale seed products as needed -->
        </div>
    </section>

    <section id="Beans">
        <div class="sectext">
            <h2>Bean Seeds</h2>
            <p>High-protein, disease-resistant varieties</p>
        </div>
        <div class="content">
            <!-- Add bean seed products here -->
            <div class="product-card">
                <img src="beans.jpg" alt="Bean Seed 1">
                <h3>High-Protein Bean Seed</h3>
                <p>Suitable for intercropping</p>
                <button class="add-to-cart" data-product-id="13">Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="beans2.jpg" alt="Bean Seed 1">
                <h3>High-Protein Bean Seed</h3>
                <p>Suitable for intercropping</p>
                <button class="add-to-cart" data-product-id="14">Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="beans3.jpg" alt="Bean Seed 1">
                <h3>High-Protein Bean Seed</h3>
                <p>Suitable for intercropping</p>
                <button class="add-to-cart" data-product-id="15">Add to Cart</button>
            </div>
            <div class="product-card">
                <img src="beans4.jpg" alt="Bean Seed 1">
                <h3>High-Protein Bean Seed</h3>
                <p>Suitable for intercropping</p>
                <button class="add-to-cart" data-product-id="16">Add to Cart</button>
            </div>
            <!-- Add more bean seed products as needed -->
        </div>
    </section>

    <section id="Contact">
        <div class="sectext">
            <h2>Connect With Us</h2>
            <p>Cultivating relationships for a greener tomorrow</p>
        </div>
        <div class="content">
            <a href="#">
                <ion-icon name="mail-open-outline"></ion-icon> SeedConnect@gmail.com
            </a>
            <a href="#">
                <ion-icon name="call-outline"></ion-icon> +254 706941940
            </a>
            <a href="#">
                <ion-icon name="logo-twitter"></ion-icon> @SeedConnect
            </a>
            <a href="#">
                <ion-icon name="logo-instagram"></ion-icon> @SeedConnect
            </a>
        </div>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    let list = document.querySelectorAll('.nav li');
    
    function active() {
        list.forEach((i) => i.classList.remove('active'));
        this.classList.add('active');
        // Hide all sections
        document.querySelectorAll('section').forEach((section) => {
            section.style.display = 'none';
        });
        // Show the target section
        const target = this.querySelector('a').getAttribute('data-target');
        const targetSection = document.querySelector(target);
        if (targetSection) {
            targetSection.style.display = 'block';
        } else {
            console.error(`Target section ${target} not found`);
        }
    }
    
    list.forEach((i) => i.addEventListener('click', active));
    
    // Show the first section by default
    const defaultSection = document.querySelector('#Marketplace');
    if (defaultSection) {
        defaultSection.style.display = 'block';
    } else {
        console.error('Default section #Marketplace not found');
    }
    
    // Cart functionality
    let cartCount = 0;
    const cartCountElement = document.querySelector('.cart-count');
    
    if (cartCountElement) {
        // Function to update the cart icon
        function updateCartIcon() {
            cartCount++;
            cartCountElement.textContent = cartCount;
            cartCountElement.style.display = 'inline';
        }

        // Add click event listeners to all "Add to Cart" buttons
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                fetch('add_to_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'product_id=' + productId
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateCartIcon();
                    } else {
                        console.error('Failed to add item to cart');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        });
    } else {
        console.error('Cart count element not found');
    }
});
    </script>
</body>

</html>
