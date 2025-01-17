let level = 1;
let currentRoadId = 1;
const totalRoads = 8;

function updateInfo() {
    document.querySelector('.level-info').textContent = level;
    document.querySelector('.road-info').textContent = currentRoadId;
}

function resetGame() {
    const buttonContainer = document.querySelector('.button-container');
    const duck = document.getElementById('duck');
    const firstRoad = document.getElementById('road1');
    firstRoad.appendChild(duck);
    duck.style.left = '50%';
    duck.style.top = '50%';
    duck.style.transform = 'translate(-50%, -50%)';
    duck.classList.remove('gif');
    const secondRoad = document.getElementById('road2');
    secondRoad.appendChild(buttonContainer);
    buttonContainer.style.left = '50%';
    buttonContainer.style.top = '50%';
    buttonContainer.style.transform = 'translate(-50%, -50%)';
    buttonContainer.style.display = 'block';
    currentRoadId = 1; // Resetuj ID drogi
    updateInfo();
}

function moveDuck() {
    const duck = document.getElementById('duck');
    const currentRoad = document.getElementById(`road${currentRoadId}`);
    currentRoadId = (currentRoadId % totalRoads) + 1;
    const nextRoad = document.getElementById(`road${currentRoadId}`);
    const buttonContainer = document.querySelector('.button-container');

    buttonContainer.style.display = 'none';

    const currentRect = currentRoad.getBoundingClientRect();
    const nextRect = nextRoad.getBoundingClientRect();
    const distanceX = nextRect.left - currentRect.left;
    const distanceY = nextRect.top - currentRect.top;

    duck.style.transition = `left 1s ease, top 1s ease`;
    duck.style.left = `${duck.offsetLeft + distanceX}px`;
    duck.style.top = `${duck.offsetTop + distanceY}px`;

    duck.classList.add('gif');

    buttonContainer.style.transition = `left 1s ease, top 1s ease`;
    buttonContainer.style.left = `${buttonContainer.offsetLeft + distanceX}px`;
    buttonContainer.style.top = `${buttonContainer.offsetTop + distanceY}px`;

    duck.addEventListener('transitionend', () => {
        nextRoad.appendChild(duck);
        duck.style.transition = '';
        duck.style.left = '50%';
        duck.style.top = '50%';
        duck.style.transform = 'translate(-50%, -50%)';

        duck.classList.remove('gif');

        const buttonRoadId = (currentRoadId % totalRoads) + 1;
        const buttonRoad = document.getElementById(`road${buttonRoadId}`);
        buttonRoad.appendChild(buttonContainer);
        buttonContainer.style.transition = '';
        buttonContainer.style.left = '50%';
        buttonContainer.style.top = '50%';
        buttonContainer.style.transform = 'translate(-50%, -50%)';
        buttonContainer.style.display = 'block';

        if (currentRoadId === totalRoads) {
            level = level + 1;
            resetGame();
        }

        updateInfo();
    }, { once: true });
}

function createCar(road) {
    const car = document.createElement('div');
    car.classList.add('car');
    road.appendChild(car);

    const carImages = ['car1.png', 'car2.png', 'car3.png', 'car4.png'];
    const randomImage = carImages[Math.floor(Math.random() * carImages.length)];
    car.style.backgroundImage = `url('/ProjektDuckHelp/public/images/${randomImage}')`;

    const randomHue = Math.floor(Math.random() * 360);
    car.style.filter = `hue-rotate(${randomHue}deg)`;

    const carSpeed = 3 - Math.min(2, (level * 0.2));
    car.style.transition = `top ${carSpeed}s linear, opacity 2s ease`;

    setTimeout(() => {
        car.style.top = '100%';
    }, 100);

    setTimeout(() => {
        car.classList.add('fade-out');
    }, carSpeed * 1000 - 900);

    car.addEventListener('transitionend', () => {
        car.remove();
    });
}

function sendDataToServer(data) {
    fetch('/ProjektDuckHelp/public/game/index/endturn', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
        .then(response => response.json())
        .then(responseData => {
            console.log('Odpowiedź z serwera:', responseData);
        })
        .catch(error => {
            console.error('Błąd podczas przesyłania danych:', error);
        });
}

function startCarGeneration() {
    let previousDelay = 0;
    setInterval(() => {
        for (let i = 2; i <= totalRoads; i++) {
            if (i !== currentRoadId) {
                const road = document.getElementById(`road${i}`);
                let randomDelay;
                do {
                    randomDelay = Math.max(500 + Math.random() * 100, Math.random() * (4000 - (level * 150)));
                } while (randomDelay === previousDelay);

                previousDelay = randomDelay;
                setTimeout(() => {
                    createCar(road);
                }, randomDelay);
            }
        }
    }, 5000 - (level * 100));
}

function changeLevel(new_level) {
    level = new_level;
    updateInfo();
}

function checkCollision() {
    const duck = document.getElementById('duck');
    const duckRect = duck.getBoundingClientRect();

    const cars = document.querySelectorAll('.car');
    cars.forEach(car => {
        const carRect = car.getBoundingClientRect();

        if (
            duckRect.left < carRect.left + carRect.width &&
            duckRect.left + duckRect.width > carRect.left &&
            duckRect.top < carRect.top + carRect.height &&
            duckRect.top + duckRect.height > carRect.top
        ) {
            sendDataToServer({ id_level: level, id_road: currentRoadId });
            level = 1;
            resetGame();
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    updateInfo();
    startCarGeneration();
    setInterval(checkCollision, 100);
});