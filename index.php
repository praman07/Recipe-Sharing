<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Sharing Website</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
            cursor: pointer;
        }

        body {
            background-color: #121212;
            color: #f0f0f0;
            line-height: 1.6;
        }

        header {
            background-color: black;
            padding: 1.5rem;
            box-shadow: 0 8px 10px rgba(255, 0, 0, 0.3);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 10;
        }
        #logo {
            height: 95px;
            box-shadow: 0 8px 10px rgba(255, 0, 0, 0.3);
            border-radius: 10px;
            transition: 0.5s ease;
        }

        header h2 {
            color: #ff3333;
            text-shadow: 0 0 8px rgba(255, 0, 0, 0.5);
            transition: transform 0.3s ease;
        }

        header h2:hover {
            transform: scale(1.05);
            
        }

        nav {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }
nav a{
            color: black;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-top-left-radius: 10px;
            border-top-right-radius: 999px;
            border-bottom-left-radius: 999px;
            border-bottom-right-radius: 10px;
            background-color: red;
            transition: all 0.3s ease;
            border: 1px solid transparent;
            box-shadow: 0 2px 50px rgba(255, 0, 0, 0.4);
        }
        
        nav a:hover {
            background-color: #ff3333;
        color:white;
            box-shadow: 0 9px 15px rgba(255, 0, 0, 0.4);
            transition: all 0.3s ease;
            border-top-left-radius: 999px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 999px;
        }
.join{
    
            color: black;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-top-left-radius: 10px;
            border-top-right-radius: 999px;
            border-bottom-left-radius: 999px;
            border-bottom-right-radius: 10px;
            background-color: red;
            transition: all 0.3s ease;
            border: 1px solid transparent;
            box-shadow: 0 2px 50px rgba(255, 0, 0, 0.4);

}

.join:hover{
        background-color: #ff3333;
            color:white;
            transform: translateY(-3px);
            box-shadow: 0 9px 15px rgba(255, 0, 0, 0.4);
            transition: all 0.3s ease;
            border-top-left-radius: 999px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 999px;

}

        nav span {
            color: #ff7777;
            margin-right: 1rem;
        }

        .video-section {
            width: 100%;
            height: 80vh;
            position: relative;
            overflow: hidden;
            border-radius: 80px;
            margin: 2rem 0;
        }


        video{
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(60%);
            border-radius:80px;
        }

        video:hover{
            box-shadow: 0 4px 315px rgba(255, 0, 0, 0.4);

        }
        .video-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.7);
            padding: 2rem;
       border-top-left-radius: 10px;
            border-top-right-radius: 999px;
            border-bottom-left-radius: 999px;
            border-bottom-right-radius: 10px;
            text-align: center;
            border: 2px solid #ff3333;
            transition:0.5s;
            box-shadow: 15px 15px 15px rgba(255, 0, 0, 0.4);

        }

        .video-text p {
            color: #ff3333;
            font-size: 2.5rem;
            
        }
        .video-text:hover{
                 box-shadow: 35px 15px 0px rgba(255, 0, 0, 0.4);
                 transition:all 1s ease;
   border-top-left-radius: 999px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 999px;

        }

        .section {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 2rem;
            background-color: #1e1e1e;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(255, 0, 0, 0.2);
            
            transition:0.5s;
        }

        .section h2 {
            color: #ff3333;
            margin-bottom: 1rem;
            text-align: center;
        }

        .section p {
            font-size: 1.1rem;
            text-align: center;
        }
        .section:hover{
    
            box-shadow: 0 25px 30px rgba(255, 0, 0, 0.2);

        transition:0.5s;

        }
        footer {
            text-align: center;
            margin-top: 4rem;
            padding: 1.5rem;
            background-color: #000;
            color: #ff7777;
            border-top: 2px solid #ff3333;
        }

        footer a {
            color: #ff7777;
            margin: 0 10px;
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                text-align: center;
            }

            nav {
                flex-wrap: wrap;
                justify-content: center;
                margin-top: 1rem;
            }
        }
    </style>
</head>
<body>
<header>
    <img id="logo" src="logo.png" />
    <h2>Enjoy the treasure of tasty recipes</h2>
    <nav>
        <?php if (isset($_SESSION['user_id'])): ?>
            <span>Welcome, <?php echo $_SESSION['username']; ?>!</span>
            <a href="post_recipe.php">Post Recipe</a>
            <a href="view_recipes.php">View Recipes</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="signup.php">Sign Up</a>
            <a href="signin.php">Sign In</a>
            <a href="view_recipes.php">View Recipes</a>
        <?php endif; ?>
    </nav>
</header>
<section class="video-section">
    <video autoplay muted loop>
        <source src="video2.mp4" type="video/mp4">
    </video>
     <a href="view_recipes.php">
    <div class="video-text">
       <p>Discover Delicious Recipes</p>
    </div></a>
</section>

<section class="section">
    <h2>About Us</h2>
    <p>Welcome to our Recipe Sharing Platform! Whether you're a professional chef or a home cook, this platform lets you explore, share, and learn amazing recipes from around the world.</p>
</section>
<section class="section">
    <h2>Join Us Today</h2>
    <p>Create an account and start your culinary journey. Share your own recipes and connect with food lovers across the globe.</p>

    <a href="signup.php">
    <div style="text-align:center; margin-top: 1rem;">
        <button class="join">Join Now</button>
    </div>
    
</section>

<footer>
    <p>&copy;2025 RecipeShare. All rights reserved.</p>
        <button class="join"><a href=""></a>Instagram</button>
         <button class="join"><a href=""></a>Facebook </button>
         <button class="join"><a href=""></a> YouTube</button>
</footer>
</body>
</html>
