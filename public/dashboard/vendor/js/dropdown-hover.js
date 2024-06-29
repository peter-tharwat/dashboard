/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(function webpackUniversalModuleDefinition(root, factory) {
	if(typeof exports === 'object' && typeof module === 'object')
		module.exports = factory();
	else if(typeof define === 'function' && define.amd)
		define([], factory);
	else {
		var a = factory();
		for(var i in a) (typeof exports === 'object' ? exports : root)[i] = a[i];
	}
})(self, function() {
return /******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./js/dropdown-hover.js":
/*!******************************!*\
  !*** ./js/dropdown-hover.js ***!
  \******************************/
/***/ (function() {

eval("// Add onHover event for dropdowns\n\n;\n(function ($) {\n  if (!$ || !$.fn) return;\n  var SELECTOR = '[data-bs-toggle=dropdown][data-trigger=hover]';\n  var TIMEOUT = 150;\n  function openDropdown($i) {\n    var t = $i.data('dd-timeout');\n    if (t) {\n      clearTimeout(t);\n      t = null;\n      $i.data('dd-timeout', t);\n    }\n    if ($i.attr('aria-expanded') !== 'true') $i.dropdown('toggle');\n  }\n  function closeDropdown($i) {\n    var t = $i.data('dd-timeout');\n    if (t) clearTimeout(t);\n    t = setTimeout(function () {\n      var t2 = $i.data('dd-timeout');\n      if (t2) {\n        clearTimeout(t2);\n        t2 = null;\n        $i.data('dd-timeout', t2);\n      }\n      if ($i.attr('aria-expanded') === 'true') $i.dropdown('toggle');\n    }, TIMEOUT);\n    $i.data('dd-timeout', t);\n  }\n  $(function () {\n    $('body').on('mouseenter', \"\".concat(SELECTOR, \", \").concat(SELECTOR, \" ~ .dropdown-menu\"), function () {\n      var $toggle = $(this).hasClass('dropdown-toggle') ? $(this) : $(this).prev('.dropdown-toggle');\n      var $dropdown = $(this).hasClass('dropdown-menu') ? $(this) : $(this).next('.dropdown-menu');\n      if (window.getComputedStyle($dropdown[0], null).getPropertyValue('position') === 'static') return;\n\n      // Set hovered flag\n      if ($(this).is(SELECTOR)) {\n        $(this).data('hovered', true);\n      }\n      openDropdown($(this).hasClass('dropdown-toggle') ? $(this) : $(this).prev('.dropdown-toggle'));\n    }).on('mouseleave', \"\".concat(SELECTOR, \", \").concat(SELECTOR, \" ~ .dropdown-menu\"), function () {\n      var $toggle = $(this).hasClass('dropdown-toggle') ? $(this) : $(this).prev('.dropdown-toggle');\n      var $dropdown = $(this).hasClass('dropdown-menu') ? $(this) : $(this).next('.dropdown-menu');\n      if (window.getComputedStyle($dropdown[0], null).getPropertyValue('position') === 'static') return;\n\n      // Remove hovered flag\n      if ($(this).is(SELECTOR)) {\n        $(this).data('hovered', false);\n      }\n      closeDropdown($(this).hasClass('dropdown-toggle') ? $(this) : $(this).prev('.dropdown-toggle'));\n    }).on('hide.bs.dropdown', function (e) {\n      if ($(this).find(SELECTOR).data('hovered')) e.preventDefault();\n    });\n  });\n})(window.jQuery);\n\n//# sourceURL=webpack://Vuexy/./js/dropdown-hover.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./js/dropdown-hover.js"]();
/******/ 	
/******/ 	return __webpack_exports__;
/******/ })()
;
});