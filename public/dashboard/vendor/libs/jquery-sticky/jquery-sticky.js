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
		module.exports = factory(require("jQuery"));
	else if(typeof define === 'function' && define.amd)
		define(["jQuery"], factory);
	else {
		var a = typeof exports === 'object' ? factory(require("jQuery")) : factory(root["jQuery"]);
		for(var i in a) (typeof exports === 'object' ? exports : root)[i] = a[i];
	}
})(self, function(__WEBPACK_EXTERNAL_MODULE_jquery__) {
return /******/ (function() { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./libs/jquery-sticky/jquery-sticky.js":
/*!*********************************************!*\
  !*** ./libs/jquery-sticky/jquery-sticky.js ***!
  \*********************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var jquery_sticky_jquery_sticky__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery-sticky/jquery.sticky */ \"./node_modules/jquery-sticky/jquery.sticky.js\");\n/* harmony import */ var jquery_sticky_jquery_sticky__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery_sticky_jquery_sticky__WEBPACK_IMPORTED_MODULE_0__);\n\n\n//# sourceURL=webpack://Vuexy/./libs/jquery-sticky/jquery-sticky.js?");

/***/ }),

/***/ "./node_modules/jquery-sticky/jquery.sticky.js":
/*!*****************************************************!*\
  !*** ./node_modules/jquery-sticky/jquery.sticky.js ***!
  \*****************************************************/
/***/ (function(module, exports, __webpack_require__) {

eval("var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;// Sticky Plugin v1.0.4 for jQuery\n// =============\n// Author: Anthony Garand\n// Improvements by German M. Bravo (Kronuz) and Ruud Kamphuis (ruudk)\n// Improvements by Leonardo C. Daronco (daronco)\n// Created: 02/14/2011\n// Date: 07/20/2015\n// Website: http://stickyjs.com/\n// Description: Makes an element on the page stick on the screen as you scroll\n//              It will only set the 'top' and 'position' of your element, you\n//              might need to adjust the width in some cases.\n\n(function (factory) {\n    if (true) {\n        // AMD. Register as an anonymous module.\n        !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! jquery */ \"jquery\")], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),\n\t\t__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?\n\t\t(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),\n\t\t__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));\n    } else {}\n}(function ($) {\n    var slice = Array.prototype.slice; // save ref to original slice()\n    var splice = Array.prototype.splice; // save ref to original slice()\n\n  var defaults = {\n      topSpacing: 0,\n      bottomSpacing: 0,\n      className: 'is-sticky',\n      wrapperClassName: 'sticky-wrapper',\n      center: false,\n      getWidthFrom: '',\n      widthFromWrapper: true, // works only when .getWidthFrom is empty\n      responsiveWidth: false,\n      zIndex: 'auto'\n    },\n    $window = $(window),\n    $document = $(document),\n    sticked = [],\n    windowHeight = $window.height(),\n    scroller = function() {\n      var scrollTop = $window.scrollTop(),\n        documentHeight = $document.height(),\n        dwh = documentHeight - windowHeight,\n        extra = (scrollTop > dwh) ? dwh - scrollTop : 0;\n\n      for (var i = 0, l = sticked.length; i < l; i++) {\n        var s = sticked[i],\n          elementTop = s.stickyWrapper.offset().top,\n          etse = elementTop - s.topSpacing - extra;\n\n        //update height in case of dynamic content\n        s.stickyWrapper.css('height', s.stickyElement.outerHeight());\n\n        if (scrollTop <= etse) {\n          if (s.currentTop !== null) {\n            s.stickyElement\n              .css({\n                'width': '',\n                'position': '',\n                'top': '',\n                'z-index': ''\n              });\n            s.stickyElement.parent().removeClass(s.className);\n            s.stickyElement.trigger('sticky-end', [s]);\n            s.currentTop = null;\n          }\n        }\n        else {\n          var newTop = documentHeight - s.stickyElement.outerHeight()\n            - s.topSpacing - s.bottomSpacing - scrollTop - extra;\n          if (newTop < 0) {\n            newTop = newTop + s.topSpacing;\n          } else {\n            newTop = s.topSpacing;\n          }\n          if (s.currentTop !== newTop) {\n            var newWidth;\n            if (s.getWidthFrom) {\n                newWidth = $(s.getWidthFrom).width() || null;\n            } else if (s.widthFromWrapper) {\n                newWidth = s.stickyWrapper.width();\n            }\n            if (newWidth == null) {\n                newWidth = s.stickyElement.width();\n            }\n            s.stickyElement\n              .css('width', newWidth)\n              .css('position', 'fixed')\n              .css('top', newTop)\n              .css('z-index', s.zIndex);\n\n            s.stickyElement.parent().addClass(s.className);\n\n            if (s.currentTop === null) {\n              s.stickyElement.trigger('sticky-start', [s]);\n            } else {\n              // sticky is started but it have to be repositioned\n              s.stickyElement.trigger('sticky-update', [s]);\n            }\n\n            if (s.currentTop === s.topSpacing && s.currentTop > newTop || s.currentTop === null && newTop < s.topSpacing) {\n              // just reached bottom || just started to stick but bottom is already reached\n              s.stickyElement.trigger('sticky-bottom-reached', [s]);\n            } else if(s.currentTop !== null && newTop === s.topSpacing && s.currentTop < newTop) {\n              // sticky is started && sticked at topSpacing && overflowing from top just finished\n              s.stickyElement.trigger('sticky-bottom-unreached', [s]);\n            }\n\n            s.currentTop = newTop;\n          }\n\n          // Check if sticky has reached end of container and stop sticking\n          var stickyWrapperContainer = s.stickyWrapper.parent();\n          var unstick = (s.stickyElement.offset().top + s.stickyElement.outerHeight() >= stickyWrapperContainer.offset().top + stickyWrapperContainer.outerHeight()) && (s.stickyElement.offset().top <= s.topSpacing);\n\n          if( unstick ) {\n            s.stickyElement\n              .css('position', 'absolute')\n              .css('top', '')\n              .css('bottom', 0)\n              .css('z-index', '');\n          } else {\n            s.stickyElement\n              .css('position', 'fixed')\n              .css('top', newTop)\n              .css('bottom', '')\n              .css('z-index', s.zIndex);\n          }\n        }\n      }\n    },\n    resizer = function() {\n      windowHeight = $window.height();\n\n      for (var i = 0, l = sticked.length; i < l; i++) {\n        var s = sticked[i];\n        var newWidth = null;\n        if (s.getWidthFrom) {\n            if (s.responsiveWidth) {\n                newWidth = $(s.getWidthFrom).width();\n            }\n        } else if(s.widthFromWrapper) {\n            newWidth = s.stickyWrapper.width();\n        }\n        if (newWidth != null) {\n            s.stickyElement.css('width', newWidth);\n        }\n      }\n    },\n    methods = {\n      init: function(options) {\n        var o = $.extend({}, defaults, options);\n        return this.each(function() {\n          var stickyElement = $(this);\n\n          var stickyId = stickyElement.attr('id');\n          var wrapperId = stickyId ? stickyId + '-' + defaults.wrapperClassName : defaults.wrapperClassName;\n          var wrapper = $('<div></div>')\n            .attr('id', wrapperId)\n            .addClass(o.wrapperClassName);\n\n          stickyElement.wrapAll(wrapper);\n\n          var stickyWrapper = stickyElement.parent();\n\n          if (o.center) {\n            stickyWrapper.css({width:stickyElement.outerWidth(),marginLeft:\"auto\",marginRight:\"auto\"});\n          }\n\n          if (stickyElement.css(\"float\") === \"right\") {\n            stickyElement.css({\"float\":\"none\"}).parent().css({\"float\":\"right\"});\n          }\n\n          o.stickyElement = stickyElement;\n          o.stickyWrapper = stickyWrapper;\n          o.currentTop    = null;\n\n          sticked.push(o);\n\n          methods.setWrapperHeight(this);\n          methods.setupChangeListeners(this);\n        });\n      },\n\n      setWrapperHeight: function(stickyElement) {\n        var element = $(stickyElement);\n        var stickyWrapper = element.parent();\n        if (stickyWrapper) {\n          stickyWrapper.css('height', element.outerHeight());\n        }\n      },\n\n      setupChangeListeners: function(stickyElement) {\n        if (window.MutationObserver) {\n          var mutationObserver = new window.MutationObserver(function(mutations) {\n            if (mutations[0].addedNodes.length || mutations[0].removedNodes.length) {\n              methods.setWrapperHeight(stickyElement);\n            }\n          });\n          mutationObserver.observe(stickyElement, {subtree: true, childList: true});\n        } else {\n          stickyElement.addEventListener('DOMNodeInserted', function() {\n            methods.setWrapperHeight(stickyElement);\n          }, false);\n          stickyElement.addEventListener('DOMNodeRemoved', function() {\n            methods.setWrapperHeight(stickyElement);\n          }, false);\n        }\n      },\n      update: scroller,\n      unstick: function(options) {\n        return this.each(function() {\n          var that = this;\n          var unstickyElement = $(that);\n\n          var removeIdx = -1;\n          var i = sticked.length;\n          while (i-- > 0) {\n            if (sticked[i].stickyElement.get(0) === that) {\n                splice.call(sticked,i,1);\n                removeIdx = i;\n            }\n          }\n          if(removeIdx !== -1) {\n            unstickyElement.unwrap();\n            unstickyElement\n              .css({\n                'width': '',\n                'position': '',\n                'top': '',\n                'float': '',\n                'z-index': ''\n              })\n            ;\n          }\n        });\n      }\n    };\n\n  // should be more efficient than using $window.scroll(scroller) and $window.resize(resizer):\n  if (window.addEventListener) {\n    window.addEventListener('scroll', scroller, false);\n    window.addEventListener('resize', resizer, false);\n  } else if (window.attachEvent) {\n    window.attachEvent('onscroll', scroller);\n    window.attachEvent('onresize', resizer);\n  }\n\n  $.fn.sticky = function(method) {\n    if (methods[method]) {\n      return methods[method].apply(this, slice.call(arguments, 1));\n    } else if (typeof method === 'object' || !method ) {\n      return methods.init.apply( this, arguments );\n    } else {\n      $.error('Method ' + method + ' does not exist on jQuery.sticky');\n    }\n  };\n\n  $.fn.unstick = function(method) {\n    if (methods[method]) {\n      return methods[method].apply(this, slice.call(arguments, 1));\n    } else if (typeof method === 'object' || !method ) {\n      return methods.unstick.apply( this, arguments );\n    } else {\n      $.error('Method ' + method + ' does not exist on jQuery.sticky');\n    }\n  };\n  $(function() {\n    setTimeout(scroller, 0);\n  });\n}));\n\n\n//# sourceURL=webpack://Vuexy/./node_modules/jquery-sticky/jquery.sticky.js?");

/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/***/ (function(module) {

"use strict";
module.exports = __WEBPACK_EXTERNAL_MODULE_jquery__;

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
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	!function() {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = function(module) {
/******/ 			var getter = module && module.__esModule ?
/******/ 				function() { return module['default']; } :
/******/ 				function() { return module; };
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	}();
/******/ 	
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
/******/ 	var __webpack_exports__ = __webpack_require__("./libs/jquery-sticky/jquery-sticky.js");
/******/ 	
/******/ 	return __webpack_exports__;
/******/ })()
;
});