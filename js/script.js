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


var functions = __webpack_require__(1);
var DatePicker = __webpack_require__(2);
var navbarMenu = __webpack_require__(3);
var signup = __webpack_require__(4);

/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var functions = function functions() {
    _classCallCheck(this, functions);
};

/***/ }),
/* 2 */
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
/* 3 */
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
/* 4 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


$(document).ready(function () {
    //variable to check if the fields on the form has been validated. Only run AJAX call if it's true
    var formsValidated = 0;

    //function to see if a given form element is empty or not, takes an input, and a label
    var validateForm = function validateForm(formElement, errorElement) {
        //        console.log(formElement);
        if (formElement.trim() == "") {
            errorElement.html('*~~ You must enter a value in the field. ~~*');
            return false;
        } else {
            errorElement.html('');
            return true;
        }
    };

    //validate all the fields

    $('#signup-submit').click(function () {

        if (validateForm($('#signup-name').val(), $('#name-error'))) {
            formsValidated += 1;
        }

        if (validateForm($('#signup-username').val(), $('#username-error'))) {
            formsValidated += 1;
        }

        if (validateForm($('#signup-password').val(), $('#password-error'))) {
            formsValidated += 1;
        }

        if (validateForm($('#signup-dob').val(), $('#dob-error'))) {
            formsValidated += 1;
        }

        if (validateForm($('#signup-fave_pet').val(), $('#fave-pet-error'))) {
            formsValidated += 1;
        }

        if (validateForm($('#signup-fave_food').val(), $('#fave-food-error'))) {
            formsValidated += 1;
        }

        if (validateForm($('#signup-born_at').val(), $('#born-at-error'))) {
            formsValidated += 1;
        }

        //if the forms are validated, then process the AJAX request.
        if (formsValidated == 7) {
            $.ajax({
                method: "POST",
                url: "../test.php"
            }).done(function (data) {
                //            console.log(data);
                $('#signup-header').remove();
                $('#signup-main').remove();
                $('#signup-container').append(data);
                window.scrollTo(0, 0);
            }).fail(function () {
                alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
            });
        } else {
            formsValidated = 0;
        }
    });
});

/***/ })
/******/ ]);