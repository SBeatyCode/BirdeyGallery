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
var editProfile = __webpack_require__(5);
var profileImage = __webpack_require__(6);
var login = __webpack_require__(7);
var uploadArt = __webpack_require__(8);
var artInfo = __webpack_require__(9);

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

            //submit the form, then make the ajax call
            $('#signupForm').submit();

            $.ajax({
                method: "POST",
                url: "signup-action.php", //signup-action.php
                data: $('#signupForm').serialize(),
                cache: false
            }).done(function (data) {
                $('#signup-header').remove();
                $('#signup-main').remove();
                $('#signup-container').append(data);
                window.scrollTo(0, 0);
            }).fail(function (data) {
                alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
                console.log(data.statusText);
                console.log(data);
                window.scrollTo(0, 0);
            });
            //reset the validation counter so it can't be resuubmitted over and over
            formsValidated = 0;
        } else {
            //forms not validated
            formsValidated = 0;
        }
    });
});

/***/ }),
/* 5 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


$(document).ready(function () {
    //variable to check if the fields on the form has been validated. Only run AJAX call if it's true
    var formsValidated = 0;

    //function to see if a given form element is empty or not, takes an input, and a label
    var validateForm = function validateForm(formElement, errorElement) {
        if (formElement.trim() == "") {
            errorElement.html('*~~ You must enter a value in the field. ~~*');
            return false;
        } else {
            errorElement.html('');
            return true;
        }
    };

    //validate all the fields

    $('#editProfileSubmit').click(function () {

        console.log('hey clickboy');

        if (validateForm($('#editProfileName').val(), $('#name-error'))) {
            formsValidated += 1;
        }

        if (validateForm($('#editProfileUsername').val(), $('#username-error'))) {
            formsValidated += 1;
        }

        if (validateForm($('#editProfilePassword').val(), $('#password-error'))) {
            formsValidated += 1;
        }

        if (validateForm($('#editProfileDob').val(), $('#dob-error'))) {
            formsValidated += 1;
        }

        if (validateForm($('#editProfileFavePet').val(), $('#fave-pet-error'))) {
            formsValidated += 1;
        }

        if (validateForm($('#editProfileFaveFood').val(), $('#fave-food-error'))) {
            formsValidated += 1;
        }

        if (validateForm($('#editProfileBornAt').val(), $('#born-at-error'))) {
            formsValidated += 1;
        }

        //if the forms are validated, then process the AJAX request.
        if (formsValidated == 7) {
            $.ajax({
                method: "POST",
                url: "edit-profile-action.php",
                data: $('#editProfileForm').serialize(),
                cache: false
            }).done(function (data) {
                $('#editProfileHeader').remove();
                $('#editProfileMain').remove();
                $('#editProfileContainer').append(data);
                window.scrollTo(0, 0);
            }).fail(function (data) {
                alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
                console.log(data.statusText);
                console.log(data);
                window.scrollTo(0, 0);
            });
            //reset the validation counter so it can't be resuubmitted over and over
            formsValidated = 0;
        } else {
            //forms not validated
            formsValidated = 0;
        }
    });
});

/***/ }),
/* 6 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


$(document).ready(function () {
    $('#profileImage--submit').click(function (e) {

        var formData = new FormData($('#profileImageForm')[0]);

        $.ajax({
            type: "POST",
            url: "edit-profile-image-action.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (data) {
            $('#profileImageHeader').remove();
            $('#profileImageMain').remove();
            $('#profileImageContainer').append(data);
            window.scrollTo(0, 0);
        }).fail(function (data) {
            alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
            console.log(data.statusText);
            console.log(data);
            window.scrollTo(0, 0);
        });
    });
});

/***/ }),
/* 7 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


$(document).ready(function () {
    //variable to check if the fields on the form has been validated. Only run AJAX call if it's true
    var formsValidated = 0;

    //function to see if a given form element is empty or not, takes an input, and a label
    var validateForm = function validateForm(formElement, errorElement) {
        if (formElement.trim() == "") {
            errorElement.html('*~~ You must enter a value in the field. ~~*');
            return false;
        } else {
            errorElement.html('');
            return true;
        }
    };

    //validate all the fields

    $('#login-form-button').click(function () {
        if (validateForm($('#loginUsername').val(), $('#username-login-error'))) {
            formsValidated += 1;
        }

        if (validateForm($('#loginPassword').val(), $('#password-login-error'))) {
            formsValidated += 1;
        }

        //if the forms are validated, then process the AJAX request.
        if (formsValidated == 2) {
            //submit the form, then make the ajax call
            $('#loginForm').submit();

            $.ajax({
                method: "POST",
                url: "login-action.php", //signup-action.php
                data: $('#loginForm').serialize(),
                cache: false
            }).done(function (data) {
                $('#loginHeader').remove();
                $('#loginMain').remove();
                $('#loginContainer').append(data);
                window.scrollTo(0, 0);
            }).fail(function (data) {
                alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
                console.log(data.statusText);
                console.log(data);
                window.scrollTo(0, 0);
            });
            //reset the validation counter so it can't be resuubmitted over and over
            formsValidated = 0;
        } else {
            //forms not validated
            formsValidated = 0;
        }
    });
});

/***/ }),
/* 8 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


$(document).ready(function () {
    $('#uploadArtSubmit').click(function (e) {

        var formData = new FormData($('#uploadArtForm')[0]);

        $.ajax({
            type: "POST",
            url: "upload-art-action.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (data) {
            $('#uploadArtHeader').remove();
            $('#uploadArtMain').remove();
            $('#uploadArtContainer').append(data);
            window.scrollTo(0, 0);
        }).fail(function (data) {
            alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
            console.log(data.statusText);
            console.log(data);
            window.scrollTo(0, 0);
        });
    });
});

/***/ }),
/* 9 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


$(document).ready(function () {
    //variable to check if the fields on the form has been validated. Only run AJAX call if it's true
    var formsValidated = 0;

    //function to see if a given form element is empty or not, takes an input, and a label
    var validateForm = function validateForm(formElement, errorElement) {
        if (formElement.trim() == "") {
            errorElement.html('*~~ You must enter a value in the field. ~~*');
            return false;
        } else {
            errorElement.html('');
            return true;
        }
    };

    //validate all the fields

    $('#artInfoSubmit').click(function () {

        if (validateForm($('#art_title').val(), $('#art_title-error'))) {
            formsValidated += 1;
        }

        if (validateForm($('#art_date').val(), $('#art_date-error'))) {
            formsValidated += 1;
        }

        //if the forms are validated, then process the AJAX request.
        if (formsValidated == 2) {
            $.ajax({
                method: "POST",
                url: "art-info-action.php",
                data: $('#artInfoForm').serialize(),
                cache: false
            }).done(function (data) {
                $('#artInfoMain').remove();
                $('.container').append(data);
                window.scrollTo(0, 0);
            }).fail(function (data) {
                alert('Something went wrong with the server request. Please try again, or contact the network administrator.');
                console.log(data.statusText);
                console.log(data);
                window.scrollTo(0, 0);
            });
            //reset the validation counter so it can't be resuubmitted over and over
            formsValidated = 0;
        } else {
            //forms not validated
            formsValidated = 0;
        }
    });
});

/***/ })
/******/ ]);