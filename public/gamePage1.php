<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="main.css">
<title>My Game Website</title>
<script src="https://kit.fontawesome.com/977a29eff2.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php">    
                <img src="images/logo2.png" alt="Logo" width="200">
            </a>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Search...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="login-info">
            <?php
                    session_start();
                    if(isset($_SESSION['username'])) {
                        echo '<span>Welcome, '.$_SESSION['username'].'!</span>';
                        echo '<button>Score</button>';
                    } else {
                        echo '<a href="score.php">Score</a>';
                    }
            ?>
        </div>
        <div class="login-info">
            <?php
                if(isset($_SESSION['username'])) {
                    echo '<span>Welcome, '.$_SESSION['username'].'!</span>';
                    echo '<button>Logout</button>';
                } else {
                    echo '<a href="login.php">Login</a>';
                }
            ?>
        </div>
        
    </header>
    <div class="games">
        <div class="game">
            <h2>Game 1</h2>
            <p>Description of Game 1</p>
            <script>
                // Setting Canvas
let canvas;
let ctx;
canvas = document.createElement("canvas")
ctx = canvas.getContext("2d")
canvas.width=400;
canvas.height=700;
document.body.appendChild(canvas);
let backgroundImage, spaceshipImage, bulletImage, enemyImage,gameOverImage;
let gameOver = false // true - game done, false - game not done
// spaceship movement
let spaceshipX = canvas.width/2 - 32;
let spaceshipY = canvas.height - 64;

let bulletList = []; // bullets list
let score = 0;
function Bullet(){
    this.x = 0;
    this.y = 0;
    this.init = function(){
        this.x = spaceshipX;
        this.y = spaceshipY;
        this.alive = true // true - alive bullet / false - bullet dead
        bulletList.push(this);
    }
    this.update = function(){
        this.y -= 7;
        if(this.y <= 0){
            this.alive = false;
        }
    }
    this.checkHit = function(){
        for(let i = 0; i <enemyList.length; i++){
            if(this.y <= enemyList[i].y && this.x >= enemyList[i].x && this.x <= enemyList[i].x + 40){
                score++;
                this.alive = false; // bullet dead
                enemyList.splice(i,1);
            }
        }
    }
}

function generateRandomValue(min, max){
    let randomNum = Math.floor(Math.random()*(max-min+1)) + min;
    return randomNum;
}
let enemyList = [];
function Enemy(){
    this.x = 0;
    this.y = 0;
    this.init = function(){
        this.x = generateRandomValue(0, canvas.width - 64);
        this.y = 0;
        enemyList.push(this);
    }
    this.update = function(){
        this.y += 5;
        if(this.y >= canvas.height - 64){
            gameOver = true;
        }
    }
}
function loadImage(){
    backgroundImage = new Image();
    backgroundImage.src = "images/space.gif";
    
    spaceshipImage = new Image();
    spaceshipImage.src = "images/spaceship.png";

    bulletImage = new Image();
    bulletImage.src = "images/bulletImage.png";

    enemyImage = new Image();
    enemyImage.src = "images/enemyImage.png";

    gameOverImage = new Image();
    gameOverImage.src = "images/gameover.jpg";
}

let keysDown={}
function setsupKeyboardListner(){
    document.addEventListener("keydown", function(event){
        keysDown[event.keyCode] = true
    });
    document.addEventListener("keyup", function(event){
        delete keysDown[event.keyCode]
        
    if(event.keyCode == 32) {
        createBullet() // make bullet
        }    
    });
}

function createBullet(){
    let b = new Bullet();
    b.init();
}

function createEnemy(){
    const interval = setInterval(function(){
        let e = new Enemy();
        e.init()
    }, 1000)
}
function update(){
    if(39 in keysDown){ // right
        spaceshipX += 5; // speed of the spaceship
    }
    if(37 in keysDown){ // left
        spaceshipX -= 5; // speed of the spaceship
    }

    // let the spaceship inside the grid
    if(spaceshipX <= 0){
        spaceshipX = 0;
    }
    if(spaceshipX >= canvas.width - 34){
        spaceshipX = canvas.width - 34;    
    }

    for(let i = 0; i < bulletList.length; i++){
        if(bulletList[i].alive){
            bulletList[i].update();
            bulletList[i].checkHit();
        }
        
    }
    for(let i = 0; i < enemyList.length; i++){
        enemyList[i].update();
    
    }

}
function render(){
    ctx.drawImage(backgroundImage, 0, 0, 400, 700);
    ctx.drawImage(spaceshipImage, spaceshipX, spaceshipY);
    ctx.fillText(`Score:${score}`, 20, 20);
    ctx.fillStyle = "white";
    ctx.font = "20px Arial";
    for(let i = 0; i < bulletList.length; i++){
        if(bulletList[i].alive){
            ctx.drawImage(bulletImage, bulletList[i].x, bulletList[i].y);
        }
    }
    for(let i = 0; i < enemyList.length; i++){
        ctx.drawImage(enemyImage, enemyList[i].x, enemyList[i].y);
    }

}

function main(){
    if(!gameOver){
        update(); // update the status
        render(); // and draw
        requestAnimationFrame(main);
    }else{
        ctx.drawImage(gameOverImage, 0, 150,400, 320);
    }
}
loadImage();
setsupKeyboardListner();
createEnemy();
main();

            </script>
            <button class="gameButton"><a href="gamePage1">Play</a></button>
        
    </div>
    <script src="script1.js"></script>
</body>
</html>