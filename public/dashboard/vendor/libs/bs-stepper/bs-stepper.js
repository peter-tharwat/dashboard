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

/***/ "./libs/bs-stepper/bs-stepper.js":
/*!***************************************!*\
  !*** ./libs/bs-stepper/bs-stepper.js ***!
  \***************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   Stepper: function() { return /* reexport default from dynamic */ bs_stepper_dist_js_bs_stepper__WEBPACK_IMPORTED_MODULE_0___default.a; }\n/* harmony export */ });\n/* harmony import */ var bs_stepper_dist_js_bs_stepper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! bs-stepper/dist/js/bs-stepper */ \"./node_modules/bs-stepper/dist/js/bs-stepper.js\");\n/* harmony import */ var bs_stepper_dist_js_bs_stepper__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(bs_stepper_dist_js_bs_stepper__WEBPACK_IMPORTED_MODULE_0__);\n\nvar bsStepper = document.querySelectorAll('.bs-stepper');\n\n// Adds crossed class\nbsStepper.forEach(function (el) {\n  el.addEventListener('show.bs-stepper', function (event) {\n    var index = event.detail.indexStep;\n    var numberOfSteps = el.querySelectorAll('.line').length;\n    var line = el.querySelectorAll('.step');\n\n    // The first for loop is for increasing the steps,\n    // the second is for turning them off when going back\n    // and the third with the if statement because the last line\n    // can't seem to turn off when I press the first item. ¯\\_(ツ)_/¯\n\n    for (var i = 0; i < index; i++) {\n      line[i].classList.add('crossed');\n      for (var j = index; j < numberOfSteps; j++) {\n        line[j].classList.remove('crossed');\n      }\n    }\n    if (event.detail.to == 0) {\n      for (var k = index; k < numberOfSteps; k++) {\n        line[k].classList.remove('crossed');\n      }\n      line[0].classList.remove('crossed');\n    }\n  });\n});\ntry {\n  window.Stepper = (bs_stepper_dist_js_bs_stepper__WEBPACK_IMPORTED_MODULE_0___default());\n} catch (e) {}\n\n\n//# sourceURL=webpack://Vuexy/./libs/bs-stepper/bs-stepper.js?");

/***/ }),

/***/ "./node_modules/bs-stepper/dist/js/bs-stepper.js":
/*!*******************************************************!*\
  !*** ./node_modules/bs-stepper/dist/js/bs-stepper.js ***!
  \*******************************************************/
