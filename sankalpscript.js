// declare vars
var $images = document.getElementsByTagName('figure'),
    // ids
    $preLoader = document.getElementById('pre-loader'),
    $container = document.getElementById('container'),
    $cursor = document.getElementById('cursor'),
    $menu = document.getElementById('menu'),
    // classes
    $hoverSmallBlack = document.getElementsByClassName('small-black'),
    $hoverSmallWhite = document.getElementsByClassName('small-white'),
    // functions
    hoverSmallBlack,
    hoverSmallWhite,
    customClick,
    navHover;

// 
(customClick = function () {
    $container.addEventListener('mousedown', function () {

        $cursor.classList.add('active');
    });
    $container.addEventListener('mouseup', function () {

        $cursor.classList.remove('active');
    });
})();

(hoverSmallWhite = function () {

    for (var i = 0; i < $hoverSmallWhite.length; i++) {

        var item = $hoverSmallWhite[i];

        item.addEventListener("mouseover", function () {
            $cursor.classList.add('small');
            console.log($hoverSmallWhite[i]);
        }, false);

        item.addEventListener("mouseout", function () {
            $cursor.classList.remove('small');

        }, false);
    }
})();

(hoverSmallBlack = function () {

    for (var i = 0; i < $hoverSmallBlack.length; i++) {

        var item = $hoverSmallBlack[i];

        item.addEventListener("mouseover", function () {
            $cursor.classList.add('small-black');
            console.log($hoverSmallBlack[i]);
        }, false);

        item.addEventListener("mouseout", function () {
            $cursor.classList.remove('small-black');

        }, false);
    }
})();



var counter = 0,
    preLoader = function () {

        if (counter < 1) {
            $preLoader.classList.add('_1');
            $container.classList.add('hide');
            // subTextFadeIn();
            console.log('1');
        }
        if (counter == 1) {
            $preLoader.classList.add('_2');
            console.log('2');
        }

        if (counter == 2) {
            $preLoader.classList.remove('_1');
            $preLoader.classList.remove('_2');
            $container.classList.add('reveal');
            console.log('3');
            counter = -1;
        }

        counter++;

        console.log(counter);


    }

// preloader effect on click functions
$menu.addEventListener('click', function () {
    preLoader()
});

$preLoader.addEventListener('click', function () {
    preLoader()
});

$container.addEventListener('click', function () {
    preLoader()
});


// hide mouse for dribbble
document.body.onkeyup = function (e) {

    if (e.keyCode == 32) {
        preLoader();

    }

    if (e.keyCode > 33) {
        $cursor.classList.add('hidden')
    }
}


//when page ready
$(document).ready(function () {

    //load parallax
    $('#container').parallax();

});


// custom cursor
class MouseCursor {
    constructor() {
        this.container = document.querySelector('#container');

        const cursor = document.querySelector('.cursor');

        TweenLite.to(cursor, {
            autoAlpha: 0,
        });
    }

    moveMousePos(e) {
        const mousePosX = e.clientX;
        const mousePosY = e.clientY;
        const cursor = document.querySelector('.cursor');

        if (e.target.classList.contains('c-magnetic')) return;

        TweenLite.to(cursor, 0.5, {
            x: mousePosX,
            y: mousePosY,
            ease: Power4.easeOut,
        });
    }

    enterMouse() {
        const cursor = document.querySelector('.cursor');

        TweenLite.to(cursor, 1, {
            autoAlpha: 1,
            ease: Power4.easeIn,
        });
    }

    handleMousePos() {

        const $container = document.getElementById('container');

        $container.addEventListener('mouseenter', this.enterMouse);
        $container.addEventListener('mousemove', this.moveMousePos, false);
    }

    render() {
        this.handleMousePos();
    }
}

class MagneticCursor {
    constructor() {
        this.cursor = document.querySelector('.cursor');
        this.pos = {
            x: 0,
            y: 0
        };
    }

    moveCursor(e, link, force) {
        var rect = link.getBoundingClientRect();
        var relX = e.containerX - rect.left;
        var relY = e.containerY - rect.top;
        this.pos.x = rect.left + rect.width / 2 + (relX - rect.width / 2) / force;
        this.pos.y = rect.top + rect.height / 2 + (relY - rect.height / 2) / force;

        TweenMax.to(this.cursor, 0.3, {
            x: this.pos.x,
            y: this.pos.y
        });
    }

}

const mouseCursor = new MouseCursor();

mouseCursor.render();