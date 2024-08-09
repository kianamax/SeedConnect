    <!DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width= device-width, initial-scale=1.0">
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

/* Header Styles */
header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 100px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 10000;
    backdrop-filter: blur(20px);
    background-color: rgba(34, 34, 34, 0.8); /* Added background color for better visibility */
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
    gap: 40px;
}

header ul li {
    list-style: none;
}

header ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: 500;
    font-size: 1.25em;
}

header ul li.active a,
header ul li:hover a {
    color: #30fe6c;
}

/* Home Section Styles */
#Home {
    width: 100%;
    min-height: 100vh;
    background: #222;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 100px;
}

#Home .content {
    display: flex;
    flex-direction: column;
    gap: 10px;
    max-width: 650px;
    z-index: 10;
}

#Home .content h2 {
    font-size: 5em;
    color: #30fe6c;
}

#Home .content p {
    font-size: 1.25em;
    color: #fff;
    line-height: 1.6em;
}

.btn {
    display: inline-block;
    max-width: 200px;
    background: #30fe6c;
    color: #222;
    text-align: center;
    padding: 18px 30px;
    font-weight: 500;
    letter-spacing: 0.05em;
    text-decoration: none;
    margin-top: 10px;
}

#Home .men {
    position: absolute;
    bottom: 10px;
    right: 50px;
    max-height: 70vh;
}

/* Section Text Styles */
.sectext {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

.sectext h2 {
    font-size: 3em;
    color: #fff;
}

.sectext p {
    max-width: 700px;
    text-align: center;
    color: #aaa;
    font-size: 1.1em;
    line-height: 1.5em;
}

/* About Section Styles */
#About,
#Seeds,
#Contact,
#Portfolio,
#Offers {
    background: #34353a;
    min-height: 100vh;
    padding: 120px 100px;
    display: flex;
    justify-content: center;
    flex-direction: column;
}

#About .content {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 20px;
    margin: 40px 0;
}

#About .content .service-box {
    background: #2e2f34;
    padding: 50px 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 20px;
    border: 2px solid #2e2f34;
    transition: border 0.3s ease;
}

#About .content .service-box:hover {
    border: 2px solid #30fe6c;
}

#About .content .service-box img {
    max-width: 100px;
    filter: invert(1);
    opacity: 0.5;
    transition: opacity 0.5s;
}

#About .content .service-box:hover img {
    opacity: 1;
}

#About .content .service-box h3 {
    color: #30fe6c;
    font-weight: 500;
}

.center {
    width: 100%;
    text-align: center;
}

/* Seeds Section Styles */
#Seeds .content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px;
    margin: 40px 0;
}

#Seeds .card {
    flex: 1 1 calc(25% - 20px);
    min-width: 250px;
    background-color: #2e2f34;
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

#Seeds .card:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 20px rgba(0, 0, 0, 0.3);
}

#Seeds .card-body {
    padding: 20px;
    text-align: center;
}

#Seeds .card-body h2.domain {
    font-size: 1.8em;
    color: #30fe6c;
    margin-bottom: 10px;
}

#Seeds .card-body p {
    font-size: 1.1em;
    color: #fff;
    margin-bottom: 10px;
}

#Seeds .card-body button {
    background-color: #30fe6c;
    border: none;
    padding: 15px 30px;
    cursor: pointer;
    font-size: 1em;
    text-decoration: none;
    display: inline-block;
    border-radius: 5px;
    transition: background-color 0.3s ease-in-out;
    margin-top: 15px;
}

#Seeds .card-body button a {
    color: #222;
    text-decoration: none;
}

#Seeds .card-body button:hover {
    background-color: #28d659;
}

@media (max-width: 1200px) {
    #Seeds .card {
        flex: 1 1 calc(50% - 20px);
    }
}

@media (max-width: 768px) {
    #Seeds {
        padding: 80px 50px;
    }
    
    #Seeds .card {
        flex: 1 1 100%;
    }
}

/* Contact Section Styles */
#Contact .content {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 20px;
    margin: 40px 0;
}

#Contact .content a {
    background: #2e2f34;
    height: 120px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    font-size: 1.2em;
    color: #fff;
    transition: background 0.5s, color 0.5s;
}

#Contact .content a:hover {
    background: #30fe6c;
    color: #222;
}

#Contact .content a ion-icon {
    color: #30fe6c;
    font-size: 1.5em;
    margin-right: 10px;
    transition: color 0.5s;
}

#Contact .content a:hover ion-icon {
    color: #222;
}

/* Offers Section Styles */
#Offers .content {
    display: flex;
    justify-content: space-between;
}

#Offers .service-box {
    background: #2e2f34;
    flex: 0 0 auto;
    width: 25%;
    text-align: center;
    padding: 50px 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 20px;
    border: 2px solid #2e2f34;
    transition: border 0.3s ease;
}

#Offers .content .service-box:hover {
    border: 2px solid #30fe6c;
}

#Offers .content .service-box img {
    max-width: 100%;
}

#Offers .content .service-box h3 {
    color: #30fe6c;
    font-weight: 500;
}