/***/ (function(module) {

eval("/*!\n * bsStepper v1.7.0 (https://github.com/Johann-S/bs-stepper)\n * Copyright 2018 - 2019 Johann-S <johann.servoire@gmail.com>\n * Licensed under MIT (https://github.com/Johann-S/bs-stepper/blob/master/LICENSE)\n */\n(function (global, factory) {\n   true ? module.exports = factory() :\n  0;\n}(this, function () { 'use strict';\n\n  function _extends() {\n    _extends = Object.assign || function (target) {\n      for (var i = 1; i < arguments.length; i++) {\n        var source = arguments[i];\n\n        for (var key in source) {\n          if (Object.prototype.hasOwnProperty.call(source, key)) {\n            target[key] = source[key];\n          }\n        }\n      }\n\n      return target;\n    };\n\n    return _extends.apply(this, arguments);\n  }\n\n  var matches = window.Element.prototype.matches;\n\n  var closest = function closest(element, selector) {\n    return element.closest(selector);\n  };\n\n  var WinEvent = function WinEvent(inType, params) {\n    return new window.Event(inType, params);\n  };\n\n  var createCustomEvent = function createCustomEvent(eventName, params) {\n    var cEvent = new window.CustomEvent(eventName, params);\n    return cEvent;\n  };\n  /* istanbul ignore next */\n\n\n  function polyfill() {\n    if (!window.Element.prototype.matches) {\n      matches = window.Element.prototype.msMatchesSelector || window.Element.prototype.webkitMatchesSelector;\n    }\n\n    if (!window.Element.prototype.closest) {\n      closest = function closest(element, selector) {\n        if (!document.documentElement.contains(element)) {\n          return null;\n        }\n\n        do {\n          if (matches.call(element, selector)) {\n            return element;\n          }\n\n          element = element.parentElement || element.parentNode;\n        } while (element !== null && element.nodeType === 1);\n\n        return null;\n      };\n    }\n\n    if (!window.Event || typeof window.Event !== 'function') {\n      WinEvent = function WinEvent(inType, params) {\n        params = params || {};\n        var e = document.createEvent('Event');\n        e.initEvent(inType, Boolean(params.bubbles), Boolean(params.cancelable));\n        return e;\n      };\n    }\n\n    if (typeof window.CustomEvent !== 'function') {\n      var originPreventDefault = window.Event.prototype.preventDefault;\n\n      createCustomEvent = function createCustomEvent(eventName, params) {\n        var evt = document.createEvent('CustomEvent');\n        params = params || {\n          bubbles: false,\n          cancelable: false,\n          detail: null\n        };\n        evt.initCustomEvent(eventName, params.bubbles, params.cancelable, params.detail);\n\n        evt.preventDefault = function () {\n          if (!this.cancelable) {\n            return;\n          }\n\n          originPreventDefault.call(this);\n          Object.defineProperty(this, 'defaultPrevented', {\n            get: function get() {\n              return true;\n            }\n          });\n        };\n\n        return evt;\n      };\n    }\n  }\n\n  polyfill();\n\n  var MILLISECONDS_MULTIPLIER = 1000;\n  var ClassName = {\n    ACTIVE: 'active',\n    LINEAR: 'linear',\n    BLOCK: 'dstepper-block',\n    NONE: 'dstepper-none',\n    FADE: 'fade',\n    VERTICAL: 'vertical'\n  };\n  var transitionEndEvent = 'transitionend';\n  var customProperty = 'bsStepper';\n\n  var show = function show(stepperNode, indexStep, options, done) {\n    var stepper = stepperNode[customProperty];\n\n    if (stepper._steps[indexStep].classList.contains(ClassName.ACTIVE) || stepper._stepsContents[indexStep].classList.contains(ClassName.ACTIVE)) {\n      return;\n    }\n\n    var showEvent = createCustomEvent('show.bs-stepper', {\n      cancelable: true,\n      detail: {\n        from: stepper._currentIndex,\n        to: indexStep,\n        indexStep: indexStep\n      }\n    });\n    stepperNode.dispatchEvent(showEvent);\n\n    var activeStep = stepper._steps.filter(function (step) {\n      return step.classList.contains(ClassName.ACTIVE);\n    });\n\n    var activeContent = stepper._stepsContents.filter(function (content) {\n      return content.classList.contains(ClassName.ACTIVE);\n    });\n\n    if (showEvent.defaultPrevented) {\n      return;\n    }\n\n    if (activeStep.length) {\n      activeStep[0].classList.remove(ClassName.ACTIVE);\n    }\n\n    if (activeContent.length) {\n      activeContent[0].classList.remove(ClassName.ACTIVE);\n\n      if (!stepperNode.classList.contains(ClassName.VERTICAL) && !stepper.options.animation) {\n        activeContent[0].classList.remove(ClassName.BLOCK);\n      }\n    }\n\n    showStep(stepperNode, stepper._steps[indexStep], stepper._steps, options);\n    showContent(stepperNode, stepper._stepsContents[indexStep], stepper._stepsContents, activeContent, done);\n  };\n\n  var showStep = function showStep(stepperNode, step, stepList, options) {\n    stepList.forEach(function (step) {\n      var trigger = step.querySelector(options.selectors.trigger);\n      trigger.setAttribute('aria-selected', 'false'); // if stepper is in linear mode, set disabled attribute on the trigger\n\n      if (stepperNode.classList.contains(ClassName.LINEAR)) {\n        trigger.setAttribute('disabled', 'disabled');\n      }\n    });\n    step.classList.add(ClassName.ACTIVE);\n    var currentTrigger = step.querySelector(options.selectors.trigger);\n    currentTrigger.setAttribute('aria-selected', 'true'); // if stepper is in linear mode, remove disabled attribute on current\n\n    if (stepperNode.classList.contains(ClassName.LINEAR)) {\n      currentTrigger.removeAttribute('disabled');\n    }\n  };\n\n  var showContent = function showContent(stepperNode, content, contentList, activeContent, done) {\n    var stepper = stepperNode[customProperty];\n    var toIndex = contentList.indexOf(content);\n    var shownEvent = createCustomEvent('shown.bs-stepper', {\n      cancelable: true,\n      detail: {\n        from: stepper._currentIndex,\n        to: toIndex,\n        indexStep: toIndex\n      }\n    });\n\n    function complete() {\n      content.classList.add(ClassName.BLOCK);\n      content.removeEventListener(transitionEndEvent, complete);\n      stepperNode.dispatchEvent(shownEvent);\n      done();\n    }\n\n    if (content.classList.contains(ClassName.FADE)) {\n      content.classList.remove(ClassName.NONE);\n      var duration = getTransitionDurationFromElement(content);\n      content.addEventListener(transitionEndEvent, complete);\n\n      if (activeContent.length) {\n        activeContent[0].classList.add(ClassName.NONE);\n      }\n\n      content.classList.add(ClassName.ACTIVE);\n      emulateTransitionEnd(content, duration);\n    } else {\n      content.classList.add(ClassName.ACTIVE);\n      content.classList.add(ClassName.BLOCK);\n      stepperNode.dispatchEvent(shownEvent);\n      done();\n    }\n  };\n\n  var getTransitionDurationFromElement = function getTransitionDurationFromElement(element) {\n    if (!element) {\n      return 0;\n    } // Get transition-duration of the element\n\n\n    var transitionDuration = window.getComputedStyle(element).transitionDuration;\n    var floatTransitionDuration = parseFloat(transitionDuration); // Return 0 if element or transition duration is not found\n\n    if (!floatTransitionDuration) {\n      return 0;\n    } // If multiple durations are defined, take the first\n\n\n    transitionDuration = transitionDuration.split(',')[0];\n    return parseFloat(transitionDuration) * MILLISECONDS_MULTIPLIER;\n  };\n\n  var emulateTransitionEnd = function emulateTransitionEnd(element, duration) {\n    var called = false;\n    var durationPadding = 5;\n    var emulatedDuration = duration + durationPadding;\n\n    function listener() {\n      called = true;\n      element.removeEventListener(transitionEndEvent, listener);\n    }\n\n    element.addEventListener(transitionEndEvent, listener);\n    window.setTimeout(function () {\n      if (!called) {\n        element.dispatchEvent(WinEvent(transitionEndEvent));\n      }\n\n      element.removeEventListener(transitionEndEvent, listener);\n    }, emulatedDuration);\n  };\n\n  var detectAnimation = function detectAnimation(contentList, options) {\n    if (options.animation) {\n      contentList.forEach(function (content) {\n        content.classList.add(ClassName.FADE);\n        content.classList.add(ClassName.NONE);\n      });\n    }\n  };\n\n  var buildClickStepLinearListener = function buildClickStepLinearListener() {\n    return function clickStepLinearListener(event) {\n      event.preventDefault();\n    };\n  };\n\n  var buildClickStepNonLinearListener = function buildClickStepNonLinearListener(options) {\n    return function clickStepNonLinearListener(event) {\n      event.preventDefault();\n      var step = closest(event.target, options.selectors.steps);\n      var stepperNode = closest(step, options.selectors.stepper);\n      var stepper = stepperNode[customProperty];\n\n      var stepIndex = stepper._steps.indexOf(step);\n\n      show(stepperNode, stepIndex, options, function () {\n        stepper._currentIndex = stepIndex;\n      });\n    };\n  };\n\n  var DEFAULT_OPTIONS = {\n    linear: true,\n    animation: false,\n    selectors: {\n      steps: '.step',\n      trigger: '.step-trigger',\n      stepper: '.bs-stepper'\n    }\n  };\n\n  var Stepper =\n  /*#__PURE__*/\n  function () {\n    function Stepper(element, _options) {\n      var _this = this;\n\n      if (_options === void 0) {\n        _options = {};\n      }\n\n      this._element = element;\n      this._currentIndex = 0;\n      this._stepsContents = [];\n      this.options = _extends({}, DEFAULT_OPTIONS, {}, _options);\n      this.options.selectors = _extends({}, DEFAULT_OPTIONS.selectors, {}, this.options.selectors);\n\n      if (this.options.linear) {\n        this._element.classList.add(ClassName.LINEAR);\n      }\n\n      this._steps = [].slice.call(this._element.querySelectorAll(this.options.selectors.steps));\n\n      this._steps.filter(function (step) {\n        return step.hasAttribute('data-target');\n      }).forEach(function (step) {\n        _this._stepsContents.push(_this._element.querySelector(step.getAttribute('data-target')));\n      });\n\n      detectAnimation(this._stepsContents, this.options);\n\n      this._setLinkListeners();\n\n      Object.defineProperty(this._element, customProperty, {\n        value: this,\n        writable: true\n      });\n\n      if (this._steps.length) {\n        show(this._element, this._currentIndex, this.options, function () {});\n      }\n    } // Private\n\n\n    var _proto = Stepper.prototype;\n\n    _proto._setLinkListeners = function _setLinkListeners() {\n      var _this2 = this;\n\n      this._steps.forEach(function (step) {\n        var trigger = step.querySelector(_this2.options.selectors.trigger);\n\n        if (_this2.options.linear) {\n          _this2._clickStepLinearListener = buildClickStepLinearListener(_this2.options);\n          trigger.addEventListener('click', _this2._clickStepLinearListener);\n        } else {\n          _this2._clickStepNonLinearListener = buildClickStepNonLinearListener(_this2.options);\n          trigger.addEventListener('click', _this2._clickStepNonLinearListener);\n        }\n      });\n    } // Public\n    ;\n\n    _proto.next = function next() {\n      var _this3 = this;\n\n      var nextStep = this._currentIndex + 1 <= this._steps.length - 1 ? this._currentIndex + 1 : this._steps.length - 1;\n      show(this._element, nextStep, this.options, function () {\n        _this3._currentIndex = nextStep;\n      });\n    };\n\n    _proto.previous = function previous() {\n      var _this4 = this;\n\n      var previousStep = this._currentIndex - 1 >= 0 ? this._currentIndex - 1 : 0;\n      show(this._element, previousStep, this.options, function () {\n        _this4._currentIndex = previousStep;\n      });\n    };\n\n    _proto.to = function to(stepNumber) {\n      var _this5 = this;\n\n      var tempIndex = stepNumber - 1;\n      var nextStep = tempIndex >= 0 && tempIndex < this._steps.length ? tempIndex : 0;\n      show(this._element, nextStep, this.options, function () {\n        _this5._currentIndex = nextStep;\n      });\n    };\n\n    _proto.reset = function reset() {\n      var _this6 = this;\n\n      show(this._element, 0, this.options, function () {\n        _this6._currentIndex = 0;\n      });\n    };\n\n    _proto.destroy = function destroy() {\n      var _this7 = this;\n\n      this._steps.forEach(function (step) {\n        var trigger = step.querySelector(_this7.options.selectors.trigger);\n\n        if (_this7.options.linear) {\n          trigger.removeEventListener('click', _this7._clickStepLinearListener);\n        } else {\n          trigger.removeEventListener('click', _this7._clickStepNonLinearListener);\n        }\n      });\n\n      this._element[customProperty] = undefined;\n      this._element = undefined;\n      this._currentIndex = undefined;\n      this._steps = undefined;\n      this._stepsContents = undefined;\n      this._clickStepLinearListener = undefined;\n      this._clickStepNonLinearListener = undefined;\n    };\n\n    return Stepper;\n  }();\n\n  return Stepper;\n\n}));\n//# sourceMappingURL=bs-stepper.js.map\n\n\n//# sourceURL=webpack://Vuexy/./node_modules/bs-stepper/dist/js/bs-stepper.js?");

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
/******/ 	var __webpack_exports__ = __webpack_require__("./libs/bs-stepper/bs-stepper.js");
/******/ 	
/******/ 	return __webpack_exports__;
/******/ })()
;
});