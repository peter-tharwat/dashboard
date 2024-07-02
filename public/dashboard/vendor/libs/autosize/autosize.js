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
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/autosize/dist/autosize.esm.js":
/*!****************************************************!*\
  !*** ./node_modules/autosize/dist/autosize.esm.js ***!
  \****************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\nvar e=new Map;function t(t){var o=e.get(t);o&&o.destroy()}function o(t){var o=e.get(t);o&&o.update()}var r=null;\"undefined\"==typeof window?((r=function(e){return e}).destroy=function(e){return e},r.update=function(e){return e}):((r=function(t,o){return t&&Array.prototype.forEach.call(t.length?t:[t],function(t){return function(t){if(t&&t.nodeName&&\"TEXTAREA\"===t.nodeName&&!e.has(t)){var o,r=null,n=window.getComputedStyle(t),i=(o=t.value,function(){a({testForHeightReduction:\"\"===o||!t.value.startsWith(o),restoreTextAlign:null}),o=t.value}),l=function(o){t.removeEventListener(\"autosize:destroy\",l),t.removeEventListener(\"autosize:update\",s),t.removeEventListener(\"input\",i),window.removeEventListener(\"resize\",s),Object.keys(o).forEach(function(e){return t.style[e]=o[e]}),e.delete(t)}.bind(t,{height:t.style.height,resize:t.style.resize,textAlign:t.style.textAlign,overflowY:t.style.overflowY,overflowX:t.style.overflowX,wordWrap:t.style.wordWrap});t.addEventListener(\"autosize:destroy\",l),t.addEventListener(\"autosize:update\",s),t.addEventListener(\"input\",i),window.addEventListener(\"resize\",s),t.style.overflowX=\"hidden\",t.style.wordWrap=\"break-word\",e.set(t,{destroy:l,update:s}),s()}function a(e){var o,i,l=e.restoreTextAlign,s=void 0===l?null:l,d=e.testForHeightReduction,u=void 0===d||d,c=n.overflowY;if(0!==t.scrollHeight&&(\"vertical\"===n.resize?t.style.resize=\"none\":\"both\"===n.resize&&(t.style.resize=\"horizontal\"),u&&(o=function(e){for(var t=[];e&&e.parentNode&&e.parentNode instanceof Element;)e.parentNode.scrollTop&&t.push([e.parentNode,e.parentNode.scrollTop]),e=e.parentNode;return function(){return t.forEach(function(e){var t=e[0],o=e[1];t.style.scrollBehavior=\"auto\",t.scrollTop=o,t.style.scrollBehavior=null})}}(t),t.style.height=\"\"),i=\"content-box\"===n.boxSizing?t.scrollHeight-(parseFloat(n.paddingTop)+parseFloat(n.paddingBottom)):t.scrollHeight+parseFloat(n.borderTopWidth)+parseFloat(n.borderBottomWidth),\"none\"!==n.maxHeight&&i>parseFloat(n.maxHeight)?(\"hidden\"===n.overflowY&&(t.style.overflow=\"scroll\"),i=parseFloat(n.maxHeight)):\"hidden\"!==n.overflowY&&(t.style.overflow=\"hidden\"),t.style.height=i+\"px\",s&&(t.style.textAlign=s),o&&o(),r!==i&&(t.dispatchEvent(new Event(\"autosize:resized\",{bubbles:!0})),r=i),c!==n.overflow&&!s)){var v=n.textAlign;\"hidden\"===n.overflow&&(t.style.textAlign=\"start\"===v?\"end\":\"start\"),a({restoreTextAlign:v,testForHeightReduction:!0})}}function s(){a({testForHeightReduction:!0,restoreTextAlign:null})}}(t)}),t}).destroy=function(e){return e&&Array.prototype.forEach.call(e.length?e:[e],t),e},r.update=function(e){return e&&Array.prototype.forEach.call(e.length?e:[e],o),e});var n=r;/* harmony default export */ __webpack_exports__[\"default\"] = (n);\n\n\n//# sourceURL=webpack://Vuexy/./node_modules/autosize/dist/autosize.esm.js?");

/***/ }),

/***/ "./libs/autosize/autosize.js":
/*!***********************************!*\
  !*** ./libs/autosize/autosize.js ***!
  \***********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   autosize: function() { return /* reexport safe */ autosize__WEBPACK_IMPORTED_MODULE_0__[\"default\"]; }\n/* harmony export */ });\n/* harmony import */ var autosize__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! autosize */ \"./node_modules/autosize/dist/autosize.esm.js\");\n\ntry {\n  window.autosize = autosize__WEBPACK_IMPORTED_MODULE_0__[\"default\"];\n} catch (e) {}\n\n\n//# sourceURL=webpack://Vuexy/./libs/autosize/autosize.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./libs/autosize/autosize.js");
/******/ 	
/******/ 	return __webpack_exports__;
/******/ })()
;
});