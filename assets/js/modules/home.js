const homepageMainEl = document.querySelector('main.home');

const updateCursorByMouse = (e) => {
  var x = e.clientX;
  var y = e.clientY;

  const root = document.documentElement;

  root.style.setProperty('--cursorX', x + 'px');
  root.style.setProperty('--cursorY', y + 'px');
};

const updateCursor = () => {};

document.addEventListener('mousemove', updateCursorByMouse);
document.addEventListener('touchmove', updateCursorByMouse);

function isTouchDevice() {
  return (
    'ontouchstart' in window ||
    navigator.maxTouchPoints > 0 ||
    navigator.msMaxTouchPoints > 0
  );
}

if (isTouchDevice()) {
  const h1Rect = document.querySelector('h1').getClientRects()[0];
  const root = document.documentElement;
  let isIncrease = true;

  const cursorY = h1Rect.top - 80;
  const cursorXStart = h1Rect.left;
  const cursorXEnd = h1Rect.right;

  root.style.setProperty('--cursorY', cursorY + 'px');
  root.style.setProperty('--cursorX', '-5px');

  for (i = 0; i < 5; i++) {}

  setInterval(() => {
    before = root.style.getPropertyValue('--cursorX');
    let beforeVal = parseInt(before.replace('px', ''));

    if (beforeVal <= cursorXEnd && isIncrease) {
      beforeVal += 1;
      root.style.setProperty('--cursorX', beforeVal + 'px');
      return;
    } else {
      isIncrease = false;
    }

    if (beforeVal >= cursorXStart && !isIncrease) {
      beforeVal -= 1;
    } else {
      isIncrease = true;
    }

    root.style.setProperty('--cursorX', beforeVal + 'px');
  }, 10);
}

/************************ */
const firstSlide = document.querySelector('#home_first_slide');

if (firstSlide) {
  firstSlide.addEventListener('click', () => {
    firstSlide.classList.remove('active');
  });
}

//-------------------------------------------------------------------------------Set Cookie

function setCookie(cookie_name, cookie_value, expireDays) {
  const date = new Date();
  date.setTime(date.getTime() + expireDays * 24 * 60 * 60 * 1000);

  const expires = 'expires=' + date.toUTCString();
  document.cookie =
    cookie_name + '=' + cookie_value + ';' + expires + ';path=/';
}

function getCookie(cookie_name) {
  let name = cookie_name + '=';
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return '';
}

if (homepageMainEl) {
  const preloaderCookie = getCookie('preloader');

  window.addEventListener('load', () => {
    if (!preloaderCookie) {
      setCookie('preloader', 'none', 1);
    }
  });
}
