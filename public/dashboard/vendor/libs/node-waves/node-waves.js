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

/***/ "./libs/node-waves/node-waves.js":
/*!***************************************!*\
  !*** ./libs/node-waves/node-waves.js ***!
  \***************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   nodeWaves: function() { return /* reexport default from dynamic */ node_waves_src_js_waves__WEBPACK_IMPORTED_MODULE_0___default.a; }\n/* harmony export */ });\n/* harmony import */ var node_waves_src_js_waves__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! node-waves/src/js/waves */ \"./node_modules/node-waves/src/js/waves.js\");\n/* harmony import */ var node_waves_src_js_waves__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(node_waves_src_js_waves__WEBPACK_IMPORTED_MODULE_0__);\n\n\n\n//# sourceURL=webpack://Vuexy/./libs/node-waves/node-waves.js?");

/***/ }),

/***/ "./node_modules/node-waves/src/js/waves.js":
/*!*************************************************!*\
  !*** ./node_modules/node-waves/src/js/waves.js ***!
  \*************************************************/
/***/ (function(module, exports, __webpack_require__) {

eval("var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!\n * Waves v0.7.6\n * http://fian.my.id/Waves\n *\n * Copyright 2014-2018 Alfiana E. Sibuea and other contributors\n * Released under the MIT license\n * https://github.com/fians/Waves/blob/master/LICENSE\n */\n\n;(function(window, factory) {\n    'use strict';\n\n    // AMD. Register as an anonymous module.  Wrap in function so we have access\n    // to root via `this`.\n    if (true) {\n        !(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function() {\n            window.Waves = factory.call(window);\n            return window.Waves;\n        }).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),\n\t\t__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));\n    }\n\n    // Node. Does not work with strict CommonJS, but only CommonJS-like\n    // environments that support module.exports, like Node.\n    else {}\n})(typeof __webpack_require__.g === 'object' ? __webpack_require__.g : this, function() {\n    'use strict';\n\n    var Waves            = Waves || {};\n    var $$               = document.querySelectorAll.bind(document);\n    var toString         = Object.prototype.toString;\n    var isTouchAvailable = 'ontouchstart' in window;\n\n\n    // Find exact position of element\n    function isWindow(obj) {\n        return obj !== null && obj === obj.window;\n    }\n\n    function getWindow(elem) {\n        return isWindow(elem) ? elem : elem.nodeType === 9 && elem.defaultView;\n    }\n\n    function isObject(value) {\n        var type = typeof value;\n        return type === 'function' || type === 'object' && !!value;\n    }\n\n    function isDOMNode(obj) {\n        return isObject(obj) && obj.nodeType > 0;\n    }\n\n    function getWavesElements(nodes) {\n        var stringRepr = toString.call(nodes);\n\n        if (stringRepr === '[object String]') {\n            return $$(nodes);\n        } else if (isObject(nodes) && /^\\[object (Array|HTMLCollection|NodeList|Object)\\]$/.test(stringRepr) && nodes.hasOwnProperty('length')) {\n            return nodes;\n        } else if (isDOMNode(nodes)) {\n            return [nodes];\n        }\n\n        return [];\n    }\n\n    function offset(elem) {\n        var docElem, win,\n            box = { top: 0, left: 0 },\n            doc = elem && elem.ownerDocument;\n\n        docElem = doc.documentElement;\n\n        if (typeof elem.getBoundingClientRect !== typeof undefined) {\n            box = elem.getBoundingClientRect();\n        }\n        win = getWindow(doc);\n        return {\n            top: box.top + win.pageYOffset - docElem.clientTop,\n            left: box.left + win.pageXOffset - docElem.clientLeft\n        };\n    }\n\n    function convertStyle(styleObj) {\n        var style = '';\n\n        for (var prop in styleObj) {\n            if (styleObj.hasOwnProperty(prop)) {\n                style += (prop + ':' + styleObj[prop] + ';');\n            }\n        }\n\n        return style;\n    }\n\n    var Effect = {\n\n        // Effect duration\n        duration: 750,\n\n        // Effect delay (check for scroll before showing effect)\n        delay: 200,\n\n        show: function(e, element, velocity) {\n\n            // Disable right click\n            if (e.button === 2) {\n                return false;\n            }\n\n            element = element || this;\n\n            // Create ripple\n            var ripple = document.createElement('div');\n            ripple.className = 'waves-ripple waves-rippling';\n            element.appendChild(ripple);\n\n            // Get click coordinate and element width\n            var pos       = offset(element);\n            var relativeY = 0;\n            var relativeX = 0;\n            // Support for touch devices\n            if('touches' in e && e.touches.length) {\n                relativeY   = (e.touches[0].pageY - pos.top);\n                relativeX   = (e.touches[0].pageX - pos.left);\n            }\n            //Normal case\n            else {\n                relativeY   = (e.pageY - pos.top);\n                relativeX   = (e.pageX - pos.left);\n            }\n            // Support for synthetic events\n            relativeX = relativeX >= 0 ? relativeX : 0;\n            relativeY = relativeY >= 0 ? relativeY : 0;\n\n            var scale     = 'scale(' + ((element.clientWidth / 100) * 3) + ')';\n            var translate = 'translate(0,0)';\n\n            if (velocity) {\n                translate = 'translate(' + (velocity.x) + 'px, ' + (velocity.y) + 'px)';\n            }\n\n            // Attach data to element\n            ripple.setAttribute('data-hold', Date.now());\n            ripple.setAttribute('data-x', relativeX);\n            ripple.setAttribute('data-y', relativeY);\n            ripple.setAttribute('data-scale', scale);\n            ripple.setAttribute('data-translate', translate);\n\n            // Set ripple position\n            var rippleStyle = {\n                top: relativeY + 'px',\n                left: relativeX + 'px'\n            };\n\n            ripple.classList.add('waves-notransition');\n            ripple.setAttribute('style', convertStyle(rippleStyle));\n            ripple.classList.remove('waves-notransition');\n\n            // Scale the ripple\n            rippleStyle['-webkit-transform'] = scale + ' ' + translate;\n            rippleStyle['-moz-transform'] = scale + ' ' + translate;\n            rippleStyle['-ms-transform'] = scale + ' ' + translate;\n            rippleStyle['-o-transform'] = scale + ' ' + translate;\n            rippleStyle.transform = scale + ' ' + translate;\n            rippleStyle.opacity = '1';\n\n            var duration = e.type === 'mousemove' ? 2500 : Effect.duration;\n            rippleStyle['-webkit-transition-duration'] = duration + 'ms';\n            rippleStyle['-moz-transition-duration']    = duration + 'ms';\n            rippleStyle['-o-transition-duration']      = duration + 'ms';\n            rippleStyle['transition-duration']         = duration + 'ms';\n\n            ripple.setAttribute('style', convertStyle(rippleStyle));\n        },\n\n        hide: function(e, element) {\n            element = element || this;\n\n            var ripples = element.getElementsByClassName('waves-rippling');\n\n            for (var i = 0, len = ripples.length; i < len; i++) {\n                removeRipple(e, element, ripples[i]);\n            }\n\n            if (isTouchAvailable) {\n                element.removeEventListener('touchend', Effect.hide);\n                element.removeEventListener('touchcancel', Effect.hide);\n            }\n\n            element.removeEventListener('mouseup', Effect.hide);\n            element.removeEventListener('mouseleave', Effect.hide);\n        }\n    };\n\n    /**\n     * Collection of wrapper for HTML element that only have single tag\n     * like <input> and <img>\n     */\n    var TagWrapper = {\n\n        // Wrap <input> tag so it can perform the effect\n        input: function(element) {\n\n            var parent = element.parentNode;\n\n            // If input already have parent just pass through\n            if (parent.tagName.toLowerCase() === 'i' && parent.classList.contains('waves-effect')) {\n                return;\n            }\n\n            // Put element class and style to the specified parent\n            var wrapper       = document.createElement('i');\n            wrapper.className = element.className + ' waves-input-wrapper';\n            element.className = 'waves-button-input';\n\n            // Put element as child\n            parent.replaceChild(wrapper, element);\n            wrapper.appendChild(element);\n\n            // Apply element color and background color to wrapper\n            var elementStyle    = window.getComputedStyle(element, null);\n            var color           = elementStyle.color;\n            var backgroundColor = elementStyle.backgroundColor;\n\n            wrapper.setAttribute('style', 'color:' + color + ';background:' + backgroundColor);\n            element.setAttribute('style', 'background-color:rgba(0,0,0,0);');\n\n        },\n\n        // Wrap <img> tag so it can perform the effect\n        img: function(element) {\n\n            var parent = element.parentNode;\n\n            // If input already have parent just pass through\n            if (parent.tagName.toLowerCase() === 'i' && parent.classList.contains('waves-effect')) {\n                return;\n            }\n\n            // Put element as child\n            var wrapper  = document.createElement('i');\n            parent.replaceChild(wrapper, element);\n            wrapper.appendChild(element);\n\n        }\n    };\n\n    /**\n     * Hide the effect and remove the ripple. Must be\n     * a separate function to pass the JSLint...\n     */\n    function removeRipple(e, el, ripple) {\n\n        // Check if the ripple still exist\n        if (!ripple) {\n            return;\n        }\n\n        ripple.classList.remove('waves-rippling');\n\n        var relativeX = ripple.getAttribute('data-x');\n        var relativeY = ripple.getAttribute('data-y');\n        var scale     = ripple.getAttribute('data-scale');\n        var translate = ripple.getAttribute('data-translate');\n\n        // Get delay beetween mousedown and mouse leave\n        var diff = Date.now() - Number(ripple.getAttribute('data-hold'));\n        var delay = 350 - diff;\n\n        if (delay < 0) {\n            delay = 0;\n        }\n\n        if (e.type === 'mousemove') {\n            delay = 150;\n        }\n\n        // Fade out ripple after delay\n        var duration = e.type === 'mousemove' ? 2500 : Effect.duration;\n\n        setTimeout(function() {\n\n            var style = {\n                top: relativeY + 'px',\n                left: relativeX + 'px',\n                opacity: '0',\n\n                // Duration\n                '-webkit-transition-duration': duration + 'ms',\n                '-moz-transition-duration': duration + 'ms',\n                '-o-transition-duration': duration + 'ms',\n                'transition-duration': duration + 'ms',\n                '-webkit-transform': scale + ' ' + translate,\n                '-moz-transform': scale + ' ' + translate,\n                '-ms-transform': scale + ' ' + translate,\n                '-o-transform': scale + ' ' + translate,\n                'transform': scale + ' ' + translate\n            };\n\n            ripple.setAttribute('style', convertStyle(style));\n\n            setTimeout(function() {\n                try {\n                    el.removeChild(ripple);\n                } catch (e) {\n                    return false;\n                }\n            }, duration);\n\n        }, delay);\n    }\n\n\n    /**\n     * Disable mousedown event for 500ms during and after touch\n     */\n    var TouchHandler = {\n\n        /* uses an integer rather than bool so there's no issues with\n         * needing to clear timeouts if another touch event occurred\n         * within the 500ms. Cannot mouseup between touchstart and\n         * touchend, nor in the 500ms after touchend. */\n        touches: 0,\n\n        allowEvent: function(e) {\n\n            var allow = true;\n\n            if (/^(mousedown|mousemove)$/.test(e.type) && TouchHandler.touches) {\n                allow = false;\n            }\n\n            return allow;\n        },\n        registerEvent: function(e) {\n            var eType = e.type;\n\n            if (eType === 'touchstart') {\n\n                TouchHandler.touches += 1; // push\n\n            } else if (/^(touchend|touchcancel)$/.test(eType)) {\n\n                setTimeout(function() {\n                    if (TouchHandler.touches) {\n                        TouchHandler.touches -= 1; // pop after 500ms\n                    }\n                }, 500);\n\n            }\n        }\n    };\n\n\n    /**\n     * Delegated click handler for .waves-effect element.\n     * returns null when .waves-effect element not in \"click tree\"\n     */\n    function getWavesEffectElement(e) {\n\n        if (TouchHandler.allowEvent(e) === false) {\n            return null;\n        }\n\n        var element = null;\n        var target = e.target || e.srcElement;\n\n        while (target.parentElement) {\n            if ( (!(target instanceof SVGElement)) && target.classList.contains('waves-effect')) {\n                element = target;\n                break;\n            }\n            target = target.parentElement;\n        }\n\n        return element;\n    }\n\n    /**\n     * Bubble the click and show effect if .waves-effect elem was found\n     */\n    function showEffect(e) {\n\n        // Disable effect if element has \"disabled\" property on it\n        // In some cases, the event is not triggered by the current element\n        // if (e.target.getAttribute('disabled') !== null) {\n        //     return;\n        // }\n\n        var element = getWavesEffectElement(e);\n\n        if (element !== null) {\n\n            // Make it sure the element has either disabled property, disabled attribute or 'disabled' class\n            if (element.disabled || element.getAttribute('disabled') || element.classList.contains('disabled')) {\n                return;\n            }\n\n            TouchHandler.registerEvent(e);\n\n            if (e.type === 'touchstart' && Effect.delay) {\n\n                var hidden = false;\n\n                var timer = setTimeout(function () {\n                    timer = null;\n                    Effect.show(e, element);\n                }, Effect.delay);\n\n                var hideEffect = function(hideEvent) {\n\n                    // if touch hasn't moved, and effect not yet started: start effect now\n                    if (timer) {\n                        clearTimeout(timer);\n                        timer = null;\n                        Effect.show(e, element);\n                    }\n                    if (!hidden) {\n                        hidden = true;\n                        Effect.hide(hideEvent, element);\n                    }\n\n                    removeListeners();\n                };\n\n                var touchMove = function(moveEvent) {\n                    if (timer) {\n                        clearTimeout(timer);\n                        timer = null;\n                    }\n                    hideEffect(moveEvent);\n\n                    removeListeners();\n                };\n\n                element.addEventListener('touchmove', touchMove, false);\n                element.addEventListener('touchend', hideEffect, false);\n                element.addEventListener('touchcancel', hideEffect, false);\n\n                var removeListeners = function() {\n                    element.removeEventListener('touchmove', touchMove);\n                    element.removeEventListener('touchend', hideEffect);\n                    element.removeEventListener('touchcancel', hideEffect);\n                };\n            } else {\n\n                Effect.show(e, element);\n\n                if (isTouchAvailable) {\n                    element.addEventListener('touchend', Effect.hide, false);\n                    element.addEventListener('touchcancel', Effect.hide, false);\n                }\n\n                element.addEventListener('mouseup', Effect.hide, false);\n                element.addEventListener('mouseleave', Effect.hide, false);\n            }\n        }\n    }\n\n    Waves.init = function(options) {\n        var body = document.body;\n\n        options = options || {};\n\n        if ('duration' in options) {\n            Effect.duration = options.duration;\n        }\n\n        if ('delay' in options) {\n            Effect.delay = options.delay;\n        }\n\n        if (isTouchAvailable) {\n            body.addEventListener('touchstart', showEffect, false);\n            body.addEventListener('touchcancel', TouchHandler.registerEvent, false);\n            body.addEventListener('touchend', TouchHandler.registerEvent, false);\n        }\n\n        body.addEventListener('mousedown', showEffect, false);\n    };\n\n\n    /**\n     * Attach Waves to dynamically loaded inputs, or add .waves-effect and other\n     * waves classes to a set of elements. Set drag to true if the ripple mouseover\n     * or skimming effect should be applied to the elements.\n     */\n    Waves.attach = function(elements, classes) {\n\n        elements = getWavesElements(elements);\n\n        if (toString.call(classes) === '[object Array]') {\n            classes = classes.join(' ');\n        }\n\n        classes = classes ? ' ' + classes : '';\n\n        var element, tagName;\n\n        for (var i = 0, len = elements.length; i < len; i++) {\n\n            element = elements[i];\n            tagName = element.tagName.toLowerCase();\n\n            if (['input', 'img'].indexOf(tagName) !== -1) {\n                TagWrapper[tagName](element);\n                element = element.parentElement;\n            }\n\n            if (element.className.indexOf('waves-effect') === -1) {\n                element.className += ' waves-effect' + classes;\n            }\n        }\n    };\n\n\n    /**\n     * Cause a ripple to appear in an element via code.\n     */\n    Waves.ripple = function(elements, options) {\n        elements = getWavesElements(elements);\n        var elementsLen = elements.length;\n\n        options          = options || {};\n        options.wait     = options.wait || 0;\n        options.position = options.position || null; // default = centre of element\n\n\n        if (elementsLen) {\n            var element, pos, off, centre = {}, i = 0;\n            var mousedown = {\n                type: 'mousedown',\n                button: 1\n            };\n            var hideRipple = function(mouseup, element) {\n                return function() {\n                    Effect.hide(mouseup, element);\n                };\n            };\n\n            for (; i < elementsLen; i++) {\n                element = elements[i];\n                pos = options.position || {\n                    x: element.clientWidth / 2,\n                    y: element.clientHeight / 2\n                };\n\n                off      = offset(element);\n                centre.x = off.left + pos.x;\n                centre.y = off.top + pos.y;\n\n                mousedown.pageX = centre.x;\n                mousedown.pageY = centre.y;\n\n                Effect.show(mousedown, element);\n\n                if (options.wait >= 0 && options.wait !== null) {\n                    var mouseup = {\n                        type: 'mouseup',\n                        button: 1\n                    };\n\n                    setTimeout(hideRipple(mouseup, element), options.wait);\n                }\n            }\n        }\n    };\n\n    /**\n     * Remove all ripples from an element.\n     */\n    Waves.calm = function(elements) {\n        elements = getWavesElements(elements);\n        var mouseup = {\n            type: 'mouseup',\n            button: 1\n        };\n\n        for (var i = 0, len = elements.length; i < len; i++) {\n            Effect.hide(mouseup, elements[i]);\n        }\n    };\n\n    /**\n     * Deprecated API fallback\n     */\n    Waves.displayEffect = function(options) {\n        console.error('Waves.displayEffect() has been deprecated and will be removed in future version. Please use Waves.init() to initialize Waves effect');\n        Waves.init(options);\n    };\n\n    return Waves;\n});\n\n\n//# sourceURL=webpack://Vuexy/./node_modules/node-waves/src/js/waves.js?");

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
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
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
/******/ 	/* webpack/runtime/global */
/******/ 	!function() {
/******/ 		__webpack_require__.g = (function() {
/******/ 			if (typeof globalThis === 'object') return globalThis;
/******/ 			try {
/******/ 				return this || new Function('return this')();
/******/ 			} catch (e) {
/******/ 				if (typeof window === 'object') return window;
/******/ 			}
/******/ 		})();
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
/******/ 	var __webpack_exports__ = __webpack_require__("./libs/node-waves/node-waves.js");
/******/ 	
/******/ 	return __webpack_exports__;
/******/ })()
;
});