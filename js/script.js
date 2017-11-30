/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var DatePicker = __webpack_require__(1);
var navbarMenu = __webpack_require__(2);
var modal = __webpack_require__(3);

/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


$(document).ready(function () {
    $('.date').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        changeMonth: true,
        changeYear: true
    });
});

/***/ }),
/* 2 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var dropdownMenu = document.getElementById('navbar-dropmenu');
var menuButton = document.getElementById('menu-button');
var navitems = document.getElementsByClassName('navbar--mobile--menu--list-item');

var toggleMenu = function toggleMenu() {
    if (dropdownMenu.style.height == '14em' || dropdownMenu.style.height == '10.5em') {
        dropdownMenu.style.height = '0';
        for (var i = 0; i < navitems.length; i++) {
            navitems[i].style.display = 'none';
        }
    } else {
        if (navitems.length == 8) {
            dropdownMenu.style.height = '14em';
        } else {
            dropdownMenu.style.height = '10.5em';
        }
        setTimeout(function () {
            for (var _i = 0; _i < navitems.length; _i++) {
                navitems[_i].style.display = 'block';
            }
        }, 600);
    }
};

menuButton.addEventListener('click', toggleMenu);

/***/ }),
/* 3 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


//Getting the images, the modal close button, the modal image, and the modal
var profile_images_Array = Array.from(document.getElementsByClassName('profile-gallery--image'));
var closeBtn = document.getElementById('modal-close');
var modal = document.getElementById('modal');
var modal_image = document.getElementById('modal-image');

//method to open the modal and disply the clicked image
var openModal = function openModal(e) {
    if (e.target.className == 'profile-gallery--image') {
        var src = e.target.getAttribute('src');
        modal_image.setAttribute('src', src);
        modal.style.display = 'flex';
    }
};

//method to close the modal when the close button is clicked
var closeModal = function closeModal() {
    modal.style.display = 'none';
};

//add the event listeners on the close button, and all of the images in the image array
closeBtn.addEventListener('click', closeModal);

for (var i = 0; i < profile_images_Array.length; i++) {
    profile_images_Array[i].addEventListener('click', openModal);
}

/***/ })
/******/ ]);