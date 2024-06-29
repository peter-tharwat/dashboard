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

/***/ "./js/mega-dropdown.js":
/*!*****************************!*\
  !*** ./js/mega-dropdown.js ***!
  \*****************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   MegaDropdown: function() { return /* binding */ MegaDropdown; }\n/* harmony export */ });\nfunction _typeof(o) { \"@babel/helpers - typeof\"; return _typeof = \"function\" == typeof Symbol && \"symbol\" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && \"function\" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? \"symbol\" : typeof o; }, _typeof(o); }\nfunction _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }\nfunction _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }\nfunction _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, \"prototype\", { writable: false }); return Constructor; }\nfunction _toPropertyKey(t) { var i = _toPrimitive(t, \"string\"); return \"symbol\" == _typeof(i) ? i : String(i); }\nfunction _toPrimitive(t, r) { if (\"object\" != _typeof(t) || !t) return t; var e = t[Symbol.toPrimitive]; if (void 0 !== e) { var i = e.call(t, r || \"default\"); if (\"object\" != _typeof(i)) return i; throw new TypeError(\"@@toPrimitive must return a primitive value.\"); } return (\"string\" === r ? String : Number)(t); }\nvar TIMEOUT = 150;\nvar MegaDropdown = /*#__PURE__*/function () {\n  function MegaDropdown(element) {\n    var options = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};\n    _classCallCheck(this, MegaDropdown);\n    this._onHover = options.trigger === 'hover' || element.getAttribute('data-trigger') === 'hover';\n    this._container = MegaDropdown._findParent(element, 'mega-dropdown');\n    if (!this._container) return;\n    this._menu = this._container.querySelector('.dropdown-toggle ~ .dropdown-menu');\n    if (!this._menu) return;\n    element.setAttribute('aria-expanded', 'false');\n    this._el = element;\n    this._bindEvents();\n  }\n  _createClass(MegaDropdown, [{\n    key: \"open\",\n    value: function open() {\n      if (this._timeout) {\n        clearTimeout(this._timeout);\n        this._timeout = null;\n      }\n      if (this._focusTimeout) {\n        clearTimeout(this._focusTimeout);\n        this._focusTimeout = null;\n      }\n      if (this._el.getAttribute('aria-expanded') !== 'true') {\n        this._triggerEvent('show');\n        this._container.classList.add('show');\n        this._menu.classList.add('show');\n        this._el.setAttribute('aria-expanded', 'true');\n        this._el.focus();\n        this._triggerEvent('shown');\n      }\n    }\n  }, {\n    key: \"close\",\n    value: function close(force) {\n      var _this = this;\n      if (this._timeout) {\n        clearTimeout(this._timeout);\n        this._timeout = null;\n      }\n      if (this._focusTimeout) {\n        clearTimeout(this._focusTimeout);\n        this._focusTimeout = null;\n      }\n      if (this._onHover && !force) {\n        this._timeout = setTimeout(function () {\n          if (_this._timeout) {\n            clearTimeout(_this._timeout);\n            _this._timeout = null;\n          }\n          _this._close();\n        }, TIMEOUT);\n      } else {\n        this._close();\n      }\n    }\n  }, {\n    key: \"toggle\",\n    value: function toggle() {\n      // eslint-disable-next-line no-unused-expressions\n      this._el.getAttribute('aria-expanded') === 'true' ? this.close(true) : this.open();\n    }\n  }, {\n    key: \"destroy\",\n    value: function destroy() {\n      this._unbindEvents();\n      this._el = null;\n      if (this._timeout) {\n        clearTimeout(this._timeout);\n        this._timeout = null;\n      }\n      if (this._focusTimeout) {\n        clearTimeout(this._focusTimeout);\n        this._focusTimeout = null;\n      }\n    }\n  }, {\n    key: \"_close\",\n    value: function _close() {\n      if (this._el.getAttribute('aria-expanded') === 'true') {\n        this._triggerEvent('hide');\n        this._container.classList.remove('show');\n        this._menu.classList.remove('show');\n        this._el.setAttribute('aria-expanded', 'false');\n        this._triggerEvent('hidden');\n      }\n    }\n  }, {\n    key: \"_bindEvents\",\n    value: function _bindEvents() {\n      var _this2 = this;\n      this._elClickEvnt = function (e) {\n        e.preventDefault();\n        _this2.toggle();\n      };\n      this._el.addEventListener('click', this._elClickEvnt);\n      this._bodyClickEvnt = function (e) {\n        if (!_this2._container.contains(e.target) && _this2._container.classList.contains('show')) {\n          _this2.close(true);\n        }\n      };\n      document.body.addEventListener('click', this._bodyClickEvnt, true);\n      this._menuClickEvnt = function (e) {\n        if (e.target.classList.contains('mega-dropdown-link')) {\n          _this2.close(true);\n        }\n      };\n      this._menu.addEventListener('click', this._menuClickEvnt, true);\n      this._focusoutEvnt = function () {\n        if (_this2._focusTimeout) {\n          clearTimeout(_this2._focusTimeout);\n          _this2._focusTimeout = null;\n        }\n        if (_this2._el.getAttribute('aria-expanded') !== 'true') return;\n        _this2._focusTimeout = setTimeout(function () {\n          if (document.activeElement.tagName.toUpperCase() !== 'BODY' && MegaDropdown._findParent(document.activeElement, 'mega-dropdown') !== _this2._container) {\n            _this2.close(true);\n          }\n        }, 100);\n      };\n      this._container.addEventListener('focusout', this._focusoutEvnt, true);\n      if (this._onHover) {\n        this._enterEvnt = function () {\n          if (window.getComputedStyle(_this2._menu, null).getPropertyValue('position') === 'static') return;\n          _this2.open();\n        };\n        this._leaveEvnt = function () {\n          if (window.getComputedStyle(_this2._menu, null).getPropertyValue('position') === 'static') return;\n          _this2.close();\n        };\n        this._el.addEventListener('mouseenter', this._enterEvnt);\n        this._menu.addEventListener('mouseenter', this._enterEvnt);\n        this._el.addEventListener('mouseleave', this._leaveEvnt);\n        this._menu.addEventListener('mouseleave', this._leaveEvnt);\n      }\n    }\n  }, {\n    key: \"_unbindEvents\",\n    value: function _unbindEvents() {\n      if (this._elClickEvnt) {\n        this._el.removeEventListener('click', this._elClickEvnt);\n        this._elClickEvnt = null;\n      }\n      if (this._bodyClickEvnt) {\n        document.body.removeEventListener('click', this._bodyClickEvnt, true);\n        this._bodyClickEvnt = null;\n      }\n      if (this._menuClickEvnt) {\n        this._menu.removeEventListener('click', this._menuClickEvnt, true);\n        this._menuClickEvnt = null;\n      }\n      if (this._focusoutEvnt) {\n        this._container.removeEventListener('focusout', this._focusoutEvnt, true);\n        this._focusoutEvnt = null;\n      }\n      if (this._enterEvnt) {\n        this._el.removeEventListener('mouseenter', this._enterEvnt);\n        this._menu.removeEventListener('mouseenter', this._enterEvnt);\n        this._enterEvnt = null;\n      }\n      if (this._leaveEvnt) {\n        this._el.removeEventListener('mouseleave', this._leaveEvnt);\n        this._menu.removeEventListener('mouseleave', this._leaveEvnt);\n        this._leaveEvnt = null;\n      }\n    }\n  }, {\n    key: \"_triggerEvent\",\n    value: function _triggerEvent(event) {\n      if (document.createEvent) {\n        var customEvent;\n        if (typeof Event === 'function') {\n          customEvent = new Event(event);\n        } else {\n          customEvent = document.createEvent('Event');\n          customEvent.initEvent(event, false, true);\n        }\n        this._container.dispatchEvent(customEvent);\n      } else {\n        this._container.fireEvent(\"on\".concat(event), document.createEventObject());\n      }\n    }\n  }], [{\n    key: \"_findParent\",\n    value: function _findParent(el, cls) {\n      if (el.tagName.toUpperCase() === 'BODY') return null;\n      el = el.parentNode;\n      while (el.tagName.toUpperCase() !== 'BODY' && !el.classList.contains(cls)) {\n        el = el.parentNode;\n      }\n      return el.tagName.toUpperCase() !== 'BODY' ? el : null;\n    }\n  }]);\n  return MegaDropdown;\n}();\nwindow.MegaDropdown = MegaDropdown;\n\n\n//# sourceURL=webpack://Vuexy/./js/mega-dropdown.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
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
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./js/mega-dropdown.js"](0, __webpack_exports__, __webpack_require__);
/******/ 	
/******/ 	return __webpack_exports__;
/******/ })()
;
});