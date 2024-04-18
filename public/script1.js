// Setting Canvas
let canvas;
let ctx;
canvas = document.createElement("canvas")
ctx = canvas.getContext("2d")
canvas.width = 400;
canvas.height = 500;
document.getElementById("game1").appendChild(canvas);
let backgroundImage, spaceshipImage, bulletImage, enemyImage, gameOverImage;
let gameOver = false // true - game done, false - game not done
// spaceship movement
let spaceshipX = canvas.width / 2 - 32;
let spaceshipY = canvas.height - 64;

let bulletList = []; // bullets list
let score = 0;
function Bullet() {
    this.x = 0;
    this.y = 0;
    this.init = function () {
        this.x = spaceshipX;
        this.y = spaceshipY;
        this.alive = true // true - alive bullet / false - bullet dead
        bulletList.push(this);
    }
    this.update = function () {
        this.y -= 7;
        if (this.y <= 0) {
            this.alive = false;
        }
    }
    this.checkHit = function () {
        for (let i = 0; i < enemyList.length; i++) {
            if (this.y <= enemyList[i].y && this.x >= enemyList[i].x && this.x <= enemyList[i].x + 40) {
                score++;
                this.alive = false; // bullet dead
                enemyList.splice(i, 1);
            }
        }
    }
}

function sendScoreToPHP(score) {
    var xhr = new XMLHttpRequest();
   
    xhr.open('POST', 'score.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var phpVariable = xhr.responseText; 
            console.log(phpVariable);
        }
    };
    xhr.send('score=' + score);
}

function generateRandomValue(min, max) {
    let randomNum = Math.floor(Math.random() * (max - min + 1)) + min;
    return randomNum;
}
let enemyList = [];
function Enemy() {
    this.x = 0;
    this.y = 0;
    this.init = function () {
        this.x = generateRandomValue(0, canvas.width - 64);
        this.y = 0;
        enemyList.push(this);
    }
    this.update = function () {
        this.y += 5;
        if (this.y >= canvas.height - 64) {
            gameOver = true;
            
        }
    }
}
function loadImage() {
    backgroundImage = new Image();
    backgroundImage.src = "images/space.png";

    spaceshipImage = new Image();
    spaceshipImage.src = "images/spaceship.png";

    bulletImage = new Image();
    bulletImage.src = "images/bulletImage.png";

    enemyImage = new Image();
    enemyImage.src = "images/enemyImage.png";

    gameOverImage = new Image();
    gameOverImage.src = "images/gameover.png";
}

let keysDown = {}
function setsupKeyboardListner() {
    document.addEventListener("keydown", function (event) {
        keysDown[event.keyCode] = true
    });
    document.addEventListener("keyup", function (event) {
        delete keysDown[event.keyCode]

        if (event.keyCode == 32) {
            createBullet() // make bullet
        }
    });
}

function createBullet() {
    let b = new Bullet();
    b.init();
}

function createEnemy() {
    const interval = setInterval(function () {
        let e = new Enemy();
        e.init()
    }, 1000)
}
function update() {
    if (39 in keysDown) { // right
        spaceshipX += 5; // speed of the spaceship
    }
    if (37 in keysDown) { // left
        spaceshipX -= 5; // speed of the spaceship
    }

    // let the spaceship inside the grid
    if (spaceshipX <= 0) {
        spaceshipX = 0;
    }
    if (spaceshipX >= canvas.width - 34) {
        spaceshipX = canvas.width - 34;
    }

    for (let i = 0; i < bulletList.length; i++) {
        if (bulletList[i].alive) {
            bulletList[i].update();
            bulletList[i].checkHit();
        }
    }
    for (let i = 0; i < enemyList.length; i++) {
        enemyList[i].update();

    }

}
function render() {
    ctx.drawImage(backgroundImage, 0, 0, 400, 700);
    ctx.drawImage(spaceshipImage, spaceshipX, spaceshipY);
    ctx.fillText(`Score:${score}`, 20, 20);
    ctx.fillStyle = "#EC297B";
    ctx.font = "20px Arial";
    for (let i = 0; i < bulletList.length; i++) {
        if (bulletList[i].alive) {
            ctx.drawImage(bulletImage, bulletList[i].x, bulletList[i].y);
        }
    }
    for (let i = 0; i < enemyList.length; i++) {
        ctx.drawImage(enemyImage, enemyList[i].x, enemyList[i].y);
    }

}
function restartGame() {
    gameOver = false;
    score = 0;
    bulletList = [];
    enemyList = [];
    spaceshipX = canvas.width / 2 - 32;
    spaceshipY = canvas.height - 64;
    createEnemy();
}

function main() {
    if (!gameOver) {
        update();
        render();
        requestAnimationFrame(main);
    } else {
        ctx.drawImage(gameOverImage, 0, 100, 400, 300);
    }
}
loadImage();
setsupKeyboardListner();
createEnemy();
main();

document.addEventListener("click", function (event) {
    if (gameOver) {
        restartGame();
        main();
    }
});