/* Media Queries */
@media (max-width: 900px) {
    header {
        padding: 20px 50px;
    }

    #Home {
        padding: 150px 50px;
        flex-direction: column;
        padding-bottom: 0;
    }

    #Home .content h2 {
        font-size: 4em;
    }

    .btn {
        max-width: 160px;
        padding: 10px 20px;
    }

    #Home .men {
        height: 50vh;
        right: 0;
    }

    .sectext h2 {
        font-size: 2em;
        text-align: center;
    }

    #Services,
    #Contact {
        padding: 100px 50px;
    }

    #Services .content,
    #Contact .content {
        grid-template-columns: repeat(2, 1fr);
    }

    .menu {
        width: 30px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .menu::before,
    .menu::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 2px;
        background: #fff;
        transition: 0.5s;
    }

    .menu::before {
        transform: translateY(-10px);
        box-shadow: 0 10px #fff;
    }

    .menu::after {
        transform: translateY(10px);
    }

    header.active .menu::before {
        transform: translateY(0px) rotate(45deg);
    }

    header.active .menu::after {
        transform: translateY(0px) rotate(-45deg);
    }

    header ul {
        display: none;
    }

    header.active ul {
        display: flex;
        flex-direction: column;
        position: absolute;
        top: 60px;
        right: 50px;
        background: #222;
        padding: 20px;
        border-radius: 10px;
    }
}

@media (max-width: 700px) {
    #Home .content h2 {
        font-size: 3em;
    }

    #Home .men {
        height: 40vh;
    }

    #About .content,
    #Contact .content {
        grid-template-columns: repeat(1, 1fr);
    }

    #Contact .content a {
        height: 80px;
    }
}

    </style>
    <body>
        <header>
            <a href="#" class="logo"><img src="logo.png" alt="Logo"></a>
            <div class="menu"></div>
            <ul class="nav">
        <li class="active"><a href="#Home">Home</a></li>
        <li><a href="#About">About Us</a></li>
        <li><a href="#Seeds">Seeds</a></li>
        <li><a href="#Contact">Contact Us</a></li>
    </ul>

        </header>
        <section id="Home">
            <div class="content">
                <h2>SeedConnect</h2>
                <p>SeedConnect harnesses cutting edge web technologies and create a dynamic ecosystem where farmers, suppliers and agricultural experts converge</p>
                <a href="login.php" class="btn">Login</a>
            </div>
            <img src="kk.png" alt="" class="men">
        </section>
        <section id="About">
    <div class="sectext">
        <h2>What We Offer</h2>
        <p>Seed Connect is revolutionizing agriculture by connecting farmers with the perfect seeds. Our platform offers:</p>
    </div>
    <div class="content">
        <div class="service-box">
            <img src="marketplace.png" alt="Interactive Seed Marketplace">
            <h3>Interactive Seed Marketplace</h3>
        </div>
        <div class="service-box">
            <img src="dist.png" alt="Distribution services">
            <h3>Distribution services</h3>
        </div>
        <div class="service-box">
            <img src="support.png" alt="Community Support">
            <h3>Community Support</h3>
        </div>
        <div class="service-box">
            <img src="edu.png" alt="Food education program">
            <h3>Food education program</h3>
        </div>
    </div>
    <div class="center">
        <a href="login.php" class="btn">Get Involved</a>
    </div>
</section>
      <section id="Seeds">
    <div class="sectext">
        <h2 class="today">Discover Our Premium Seeds</h2>
        <p>Grow Your Success with Quality Seeds</p>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <h2 class="domain">Maize</h2>
                <p>High-yield variety</p>
                <p>Drought-resistant</p>
                <p>Perfect for various climates</p>
                <button type="button" class="btn btn-dark btn-lg download-button"><a href="login.php?type=maize">Explore Maize</a></button>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2 class="domain">Grass</h2>
                <p>Quick-growing lawn seed</p>
                <p>Durable and lush</p>
                <p>Ideal for landscaping</p>
                <button type="button" class="btn btn-dark btn-lg download-button"><a href="login.php?type=grass">Discover Grass</a></button>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2 class="domain">Kales</h2>
                <p>Nutrient-rich variety</p>
                <p>Easy to grow</p>
                <p>Great for small gardens</p>
                <button type="button" class="btn btn-dark btn-lg download-button"><a href="login.php?type=kales">View Kales</a></button>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2 class="domain">Beans</h2>
                <p>High-protein variety</p>
                <p>Disease-resistant</p>
                <p>Suitable for intercropping</p>
                <button type="button" class="btn btn-dark btn-lg download-button"><a href="login.php?type=beans">Check Beans</a></button>
            </div>
        </div>
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
            let list = document.querySelectorAll('.nav li');

            function active() {
                list.forEach((i) =>
                    i.classList.remove('active'));
                this.classList.add('active');
            }
            list.forEach((i) =>
                i.addEventListener('click', active));

            let menu = document.querySelector('.menu');
            let header = document.querySelector('.header');
            menu.onClick = function() {
                header.classList.toggle('active');
            }
        </script>
    </body>

    </html>