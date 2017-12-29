/*!
 * Bootstrap
 * Copyright 2011-2016
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */

if (typeof jQuery === 'undefined') {
    throw new Error('Bootstrap\'s JavaScript requires jQuery. jQuery must be included before Bootstrap\'s JavaScript.')
}

+function ($) {
    var version = $.fn.jquery.split(' ')[0].split('.')
    if ((version[0] < 2 && version[1] < 9) || (version[0] == 1 && version[1] == 9 && version[2] < 1) || (version[0] >= 4)) {
        throw new Error('Bootstrap\'s JavaScript requires at least jQuery v1.9.1 but less than v4.0.0')
    }
}(jQuery);


+function () {
    'use strict';

    var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

    var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

    function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

    function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

    function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v4.0.0-beta): util.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
     * --------------------------------------------------------------------------
     */

    var Util = function ($) {

        /**
         * ------------------------------------------------------------------------
         * Private TransitionEnd Helpers
         * ------------------------------------------------------------------------
         */

        var transition = false;

        var MAX_UID = 1000000;

        var TransitionEndEvent = {
            WebkitTransition: 'webkitTransitionEnd',
            MozTransition: 'transitionend',
            OTransition: 'oTransitionEnd otransitionend',
            transition: 'transitionend'

            // shoutout AngusCroll (https://goo.gl/pxwQGp)
        };function toType(obj) {
            return {}.toString.call(obj).match(/\s([a-zA-Z]+)/)[1].toLowerCase();
        }

        function isElement(obj) {
            return (obj[0] || obj).nodeType;
        }

        function getSpecialTransitionEndEvent() {
            return {
                bindType: transition.end,
                delegateType: transition.end,
                handle: function handle(event) {
                    if ($(event.target).is(this)) {
                        return event.handleObj.handler.apply(this, arguments); // eslint-disable-line prefer-rest-params
                    }
                    return undefined;
                }
            };
        }

        function transitionEndTest() {
            if (window.QUnit) {
                return false;
            }

            var el = document.createElement('bootstrap');

            for (var name in TransitionEndEvent) {
                if (el.style[name] !== undefined) {
                    return {
                        end: TransitionEndEvent[name]
                    };
                }
            }

            return false;
        }

        function transitionEndEmulator(duration) {
            var _this = this;

            var called = false;

            $(this).one(Util.TRANSITION_END, function () {
                called = true;
            });

            setTimeout(function () {
                if (!called) {
                    Util.triggerTransitionEnd(_this);
                }
            }, duration);

            return this;
        }

        function setTransitionEndSupport() {
            transition = transitionEndTest();

            $.fn.emulateTransitionEnd = transitionEndEmulator;

            if (Util.supportsTransitionEnd()) {
                $.event.special[Util.TRANSITION_END] = getSpecialTransitionEndEvent();
            }
        }

        /**
         * --------------------------------------------------------------------------
         * Public Util Api
         * --------------------------------------------------------------------------
         */

        var Util = {

            TRANSITION_END: 'bsTransitionEnd',

            getUID: function getUID(prefix) {
                do {
                    // eslint-disable-next-line no-bitwise
                    prefix += ~~(Math.random() * MAX_UID); // "~~" acts like a faster Math.floor() here
                } while (document.getElementById(prefix));
                return prefix;
            },
            getSelectorFromElement: function getSelectorFromElement(element) {
                var selector = element.getAttribute('data-target');
                if (!selector || selector === '#') {
                    selector = element.getAttribute('href') || '';
                }

                try {
                    var $selector = $(selector);
                    return $selector.length > 0 ? selector : null;
                } catch (error) {
                    return null;
                }
            },
            reflow: function reflow(element) {
                return element.offsetHeight;
            },
            triggerTransitionEnd: function triggerTransitionEnd(element) {
                $(element).trigger(transition.end);
            },
            supportsTransitionEnd: function supportsTransitionEnd() {
                return Boolean(transition);
            },
            typeCheckConfig: function typeCheckConfig(componentName, config, configTypes) {
                for (var property in configTypes) {
                    if (configTypes.hasOwnProperty(property)) {
                        var expectedTypes = configTypes[property];
                        var value = config[property];
                        var valueType = value && isElement(value) ? 'element' : toType(value);

                        if (!new RegExp(expectedTypes).test(valueType)) {
                            throw new Error(componentName.toUpperCase() + ': ' + ('Option "' + property + '" provided type "' + valueType + '" ') + ('but expected type "' + expectedTypes + '".'));
                        }
                    }
                }
            }
        };

        setTransitionEndSupport();

        return Util;
    }(jQuery);

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v4.0.0-beta): alert.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
     * --------------------------------------------------------------------------
     */

    var Alert = function ($) {

        /**
         * ------------------------------------------------------------------------
         * Constants
         * ------------------------------------------------------------------------
         */

        var NAME = 'alert';
        var VERSION = '4.0.0-beta';
        var DATA_KEY = 'bs.alert';
        var EVENT_KEY = '.' + DATA_KEY;
        var DATA_API_KEY = '.data-api';
        var JQUERY_NO_CONFLICT = $.fn[NAME];
        var TRANSITION_DURATION = 150;

        var Selector = {
            DISMISS: '[data-dismiss="alert"]'
        };

        var Event = {
            CLOSE: 'close' + EVENT_KEY,
            CLOSED: 'closed' + EVENT_KEY,
            CLICK_DATA_API: 'click' + EVENT_KEY + DATA_API_KEY
        };

        var ClassName = {
            ALERT: 'alert',
            FADE: 'fade',
            SHOW: 'show'

            /**
             * ------------------------------------------------------------------------
             * Class Definition
             * ------------------------------------------------------------------------
             */

        };
        var Alert = function () {
            function Alert(element) {
                _classCallCheck(this, Alert);

                this._element = element;
            }

            // getters

            // public

            Alert.prototype.close = function close(element) {
                element = element || this._element;

                var rootElement = this._getRootElement(element);
                var customEvent = this._triggerCloseEvent(rootElement);

                if (customEvent.isDefaultPrevented()) {
                    return;
                }

                this._removeElement(rootElement);
            };

            Alert.prototype.dispose = function dispose() {
                $.removeData(this._element, DATA_KEY);
                this._element = null;
            };

            // private

            Alert.prototype._getRootElement = function _getRootElement(element) {
                var selector = Util.getSelectorFromElement(element);
                var parent = false;

                if (selector) {
                    parent = $(selector)[0];
                }

                if (!parent) {
                    parent = $(element).closest('.' + ClassName.ALERT)[0];
                }

                return parent;
            };

            Alert.prototype._triggerCloseEvent = function _triggerCloseEvent(element) {
                var closeEvent = $.Event(Event.CLOSE);

                $(element).trigger(closeEvent);
                return closeEvent;
            };

            Alert.prototype._removeElement = function _removeElement(element) {
                var _this2 = this;

                $(element).removeClass(ClassName.SHOW);

                if (!Util.supportsTransitionEnd() || !$(element).hasClass(ClassName.FADE)) {
                    this._destroyElement(element);
                    return;
                }

                $(element).one(Util.TRANSITION_END, function (event) {
                    return _this2._destroyElement(element, event);
                }).emulateTransitionEnd(TRANSITION_DURATION);
            };

            Alert.prototype._destroyElement = function _destroyElement(element) {
                $(element).detach().trigger(Event.CLOSED).remove();
            };

            // static

            Alert._jQueryInterface = function _jQueryInterface(config) {
                return this.each(function () {
                    var $element = $(this);
                    var data = $element.data(DATA_KEY);

                    if (!data) {
                        data = new Alert(this);
                        $element.data(DATA_KEY, data);
                    }

                    if (config === 'close') {
                        data[config](this);
                    }
                });
            };

            Alert._handleDismiss = function _handleDismiss(alertInstance) {
                return function (event) {
                    if (event) {
                        event.preventDefault();
                    }

                    alertInstance.close(this);
                };
            };

            _createClass(Alert, null, [{
                key: 'VERSION',
                get: function get() {
                    return VERSION;
                }
            }]);

            return Alert;
        }();

        /**
         * ------------------------------------------------------------------------
         * Data Api implementation
         * ------------------------------------------------------------------------
         */

        $(document).on(Event.CLICK_DATA_API, Selector.DISMISS, Alert._handleDismiss(new Alert()));

        /**
         * ------------------------------------------------------------------------
         * jQuery
         * ------------------------------------------------------------------------
         */

        $.fn[NAME] = Alert._jQueryInterface;
        $.fn[NAME].Constructor = Alert;
        $.fn[NAME].noConflict = function () {
            $.fn[NAME] = JQUERY_NO_CONFLICT;
            return Alert._jQueryInterface;
        };

        return Alert;
    }(jQuery);

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v4.0.0-beta): button.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
     * --------------------------------------------------------------------------
     */

    var Button = function ($) {

        /**
         * ------------------------------------------------------------------------
         * Constants
         * ------------------------------------------------------------------------
         */

        var NAME = 'button';
        var VERSION = '4.0.0-beta';
        var DATA_KEY = 'bs.button';
        var EVENT_KEY = '.' + DATA_KEY;
        var DATA_API_KEY = '.data-api';
        var JQUERY_NO_CONFLICT = $.fn[NAME];

        var ClassName = {
            ACTIVE: 'active',
            BUTTON: 'btn',
            FOCUS: 'focus'
        };

        var Selector = {
            DATA_TOGGLE_CARROT: '[data-toggle^="button"]',
            DATA_TOGGLE: '[data-toggle="buttons"]',
            INPUT: 'input',
            ACTIVE: '.active',
            BUTTON: '.btn'
        };

        var Event = {
            CLICK_DATA_API: 'click' + EVENT_KEY + DATA_API_KEY,
            FOCUS_BLUR_DATA_API: 'focus' + EVENT_KEY + DATA_API_KEY + ' ' + ('blur' + EVENT_KEY + DATA_API_KEY)

            /**
             * ------------------------------------------------------------------------
             * Class Definition
             * ------------------------------------------------------------------------
             */

        };
        var Button = function () {
            function Button(element) {
                _classCallCheck(this, Button);

                this._element = element;
            }

            // getters

            // public

            Button.prototype.toggle = function toggle() {
                var triggerChangeEvent = true;
                var addAriaPressed = true;
                var rootElement = $(this._element).closest(Selector.DATA_TOGGLE)[0];

                if (rootElement) {
                    var input = $(this._element).find(Selector.INPUT)[0];

                    if (input) {
                        if (input.type === 'radio') {
                            if (input.checked && $(this._element).hasClass(ClassName.ACTIVE)) {
                                triggerChangeEvent = false;
                            } else {
                                var activeElement = $(rootElement).find(Selector.ACTIVE)[0];

                                if (activeElement) {
                                    $(activeElement).removeClass(ClassName.ACTIVE);
                                }
                            }
                        }

                        if (triggerChangeEvent) {
                            if (input.hasAttribute('disabled') || rootElement.hasAttribute('disabled') || input.classList.contains('disabled') || rootElement.classList.contains('disabled')) {
                                return;
                            }
                            input.checked = !$(this._element).hasClass(ClassName.ACTIVE);
                            $(input).trigger('change');
                        }

                        input.focus();
                        addAriaPressed = false;
                    }
                }

                if (addAriaPressed) {
                    this._element.setAttribute('aria-pressed', !$(this._element).hasClass(ClassName.ACTIVE));
                }

                if (triggerChangeEvent) {
                    $(this._element).toggleClass(ClassName.ACTIVE);
                }
            };

            Button.prototype.dispose = function dispose() {
                $.removeData(this._element, DATA_KEY);
                this._element = null;
            };

            // static

            Button._jQueryInterface = function _jQueryInterface(config) {
                return this.each(function () {
                    var data = $(this).data(DATA_KEY);

                    if (!data) {
                        data = new Button(this);
                        $(this).data(DATA_KEY, data);
                    }

                    if (config === 'toggle') {
                        data[config]();
                    }
                });
            };

            _createClass(Button, null, [{
                key: 'VERSION',
                get: function get() {
                    return VERSION;
                }
            }]);

            return Button;
        }();

        /**
         * ------------------------------------------------------------------------
         * Data Api implementation
         * ------------------------------------------------------------------------
         */

        $(document).on(Event.CLICK_DATA_API, Selector.DATA_TOGGLE_CARROT, function (event) {
            event.preventDefault();

            var button = event.target;

            if (!$(button).hasClass(ClassName.BUTTON)) {
                button = $(button).closest(Selector.BUTTON);
            }

            Button._jQueryInterface.call($(button), 'toggle');
        }).on(Event.FOCUS_BLUR_DATA_API, Selector.DATA_TOGGLE_CARROT, function (event) {
            var button = $(event.target).closest(Selector.BUTTON)[0];
            $(button).toggleClass(ClassName.FOCUS, /^focus(in)?$/.test(event.type));
        });

        /**
         * ------------------------------------------------------------------------
         * jQuery
         * ------------------------------------------------------------------------
         */

        $.fn[NAME] = Button._jQueryInterface;
        $.fn[NAME].Constructor = Button;
        $.fn[NAME].noConflict = function () {
            $.fn[NAME] = JQUERY_NO_CONFLICT;
            return Button._jQueryInterface;
        };

        return Button;
    }(jQuery);

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v4.0.0-beta): carousel.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
     * --------------------------------------------------------------------------
     */

    var Carousel = function ($) {

        /**
         * ------------------------------------------------------------------------
         * Constants
         * ------------------------------------------------------------------------
         */

        var NAME = 'carousel';
        var VERSION = '4.0.0-beta';
        var DATA_KEY = 'bs.carousel';
        var EVENT_KEY = '.' + DATA_KEY;
        var DATA_API_KEY = '.data-api';
        var JQUERY_NO_CONFLICT = $.fn[NAME];
        var TRANSITION_DURATION = 600;
        var ARROW_LEFT_KEYCODE = 37; // KeyboardEvent.which value for left arrow key
        var ARROW_RIGHT_KEYCODE = 39; // KeyboardEvent.which value for right arrow key
        var TOUCHEVENT_COMPAT_WAIT = 500; // Time for mouse compat events to fire after touch

        var Default = {
            interval: 5000,
            keyboard: true,
            slide: false,
            pause: 'hover',
            wrap: true
        };

        var DefaultType = {
            interval: '(number|boolean)',
            keyboard: 'boolean',
            slide: '(boolean|string)',
            pause: '(string|boolean)',
            wrap: 'boolean'
        };

        var Direction = {
            NEXT: 'next',
            PREV: 'prev',
            LEFT: 'left',
            RIGHT: 'right'
        };

        var Event = {
            SLIDE: 'slide' + EVENT_KEY,
            SLID: 'slid' + EVENT_KEY,
            KEYDOWN: 'keydown' + EVENT_KEY,
            MOUSEENTER: 'mouseenter' + EVENT_KEY,
            MOUSELEAVE: 'mouseleave' + EVENT_KEY,
            TOUCHEND: 'touchend' + EVENT_KEY,
            LOAD_DATA_API: 'load' + EVENT_KEY + DATA_API_KEY,
            CLICK_DATA_API: 'click' + EVENT_KEY + DATA_API_KEY
        };

        var ClassName = {
            CAROUSEL: 'carousel',
            ACTIVE: 'active',
            SLIDE: 'slide',
            RIGHT: 'carousel-item-right',
            LEFT: 'carousel-item-left',
            NEXT: 'carousel-item-next',
            PREV: 'carousel-item-prev',
            ITEM: 'carousel-item'
        };

        var Selector = {
            ACTIVE: '.active',
            ACTIVE_ITEM: '.active.carousel-item',
            ITEM: '.carousel-item',
            NEXT_PREV: '.carousel-item-next, .carousel-item-prev',
            INDICATORS: '.carousel-indicators',
            DATA_SLIDE: '[data-slide], [data-slide-to]',
            DATA_RIDE: '[data-ride="carousel"]'

            /**
             * ------------------------------------------------------------------------
             * Class Definition
             * ------------------------------------------------------------------------
             */

        };
        var Carousel = function () {
            function Carousel(element, config) {
                _classCallCheck(this, Carousel);

                this._items = null;
                this._interval = null;
                this._activeElement = null;

                this._isPaused = false;
                this._isSliding = false;

                this.touchTimeout = null;

                this._config = this._getConfig(config);
                this._element = $(element)[0];
                this._indicatorsElement = $(this._element).find(Selector.INDICATORS)[0];

                this._addEventListeners();
            }

            // getters

            // public

            Carousel.prototype.next = function next() {
                if (!this._isSliding) {
                    this._slide(Direction.NEXT);
                }
            };

            Carousel.prototype.nextWhenVisible = function nextWhenVisible() {
                // Don't call next when the page isn't visible
                if (!document.hidden) {
                    this.next();
                }
            };

            Carousel.prototype.prev = function prev() {
                if (!this._isSliding) {
                    this._slide(Direction.PREV);
                }
            };

            Carousel.prototype.pause = function pause(event) {
                if (!event) {
                    this._isPaused = true;
                }

                if ($(this._element).find(Selector.NEXT_PREV)[0] && Util.supportsTransitionEnd()) {
                    Util.triggerTransitionEnd(this._element);
                    this.cycle(true);
                }

                clearInterval(this._interval);
                this._interval = null;
            };

            Carousel.prototype.cycle = function cycle(event) {
                if (!event) {
                    this._isPaused = false;
                }

                if (this._interval) {
                    clearInterval(this._interval);
                    this._interval = null;
                }

                if (this._config.interval && !this._isPaused) {
                    this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval);
                }
            };

            Carousel.prototype.to = function to(index) {
                var _this3 = this;

                this._activeElement = $(this._element).find(Selector.ACTIVE_ITEM)[0];

                var activeIndex = this._getItemIndex(this._activeElement);

                if (index > this._items.length - 1 || index < 0) {
                    return;
                }

                if (this._isSliding) {
                    $(this._element).one(Event.SLID, function () {
                        return _this3.to(index);
                    });
                    return;
                }

                if (activeIndex === index) {
                    this.pause();
                    this.cycle();
                    return;
                }

                var direction = index > activeIndex ? Direction.NEXT : Direction.PREV;

                this._slide(direction, this._items[index]);
            };

            Carousel.prototype.dispose = function dispose() {
                $(this._element).off(EVENT_KEY);
                $.removeData(this._element, DATA_KEY);

                this._items = null;
                this._config = null;
                this._element = null;
                this._interval = null;
                this._isPaused = null;
                this._isSliding = null;
                this._activeElement = null;
                this._indicatorsElement = null;
            };

            // private

            Carousel.prototype._getConfig = function _getConfig(config) {
                config = $.extend({}, Default, config);
                Util.typeCheckConfig(NAME, config, DefaultType);
                return config;
            };

            Carousel.prototype._addEventListeners = function _addEventListeners() {
                var _this4 = this;

                if (this._config.keyboard) {
                    $(this._element).on(Event.KEYDOWN, function (event) {
                        return _this4._keydown(event);
                    });
                }

                if (this._config.pause === 'hover') {
                    $(this._element).on(Event.MOUSEENTER, function (event) {
                        return _this4.pause(event);
                    }).on(Event.MOUSELEAVE, function (event) {
                        return _this4.cycle(event);
                    });
                    if ('ontouchstart' in document.documentElement) {
                        // if it's a touch-enabled device, mouseenter/leave are fired as
                        // part of the mouse compatibility events on first tap - the carousel
                        // would stop cycling until user tapped out of it;
                        // here, we listen for touchend, explicitly pause the carousel
                        // (as if it's the second time we tap on it, mouseenter compat event
                        // is NOT fired) and after a timeout (to allow for mouse compatibility
                        // events to fire) we explicitly restart cycling
                        $(this._element).on(Event.TOUCHEND, function () {
                            _this4.pause();
                            if (_this4.touchTimeout) {
                                clearTimeout(_this4.touchTimeout);
                            }
                            _this4.touchTimeout = setTimeout(function (event) {
                                return _this4.cycle(event);
                            }, TOUCHEVENT_COMPAT_WAIT + _this4._config.interval);
                        });
                    }
                }
            };

            Carousel.prototype._keydown = function _keydown(event) {
                if (/input|textarea/i.test(event.target.tagName)) {
                    return;
                }

                switch (event.which) {
                    case ARROW_LEFT_KEYCODE:
                        event.preventDefault();
                        this.prev();
                        break;
                    case ARROW_RIGHT_KEYCODE:
                        event.preventDefault();
                        this.next();
                        break;
                    default:
                        return;
                }
            };

            Carousel.prototype._getItemIndex = function _getItemIndex(element) {
                this._items = $.makeArray($(element).parent().find(Selector.ITEM));
                return this._items.indexOf(element);
            };

            Carousel.prototype._getItemByDirection = function _getItemByDirection(direction, activeElement) {
                var isNextDirection = direction === Direction.NEXT;
                var isPrevDirection = direction === Direction.PREV;
                var activeIndex = this._getItemIndex(activeElement);
                var lastItemIndex = this._items.length - 1;
                var isGoingToWrap = isPrevDirection && activeIndex === 0 || isNextDirection && activeIndex === lastItemIndex;

                if (isGoingToWrap && !this._config.wrap) {
                    return activeElement;
                }

                var delta = direction === Direction.PREV ? -1 : 1;
                var itemIndex = (activeIndex + delta) % this._items.length;

                return itemIndex === -1 ? this._items[this._items.length - 1] : this._items[itemIndex];
            };

            Carousel.prototype._triggerSlideEvent = function _triggerSlideEvent(relatedTarget, eventDirectionName) {
                var targetIndex = this._getItemIndex(relatedTarget);
                var fromIndex = this._getItemIndex($(this._element).find(Selector.ACTIVE_ITEM)[0]);
                var slideEvent = $.Event(Event.SLIDE, {
                    relatedTarget: relatedTarget,
                    direction: eventDirectionName,
                    from: fromIndex,
                    to: targetIndex
                });

                $(this._element).trigger(slideEvent);

                return slideEvent;
            };

            Carousel.prototype._setActiveIndicatorElement = function _setActiveIndicatorElement(element) {
                if (this._indicatorsElement) {
                    $(this._indicatorsElement).find(Selector.ACTIVE).removeClass(ClassName.ACTIVE);

                    var nextIndicator = this._indicatorsElement.children[this._getItemIndex(element)];

                    if (nextIndicator) {
                        $(nextIndicator).addClass(ClassName.ACTIVE);
                    }
                }
            };

            Carousel.prototype._slide = function _slide(direction, element) {
                var _this5 = this;

                var activeElement = $(this._element).find(Selector.ACTIVE_ITEM)[0];
                var activeElementIndex = this._getItemIndex(activeElement);
                var nextElement = element || activeElement && this._getItemByDirection(direction, activeElement);
                var nextElementIndex = this._getItemIndex(nextElement);
                var isCycling = Boolean(this._interval);

                var directionalClassName = void 0;
                var orderClassName = void 0;
                var eventDirectionName = void 0;

                if (direction === Direction.NEXT) {
                    directionalClassName = ClassName.LEFT;
                    orderClassName = ClassName.NEXT;
                    eventDirectionName = Direction.LEFT;
                } else {
                    directionalClassName = ClassName.RIGHT;
                    orderClassName = ClassName.PREV;
                    eventDirectionName = Direction.RIGHT;
                }

                if (nextElement && $(nextElement).hasClass(ClassName.ACTIVE)) {
                    this._isSliding = false;
                    return;
                }

                var slideEvent = this._triggerSlideEvent(nextElement, eventDirectionName);
                if (slideEvent.isDefaultPrevented()) {
                    return;
                }

                if (!activeElement || !nextElement) {
                    // some weirdness is happening, so we bail
                    return;
                }

                this._isSliding = true;

                if (isCycling) {
                    this.pause();
                }

                this._setActiveIndicatorElement(nextElement);

                var slidEvent = $.Event(Event.SLID, {
                    relatedTarget: nextElement,
                    direction: eventDirectionName,
                    from: activeElementIndex,
                    to: nextElementIndex
                });

                if (Util.supportsTransitionEnd() && $(this._element).hasClass(ClassName.SLIDE)) {

                    $(nextElement).addClass(orderClassName);

                    Util.reflow(nextElement);

                    $(activeElement).addClass(directionalClassName);
                    $(nextElement).addClass(directionalClassName);

                    $(activeElement).one(Util.TRANSITION_END, function () {
                        $(nextElement).removeClass(directionalClassName + ' ' + orderClassName).addClass(ClassName.ACTIVE);

                        $(activeElement).removeClass(ClassName.ACTIVE + ' ' + orderClassName + ' ' + directionalClassName);

                        _this5._isSliding = false;

                        setTimeout(function () {
                            return $(_this5._element).trigger(slidEvent);
                        }, 0);
                    }).emulateTransitionEnd(TRANSITION_DURATION);
                } else {
                    $(activeElement).removeClass(ClassName.ACTIVE);
                    $(nextElement).addClass(ClassName.ACTIVE);

                    this._isSliding = false;
                    $(this._element).trigger(slidEvent);
                }

                if (isCycling) {
                    this.cycle();
                }
            };

            // static

            Carousel._jQueryInterface = function _jQueryInterface(config) {
                return this.each(function () {
                    var data = $(this).data(DATA_KEY);
                    var _config = $.extend({}, Default, $(this).data());

                    if ((typeof config === 'undefined' ? 'undefined' : _typeof(config)) === 'object') {
                        $.extend(_config, config);
                    }

                    var action = typeof config === 'string' ? config : _config.slide;

                    if (!data) {
                        data = new Carousel(this, _config);
                        $(this).data(DATA_KEY, data);
                    }

                    if (typeof config === 'number') {
                        data.to(config);
                    } else if (typeof action === 'string') {
                        if (data[action] === undefined) {
                            throw new Error('No method named "' + action + '"');
                        }
                        data[action]();
                    } else if (_config.interval) {
                        data.pause();
                        data.cycle();
                    }
                });
            };

            Carousel._dataApiClickHandler = function _dataApiClickHandler(event) {
                var selector = Util.getSelectorFromElement(this);

                if (!selector) {
                    return;
                }

                var target = $(selector)[0];

                if (!target || !$(target).hasClass(ClassName.CAROUSEL)) {
                    return;
                }

                var config = $.extend({}, $(target).data(), $(this).data());
                var slideIndex = this.getAttribute('data-slide-to');

                if (slideIndex) {
                    config.interval = false;
                }

                Carousel._jQueryInterface.call($(target), config);

                if (slideIndex) {
                    $(target).data(DATA_KEY).to(slideIndex);
                }

                event.preventDefault();
            };

            _createClass(Carousel, null, [{
                key: 'VERSION',
                get: function get() {
                    return VERSION;
                }
            }, {
                key: 'Default',
                get: function get() {
                    return Default;
                }
            }]);

            return Carousel;
        }();

        /**
         * ------------------------------------------------------------------------
         * Data Api implementation
         * ------------------------------------------------------------------------
         */

        $(document).on(Event.CLICK_DATA_API, Selector.DATA_SLIDE, Carousel._dataApiClickHandler);

        $(window).on(Event.LOAD_DATA_API, function () {
            $(Selector.DATA_RIDE).each(function () {
                var $carousel = $(this);
                Carousel._jQueryInterface.call($carousel, $carousel.data());
            });
        });

        /**
         * ------------------------------------------------------------------------
         * jQuery
         * ------------------------------------------------------------------------
         */

        $.fn[NAME] = Carousel._jQueryInterface;
        $.fn[NAME].Constructor = Carousel;
        $.fn[NAME].noConflict = function () {
            $.fn[NAME] = JQUERY_NO_CONFLICT;
            return Carousel._jQueryInterface;
        };

        return Carousel;
    }(jQuery);

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v4.0.0-beta): collapse.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
     * --------------------------------------------------------------------------
     */

    var Collapse = function ($) {

        /**
         * ------------------------------------------------------------------------
         * Constants
         * ------------------------------------------------------------------------
         */

        var NAME = 'collapse';
        var VERSION = '4.0.0-beta';
        var DATA_KEY = 'bs.collapse';
        var EVENT_KEY = '.' + DATA_KEY;
        var DATA_API_KEY = '.data-api';
        var JQUERY_NO_CONFLICT = $.fn[NAME];
        var TRANSITION_DURATION = 600;

        var Default = {
            toggle: true,
            parent: ''
        };

        var DefaultType = {
            toggle: 'boolean',
            parent: 'string'
        };

        var Event = {
            SHOW: 'show' + EVENT_KEY,
            SHOWN: 'shown' + EVENT_KEY,
            HIDE: 'hide' + EVENT_KEY,
            HIDDEN: 'hidden' + EVENT_KEY,
            CLICK_DATA_API: 'click' + EVENT_KEY + DATA_API_KEY
        };

        var ClassName = {
            SHOW: 'show',
            COLLAPSE: 'collapse',
            COLLAPSING: 'collapsing',
            COLLAPSED: 'collapsed'
        };

        var Dimension = {
            WIDTH: 'width',
            HEIGHT: 'height'
        };

        var Selector = {
            ACTIVES: '.show, .collapsing',
            DATA_TOGGLE: '[data-toggle="collapse"]'

            /**
             * ------------------------------------------------------------------------
             * Class Definition
             * ------------------------------------------------------------------------
             */

        };
        var Collapse = function () {
            function Collapse(element, config) {
                _classCallCheck(this, Collapse);

                this._isTransitioning = false;
                this._element = element;
                this._config = this._getConfig(config);
                this._triggerArray = $.makeArray($('[data-toggle="collapse"][href="#' + element.id + '"],' + ('[data-toggle="collapse"][data-target="#' + element.id + '"]')));
                var tabToggles = $(Selector.DATA_TOGGLE);
                for (var i = 0; i < tabToggles.length; i++) {
                    var elem = tabToggles[i];
                    var selector = Util.getSelectorFromElement(elem);
                    if (selector !== null && $(selector).filter(element).length > 0) {
                        this._triggerArray.push(elem);
                    }
                }

                this._parent = this._config.parent ? this._getParent() : null;

                if (!this._config.parent) {
                    this._addAriaAndCollapsedClass(this._element, this._triggerArray);
                }

                if (this._config.toggle) {
                    this.toggle();
                }
            }

            // getters

            // public

            Collapse.prototype.toggle = function toggle() {
                if ($(this._element).hasClass(ClassName.SHOW)) {
                    this.hide();
                } else {
                    this.show();
                }
            };

            Collapse.prototype.show = function show() {
                var _this6 = this;

                if (this._isTransitioning || $(this._element).hasClass(ClassName.SHOW)) {
                    return;
                }

                var actives = void 0;
                var activesData = void 0;

                if (this._parent) {
                    actives = $.makeArray($(this._parent).children().children(Selector.ACTIVES));
                    if (!actives.length) {
                        actives = null;
                    }
                }

                if (actives) {
                    activesData = $(actives).data(DATA_KEY);
                    if (activesData && activesData._isTransitioning) {
                        return;
                    }
                }

                var startEvent = $.Event(Event.SHOW);
                $(this._element).trigger(startEvent);
                if (startEvent.isDefaultPrevented()) {
                    return;
                }

                if (actives) {
                    Collapse._jQueryInterface.call($(actives), 'hide');
                    if (!activesData) {
                        $(actives).data(DATA_KEY, null);
                    }
                }

                var dimension = this._getDimension();

                $(this._element).removeClass(ClassName.COLLAPSE).addClass(ClassName.COLLAPSING);

                this._element.style[dimension] = 0;

                if (this._triggerArray.length) {
                    $(this._triggerArray).removeClass(ClassName.COLLAPSED).attr('aria-expanded', true);
                }

                this.setTransitioning(true);

                var complete = function complete() {
                    $(_this6._element).removeClass(ClassName.COLLAPSING).addClass(ClassName.COLLAPSE).addClass(ClassName.SHOW);

                    _this6._element.style[dimension] = '';

                    _this6.setTransitioning(false);

                    $(_this6._element).trigger(Event.SHOWN);
                };

                if (!Util.supportsTransitionEnd()) {
                    complete();
                    return;
                }

                var capitalizedDimension = dimension[0].toUpperCase() + dimension.slice(1);
                var scrollSize = 'scroll' + capitalizedDimension;

                $(this._element).one(Util.TRANSITION_END, complete).emulateTransitionEnd(TRANSITION_DURATION);

                this._element.style[dimension] = this._element[scrollSize] + 'px';
            };

            Collapse.prototype.hide = function hide() {
                var _this7 = this;

                if (this._isTransitioning || !$(this._element).hasClass(ClassName.SHOW)) {
                    return;
                }

                var startEvent = $.Event(Event.HIDE);
                $(this._element).trigger(startEvent);
                if (startEvent.isDefaultPrevented()) {
                    return;
                }

                var dimension = this._getDimension();

                this._element.style[dimension] = this._element.getBoundingClientRect()[dimension] + 'px';

                Util.reflow(this._element);

                $(this._element).addClass(ClassName.COLLAPSING).removeClass(ClassName.COLLAPSE).removeClass(ClassName.SHOW);

                if (this._triggerArray.length) {
                    for (var i = 0; i < this._triggerArray.length; i++) {
                        var trigger = this._triggerArray[i];
                        var selector = Util.getSelectorFromElement(trigger);
                        if (selector !== null) {
                            var $elem = $(selector);
                            if (!$elem.hasClass(ClassName.SHOW)) {
                                $(trigger).addClass(ClassName.COLLAPSED).attr('aria-expanded', false);
                            }
                        }
                    }
                }

                this.setTransitioning(true);

                var complete = function complete() {
                    _this7.setTransitioning(false);
                    $(_this7._element).removeClass(ClassName.COLLAPSING).addClass(ClassName.COLLAPSE).trigger(Event.HIDDEN);
                };

                this._element.style[dimension] = '';

                if (!Util.supportsTransitionEnd()) {
                    complete();
                    return;
                }

                $(this._element).one(Util.TRANSITION_END, complete).emulateTransitionEnd(TRANSITION_DURATION);
            };

            Collapse.prototype.setTransitioning = function setTransitioning(isTransitioning) {
                this._isTransitioning = isTransitioning;
            };

            Collapse.prototype.dispose = function dispose() {
                $.removeData(this._element, DATA_KEY);

                this._config = null;
                this._parent = null;
                this._element = null;
                this._triggerArray = null;
                this._isTransitioning = null;
            };

            // private

            Collapse.prototype._getConfig = function _getConfig(config) {
                config = $.extend({}, Default, config);
                config.toggle = Boolean(config.toggle); // coerce string values
                Util.typeCheckConfig(NAME, config, DefaultType);
                return config;
            };

            Collapse.prototype._getDimension = function _getDimension() {
                var hasWidth = $(this._element).hasClass(Dimension.WIDTH);
                return hasWidth ? Dimension.WIDTH : Dimension.HEIGHT;
            };

            Collapse.prototype._getParent = function _getParent() {
                var _this8 = this;

                var parent = $(this._config.parent)[0];
                var selector = '[data-toggle="collapse"][data-parent="' + this._config.parent + '"]';

                $(parent).find(selector).each(function (i, element) {
                    _this8._addAriaAndCollapsedClass(Collapse._getTargetFromElement(element), [element]);
                });

                return parent;
            };

            Collapse.prototype._addAriaAndCollapsedClass = function _addAriaAndCollapsedClass(element, triggerArray) {
                if (element) {
                    var isOpen = $(element).hasClass(ClassName.SHOW);

                    if (triggerArray.length) {
                        $(triggerArray).toggleClass(ClassName.COLLAPSED, !isOpen).attr('aria-expanded', isOpen);
                    }
                }
            };

            // static

            Collapse._getTargetFromElement = function _getTargetFromElement(element) {
                var selector = Util.getSelectorFromElement(element);
                return selector ? $(selector)[0] : null;
            };

            Collapse._jQueryInterface = function _jQueryInterface(config) {
                return this.each(function () {
                    var $this = $(this);
                    var data = $this.data(DATA_KEY);
                    var _config = $.extend({}, Default, $this.data(), (typeof config === 'undefined' ? 'undefined' : _typeof(config)) === 'object' && config);

                    if (!data && _config.toggle && /show|hide/.test(config)) {
                        _config.toggle = false;
                    }

                    if (!data) {
                        data = new Collapse(this, _config);
                        $this.data(DATA_KEY, data);
                    }

                    if (typeof config === 'string') {
                        if (data[config] === undefined) {
                            throw new Error('No method named "' + config + '"');
                        }
                        data[config]();
                    }
                });
            };

            _createClass(Collapse, null, [{
                key: 'VERSION',
                get: function get() {
                    return VERSION;
                }
            }, {
                key: 'Default',
                get: function get() {
                    return Default;
                }
            }]);

            return Collapse;
        }();

        /**
         * ------------------------------------------------------------------------
         * Data Api implementation
         * ------------------------------------------------------------------------
         */

        $(document).on(Event.CLICK_DATA_API, Selector.DATA_TOGGLE, function (event) {
            if (!/input|textarea/i.test(event.target.tagName)) {
                event.preventDefault();
            }

            var $trigger = $(this);
            var selector = Util.getSelectorFromElement(this);
            $(selector).each(function () {
                var $target = $(this);
                var data = $target.data(DATA_KEY);
                var config = data ? 'toggle' : $trigger.data();
                Collapse._jQueryInterface.call($target, config);
            });
        });

        /**
         * ------------------------------------------------------------------------
         * jQuery
         * ------------------------------------------------------------------------
         */

        $.fn[NAME] = Collapse._jQueryInterface;
        $.fn[NAME].Constructor = Collapse;
        $.fn[NAME].noConflict = function () {
            $.fn[NAME] = JQUERY_NO_CONFLICT;
            return Collapse._jQueryInterface;
        };

        return Collapse;
    }(jQuery);

    /* global Popper */

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v4.0.0-beta): dropdown.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
     * --------------------------------------------------------------------------
     */

    var Dropdown = function ($) {

        /**
         * Check for Popper dependency
         * Popper - https://popper.js.org
         */
        if (typeof Popper === 'undefined') {
            throw new Error('Bootstrap dropdown require Popper.js (https://popper.js.org)');
        }

        /**
         * ------------------------------------------------------------------------
         * Constants
         * ------------------------------------------------------------------------
         */

        var NAME = 'dropdown';
        var VERSION = '4.0.0-beta';
        var DATA_KEY = 'bs.dropdown';
        var EVENT_KEY = '.' + DATA_KEY;
        var DATA_API_KEY = '.data-api';
        var JQUERY_NO_CONFLICT = $.fn[NAME];
        var ESCAPE_KEYCODE = 27; // KeyboardEvent.which value for Escape (Esc) key
        var SPACE_KEYCODE = 32; // KeyboardEvent.which value for space key
        var TAB_KEYCODE = 9; // KeyboardEvent.which value for tab key
        var ARROW_UP_KEYCODE = 38; // KeyboardEvent.which value for up arrow key
        var ARROW_DOWN_KEYCODE = 40; // KeyboardEvent.which value for down arrow key
        var RIGHT_MOUSE_BUTTON_WHICH = 3; // MouseEvent.which value for the right button (assuming a right-handed mouse)
        var REGEXP_KEYDOWN = new RegExp(ARROW_UP_KEYCODE + '|' + ARROW_DOWN_KEYCODE + '|' + ESCAPE_KEYCODE);

        var Event = {
            HIDE: 'hide' + EVENT_KEY,
            HIDDEN: 'hidden' + EVENT_KEY,
            SHOW: 'show' + EVENT_KEY,
            SHOWN: 'shown' + EVENT_KEY,
            CLICK: 'click' + EVENT_KEY,
            CLICK_DATA_API: 'click' + EVENT_KEY + DATA_API_KEY,
            KEYDOWN_DATA_API: 'keydown' + EVENT_KEY + DATA_API_KEY,
            KEYUP_DATA_API: 'keyup' + EVENT_KEY + DATA_API_KEY
        };

        var ClassName = {
            DISABLED: 'disabled',
            SHOW: 'show',
            DROPUP: 'dropup',
            MENURIGHT: 'dropdown-menu-right',
            MENULEFT: 'dropdown-menu-left'
        };

        var Selector = {
            DATA_TOGGLE: '[data-toggle="dropdown"]',
            FORM_CHILD: '.dropdown form',
            MENU: '.dropdown-menu',
            NAVBAR_NAV: '.navbar-nav',
            VISIBLE_ITEMS: '.dropdown-menu .dropdown-item:not(.disabled)'
        };

        var AttachmentMap = {
            TOP: 'top-start',
            TOPEND: 'top-end',
            BOTTOM: 'bottom-start',
            BOTTOMEND: 'bottom-end'
        };

        var Default = {
            placement: AttachmentMap.BOTTOM,
            offset: 0,
            flip: true
        };

        var DefaultType = {
            placement: 'string',
            offset: '(number|string)',
            flip: 'boolean'

            /**
             * ------------------------------------------------------------------------
             * Class Definition
             * ------------------------------------------------------------------------
             */

        };
        var Dropdown = function () {
            function Dropdown(element, config) {
                _classCallCheck(this, Dropdown);

                this._element = element;
                this._popper = null;
                this._config = this._getConfig(config);
                this._menu = this._getMenuElement();
                this._inNavbar = this._detectNavbar();

                this._addEventListeners();
            }

            // getters

            // public

            Dropdown.prototype.toggle = function toggle() {
                if (this._element.disabled || $(this._element).hasClass(ClassName.DISABLED)) {
                    return;
                }

                var parent = Dropdown._getParentFromElement(this._element);
                var isActive = $(this._menu).hasClass(ClassName.SHOW);

                Dropdown._clearMenus();

                if (isActive) {
                    return;
                }

                var relatedTarget = {
                    relatedTarget: this._element
                };
                var showEvent = $.Event(Event.SHOW, relatedTarget);

                $(parent).trigger(showEvent);

                if (showEvent.isDefaultPrevented()) {
                    return;
                }

                var element = this._element;
                // for dropup with alignment we use the parent as popper container
                if ($(parent).hasClass(ClassName.DROPUP)) {
                    if ($(this._menu).hasClass(ClassName.MENULEFT) || $(this._menu).hasClass(ClassName.MENURIGHT)) {
                        element = parent;
                    }
                }
                this._popper = new Popper(element, this._menu, this._getPopperConfig());

                // if this is a touch-enabled device we add extra
                // empty mouseover listeners to the body's immediate children;
                // only needed because of broken event delegation on iOS
                // https://www.quirksmode.org/blog/archives/2014/02/mouse_event_bub.html
                if ('ontouchstart' in document.documentElement && !$(parent).closest(Selector.NAVBAR_NAV).length) {
                    $('body').children().on('mouseover', null, $.noop);
                }

                this._element.focus();
                this._element.setAttribute('aria-expanded', true);

                $(this._menu).toggleClass(ClassName.SHOW);
                $(parent).toggleClass(ClassName.SHOW).trigger($.Event(Event.SHOWN, relatedTarget));
            };

            Dropdown.prototype.dispose = function dispose() {
                $.removeData(this._element, DATA_KEY);
                $(this._element).off(EVENT_KEY);
                this._element = null;
                this._menu = null;
                if (this._popper !== null) {
                    this._popper.destroy();
                }
                this._popper = null;
            };

            Dropdown.prototype.update = function update() {
                this._inNavbar = this._detectNavbar();
                if (this._popper !== null) {
                    this._popper.scheduleUpdate();
                }
            };

            // private

            Dropdown.prototype._addEventListeners = function _addEventListeners() {
                var _this9 = this;

                $(this._element).on(Event.CLICK, function (event) {
                    event.preventDefault();
                    event.stopPropagation();
                    _this9.toggle();
                });
            };

            Dropdown.prototype._getConfig = function _getConfig(config) {
                var elementData = $(this._element).data();
                if (elementData.placement !== undefined) {
                    elementData.placement = AttachmentMap[elementData.placement.toUpperCase()];
                }

                config = $.extend({}, this.constructor.Default, $(this._element).data(), config);

                Util.typeCheckConfig(NAME, config, this.constructor.DefaultType);

                return config;
            };

            Dropdown.prototype._getMenuElement = function _getMenuElement() {
                if (!this._menu) {
                    var parent = Dropdown._getParentFromElement(this._element);
                    this._menu = $(parent).find(Selector.MENU)[0];
                }
                return this._menu;
            };

            Dropdown.prototype._getPlacement = function _getPlacement() {
                var $parentDropdown = $(this._element).parent();
                var placement = this._config.placement;

                // Handle dropup
                if ($parentDropdown.hasClass(ClassName.DROPUP) || this._config.placement === AttachmentMap.TOP) {
                    placement = AttachmentMap.TOP;
                    if ($(this._menu).hasClass(ClassName.MENURIGHT)) {
                        placement = AttachmentMap.TOPEND;
                    }
                } else if ($(this._menu).hasClass(ClassName.MENURIGHT)) {
                    placement = AttachmentMap.BOTTOMEND;
                }
                return placement;
            };

            Dropdown.prototype._detectNavbar = function _detectNavbar() {
                return $(this._element).closest('.navbar').length > 0;
            };

            Dropdown.prototype._getPopperConfig = function _getPopperConfig() {
                var popperConfig = {
                    placement: this._getPlacement(),
                    modifiers: {
                        offset: {
                            offset: this._config.offset
                        },
                        flip: {
                            enabled: this._config.flip
                        }
                    }

                    // Disable Popper.js for Dropdown in Navbar
                };if (this._inNavbar) {
                    popperConfig.modifiers.applyStyle = {
                        enabled: !this._inNavbar
                    };
                }
                return popperConfig;
            };

            // static

            Dropdown._jQueryInterface = function _jQueryInterface(config) {
                return this.each(function () {
                    var data = $(this).data(DATA_KEY);
                    var _config = (typeof config === 'undefined' ? 'undefined' : _typeof(config)) === 'object' ? config : null;

                    if (!data) {
                        data = new Dropdown(this, _config);
                        $(this).data(DATA_KEY, data);
                    }

                    if (typeof config === 'string') {
                        if (data[config] === undefined) {
                            throw new Error('No method named "' + config + '"');
                        }
                        data[config]();
                    }
                });
            };

            Dropdown._clearMenus = function _clearMenus(event) {
                if (event && (event.which === RIGHT_MOUSE_BUTTON_WHICH || event.type === 'keyup' && event.which !== TAB_KEYCODE)) {
                    return;
                }

                var toggles = $.makeArray($(Selector.DATA_TOGGLE));
                for (var i = 0; i < toggles.length; i++) {
                    var parent = Dropdown._getParentFromElement(toggles[i]);
                    var context = $(toggles[i]).data(DATA_KEY);
                    var relatedTarget = {
                        relatedTarget: toggles[i]
                    };

                    if (!context) {
                        continue;
                    }

                    var dropdownMenu = context._menu;
                    if (!$(parent).hasClass(ClassName.SHOW)) {
                        continue;
                    }

                    if (event && (event.type === 'click' && /input|textarea/i.test(event.target.tagName) || event.type === 'keyup' && event.which === TAB_KEYCODE) && $.contains(parent, event.target)) {
                        continue;
                    }

                    var hideEvent = $.Event(Event.HIDE, relatedTarget);
                    $(parent).trigger(hideEvent);
                    if (hideEvent.isDefaultPrevented()) {
                        continue;
                    }

                    // if this is a touch-enabled device we remove the extra
                    // empty mouseover listeners we added for iOS support
                    if ('ontouchstart' in document.documentElement) {
                        $('body').children().off('mouseover', null, $.noop);
                    }

                    toggles[i].setAttribute('aria-expanded', 'false');

                    $(dropdownMenu).removeClass(ClassName.SHOW);
                    $(parent).removeClass(ClassName.SHOW).trigger($.Event(Event.HIDDEN, relatedTarget));
                }
            };

            Dropdown._getParentFromElement = function _getParentFromElement(element) {
                var parent = void 0;
                var selector = Util.getSelectorFromElement(element);

                if (selector) {
                    parent = $(selector)[0];
                }

                return parent || element.parentNode;
            };

            Dropdown._dataApiKeydownHandler = function _dataApiKeydownHandler(event) {
                if (!REGEXP_KEYDOWN.test(event.which) || /button/i.test(event.target.tagName) && event.which === SPACE_KEYCODE || /input|textarea/i.test(event.target.tagName)) {
                    return;
                }

                event.preventDefault();
                event.stopPropagation();

                if (this.disabled || $(this).hasClass(ClassName.DISABLED)) {
                    return;
                }

                var parent = Dropdown._getParentFromElement(this);
                var isActive = $(parent).hasClass(ClassName.SHOW);

                if (!isActive && (event.which !== ESCAPE_KEYCODE || event.which !== SPACE_KEYCODE) || isActive && (event.which === ESCAPE_KEYCODE || event.which === SPACE_KEYCODE)) {

                    if (event.which === ESCAPE_KEYCODE) {
                        var toggle = $(parent).find(Selector.DATA_TOGGLE)[0];
                        $(toggle).trigger('focus');
                    }

                    $(this).trigger('click');
                    return;
                }

                var items = $(parent).find(Selector.VISIBLE_ITEMS).get();

                if (!items.length) {
                    return;
                }

                var index = items.indexOf(event.target);

                if (event.which === ARROW_UP_KEYCODE && index > 0) {
                    // up
                    index--;
                }

                if (event.which === ARROW_DOWN_KEYCODE && index < items.length - 1) {
                    // down
                    index++;
                }

                if (index < 0) {
                    index = 0;
                }

                items[index].focus();
            };

            _createClass(Dropdown, null, [{
                key: 'VERSION',
                get: function get() {
                    return VERSION;
                }
            }, {
                key: 'Default',
                get: function get() {
                    return Default;
                }
            }, {
                key: 'DefaultType',
                get: function get() {
                    return DefaultType;
                }
            }]);

            return Dropdown;
        }();

        /**
         * ------------------------------------------------------------------------
         * Data Api implementation
         * ------------------------------------------------------------------------
         */

        $(document).on(Event.KEYDOWN_DATA_API, Selector.DATA_TOGGLE, Dropdown._dataApiKeydownHandler).on(Event.KEYDOWN_DATA_API, Selector.MENU, Dropdown._dataApiKeydownHandler).on(Event.CLICK_DATA_API + ' ' + Event.KEYUP_DATA_API, Dropdown._clearMenus).on(Event.CLICK_DATA_API, Selector.DATA_TOGGLE, function (event) {
            event.preventDefault();
            event.stopPropagation();
            Dropdown._jQueryInterface.call($(this), 'toggle');
        }).on(Event.CLICK_DATA_API, Selector.FORM_CHILD, function (e) {
            e.stopPropagation();
        });

        /**
         * ------------------------------------------------------------------------
         * jQuery
         * ------------------------------------------------------------------------
         */

        $.fn[NAME] = Dropdown._jQueryInterface;
        $.fn[NAME].Constructor = Dropdown;
        $.fn[NAME].noConflict = function () {
            $.fn[NAME] = JQUERY_NO_CONFLICT;
            return Dropdown._jQueryInterface;
        };

        return Dropdown;
    }(jQuery);

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v4.0.0-beta): modal.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
     * --------------------------------------------------------------------------
     */

    var Modal = function ($) {

        /**
         * ------------------------------------------------------------------------
         * Constants
         * ------------------------------------------------------------------------
         */

        var NAME = 'modal';
        var VERSION = '4.0.0-beta';
        var DATA_KEY = 'bs.modal';
        var EVENT_KEY = '.' + DATA_KEY;
        var DATA_API_KEY = '.data-api';
        var JQUERY_NO_CONFLICT = $.fn[NAME];
        var TRANSITION_DURATION = 300;
        var BACKDROP_TRANSITION_DURATION = 150;
        var ESCAPE_KEYCODE = 27; // KeyboardEvent.which value for Escape (Esc) key

        var Default = {
            backdrop: true,
            keyboard: true,
            focus: true,
            show: true
        };

        var DefaultType = {
            backdrop: '(boolean|string)',
            keyboard: 'boolean',
            focus: 'boolean',
            show: 'boolean'
        };

        var Event = {
            HIDE: 'hide' + EVENT_KEY,
            HIDDEN: 'hidden' + EVENT_KEY,
            SHOW: 'show' + EVENT_KEY,
            SHOWN: 'shown' + EVENT_KEY,
            FOCUSIN: 'focusin' + EVENT_KEY,
            RESIZE: 'resize' + EVENT_KEY,
            CLICK_DISMISS: 'click.dismiss' + EVENT_KEY,
            KEYDOWN_DISMISS: 'keydown.dismiss' + EVENT_KEY,
            MOUSEUP_DISMISS: 'mouseup.dismiss' + EVENT_KEY,
            MOUSEDOWN_DISMISS: 'mousedown.dismiss' + EVENT_KEY,
            CLICK_DATA_API: 'click' + EVENT_KEY + DATA_API_KEY
        };

        var ClassName = {
            SCROLLBAR_MEASURER: 'modal-scrollbar-measure',
            BACKDROP: 'modal-backdrop',
            OPEN: 'modal-open',
            FADE: 'fade',
            SHOW: 'show'
        };

        var Selector = {
            DIALOG: '.modal-dialog',
            DATA_TOGGLE: '[data-toggle="modal"]',
            DATA_DISMISS: '[data-dismiss="modal"]',
            FIXED_CONTENT: '.fixed-top, .fixed-bottom, .is-fixed, .sticky-top',
            NAVBAR_TOGGLER: '.navbar-toggler'

            /**
             * ------------------------------------------------------------------------
             * Class Definition
             * ------------------------------------------------------------------------
             */

        };
        var Modal = function () {
            function Modal(element, config) {
                _classCallCheck(this, Modal);

                this._config = this._getConfig(config);
                this._element = element;
                this._dialog = $(element).find(Selector.DIALOG)[0];
                this._backdrop = null;
                this._isShown = false;
                this._isBodyOverflowing = false;
                this._ignoreBackdropClick = false;
                this._originalBodyPadding = 0;
                this._scrollbarWidth = 0;
            }

            // getters

            // public

            Modal.prototype.toggle = function toggle(relatedTarget) {
                return this._isShown ? this.hide() : this.show(relatedTarget);
            };

            Modal.prototype.show = function show(relatedTarget) {
                var _this10 = this;

                if (this._isTransitioning) {
                    return;
                }

                if (Util.supportsTransitionEnd() && $(this._element).hasClass(ClassName.FADE)) {
                    this._isTransitioning = true;
                }

                var showEvent = $.Event(Event.SHOW, {
                    relatedTarget: relatedTarget
                });

                $(this._element).trigger(showEvent);

                if (this._isShown || showEvent.isDefaultPrevented()) {
                    return;
                }

                this._isShown = true;

                this._checkScrollbar();
                this._setScrollbar();

                $(document.body).addClass(ClassName.OPEN);

                this._setEscapeEvent();
                this._setResizeEvent();

                $(this._element).on(Event.CLICK_DISMISS, Selector.DATA_DISMISS, function (event) {
                    return _this10.hide(event);
                });

                $(this._dialog).on(Event.MOUSEDOWN_DISMISS, function () {
                    $(_this10._element).one(Event.MOUSEUP_DISMISS, function (event) {
                        if ($(event.target).is(_this10._element)) {
                            _this10._ignoreBackdropClick = true;
                        }
                    });
                });

                this._showBackdrop(function () {
                    return _this10._showElement(relatedTarget);
                });
            };

            Modal.prototype.hide = function hide(event) {
                var _this11 = this;

                if (event) {
                    event.preventDefault();
                }

                if (this._isTransitioning || !this._isShown) {
                    return;
                }

                var transition = Util.supportsTransitionEnd() && $(this._element).hasClass(ClassName.FADE);

                if (transition) {
                    this._isTransitioning = true;
                }

                var hideEvent = $.Event(Event.HIDE);

                $(this._element).trigger(hideEvent);

                if (!this._isShown || hideEvent.isDefaultPrevented()) {
                    return;
                }

                this._isShown = false;

                this._setEscapeEvent();
                this._setResizeEvent();

                $(document).off(Event.FOCUSIN);

                $(this._element).removeClass(ClassName.SHOW);

                $(this._element).off(Event.CLICK_DISMISS);
                $(this._dialog).off(Event.MOUSEDOWN_DISMISS);

                if (transition) {

                    $(this._element).one(Util.TRANSITION_END, function (event) {
                        return _this11._hideModal(event);
                    }).emulateTransitionEnd(TRANSITION_DURATION);
                } else {
                    this._hideModal();
                }
            };

            Modal.prototype.dispose = function dispose() {
                $.removeData(this._element, DATA_KEY);

                $(window, document, this._element, this._backdrop).off(EVENT_KEY);

                this._config = null;
                this._element = null;
                this._dialog = null;
                this._backdrop = null;
                this._isShown = null;
                this._isBodyOverflowing = null;
                this._ignoreBackdropClick = null;
                this._scrollbarWidth = null;
            };

            Modal.prototype.handleUpdate = function handleUpdate() {
                this._adjustDialog();
            };

            // private

            Modal.prototype._getConfig = function _getConfig(config) {
                config = $.extend({}, Default, config);
                Util.typeCheckConfig(NAME, config, DefaultType);
                return config;
            };

            Modal.prototype._showElement = function _showElement(relatedTarget) {
                var _this12 = this;

                var transition = Util.supportsTransitionEnd() && $(this._element).hasClass(ClassName.FADE);

                if (!this._element.parentNode || this._element.parentNode.nodeType !== Node.ELEMENT_NODE) {
                    // don't move modals dom position
                    document.body.appendChild(this._element);
                }

                this._element.style.display = 'block';
                this._element.removeAttribute('aria-hidden');
                this._element.scrollTop = 0;

                if (transition) {
                    Util.reflow(this._element);
                }

                $(this._element).addClass(ClassName.SHOW);

                if (this._config.focus) {
                    this._enforceFocus();
                }

                var shownEvent = $.Event(Event.SHOWN, {
                    relatedTarget: relatedTarget
                });

                var transitionComplete = function transitionComplete() {
                    if (_this12._config.focus) {
                        _this12._element.focus();
                    }
                    _this12._isTransitioning = false;
                    $(_this12._element).trigger(shownEvent);
                };

                if (transition) {
                    $(this._dialog).one(Util.TRANSITION_END, transitionComplete).emulateTransitionEnd(TRANSITION_DURATION);
                } else {
                    transitionComplete();
                }
            };

            Modal.prototype._enforceFocus = function _enforceFocus() {
                var _this13 = this;

                $(document).off(Event.FOCUSIN) // guard against infinite focus loop
                    .on(Event.FOCUSIN, function (event) {
                        if (document !== event.target && _this13._element !== event.target && !$(_this13._element).has(event.target).length) {
                            _this13._element.focus();
                        }
                    });
            };

            Modal.prototype._setEscapeEvent = function _setEscapeEvent() {
                var _this14 = this;

                if (this._isShown && this._config.keyboard) {
                    $(this._element).on(Event.KEYDOWN_DISMISS, function (event) {
                        if (event.which === ESCAPE_KEYCODE) {
                            event.preventDefault();
                            _this14.hide();
                        }
                    });
                } else if (!this._isShown) {
                    $(this._element).off(Event.KEYDOWN_DISMISS);
                }
            };

            Modal.prototype._setResizeEvent = function _setResizeEvent() {
                var _this15 = this;

                if (this._isShown) {
                    $(window).on(Event.RESIZE, function (event) {
                        return _this15.handleUpdate(event);
                    });
                } else {
                    $(window).off(Event.RESIZE);
                }
            };

            Modal.prototype._hideModal = function _hideModal() {
                var _this16 = this;

                this._element.style.display = 'none';
                this._element.setAttribute('aria-hidden', true);
                this._isTransitioning = false;
                this._showBackdrop(function () {
                    $(document.body).removeClass(ClassName.OPEN);
                    _this16._resetAdjustments();
                    _this16._resetScrollbar();
                    $(_this16._element).trigger(Event.HIDDEN);
                });
            };

            Modal.prototype._removeBackdrop = function _removeBackdrop() {
                if (this._backdrop) {
                    $(this._backdrop).remove();
                    this._backdrop = null;
                }
            };

            Modal.prototype._showBackdrop = function _showBackdrop(callback) {
                var _this17 = this;

                var animate = $(this._element).hasClass(ClassName.FADE) ? ClassName.FADE : '';

                if (this._isShown && this._config.backdrop) {
                    var doAnimate = Util.supportsTransitionEnd() && animate;

                    this._backdrop = document.createElement('div');
                    this._backdrop.className = ClassName.BACKDROP;

                    if (animate) {
                        $(this._backdrop).addClass(animate);
                    }

                    $(this._backdrop).appendTo(document.body);

                    $(this._element).on(Event.CLICK_DISMISS, function (event) {
                        if (_this17._ignoreBackdropClick) {
                            _this17._ignoreBackdropClick = false;
                            return;
                        }
                        if (event.target !== event.currentTarget) {
                            return;
                        }
                        if (_this17._config.backdrop === 'static') {
                            _this17._element.focus();
                        } else {
                            _this17.hide();
                        }
                    });

                    if (doAnimate) {
                        Util.reflow(this._backdrop);
                    }

                    $(this._backdrop).addClass(ClassName.SHOW);

                    if (!callback) {
                        return;
                    }

                    if (!doAnimate) {
                        callback();
                        return;
                    }

                    $(this._backdrop).one(Util.TRANSITION_END, callback).emulateTransitionEnd(BACKDROP_TRANSITION_DURATION);
                } else if (!this._isShown && this._backdrop) {
                    $(this._backdrop).removeClass(ClassName.SHOW);

                    var callbackRemove = function callbackRemove() {
                        _this17._removeBackdrop();
                        if (callback) {
                            callback();
                        }
                    };

                    if (Util.supportsTransitionEnd() && $(this._element).hasClass(ClassName.FADE)) {
                        $(this._backdrop).one(Util.TRANSITION_END, callbackRemove).emulateTransitionEnd(BACKDROP_TRANSITION_DURATION);
                    } else {
                        callbackRemove();
                    }
                } else if (callback) {
                    callback();
                }
            };

            // ----------------------------------------------------------------------
            // the following methods are used to handle overflowing modals
            // todo (fat): these should probably be refactored out of modal.js
            // ----------------------------------------------------------------------

            Modal.prototype._adjustDialog = function _adjustDialog() {
                var isModalOverflowing = this._element.scrollHeight > document.documentElement.clientHeight;

                if (!this._isBodyOverflowing && isModalOverflowing) {
                    this._element.style.paddingLeft = this._scrollbarWidth + 'px';
                }

                if (this._isBodyOverflowing && !isModalOverflowing) {
                    this._element.style.paddingRight = this._scrollbarWidth + 'px';
                }
            };

            Modal.prototype._resetAdjustments = function _resetAdjustments() {
                this._element.style.paddingLeft = '';
                this._element.style.paddingRight = '';
            };

            Modal.prototype._checkScrollbar = function _checkScrollbar() {
                this._isBodyOverflowing = document.body.clientWidth < window.innerWidth;
                this._scrollbarWidth = this._getScrollbarWidth();
            };

            Modal.prototype._setScrollbar = function _setScrollbar() {
                var _this18 = this;

                if (this._isBodyOverflowing) {
                    // Note: DOMNode.style.paddingRight returns the actual value or '' if not set
                    //   while $(DOMNode).css('padding-right') returns the calculated value or 0 if not set

                    // Adjust fixed content padding
                    $(Selector.FIXED_CONTENT).each(function (index, element) {
                        var actualPadding = $(element)[0].style.paddingRight;
                        var calculatedPadding = $(element).css('padding-right');
                        $(element).data('padding-right', actualPadding).css('padding-right', parseFloat(calculatedPadding) + _this18._scrollbarWidth + 'px');
                    });

                    // Adjust navbar-toggler margin
                    $(Selector.NAVBAR_TOGGLER).each(function (index, element) {
                        var actualMargin = $(element)[0].style.marginRight;
                        var calculatedMargin = $(element).css('margin-right');
                        $(element).data('margin-right', actualMargin).css('margin-right', parseFloat(calculatedMargin) + _this18._scrollbarWidth + 'px');
                    });

                    // Adjust body padding
                    var actualPadding = document.body.style.paddingRight;
                    var calculatedPadding = $('body').css('padding-right');
                    $('body').data('padding-right', actualPadding).css('padding-right', parseFloat(calculatedPadding) + this._scrollbarWidth + 'px');
                }
            };

            Modal.prototype._resetScrollbar = function _resetScrollbar() {
                // Restore fixed content padding
                $(Selector.FIXED_CONTENT).each(function (index, element) {
                    var padding = $(element).data('padding-right');
                    if (typeof padding !== 'undefined') {
                        $(element).css('padding-right', padding).removeData('padding-right');
                    }
                });

                // Restore navbar-toggler margin
                $(Selector.NAVBAR_TOGGLER).each(function (index, element) {
                    var margin = $(element).data('margin-right');
                    if (typeof margin !== 'undefined') {
                        $(element).css('margin-right', margin).removeData('margin-right');
                    }
                });

                // Restore body padding
                var padding = $('body').data('padding-right');
                if (typeof padding !== 'undefined') {
                    $('body').css('padding-right', padding).removeData('padding-right');
                }
            };

            Modal.prototype._getScrollbarWidth = function _getScrollbarWidth() {
                // thx d.walsh
                var scrollDiv = document.createElement('div');
                scrollDiv.className = ClassName.SCROLLBAR_MEASURER;
                document.body.appendChild(scrollDiv);
                var scrollbarWidth = scrollDiv.getBoundingClientRect().width - scrollDiv.clientWidth;
                document.body.removeChild(scrollDiv);
                return scrollbarWidth;
            };

            // static

            Modal._jQueryInterface = function _jQueryInterface(config, relatedTarget) {
                return this.each(function () {
                    var data = $(this).data(DATA_KEY);
                    var _config = $.extend({}, Modal.Default, $(this).data(), (typeof config === 'undefined' ? 'undefined' : _typeof(config)) === 'object' && config);

                    if (!data) {
                        data = new Modal(this, _config);
                        $(this).data(DATA_KEY, data);
                    }

                    if (typeof config === 'string') {
                        if (data[config] === undefined) {
                            throw new Error('No method named "' + config + '"');
                        }
                        data[config](relatedTarget);
                    } else if (_config.show) {
                        data.show(relatedTarget);
                    }
                });
            };

            _createClass(Modal, null, [{
                key: 'VERSION',
                get: function get() {
                    return VERSION;
                }
            }, {
                key: 'Default',
                get: function get() {
                    return Default;
                }
            }]);

            return Modal;
        }();

        /**
         * ------------------------------------------------------------------------
         * Data Api implementation
         * ------------------------------------------------------------------------
         */

        $(document).on(Event.CLICK_DATA_API, Selector.DATA_TOGGLE, function (event) {
            var _this19 = this;

            var target = void 0;
            var selector = Util.getSelectorFromElement(this);

            if (selector) {
                target = $(selector)[0];
            }

            var config = $(target).data(DATA_KEY) ? 'toggle' : $.extend({}, $(target).data(), $(this).data());

            if (this.tagName === 'A' || this.tagName === 'AREA') {
                event.preventDefault();
            }

            var $target = $(target).one(Event.SHOW, function (showEvent) {
                if (showEvent.isDefaultPrevented()) {
                    // only register focus restorer if modal will actually get shown
                    return;
                }

                $target.one(Event.HIDDEN, function () {
                    if ($(_this19).is(':visible')) {
                        _this19.focus();
                    }
                });
            });

            Modal._jQueryInterface.call($(target), config, this);
        });

        /**
         * ------------------------------------------------------------------------
         * jQuery
         * ------------------------------------------------------------------------
         */

        $.fn[NAME] = Modal._jQueryInterface;
        $.fn[NAME].Constructor = Modal;
        $.fn[NAME].noConflict = function () {
            $.fn[NAME] = JQUERY_NO_CONFLICT;
            return Modal._jQueryInterface;
        };

        return Modal;
    }(jQuery);

    /* global Popper */

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v4.0.0-beta): tooltip.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
     * --------------------------------------------------------------------------
     */

    var Tooltip = function ($) {

        /**
         * Check for Popper dependency
         * Popper - https://popper.js.org
         */
        if (typeof Popper === 'undefined') {
            throw new Error('Bootstrap tooltips require Popper.js (https://popper.js.org)');
        }

        /**
         * ------------------------------------------------------------------------
         * Constants
         * ------------------------------------------------------------------------
         */

        var NAME = 'tooltip';
        var VERSION = '4.0.0-beta';
        var DATA_KEY = 'bs.tooltip';
        var EVENT_KEY = '.' + DATA_KEY;
        var JQUERY_NO_CONFLICT = $.fn[NAME];
        var TRANSITION_DURATION = 150;
        var CLASS_PREFIX = 'bs-tooltip';
        var BSCLS_PREFIX_REGEX = new RegExp('(^|\\s)' + CLASS_PREFIX + '\\S+', 'g');

        var DefaultType = {
            animation: 'boolean',
            template: 'string',
            title: '(string|element|function)',
            trigger: 'string',
            delay: '(number|object)',
            html: 'boolean',
            selector: '(string|boolean)',
            placement: '(string|function)',
            offset: '(number|string)',
            container: '(string|element|boolean)',
            fallbackPlacement: '(string|array)'
        };

        var AttachmentMap = {
            AUTO: 'auto',
            TOP: 'top',
            RIGHT: 'right',
            BOTTOM: 'bottom',
            LEFT: 'left'
        };

        var Default = {
            animation: true,
            template: '<div class="tooltip" role="tooltip">' + '<div class="arrow"></div>' + '<div class="tooltip-inner"></div></div>',
            trigger: 'hover focus',
            title: '',
            delay: 0,
            html: false,
            selector: false,
            placement: 'top',
            offset: 0,
            container: false,
            fallbackPlacement: 'flip'
        };

        var HoverState = {
            SHOW: 'show',
            OUT: 'out'
        };

        var Event = {
            HIDE: 'hide' + EVENT_KEY,
            HIDDEN: 'hidden' + EVENT_KEY,
            SHOW: 'show' + EVENT_KEY,
            SHOWN: 'shown' + EVENT_KEY,
            INSERTED: 'inserted' + EVENT_KEY,
            CLICK: 'click' + EVENT_KEY,
            FOCUSIN: 'focusin' + EVENT_KEY,
            FOCUSOUT: 'focusout' + EVENT_KEY,
            MOUSEENTER: 'mouseenter' + EVENT_KEY,
            MOUSELEAVE: 'mouseleave' + EVENT_KEY
        };

        var ClassName = {
            FADE: 'fade',
            SHOW: 'show'
        };

        var Selector = {
            TOOLTIP: '.tooltip',
            TOOLTIP_INNER: '.tooltip-inner',
            ARROW: '.arrow'
        };

        var Trigger = {
            HOVER: 'hover',
            FOCUS: 'focus',
            CLICK: 'click',
            MANUAL: 'manual'

            /**
             * ------------------------------------------------------------------------
             * Class Definition
             * ------------------------------------------------------------------------
             */

        };
        var Tooltip = function () {
            function Tooltip(element, config) {
                _classCallCheck(this, Tooltip);

                // private
                this._isEnabled = true;
                this._timeout = 0;
                this._hoverState = '';
                this._activeTrigger = {};
                this._popper = null;

                // protected
                this.element = element;
                this.config = this._getConfig(config);
                this.tip = null;

                this._setListeners();
            }

            // getters

            // public

            Tooltip.prototype.enable = function enable() {
                this._isEnabled = true;
            };

            Tooltip.prototype.disable = function disable() {
                this._isEnabled = false;
            };

            Tooltip.prototype.toggleEnabled = function toggleEnabled() {
                this._isEnabled = !this._isEnabled;
            };

            Tooltip.prototype.toggle = function toggle(event) {
                if (event) {
                    var dataKey = this.constructor.DATA_KEY;
                    var context = $(event.currentTarget).data(dataKey);

                    if (!context) {
                        context = new this.constructor(event.currentTarget, this._getDelegateConfig());
                        $(event.currentTarget).data(dataKey, context);
                    }

                    context._activeTrigger.click = !context._activeTrigger.click;

                    if (context._isWithActiveTrigger()) {
                        context._enter(null, context);
                    } else {
                        context._leave(null, context);
                    }
                } else {

                    if ($(this.getTipElement()).hasClass(ClassName.SHOW)) {
                        this._leave(null, this);
                        return;
                    }

                    this._enter(null, this);
                }
            };

            Tooltip.prototype.dispose = function dispose() {
                clearTimeout(this._timeout);

                $.removeData(this.element, this.constructor.DATA_KEY);

                $(this.element).off(this.constructor.EVENT_KEY);
                $(this.element).closest('.modal').off('hide.bs.modal');

                if (this.tip) {
                    $(this.tip).remove();
                }

                this._isEnabled = null;
                this._timeout = null;
                this._hoverState = null;
                this._activeTrigger = null;
                if (this._popper !== null) {
                    this._popper.destroy();
                }
                this._popper = null;

                this.element = null;
                this.config = null;
                this.tip = null;
            };

            Tooltip.prototype.show = function show() {
                var _this20 = this;

                if ($(this.element).css('display') === 'none') {
                    throw new Error('Please use show on visible elements');
                }

                var showEvent = $.Event(this.constructor.Event.SHOW);
                if (this.isWithContent() && this._isEnabled) {
                    $(this.element).trigger(showEvent);

                    var isInTheDom = $.contains(this.element.ownerDocument.documentElement, this.element);

                    if (showEvent.isDefaultPrevented() || !isInTheDom) {
                        return;
                    }

                    var tip = this.getTipElement();
                    var tipId = Util.getUID(this.constructor.NAME);

                    tip.setAttribute('id', tipId);
                    this.element.setAttribute('aria-describedby', tipId);

                    this.setContent();

                    if (this.config.animation) {
                        $(tip).addClass(ClassName.FADE);
                    }

                    var placement = typeof this.config.placement === 'function' ? this.config.placement.call(this, tip, this.element) : this.config.placement;

                    var attachment = this._getAttachment(placement);
                    this.addAttachmentClass(attachment);

                    var container = this.config.container === false ? document.body : $(this.config.container);

                    $(tip).data(this.constructor.DATA_KEY, this);

                    if (!$.contains(this.element.ownerDocument.documentElement, this.tip)) {
                        $(tip).appendTo(container);
                    }

                    $(this.element).trigger(this.constructor.Event.INSERTED);

                    this._popper = new Popper(this.element, tip, {
                        placement: attachment,
                        modifiers: {
                            offset: {
                                offset: this.config.offset
                            },
                            flip: {
                                behavior: this.config.fallbackPlacement
                            },
                            arrow: {
                                element: Selector.ARROW
                            }
                        },
                        onCreate: function onCreate(data) {
                            if (data.originalPlacement !== data.placement) {
                                _this20._handlePopperPlacementChange(data);
                            }
                        },
                        onUpdate: function onUpdate(data) {
                            _this20._handlePopperPlacementChange(data);
                        }
                    });

                    $(tip).addClass(ClassName.SHOW);

                    // if this is a touch-enabled device we add extra
                    // empty mouseover listeners to the body's immediate children;
                    // only needed because of broken event delegation on iOS
                    // https://www.quirksmode.org/blog/archives/2014/02/mouse_event_bub.html
                    if ('ontouchstart' in document.documentElement) {
                        $('body').children().on('mouseover', null, $.noop);
                    }

                    var complete = function complete() {
                        if (_this20.config.animation) {
                            _this20._fixTransition();
                        }
                        var prevHoverState = _this20._hoverState;
                        _this20._hoverState = null;

                        $(_this20.element).trigger(_this20.constructor.Event.SHOWN);

                        if (prevHoverState === HoverState.OUT) {
                            _this20._leave(null, _this20);
                        }
                    };

                    if (Util.supportsTransitionEnd() && $(this.tip).hasClass(ClassName.FADE)) {
                        $(this.tip).one(Util.TRANSITION_END, complete).emulateTransitionEnd(Tooltip._TRANSITION_DURATION);
                    } else {
                        complete();
                    }
                }
            };

            Tooltip.prototype.hide = function hide(callback) {
                var _this21 = this;

                var tip = this.getTipElement();
                var hideEvent = $.Event(this.constructor.Event.HIDE);
                var complete = function complete() {
                    if (_this21._hoverState !== HoverState.SHOW && tip.parentNode) {
                        tip.parentNode.removeChild(tip);
                    }

                    _this21._cleanTipClass();
                    _this21.element.removeAttribute('aria-describedby');
                    $(_this21.element).trigger(_this21.constructor.Event.HIDDEN);
                    if (_this21._popper !== null) {
                        _this21._popper.destroy();
                    }

                    if (callback) {
                        callback();
                    }
                };

                $(this.element).trigger(hideEvent);

                if (hideEvent.isDefaultPrevented()) {
                    return;
                }

                $(tip).removeClass(ClassName.SHOW);

                // if this is a touch-enabled device we remove the extra
                // empty mouseover listeners we added for iOS support
                if ('ontouchstart' in document.documentElement) {
                    $('body').children().off('mouseover', null, $.noop);
                }

                this._activeTrigger[Trigger.CLICK] = false;
                this._activeTrigger[Trigger.FOCUS] = false;
                this._activeTrigger[Trigger.HOVER] = false;

                if (Util.supportsTransitionEnd() && $(this.tip).hasClass(ClassName.FADE)) {

                    $(tip).one(Util.TRANSITION_END, complete).emulateTransitionEnd(TRANSITION_DURATION);
                } else {
                    complete();
                }

                this._hoverState = '';
            };

            Tooltip.prototype.update = function update() {
                if (this._popper !== null) {
                    this._popper.scheduleUpdate();
                }
            };

            // protected

            Tooltip.prototype.isWithContent = function isWithContent() {
                return Boolean(this.getTitle());
            };

            Tooltip.prototype.addAttachmentClass = function addAttachmentClass(attachment) {
                $(this.getTipElement()).addClass(CLASS_PREFIX + '-' + attachment);
            };

            Tooltip.prototype.getTipElement = function getTipElement() {
                return this.tip = this.tip || $(this.config.template)[0];
            };

            Tooltip.prototype.setContent = function setContent() {
                var $tip = $(this.getTipElement());
                this.setElementContent($tip.find(Selector.TOOLTIP_INNER), this.getTitle());
                $tip.removeClass(ClassName.FADE + ' ' + ClassName.SHOW);
            };

            Tooltip.prototype.setElementContent = function setElementContent($element, content) {
                var html = this.config.html;
                if ((typeof content === 'undefined' ? 'undefined' : _typeof(content)) === 'object' && (content.nodeType || content.jquery)) {
                    // content is a DOM node or a jQuery
                    if (html) {
                        if (!$(content).parent().is($element)) {
                            $element.empty().append(content);
                        }
                    } else {
                        $element.text($(content).text());
                    }
                } else {
                    $element[html ? 'html' : 'text'](content);
                }
            };

            Tooltip.prototype.getTitle = function getTitle() {
                var title = this.element.getAttribute('data-original-title');

                if (!title) {
                    title = typeof this.config.title === 'function' ? this.config.title.call(this.element) : this.config.title;
                }

                return title;
            };

            // private

            Tooltip.prototype._getAttachment = function _getAttachment(placement) {
                return AttachmentMap[placement.toUpperCase()];
            };

            Tooltip.prototype._setListeners = function _setListeners() {
                var _this22 = this;

                var triggers = this.config.trigger.split(' ');

                triggers.forEach(function (trigger) {
                    if (trigger === 'click') {
                        $(_this22.element).on(_this22.constructor.Event.CLICK, _this22.config.selector, function (event) {
                            return _this22.toggle(event);
                        });
                    } else if (trigger !== Trigger.MANUAL) {
                        var eventIn = trigger === Trigger.HOVER ? _this22.constructor.Event.MOUSEENTER : _this22.constructor.Event.FOCUSIN;
                        var eventOut = trigger === Trigger.HOVER ? _this22.constructor.Event.MOUSELEAVE : _this22.constructor.Event.FOCUSOUT;

                        $(_this22.element).on(eventIn, _this22.config.selector, function (event) {
                            return _this22._enter(event);
                        }).on(eventOut, _this22.config.selector, function (event) {
                            return _this22._leave(event);
                        });
                    }

                    $(_this22.element).closest('.modal').on('hide.bs.modal', function () {
                        return _this22.hide();
                    });
                });

                if (this.config.selector) {
                    this.config = $.extend({}, this.config, {
                        trigger: 'manual',
                        selector: ''
                    });
                } else {
                    this._fixTitle();
                }
            };

            Tooltip.prototype._fixTitle = function _fixTitle() {
                var titleType = _typeof(this.element.getAttribute('data-original-title'));
                if (this.element.getAttribute('title') || titleType !== 'string') {
                    this.element.setAttribute('data-original-title', this.element.getAttribute('title') || '');
                    this.element.setAttribute('title', '');
                }
            };

            Tooltip.prototype._enter = function _enter(event, context) {
                var dataKey = this.constructor.DATA_KEY;

                context = context || $(event.currentTarget).data(dataKey);

                if (!context) {
                    context = new this.constructor(event.currentTarget, this._getDelegateConfig());
                    $(event.currentTarget).data(dataKey, context);
                }

                if (event) {
                    context._activeTrigger[event.type === 'focusin' ? Trigger.FOCUS : Trigger.HOVER] = true;
                }

                if ($(context.getTipElement()).hasClass(ClassName.SHOW) || context._hoverState === HoverState.SHOW) {
                    context._hoverState = HoverState.SHOW;
                    return;
                }

                clearTimeout(context._timeout);

                context._hoverState = HoverState.SHOW;

                if (!context.config.delay || !context.config.delay.show) {
                    context.show();
                    return;
                }

                context._timeout = setTimeout(function () {
                    if (context._hoverState === HoverState.SHOW) {
                        context.show();
                    }
                }, context.config.delay.show);
            };

            Tooltip.prototype._leave = function _leave(event, context) {
                var dataKey = this.constructor.DATA_KEY;

                context = context || $(event.currentTarget).data(dataKey);

                if (!context) {
                    context = new this.constructor(event.currentTarget, this._getDelegateConfig());
                    $(event.currentTarget).data(dataKey, context);
                }

                if (event) {
                    context._activeTrigger[event.type === 'focusout' ? Trigger.FOCUS : Trigger.HOVER] = false;
                }

                if (context._isWithActiveTrigger()) {
                    return;
                }

                clearTimeout(context._timeout);

                context._hoverState = HoverState.OUT;

                if (!context.config.delay || !context.config.delay.hide) {
                    context.hide();
                    return;
                }

                context._timeout = setTimeout(function () {
                    if (context._hoverState === HoverState.OUT) {
                        context.hide();
                    }
                }, context.config.delay.hide);
            };

            Tooltip.prototype._isWithActiveTrigger = function _isWithActiveTrigger() {
                for (var trigger in this._activeTrigger) {
                    if (this._activeTrigger[trigger]) {
                        return true;
                    }
                }

                return false;
            };

            Tooltip.prototype._getConfig = function _getConfig(config) {
                config = $.extend({}, this.constructor.Default, $(this.element).data(), config);

                if (config.delay && typeof config.delay === 'number') {
                    config.delay = {
                        show: config.delay,
                        hide: config.delay
                    };
                }

                if (config.title && typeof config.title === 'number') {
                    config.title = config.title.toString();
                }

                if (config.content && typeof config.content === 'number') {
                    config.content = config.content.toString();
                }

                Util.typeCheckConfig(NAME, config, this.constructor.DefaultType);

                return config;
            };

            Tooltip.prototype._getDelegateConfig = function _getDelegateConfig() {
                var config = {};

                if (this.config) {
                    for (var key in this.config) {
                        if (this.constructor.Default[key] !== this.config[key]) {
                            config[key] = this.config[key];
                        }
                    }
                }

                return config;
            };

            Tooltip.prototype._cleanTipClass = function _cleanTipClass() {
                var $tip = $(this.getTipElement());
                var tabClass = $tip.attr('class').match(BSCLS_PREFIX_REGEX);
                if (tabClass !== null && tabClass.length > 0) {
                    $tip.removeClass(tabClass.join(''));
                }
            };

            Tooltip.prototype._handlePopperPlacementChange = function _handlePopperPlacementChange(data) {
                this._cleanTipClass();
                this.addAttachmentClass(this._getAttachment(data.placement));
            };

            Tooltip.prototype._fixTransition = function _fixTransition() {
                var tip = this.getTipElement();
                var initConfigAnimation = this.config.animation;
                if (tip.getAttribute('x-placement') !== null) {
                    return;
                }
                $(tip).removeClass(ClassName.FADE);
                this.config.animation = false;
                this.hide();
                this.show();
                this.config.animation = initConfigAnimation;
            };

            // static

            Tooltip._jQueryInterface = function _jQueryInterface(config) {
                return this.each(function () {
                    var data = $(this).data(DATA_KEY);
                    var _config = (typeof config === 'undefined' ? 'undefined' : _typeof(config)) === 'object' && config;

                    if (!data && /dispose|hide/.test(config)) {
                        return;
                    }

                    if (!data) {
                        data = new Tooltip(this, _config);
                        $(this).data(DATA_KEY, data);
                    }

                    if (typeof config === 'string') {
                        if (data[config] === undefined) {
                            throw new Error('No method named "' + config + '"');
                        }
                        data[config]();
                    }
                });
            };

            _createClass(Tooltip, null, [{
                key: 'VERSION',
                get: function get() {
                    return VERSION;
                }
            }, {
                key: 'Default',
                get: function get() {
                    return Default;
                }
            }, {
                key: 'NAME',
                get: function get() {
                    return NAME;
                }
            }, {
                key: 'DATA_KEY',
                get: function get() {
                    return DATA_KEY;
                }
            }, {
                key: 'Event',
                get: function get() {
                    return Event;
                }
            }, {
                key: 'EVENT_KEY',
                get: function get() {
                    return EVENT_KEY;
                }
            }, {
                key: 'DefaultType',
                get: function get() {
                    return DefaultType;
                }
            }]);

            return Tooltip;
        }();

        /**
         * ------------------------------------------------------------------------
         * jQuery
         * ------------------------------------------------------------------------
         */

        $.fn[NAME] = Tooltip._jQueryInterface;
        $.fn[NAME].Constructor = Tooltip;
        $.fn[NAME].noConflict = function () {
            $.fn[NAME] = JQUERY_NO_CONFLICT;
            return Tooltip._jQueryInterface;
        };

        return Tooltip;
    }(jQuery);

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v4.0.0-beta): popover.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
     * --------------------------------------------------------------------------
     */

    var Popover = function ($) {

        /**
         * ------------------------------------------------------------------------
         * Constants
         * ------------------------------------------------------------------------
         */

        var NAME = 'popover';
        var VERSION = '4.0.0-beta';
        var DATA_KEY = 'bs.popover';
        var EVENT_KEY = '.' + DATA_KEY;
        var JQUERY_NO_CONFLICT = $.fn[NAME];
        var CLASS_PREFIX = 'bs-popover';
        var BSCLS_PREFIX_REGEX = new RegExp('(^|\\s)' + CLASS_PREFIX + '\\S+', 'g');

        var Default = $.extend({}, Tooltip.Default, {
            placement: 'right',
            trigger: 'click',
            content: '',
            template: '<div class="popover" role="tooltip">' + '<div class="arrow"></div>' + '<h3 class="popover-header"></h3>' + '<div class="popover-body"></div></div>'
        });

        var DefaultType = $.extend({}, Tooltip.DefaultType, {
            content: '(string|element|function)'
        });

        var ClassName = {
            FADE: 'fade',
            SHOW: 'show'
        };

        var Selector = {
            TITLE: '.popover-header',
            CONTENT: '.popover-body'
        };

        var Event = {
            HIDE: 'hide' + EVENT_KEY,
            HIDDEN: 'hidden' + EVENT_KEY,
            SHOW: 'show' + EVENT_KEY,
            SHOWN: 'shown' + EVENT_KEY,
            INSERTED: 'inserted' + EVENT_KEY,
            CLICK: 'click' + EVENT_KEY,
            FOCUSIN: 'focusin' + EVENT_KEY,
            FOCUSOUT: 'focusout' + EVENT_KEY,
            MOUSEENTER: 'mouseenter' + EVENT_KEY,
            MOUSELEAVE: 'mouseleave' + EVENT_KEY

            /**
             * ------------------------------------------------------------------------
             * Class Definition
             * ------------------------------------------------------------------------
             */

        };
        var Popover = function (_Tooltip) {
            _inherits(Popover, _Tooltip);

            function Popover() {
                _classCallCheck(this, Popover);

                return _possibleConstructorReturn(this, _Tooltip.apply(this, arguments));
            }

            // overrides

            Popover.prototype.isWithContent = function isWithContent() {
                return this.getTitle() || this._getContent();
            };

            Popover.prototype.addAttachmentClass = function addAttachmentClass(attachment) {
                $(this.getTipElement()).addClass(CLASS_PREFIX + '-' + attachment);
            };

            Popover.prototype.getTipElement = function getTipElement() {
                return this.tip = this.tip || $(this.config.template)[0];
            };

            Popover.prototype.setContent = function setContent() {
                var $tip = $(this.getTipElement());

                // we use append for html objects to maintain js events
                this.setElementContent($tip.find(Selector.TITLE), this.getTitle());
                this.setElementContent($tip.find(Selector.CONTENT), this._getContent());

                $tip.removeClass(ClassName.FADE + ' ' + ClassName.SHOW);
            };

            // private

            Popover.prototype._getContent = function _getContent() {
                return this.element.getAttribute('data-content') || (typeof this.config.content === 'function' ? this.config.content.call(this.element) : this.config.content);
            };

            Popover.prototype._cleanTipClass = function _cleanTipClass() {
                var $tip = $(this.getTipElement());
                var tabClass = $tip.attr('class').match(BSCLS_PREFIX_REGEX);
                if (tabClass !== null && tabClass.length > 0) {
                    $tip.removeClass(tabClass.join(''));
                }
            };

            // static

            Popover._jQueryInterface = function _jQueryInterface(config) {
                return this.each(function () {
                    var data = $(this).data(DATA_KEY);
                    var _config = (typeof config === 'undefined' ? 'undefined' : _typeof(config)) === 'object' ? config : null;

                    if (!data && /destroy|hide/.test(config)) {
                        return;
                    }

                    if (!data) {
                        data = new Popover(this, _config);
                        $(this).data(DATA_KEY, data);
                    }

                    if (typeof config === 'string') {
                        if (data[config] === undefined) {
                            throw new Error('No method named "' + config + '"');
                        }
                        data[config]();
                    }
                });
            };

            _createClass(Popover, null, [{
                key: 'VERSION',


                // getters

                get: function get() {
                    return VERSION;
                }
            }, {
                key: 'Default',
                get: function get() {
                    return Default;
                }
            }, {
                key: 'NAME',
                get: function get() {
                    return NAME;
                }
            }, {
                key: 'DATA_KEY',
                get: function get() {
                    return DATA_KEY;
                }
            }, {
                key: 'Event',
                get: function get() {
                    return Event;
                }
            }, {
                key: 'EVENT_KEY',
                get: function get() {
                    return EVENT_KEY;
                }
            }, {
                key: 'DefaultType',
                get: function get() {
                    return DefaultType;
                }
            }]);

            return Popover;
        }(Tooltip);

        /**
         * ------------------------------------------------------------------------
         * jQuery
         * ------------------------------------------------------------------------
         */

        $.fn[NAME] = Popover._jQueryInterface;
        $.fn[NAME].Constructor = Popover;
        $.fn[NAME].noConflict = function () {
            $.fn[NAME] = JQUERY_NO_CONFLICT;
            return Popover._jQueryInterface;
        };

        return Popover;
    }(jQuery);

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v4.0.0-beta): scrollspy.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
     * --------------------------------------------------------------------------
     */

    var ScrollSpy = function ($) {

        /**
         * ------------------------------------------------------------------------
         * Constants
         * ------------------------------------------------------------------------
         */

        var NAME = 'scrollspy';
        var VERSION = '4.0.0-beta';
        var DATA_KEY = 'bs.scrollspy';
        var EVENT_KEY = '.' + DATA_KEY;
        var DATA_API_KEY = '.data-api';
        var JQUERY_NO_CONFLICT = $.fn[NAME];

        var Default = {
            offset: 10,
            method: 'auto',
            target: ''
        };

        var DefaultType = {
            offset: 'number',
            method: 'string',
            target: '(string|element)'
        };

        var Event = {
            ACTIVATE: 'activate' + EVENT_KEY,
            SCROLL: 'scroll' + EVENT_KEY,
            LOAD_DATA_API: 'load' + EVENT_KEY + DATA_API_KEY
        };

        var ClassName = {
            DROPDOWN_ITEM: 'dropdown-item',
            DROPDOWN_MENU: 'dropdown-menu',
            ACTIVE: 'active'
        };

        var Selector = {
            DATA_SPY: '[data-spy="scroll"]',
            ACTIVE: '.active',
            NAV_LIST_GROUP: '.nav, .list-group',
            NAV_LINKS: '.nav-link',
            LIST_ITEMS: '.list-group-item',
            DROPDOWN: '.dropdown',
            DROPDOWN_ITEMS: '.dropdown-item',
            DROPDOWN_TOGGLE: '.dropdown-toggle'
        };

        var OffsetMethod = {
            OFFSET: 'offset',
            POSITION: 'position'

            /**
             * ------------------------------------------------------------------------
             * Class Definition
             * ------------------------------------------------------------------------
             */

        };
        var ScrollSpy = function () {
            function ScrollSpy(element, config) {
                var _this24 = this;

                _classCallCheck(this, ScrollSpy);

                this._element = element;
                this._scrollElement = element.tagName === 'BODY' ? window : element;
                this._config = this._getConfig(config);
                this._selector = this._config.target + ' ' + Selector.NAV_LINKS + ',' + (this._config.target + ' ' + Selector.LIST_ITEMS + ',') + (this._config.target + ' ' + Selector.DROPDOWN_ITEMS);
                this._offsets = [];
                this._targets = [];
                this._activeTarget = null;
                this._scrollHeight = 0;

                $(this._scrollElement).on(Event.SCROLL, function (event) {
                    return _this24._process(event);
                });

                this.refresh();
                this._process();
            }

            // getters

            // public

            ScrollSpy.prototype.refresh = function refresh() {
                var _this25 = this;

                var autoMethod = this._scrollElement !== this._scrollElement.window ? OffsetMethod.POSITION : OffsetMethod.OFFSET;

                var offsetMethod = this._config.method === 'auto' ? autoMethod : this._config.method;

                var offsetBase = offsetMethod === OffsetMethod.POSITION ? this._getScrollTop() : 0;

                this._offsets = [];
                this._targets = [];

                this._scrollHeight = this._getScrollHeight();

                var targets = $.makeArray($(this._selector));

                targets.map(function (element) {
                    var target = void 0;
                    var targetSelector = Util.getSelectorFromElement(element);

                    if (targetSelector) {
                        target = $(targetSelector)[0];
                    }

                    if (target) {
                        var targetBCR = target.getBoundingClientRect();
                        if (targetBCR.width || targetBCR.height) {
                            // todo (fat): remove sketch reliance on jQuery position/offset
                            return [$(target)[offsetMethod]().top + offsetBase, targetSelector];
                        }
                    }
                    return null;
                }).filter(function (item) {
                    return item;
                }).sort(function (a, b) {
                    return a[0] - b[0];
                }).forEach(function (item) {
                    _this25._offsets.push(item[0]);
                    _this25._targets.push(item[1]);
                });
            };

            ScrollSpy.prototype.dispose = function dispose() {
                $.removeData(this._element, DATA_KEY);
                $(this._scrollElement).off(EVENT_KEY);

                this._element = null;
                this._scrollElement = null;
                this._config = null;
                this._selector = null;
                this._offsets = null;
                this._targets = null;
                this._activeTarget = null;
                this._scrollHeight = null;
            };

            // private

            ScrollSpy.prototype._getConfig = function _getConfig(config) {
                config = $.extend({}, Default, config);

                if (typeof config.target !== 'string') {
                    var id = $(config.target).attr('id');
                    if (!id) {
                        id = Util.getUID(NAME);
                        $(config.target).attr('id', id);
                    }
                    config.target = '#' + id;
                }

                Util.typeCheckConfig(NAME, config, DefaultType);

                return config;
            };

            ScrollSpy.prototype._getScrollTop = function _getScrollTop() {
                return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop;
            };

            ScrollSpy.prototype._getScrollHeight = function _getScrollHeight() {
                return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
            };

            ScrollSpy.prototype._getOffsetHeight = function _getOffsetHeight() {
                return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height;
            };

            ScrollSpy.prototype._process = function _process() {
                var scrollTop = this._getScrollTop() + this._config.offset;
                var scrollHeight = this._getScrollHeight();
                var maxScroll = this._config.offset + scrollHeight - this._getOffsetHeight();

                if (this._scrollHeight !== scrollHeight) {
                    this.refresh();
                }

                if (scrollTop >= maxScroll) {
                    var target = this._targets[this._targets.length - 1];

                    if (this._activeTarget !== target) {
                        this._activate(target);
                    }
                    return;
                }

                if (this._activeTarget && scrollTop < this._offsets[0] && this._offsets[0] > 0) {
                    this._activeTarget = null;
                    this._clear();
                    return;
                }

                for (var i = this._offsets.length; i--;) {
                    var isActiveTarget = this._activeTarget !== this._targets[i] && scrollTop >= this._offsets[i] && (this._offsets[i + 1] === undefined || scrollTop < this._offsets[i + 1]);

                    if (isActiveTarget) {
                        this._activate(this._targets[i]);
                    }
                }
            };

            ScrollSpy.prototype._activate = function _activate(target) {
                this._activeTarget = target;

                this._clear();

                var queries = this._selector.split(',');
                queries = queries.map(function (selector) {
                    return selector + '[data-target="' + target + '"],' + (selector + '[href="' + target + '"]');
                });

                var $link = $(queries.join(','));

                if ($link.hasClass(ClassName.DROPDOWN_ITEM)) {
                    $link.closest(Selector.DROPDOWN).find(Selector.DROPDOWN_TOGGLE).addClass(ClassName.ACTIVE);
                    $link.addClass(ClassName.ACTIVE);
                } else {
                    // Set triggered link as active
                    $link.addClass(ClassName.ACTIVE);
                    // Set triggered links parents as active
                    // With both <ul> and <nav> markup a parent is the previous sibling of any nav ancestor
                    $link.parents(Selector.NAV_LIST_GROUP).prev(Selector.NAV_LINKS + ', ' + Selector.LIST_ITEMS).addClass(ClassName.ACTIVE);
                }

                $(this._scrollElement).trigger(Event.ACTIVATE, {
                    relatedTarget: target
                });
            };

            ScrollSpy.prototype._clear = function _clear() {
                $(this._selector).filter(Selector.ACTIVE).removeClass(ClassName.ACTIVE);
            };

            // static

            ScrollSpy._jQueryInterface = function _jQueryInterface(config) {
                return this.each(function () {
                    var data = $(this).data(DATA_KEY);
                    var _config = (typeof config === 'undefined' ? 'undefined' : _typeof(config)) === 'object' && config;

                    if (!data) {
                        data = new ScrollSpy(this, _config);
                        $(this).data(DATA_KEY, data);
                    }

                    if (typeof config === 'string') {
                        if (data[config] === undefined) {
                            throw new Error('No method named "' + config + '"');
                        }
                        data[config]();
                    }
                });
            };

            _createClass(ScrollSpy, null, [{
                key: 'VERSION',
                get: function get() {
                    return VERSION;
                }
            }, {
                key: 'Default',
                get: function get() {
                    return Default;
                }
            }]);

            return ScrollSpy;
        }();

        /**
         * ------------------------------------------------------------------------
         * Data Api implementation
         * ------------------------------------------------------------------------
         */

        $(window).on(Event.LOAD_DATA_API, function () {
            var scrollSpys = $.makeArray($(Selector.DATA_SPY));

            for (var i = scrollSpys.length; i--;) {
                var $spy = $(scrollSpys[i]);
                ScrollSpy._jQueryInterface.call($spy, $spy.data());
            }
        });

        /**
         * ------------------------------------------------------------------------
         * jQuery
         * ------------------------------------------------------------------------
         */

        $.fn[NAME] = ScrollSpy._jQueryInterface;
        $.fn[NAME].Constructor = ScrollSpy;
        $.fn[NAME].noConflict = function () {
            $.fn[NAME] = JQUERY_NO_CONFLICT;
            return ScrollSpy._jQueryInterface;
        };

        return ScrollSpy;
    }(jQuery);

    /**
     * --------------------------------------------------------------------------
     * Bootstrap (v4.0.0-beta): tab.js
     * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
     * --------------------------------------------------------------------------
     */

    var Tab = function ($) {

            /**
             * ------------------------------------------------------------------------
             * Constants
             * ------------------------------------------------------------------------
             */

            var NAME = 'tab';
            var VERSION = '4.0.0-beta';
            var DATA_KEY = 'bs.tab';
            var EVENT_KEY = '.' + DATA_KEY;
            var DATA_API_KEY = '.data-api';
            var JQUERY_NO_CONFLICT = $.fn[NAME];
            var TRANSITION_DURATION = 150;

            var Event = {
                HIDE: 'hide' + EVENT_KEY,
                HIDDEN: 'hidden' + EVENT_KEY,
                SHOW: 'show' + EVENT_KEY,
                SHOWN: 'shown' + EVENT_KEY,
                CLICK_DATA_API: 'click' + EVENT_KEY + DATA_API_KEY
            };

            var ClassName = {
                DROPDOWN_MENU: 'dropdown-menu',
                ACTIVE: 'active',
                DISABLED: 'disabled',
                FADE: 'fade',
                SHOW: 'show'
            };

            var Selector = {
                DROPDOWN: '.dropdown',
                NAV_LIST_GROUP: '.nav, .list-group',
                ACTIVE: '.active',
                DATA_TOGGLE: '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]',
                DROPDOWN_TOGGLE: '.dropdown-toggle',
                DROPDOWN_ACTIVE_CHILD: '> .dropdown-menu .active'

                /**
                 * ------------------------------------------------------------------------
                 * Class Definition
                 * ------------------------------------------------------------------------
                 */

            };
            var Tab = function () {
                function Tab(element) {
                    _classCallCheck(this, Tab);

                    this._element = element;
                }

                // getters

                // public

                Tab.prototype.show = function show() {
                    var _this26 = this;

                    if (this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && $(this._element).hasClass(ClassName.ACTIVE) || $(this._element).hasClass(ClassName.DISABLED)) {
                        return;
                    }

                    var target = void 0;
                    var previous = void 0;
                    var listElement = $(this._element).closest(Selector.NAV_LIST_GROUP)[0];
                    var selector = Util.getSelectorFromElement(this._element);

                    if (listElement) {
                        previous = $.makeArray($(listElement).find(Selector.ACTIVE));
                        previous = previous[previous.length - 1];
                    }

                    var hideEvent = $.Event(Event.HIDE, {
                        relatedTarget: this._element
                    });

                    var showEvent = $.Event(Event.SHOW, {
                        relatedTarget: previous
                    });

                    if (previous) {
                        $(previous).trigger(hideEvent);
                    }

                    $(this._element).trigger(showEvent);

                    if (showEvent.isDefaultPrevented() || hideEvent.isDefaultPrevented()) {
                        return;
                    }

                    if (selector) {
                        target = $(selector)[0];
                    }

                    this._activate(this._element, listElement);

                    var complete = function complete() {
                        var hiddenEvent = $.Event(Event.HIDDEN, {
                            relatedTarget: _this26._element
                        });

                        var shownEvent = $.Event(Event.SHOWN, {
                            relatedTarget: previous
                        });

                        $(previous).trigger(hiddenEvent);
                        $(_this26._element).trigger(shownEvent);
                    };

                    if (target) {
                        this._activate(target, target.parentNode, complete);
                    } else {
                        complete();
                    }
                };

                Tab.prototype.dispose = function dispose() {
                    $.removeData(this._element, DATA_KEY);
                    this._element = null;
                };

                // private

                Tab.prototype._activate = function _activate(element, container, callback) {
                    var _this27 = this;

                    var active = $(container).find(Selector.ACTIVE)[0];
                    var isTransitioning = callback && Util.supportsTransitionEnd() && active && $(active).hasClass(ClassName.FADE);

                    var complete = function complete() {
                        return _this27._transitionComplete(element, active, isTransitioning, callback);
                    };

                    if (active && isTransitioning) {
                        $(active).one(Util.TRANSITION_END, complete).emulateTransitionEnd(TRANSITION_DURATION);
                    } else {
                        complete();
                    }

                    if (active) {
                        $(active).removeClass(ClassName.SHOW);
                    }
                };

                Tab.prototype._transitionComplete = function _transitionComplete(element, active, isTransitioning, callback) {
                    if (active) {
                        $(active).removeClass(ClassName.ACTIVE);

                        var dropdownChild = $(active.parentNode).find(Selector.DROPDOWN_ACTIVE_CHILD)[0];

                        if (dropdownChild) {
                            $(dropdownChild).removeClass(ClassName.ACTIVE);
                        }

                        active.setAttribute('aria-expanded', false);
                    }

                    $(element).addClass(ClassName.ACTIVE);
                    element.setAttribute('aria-expanded', true);

                    if (isTransitioning) {
                        Util.reflow(element);
                        $(element).addClass(ClassName.SHOW);
                    } else {
                        $(element).removeClass(ClassName.FADE);
                    }

                    if (element.parentNode && $(element.parentNode).hasClass(ClassName.DROPDOWN_MENU)) {

                        var dropdownElement = $(element).closest(Selector.DROPDOWN)[0];
                        if (dropdownElement) {
                            $(dropdownElement).find(Selector.DROPDOWN_TOGGLE).addClass(ClassName.ACTIVE);
                        }

                        element.setAttribute('aria-expanded', true);
                    }

                    if (callback) {
                        callback();
                    }
                };

                // static

                Tab._jQueryInterface = function _jQueryInterface(config) {
                    return this.each(function () {
                        var $this = $(this);
                        var data = $this.data(DATA_KEY);

                        if (!data) {
                            data = new Tab(this);
                            $this.data(DATA_KEY, data);
                        }

                        if (typeof config === 'string') {
                            if (data[config] === undefined) {
                                throw new Error('No method named "' + config + '"');
                            }
                            data[config]();
                        }
                    });
                };

                _createClass(Tab, null, [{
                    key: 'VERSION',
                    get: function get() {
                        return VERSION;
                    }
                }]);

                return Tab;
            }();

            /**
             * ------------------------------------------------------------------------
             * Data Api implementation
             * ------------------------------------------------------------------------
             */

            $(document).on(Event.CLICK_DATA_API, Selector.DATA_TOGGLE, function (event) {
                event.preventDefault();
                Tab._jQueryInterface.call($(this), 'show');
            });

            /**
             * ------------------------------------------------------------------------
             * jQuery
             * ------------------------------------------------------------------------
             */

            $.fn[NAME] = Tab._jQueryInterface;
            $.fn[NAME].Constructor = Tab;
            $.fn[NAME].noConflict = function () {
                $.fn[NAME] = JQUERY_NO_CONFLICT;
                return Tab._jQueryInterface;
            };

            return Tab;
        }(jQuery)

        /* ========================================================================
 * Bootstrap: affix.js v3.3.6
 * http://getbootstrap.com/javascript/#affix
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */

        + function ($) {
            'use strict';

            // AFFIX CLASS DEFINITION
            // ======================

            var Affix = function Affix(element, options) {
                this.options = $.extend({}, Affix.DEFAULTS, options);

                this.$target = $(this.options.target).on('scroll.bs.affix.data-api', $.proxy(this.checkPosition, this)).on('click.bs.affix.data-api', $.proxy(this.checkPositionWithEventLoop, this));

                this.$element = $(element);
                this.affixed = null;
                this.unpin = null;
                this.pinnedOffset = null;

                this.checkPosition();
            };

            Affix.VERSION = '3.3.6';

            Affix.RESET = 'affix affix-top affix-bottom';

            Affix.DEFAULTS = {
                offset: 0,
                target: window
            };

            Affix.prototype.getState = function (scrollHeight, height, offsetTop, offsetBottom) {
                var scrollTop = this.$target.scrollTop();
                var position = this.$element.offset();
                var targetHeight = this.$target.height();

                if (offsetTop != null && this.affixed == 'top') return scrollTop < offsetTop ? 'top' : false;

                if (this.affixed == 'bottom') {
                    if (offsetTop != null) return scrollTop + this.unpin <= position.top ? false : 'bottom';
                    return scrollTop + targetHeight <= scrollHeight - offsetBottom ? false : 'bottom';
                }

                var initializing = this.affixed == null;
                var colliderTop = initializing ? scrollTop : position.top;
                var colliderHeight = initializing ? targetHeight : height;

                if (offsetTop != null && scrollTop <= offsetTop) return 'top';
                if (offsetBottom != null && colliderTop + colliderHeight >= scrollHeight - offsetBottom) return 'bottom';

                return false;
            };

            Affix.prototype.getPinnedOffset = function () {
                if (this.pinnedOffset) return this.pinnedOffset;
                this.$element.removeClass(Affix.RESET).addClass('affix');
                var scrollTop = this.$target.scrollTop();
                var position = this.$element.offset();
                return this.pinnedOffset = position.top - scrollTop;
            };

            Affix.prototype.checkPositionWithEventLoop = function () {
                setTimeout($.proxy(this.checkPosition, this), 1);
            };

            Affix.prototype.checkPosition = function () {
                if (!this.$element.is(':visible')) return;

                var height = this.$element.height();
                var offset = this.options.offset;
                var offsetTop = offset.top;
                var offsetBottom = offset.bottom;
                var scrollHeight = Math.max($(document).height(), $(document.body).height());

                if ((typeof offset === 'undefined' ? 'undefined' : _typeof(offset)) != 'object') offsetBottom = offsetTop = offset;
                if (typeof offsetTop == 'function') offsetTop = offset.top(this.$element);
                if (typeof offsetBottom == 'function') offsetBottom = offset.bottom(this.$element);

                var affix = this.getState(scrollHeight, height, offsetTop, offsetBottom);

                if (this.affixed != affix) {
                    if (this.unpin != null) this.$element.css('top', '');

                    var affixType = 'affix' + (affix ? '-' + affix : '');
                    var e = $.Event(affixType + '.bs.affix');

                    this.$element.trigger(e);

                    if (e.isDefaultPrevented()) return;

                    this.affixed = affix;
                    this.unpin = affix == 'bottom' ? this.getPinnedOffset() : null;

                    this.$element.removeClass(Affix.RESET).addClass(affixType).trigger(affixType.replace('affix', 'affixed') + '.bs.affix');
                }

                if (affix == 'bottom') {
                    this.$element.offset({
                        top: scrollHeight - height - offsetBottom
                    });
                }
            };

            // AFFIX PLUGIN DEFINITION
            // =======================

            function Plugin(option) {
                return this.each(function () {
                    var $this = $(this);
                    var data = $this.data('bs.affix');
                    var options = (typeof option === 'undefined' ? 'undefined' : _typeof(option)) == 'object' && option;

                    if (!data) $this.data('bs.affix', data = new Affix(this, options));
                    if (typeof option == 'string') data[option]();
                });
            }

            var old = $.fn.affix;

            $.fn.affix = Plugin;
            $.fn.affix.Constructor = Affix;

            // AFFIX NO CONFLICT
            // =================

            $.fn.affix.noConflict = function () {
                $.fn.affix = old;
                return this;
            };

            // AFFIX DATA-API
            // ==============

            $(window).on('load', function () {
                $('[data-spy="affix"]').each(function () {
                    var $spy = $(this);
                    var data = $spy.data();

                    data.offset = data.offset || {};

                    if (data.offsetBottom != null) data.offset.bottom = data.offsetBottom;
                    if (data.offsetTop != null) data.offset.top = data.offsetTop;

                    Plugin.call($spy, data);
                });
            });
        }(jQuery);

    /* =========================================================
 * bootstrap-datepicker.js
 * Repo: https://github.com/eternicode/bootstrap-datepicker/
 * Demo: http://eternicode.github.io/bootstrap-datepicker/
 * Docs: http://bootstrap-datepicker.readthedocs.org/
 * Forked from http://www.eyecon.ro/bootstrap-datepicker
 * =========================================================
 * Started by Stefan Petre; improvements by Andrew Rowls + contributors
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================= */

    (function ($, undefined) {

        function UTCDate() {
            return new Date(Date.UTC.apply(Date, arguments));
        }
        function UTCToday() {
            var today = new Date();
            return UTCDate(today.getFullYear(), today.getMonth(), today.getDate());
        }
        function isUTCEquals(date1, date2) {
            return date1.getUTCFullYear() === date2.getUTCFullYear() && date1.getUTCMonth() === date2.getUTCMonth() && date1.getUTCDate() === date2.getUTCDate();
        }
        function alias(method) {
            return function () {
                return this[method].apply(this, arguments);
            };
        }

        var DateArray = function () {
            var extras = {
                get: function get(i) {
                    return this.slice(i)[0];
                },
                contains: function contains(d) {
                    // Array.indexOf is not cross-browser;
                    // $.inArray doesn't work with Dates
                    var val = d && d.valueOf();
                    for (var i = 0, l = this.length; i < l; i++) {
                        if (this[i].valueOf() === val) return i;
                    }return -1;
                },
                remove: function remove(i) {
                    this.splice(i, 1);
                },
                replace: function replace(new_array) {
                    if (!new_array) return;
                    if (!$.isArray(new_array)) new_array = [new_array];
                    this.clear();
                    this.push.apply(this, new_array);
                },
                clear: function clear() {
                    this.length = 0;
                },
                copy: function copy() {
                    var a = new DateArray();
                    a.replace(this);
                    return a;
                }
            };

            return function () {
                var a = [];
                a.push.apply(a, arguments);
                $.extend(a, extras);
                return a;
            };
        }();

        // Picker object

        var Datepicker = function Datepicker(element, options) {
            this._process_options(options);

            this.dates = new DateArray();
            this.viewDate = this.o.defaultViewDate;
            this.focusDate = null;

            this.element = $(element);
            this.isInline = false;
            this.isInput = this.element.is('input');
            this.component = this.element.hasClass('date') ? this.element.find('.add-on, .input-group-addon, .btn') : false;
            this.hasInput = this.component && this.element.find('input').length;
            if (this.component && this.component.length === 0) this.component = false;

            this.picker = $(DPGlobal.template);
            this._buildEvents();
            this._attachEvents();

            if (this.isInline) {
                this.picker.addClass('datepicker-inline').appendTo(this.element);
            } else {
                this.picker.addClass('datepicker-dropdown dropdown-menu');
            }

            if (this.o.rtl) {
                this.picker.addClass('datepicker-rtl');
            }

            this.viewMode = this.o.startView;

            if (this.o.calendarWeeks) this.picker.find('tfoot .today, tfoot .clear').attr('colspan', function (i, val) {
                return parseInt(val) + 1;
            });

            this._allow_update = false;

            this.setStartDate(this._o.startDate);
            this.setEndDate(this._o.endDate);
            this.setDaysOfWeekDisabled(this.o.daysOfWeekDisabled);
            this.setDatesDisabled(this.o.datesDisabled);

            this.fillDow();
            this.fillMonths();

            this._allow_update = true;

            this.update();
            this.showMode();

            if (this.isInline) {
                this.show();
            }
        };

        Datepicker.prototype = {
            constructor: Datepicker,

            _process_options: function _process_options(opts) {
                // Store raw options for reference
                this._o = $.extend({}, this._o, opts);
                // Processed options
                var o = this.o = $.extend({}, this._o);

                // Check if "de-DE" style date is available, if not language should
                // fallback to 2 letter code eg "de"
                var lang = o.language;
                if (!dates[lang]) {
                    lang = lang.split('-')[0];
                    if (!dates[lang]) lang = defaults.language;
                }
                o.language = lang;

                switch (o.startView) {
                    case 2:
                    case 'decade':
                        o.startView = 2;
                        break;
                    case 1:
                    case 'year':
                        o.startView = 1;
                        break;
                    default:
                        o.startView = 0;
                }

                switch (o.minViewMode) {
                    case 1:
                    case 'months':
                        o.minViewMode = 1;
                        break;
                    case 2:
                    case 'years':
                        o.minViewMode = 2;
                        break;
                    default:
                        o.minViewMode = 0;
                }

                o.startView = Math.max(o.startView, o.minViewMode);

                // true, false, or Number > 0
                if (o.multidate !== true) {
                    o.multidate = Number(o.multidate) || false;
                    if (o.multidate !== false) o.multidate = Math.max(0, o.multidate);
                }
                o.multidateSeparator = String(o.multidateSeparator);

                o.weekStart %= 7;
                o.weekEnd = (o.weekStart + 6) % 7;

                var format = DPGlobal.parseFormat(o.format);
                if (o.startDate !== -Infinity) {
                    if (!!o.startDate) {
                        if (o.startDate instanceof Date) o.startDate = this._local_to_utc(this._zero_time(o.startDate));else o.startDate = DPGlobal.parseDate(o.startDate, format, o.language);
                    } else {
                        o.startDate = -Infinity;
                    }
                }
                if (o.endDate !== Infinity) {
                    if (!!o.endDate) {
                        if (o.endDate instanceof Date) o.endDate = this._local_to_utc(this._zero_time(o.endDate));else o.endDate = DPGlobal.parseDate(o.endDate, format, o.language);
                    } else {
                        o.endDate = Infinity;
                    }
                }

                o.daysOfWeekDisabled = o.daysOfWeekDisabled || [];
                if (!$.isArray(o.daysOfWeekDisabled)) o.daysOfWeekDisabled = o.daysOfWeekDisabled.split(/[,\s]*/);
                o.daysOfWeekDisabled = $.map(o.daysOfWeekDisabled, function (d) {
                    return parseInt(d, 10);
                });

                o.datesDisabled = o.datesDisabled || [];
                if (!$.isArray(o.datesDisabled)) {
                    var datesDisabled = [];
                    datesDisabled.push(DPGlobal.parseDate(o.datesDisabled, format, o.language));
                    o.datesDisabled = datesDisabled;
                }
                o.datesDisabled = $.map(o.datesDisabled, function (d) {
                    return DPGlobal.parseDate(d, format, o.language);
                });

                var plc = String(o.orientation).toLowerCase().split(/\s+/g),
                    _plc = o.orientation.toLowerCase();
                plc = $.grep(plc, function (word) {
                    return (/^auto|left|right|top|bottom$/.test(word)
                    );
                });
                o.orientation = { x: 'auto', y: 'auto' };
                if (!_plc || _plc === 'auto') ; // no action
                else if (plc.length === 1) {
                    switch (plc[0]) {
                        case 'top':
                        case 'bottom':
                            o.orientation.y = plc[0];
                            break;
                        case 'left':
                        case 'right':
                            o.orientation.x = plc[0];
                            break;
                    }
                } else {
                    _plc = $.grep(plc, function (word) {
                        return (/^left|right$/.test(word)
                        );
                    });
                    o.orientation.x = _plc[0] || 'auto';

                    _plc = $.grep(plc, function (word) {
                        return (/^top|bottom$/.test(word)
                        );
                    });
                    o.orientation.y = _plc[0] || 'auto';
                }
                if (o.defaultViewDate) {
                    var year = o.defaultViewDate.year || new Date().getFullYear();
                    var month = o.defaultViewDate.month || 0;
                    var day = o.defaultViewDate.day || 1;
                    o.defaultViewDate = UTCDate(year, month, day);
                } else {
                    o.defaultViewDate = UTCToday();
                }
                o.showOnFocus = o.showOnFocus !== undefined ? o.showOnFocus : true;
            },
            _events: [],
            _secondaryEvents: [],
            _applyEvents: function _applyEvents(evs) {
                for (var i = 0, el, ch, ev; i < evs.length; i++) {
                    el = evs[i][0];
                    if (evs[i].length === 2) {
                        ch = undefined;
                        ev = evs[i][1];
                    } else if (evs[i].length === 3) {
                        ch = evs[i][1];
                        ev = evs[i][2];
                    }
                    el.on(ev, ch);
                }
            },
            _unapplyEvents: function _unapplyEvents(evs) {
                for (var i = 0, el, ev, ch; i < evs.length; i++) {
                    el = evs[i][0];
                    if (evs[i].length === 2) {
                        ch = undefined;
                        ev = evs[i][1];
                    } else if (evs[i].length === 3) {
                        ch = evs[i][1];
                        ev = evs[i][2];
                    }
                    el.off(ev, ch);
                }
            },
            _buildEvents: function _buildEvents() {
                var events = {
                    keyup: $.proxy(function (e) {
                        if ($.inArray(e.keyCode, [27, 37, 39, 38, 40, 32, 13, 9]) === -1) this.update();
                    }, this),
                    keydown: $.proxy(this.keydown, this)
                };

                if (this.o.showOnFocus === true) {
                    events.focus = $.proxy(this.show, this);
                }

                if (this.isInput) {
                    // single input
                    this._events = [[this.element, events]];
                } else if (this.component && this.hasInput) {
                    // component: input + button
                    this._events = [
                        // For components that are not readonly, allow keyboard nav
                        [this.element.find('input'), events], [this.component, {
                            click: $.proxy(this.show, this)
                        }]];
                } else if (this.element.is('div')) {
                    // inline datepicker
                    this.isInline = true;
                } else {
                    this._events = [[this.element, {
                        click: $.proxy(this.show, this)
                    }]];
                }
                this._events.push(
                    // Component: listen for blur on element descendants
                    [this.element, '*', {
                        blur: $.proxy(function (e) {
                            this._focused_from = e.target;
                        }, this)
                    }],
                    // Input: listen for blur on element
                    [this.element, {
                        blur: $.proxy(function (e) {
                            this._focused_from = e.target;
                        }, this)
                    }]);

                this._secondaryEvents = [[this.picker, {
                    click: $.proxy(this.click, this)
                }], [$(window), {
                    resize: $.proxy(this.place, this)
                }], [$(document), {
                    'mousedown touchstart': $.proxy(function (e) {
                        // Clicked outside the datepicker, hide it
                        if (!(this.element.is(e.target) || this.element.find(e.target).length || this.picker.is(e.target) || this.picker.find(e.target).length)) {
                            this.hide();
                        }
                    }, this)
                }]];
            },
            _attachEvents: function _attachEvents() {
                this._detachEvents();
                this._applyEvents(this._events);
            },
            _detachEvents: function _detachEvents() {
                this._unapplyEvents(this._events);
            },
            _attachSecondaryEvents: function _attachSecondaryEvents() {
                this._detachSecondaryEvents();
                this._applyEvents(this._secondaryEvents);
            },
            _detachSecondaryEvents: function _detachSecondaryEvents() {
                this._unapplyEvents(this._secondaryEvents);
            },
            _trigger: function _trigger(event, altdate) {
                var date = altdate || this.dates.get(-1),
                    local_date = this._utc_to_local(date);

                this.element.trigger({
                    type: event,
                    date: local_date,
                    dates: $.map(this.dates, this._utc_to_local),
                    format: $.proxy(function (ix, format) {
                        if (arguments.length === 0) {
                            ix = this.dates.length - 1;
                            format = this.o.format;
                        } else if (typeof ix === 'string') {
                            format = ix;
                            ix = this.dates.length - 1;
                        }
                        format = format || this.o.format;
                        var date = this.dates.get(ix);
                        return DPGlobal.formatDate(date, format, this.o.language);
                    }, this)
                });
            },

            show: function show() {
                if (this.element.attr('readonly')) return;
                if (!this.isInline) this.picker.appendTo(this.o.container);
                this.place();
                this.picker.show();
                this._attachSecondaryEvents();
                this._trigger('show');
                if ((window.navigator.msMaxTouchPoints || 'ontouchstart' in document) && this.o.disableTouchKeyboard) {
                    $(this.element).blur();
                }
                return this;
            },

            hide: function hide() {
                if (this.isInline) return this;
                if (!this.picker.is(':visible')) return this;
                this.focusDate = null;
                this.picker.hide().detach();
                this._detachSecondaryEvents();
                this.viewMode = this.o.startView;
                this.showMode();

                if (this.o.forceParse && (this.isInput && this.element.val() || this.hasInput && this.element.find('input').val())) this.setValue();
                this._trigger('hide');
                return this;
            },

            remove: function remove() {
                this.hide();
                this._detachEvents();
                this._detachSecondaryEvents();
                this.picker.remove();
                delete this.element.data().datepicker;
                if (!this.isInput) {
                    delete this.element.data().date;
                }
                return this;
            },

            _utc_to_local: function _utc_to_local(utc) {
                return utc && new Date(utc.getTime() + utc.getTimezoneOffset() * 60000);
            },
            _local_to_utc: function _local_to_utc(local) {
                return local && new Date(local.getTime() - local.getTimezoneOffset() * 60000);
            },
            _zero_time: function _zero_time(local) {
                return local && new Date(local.getFullYear(), local.getMonth(), local.getDate());
            },
            _zero_utc_time: function _zero_utc_time(utc) {
                return utc && new Date(Date.UTC(utc.getUTCFullYear(), utc.getUTCMonth(), utc.getUTCDate()));
            },

            getDates: function getDates() {
                return $.map(this.dates, this._utc_to_local);
            },

            getUTCDates: function getUTCDates() {
                return $.map(this.dates, function (d) {
                    return new Date(d);
                });
            },

            getDate: function getDate() {
                return this._utc_to_local(this.getUTCDate());
            },

            getUTCDate: function getUTCDate() {
                var selected_date = this.dates.get(-1);
                if (typeof selected_date !== 'undefined') {
                    return new Date(selected_date);
                } else {
                    return null;
                }
            },

            clearDates: function clearDates() {
                var element;
                if (this.isInput) {
                    element = this.element;
                } else if (this.component) {
                    element = this.element.find('input');
                }

                if (element) {
                    element.val('').change();
                }

                this.update();
                this._trigger('changeDate');

                if (this.o.autoclose) {
                    this.hide();
                }
            },
            setDates: function setDates() {
                var args = $.isArray(arguments[0]) ? arguments[0] : arguments;
                this.update.apply(this, args);
                this._trigger('changeDate');
                this.setValue();
                return this;
            },

            setUTCDates: function setUTCDates() {
                var args = $.isArray(arguments[0]) ? arguments[0] : arguments;
                this.update.apply(this, $.map(args, this._utc_to_local));
                this._trigger('changeDate');
                this.setValue();
                return this;
            },

            setDate: alias('setDates'),
            setUTCDate: alias('setUTCDates'),

            setValue: function setValue() {
                var formatted = this.getFormattedDate();
                if (!this.isInput) {
                    if (this.component) {
                        this.element.find('input').val(formatted).change();
                    }
                } else {
                    this.element.val(formatted).change();
                }
                return this;
            },

            getFormattedDate: function getFormattedDate(format) {
                if (format === undefined) format = this.o.format;

                var lang = this.o.language;
                return $.map(this.dates, function (d) {
                    return DPGlobal.formatDate(d, format, lang);
                }).join(this.o.multidateSeparator);
            },

            setStartDate: function setStartDate(startDate) {
                this._process_options({ startDate: startDate });
                this.update();
                this.updateNavArrows();
                return this;
            },

            setEndDate: function setEndDate(endDate) {
                this._process_options({ endDate: endDate });
                this.update();
                this.updateNavArrows();
                return this;
            },

            setDaysOfWeekDisabled: function setDaysOfWeekDisabled(daysOfWeekDisabled) {
                this._process_options({ daysOfWeekDisabled: daysOfWeekDisabled });
                this.update();
                this.updateNavArrows();
                return this;
            },

            setDatesDisabled: function setDatesDisabled(datesDisabled) {
                this._process_options({ datesDisabled: datesDisabled });
                this.update();
                this.updateNavArrows();
            },

            place: function place() {
                if (this.isInline) return this;
                var calendarWidth = this.picker.outerWidth(),
                    calendarHeight = this.picker.outerHeight(),
                    visualPadding = 10,
                    windowWidth = $(this.o.container).width(),
                    windowHeight = $(this.o.container).height(),
                    scrollTop = $(this.o.container).scrollTop(),
                    appendOffset = $(this.o.container).offset();

                var parentsZindex = [];
                this.element.parents().each(function () {
                    var itemZIndex = $(this).css('z-index');
                    if (itemZIndex !== 'auto' && itemZIndex !== 0) parentsZindex.push(parseInt(itemZIndex));
                });
                var zIndex = Math.max.apply(Math, parentsZindex) + 10;
                var offset = this.component ? this.component.parent().offset() : this.element.offset();
                var height = this.component ? this.component.outerHeight(true) : this.element.outerHeight(false);
                var width = this.component ? this.component.outerWidth(true) : this.element.outerWidth(false);
                var left = offset.left - appendOffset.left,
                    top = offset.top - appendOffset.top;

                this.picker.removeClass('datepicker-orient-top datepicker-orient-bottom ' + 'datepicker-orient-right datepicker-orient-left');

                if (this.o.orientation.x !== 'auto') {
                    this.picker.addClass('datepicker-orient-' + this.o.orientation.x);
                    if (this.o.orientation.x === 'right') left -= calendarWidth - width;
                }
                // auto x orientation is best-placement: if it crosses a window
                // edge, fudge it sideways
                else {
                    if (offset.left < 0) {
                        // component is outside the window on the left side. Move it into visible range
                        this.picker.addClass('datepicker-orient-left');
                        left -= offset.left - visualPadding;
                    } else if (left + calendarWidth > windowWidth) {
                        // the calendar passes the widow right edge. Align it to component right side
                        this.picker.addClass('datepicker-orient-right');
                        left = offset.left + width - calendarWidth;
                    } else {
                        // Default to left
                        this.picker.addClass('datepicker-orient-left');
                    }
                }

                // auto y orientation is best-situation: top or bottom, no fudging,
                // decision based on which shows more of the calendar
                var yorient = this.o.orientation.y,
                    top_overflow,
                    bottom_overflow;
                if (yorient === 'auto') {
                    top_overflow = -scrollTop + top - calendarHeight;
                    bottom_overflow = scrollTop + windowHeight - (top + height + calendarHeight);
                    if (Math.max(top_overflow, bottom_overflow) === bottom_overflow) yorient = 'top';else yorient = 'bottom';
                }
                this.picker.addClass('datepicker-orient-' + yorient);
                if (yorient === 'top') top += height;else top -= calendarHeight + parseInt(this.picker.css('padding-top'));

                if (this.o.rtl) {
                    var right = windowWidth - (left + width);
                    this.picker.css({
                        top: top,
                        right: right,
                        zIndex: zIndex
                    });
                } else {
                    this.picker.css({
                        top: top,
                        left: left,
                        zIndex: zIndex
                    });
                }
                return this;
            },

            _allow_update: true,
            update: function update() {
                if (!this._allow_update) return this;

                var oldDates = this.dates.copy(),
                    dates = [],
                    fromArgs = false;
                if (arguments.length) {
                    $.each(arguments, $.proxy(function (i, date) {
                        if (date instanceof Date) date = this._local_to_utc(date);
                        dates.push(date);
                    }, this));
                    fromArgs = true;
                } else {
                    dates = this.isInput ? this.element.val() : this.element.data('date') || this.element.find('input').val();
                    if (dates && this.o.multidate) dates = dates.split(this.o.multidateSeparator);else dates = [dates];
                    delete this.element.data().date;
                }

                dates = $.map(dates, $.proxy(function (date) {
                    return DPGlobal.parseDate(date, this.o.format, this.o.language);
                }, this));
                dates = $.grep(dates, $.proxy(function (date) {
                    return date < this.o.startDate || date > this.o.endDate || !date;
                }, this), true);
                this.dates.replace(dates);

                if (this.dates.length) this.viewDate = new Date(this.dates.get(-1));else if (this.viewDate < this.o.startDate) this.viewDate = new Date(this.o.startDate);else if (this.viewDate > this.o.endDate) this.viewDate = new Date(this.o.endDate);

                if (fromArgs) {
                    // setting date by clicking
                    this.setValue();
                } else if (dates.length) {
                    // setting date by typing
                    if (String(oldDates) !== String(this.dates)) this._trigger('changeDate');
                }
                if (!this.dates.length && oldDates.length) this._trigger('clearDate');

                this.fill();
                return this;
            },

            fillDow: function fillDow() {
                var dowCnt = this.o.weekStart,
                    html = '<tr>';
                if (this.o.calendarWeeks) {
                    this.picker.find('.datepicker-days thead tr:first-child .datepicker-switch').attr('colspan', function (i, val) {
                        return parseInt(val) + 1;
                    });
                    var cell = '<th class="cw">&#160;</th>';
                    html += cell;
                }
                while (dowCnt < this.o.weekStart + 7) {
                    html += '<th class="dow">' + dates[this.o.language].daysMin[dowCnt++ % 7] + '</th>';
                }
                html += '</tr>';
                this.picker.find('.datepicker-days thead').append(html);
            },

            fillMonths: function fillMonths() {
                var html = '',
                    i = 0;
                while (i < 12) {
                    html += '<span class="month">' + dates[this.o.language].monthsShort[i++] + '</span>';
                }
                this.picker.find('.datepicker-months td').html(html);
            },

            setRange: function setRange(range) {
                if (!range || !range.length) delete this.range;else this.range = $.map(range, function (d) {
                    return d.valueOf();
                });
                this.fill();
            },

            getClassNames: function getClassNames(date) {
                var cls = [],
                    year = this.viewDate.getUTCFullYear(),
                    month = this.viewDate.getUTCMonth(),
                    today = new Date();
                if (date.getUTCFullYear() < year || date.getUTCFullYear() === year && date.getUTCMonth() < month) {
                    cls.push('old');
                } else if (date.getUTCFullYear() > year || date.getUTCFullYear() === year && date.getUTCMonth() > month) {
                    cls.push('new');
                }
                if (this.focusDate && date.valueOf() === this.focusDate.valueOf()) cls.push('focused');
                // Compare internal UTC date with local today, not UTC today
                if (this.o.todayHighlight && date.getUTCFullYear() === today.getFullYear() && date.getUTCMonth() === today.getMonth() && date.getUTCDate() === today.getDate()) {
                    cls.push('today');
                }
                if (this.dates.contains(date) !== -1) cls.push('active');
                if (date.valueOf() < this.o.startDate || date.valueOf() > this.o.endDate || $.inArray(date.getUTCDay(), this.o.daysOfWeekDisabled) !== -1) {
                    cls.push('disabled');
                }
                if (this.o.datesDisabled.length > 0 && $.grep(this.o.datesDisabled, function (d) {
                        return isUTCEquals(date, d);
                    }).length > 0) {
                    cls.push('disabled', 'disabled-date');
                }

                if (this.range) {
                    if (date > this.range[0] && date < this.range[this.range.length - 1]) {
                        cls.push('range');
                    }
                    if ($.inArray(date.valueOf(), this.range) !== -1) {
                        cls.push('selected');
                    }
                }
                return cls;
            },

            fill: function fill() {
                var d = new Date(this.viewDate),
                    year = d.getUTCFullYear(),
                    month = d.getUTCMonth(),
                    startYear = this.o.startDate !== -Infinity ? this.o.startDate.getUTCFullYear() : -Infinity,
                    startMonth = this.o.startDate !== -Infinity ? this.o.startDate.getUTCMonth() : -Infinity,
                    endYear = this.o.endDate !== Infinity ? this.o.endDate.getUTCFullYear() : Infinity,
                    endMonth = this.o.endDate !== Infinity ? this.o.endDate.getUTCMonth() : Infinity,
                    todaytxt = dates[this.o.language].today || dates['en'].today || '',
                    cleartxt = dates[this.o.language].clear || dates['en'].clear || '',
                    tooltip;
                if (isNaN(year) || isNaN(month)) return;
                this.picker.find('.datepicker-days thead .datepicker-switch').text(dates[this.o.language].months[month] + ' ' + year);
                this.picker.find('tfoot .today').text(todaytxt).toggle(this.o.todayBtn !== false);
                this.picker.find('tfoot .clear').text(cleartxt).toggle(this.o.clearBtn !== false);
                this.updateNavArrows();
                this.fillMonths();
                var prevMonth = UTCDate(year, month - 1, 28),
                    day = DPGlobal.getDaysInMonth(prevMonth.getUTCFullYear(), prevMonth.getUTCMonth());
                prevMonth.setUTCDate(day);
                prevMonth.setUTCDate(day - (prevMonth.getUTCDay() - this.o.weekStart + 7) % 7);
                var nextMonth = new Date(prevMonth);
                nextMonth.setUTCDate(nextMonth.getUTCDate() + 42);
                nextMonth = nextMonth.valueOf();
                var html = [];
                var clsName;
                while (prevMonth.valueOf() < nextMonth) {
                    if (prevMonth.getUTCDay() === this.o.weekStart) {
                        html.push('<tr>');
                        if (this.o.calendarWeeks) {
                            // ISO 8601: First week contains first thursday.
                            // ISO also states week starts on Monday, but we can be more abstract here.
                            var
                                // Start of current week: based on weekstart/current date
                                ws = new Date(+prevMonth + (this.o.weekStart - prevMonth.getUTCDay() - 7) % 7 * 864e5),

                                // Thursday of this week
                                th = new Date(Number(ws) + (7 + 4 - ws.getUTCDay()) % 7 * 864e5),

                                // First Thursday of year, year from thursday
                                yth = new Date(Number(yth = UTCDate(th.getUTCFullYear(), 0, 1)) + (7 + 4 - yth.getUTCDay()) % 7 * 864e5),

                                // Calendar week: ms between thursdays, div ms per day, div 7 days
                                calWeek = (th - yth) / 864e5 / 7 + 1;
                            html.push('<td class="cw">' + calWeek + '</td>');
                        }
                    }
                    clsName = this.getClassNames(prevMonth);
                    clsName.push('day');

                    if (this.o.beforeShowDay !== $.noop) {
                        var before = this.o.beforeShowDay(this._utc_to_local(prevMonth));
                        if (before === undefined) before = {};else if (typeof before === 'boolean') before = { enabled: before };else if (typeof before === 'string') before = { classes: before };
                        if (before.enabled === false) clsName.push('disabled');
                        if (before.classes) clsName = clsName.concat(before.classes.split(/\s+/));
                        if (before.tooltip) tooltip = before.tooltip;
                    }

                    clsName = $.unique(clsName);
                    html.push('<td class="' + clsName.join(' ') + '"' + (tooltip ? ' title="' + tooltip + '"' : '') + '>' + prevMonth.getUTCDate() + '</td>');
                    tooltip = null;
                    if (prevMonth.getUTCDay() === this.o.weekEnd) {
                        html.push('</tr>');
                    }
                    prevMonth.setUTCDate(prevMonth.getUTCDate() + 1);
                }
                this.picker.find('.datepicker-days tbody').empty().append(html.join(''));

                var months = this.picker.find('.datepicker-months').find('th:eq(1)').text(year).end().find('span').removeClass('active');

                $.each(this.dates, function (i, d) {
                    if (d.getUTCFullYear() === year) months.eq(d.getUTCMonth()).addClass('active');
                });

                if (year < startYear || year > endYear) {
                    months.addClass('disabled');
                }
                if (year === startYear) {
                    months.slice(0, startMonth).addClass('disabled');
                }
                if (year === endYear) {
                    months.slice(endMonth + 1).addClass('disabled');
                }

                if (this.o.beforeShowMonth !== $.noop) {
                    var that = this;
                    $.each(months, function (i, month) {
                        if (!$(month).hasClass('disabled')) {
                            var moDate = new Date(year, i, 1);
                            var before = that.o.beforeShowMonth(moDate);
                            if (before === false) $(month).addClass('disabled');
                        }
                    });
                }

                html = '';
                year = parseInt(year / 10, 10) * 10;
                var yearCont = this.picker.find('.datepicker-years').find('th:eq(1)').text(year + '-' + (year + 9)).end().find('td');
                year -= 1;
                var years = $.map(this.dates, function (d) {
                        return d.getUTCFullYear();
                    }),
                    classes;
                for (var i = -1; i < 11; i++) {
                    classes = ['year'];
                    if (i === -1) classes.push('old');else if (i === 10) classes.push('new');
                    if ($.inArray(year, years) !== -1) classes.push('active');
                    if (year < startYear || year > endYear) classes.push('disabled');
                    html += '<span class="' + classes.join(' ') + '">' + year + '</span>';
                    year += 1;
                }
                yearCont.html(html);
            },

            updateNavArrows: function updateNavArrows() {
                if (!this._allow_update) return;

                var d = new Date(this.viewDate),
                    year = d.getUTCFullYear(),
                    month = d.getUTCMonth();
                switch (this.viewMode) {
                    case 0:
                        if (this.o.startDate !== -Infinity && year <= this.o.startDate.getUTCFullYear() && month <= this.o.startDate.getUTCMonth()) {
                            this.picker.find('.prev').css({ visibility: 'hidden' });
                        } else {
                            this.picker.find('.prev').css({ visibility: 'visible' });
                        }
                        if (this.o.endDate !== Infinity && year >= this.o.endDate.getUTCFullYear() && month >= this.o.endDate.getUTCMonth()) {
                            this.picker.find('.next').css({ visibility: 'hidden' });
                        } else {
                            this.picker.find('.next').css({ visibility: 'visible' });
                        }
                        break;
                    case 1:
                    case 2:
                        if (this.o.startDate !== -Infinity && year <= this.o.startDate.getUTCFullYear()) {
                            this.picker.find('.prev').css({ visibility: 'hidden' });
                        } else {
                            this.picker.find('.prev').css({ visibility: 'visible' });
                        }
                        if (this.o.endDate !== Infinity && year >= this.o.endDate.getUTCFullYear()) {
                            this.picker.find('.next').css({ visibility: 'hidden' });
                        } else {
                            this.picker.find('.next').css({ visibility: 'visible' });
                        }
                        break;
                }
            },

            click: function click(e) {
                e.preventDefault();
                var target = $(e.target).closest('span, td, th'),
                    year,
                    month,
                    day;
                if (target.length === 1) {
                    switch (target[0].nodeName.toLowerCase()) {
                        case 'th':
                            switch (target[0].className) {
                                case 'datepicker-switch':
                                    this.showMode(1);
                                    break;
                                case 'prev':
                                case 'next':
                                    var dir = DPGlobal.modes[this.viewMode].navStep * (target[0].className === 'prev' ? -1 : 1);
                                    switch (this.viewMode) {
                                        case 0:
                                            this.viewDate = this.moveMonth(this.viewDate, dir);
                                            this._trigger('changeMonth', this.viewDate);
                                            break;
                                        case 1:
                                        case 2:
                                            this.viewDate = this.moveYear(this.viewDate, dir);
                                            if (this.viewMode === 1) this._trigger('changeYear', this.viewDate);
                                            break;
                                    }
                                    this.fill();
                                    break;
                                case 'today':
                                    var date = new Date();
                                    date = UTCDate(date.getFullYear(), date.getMonth(), date.getDate(), 0, 0, 0);

                                    this.showMode(-2);
                                    var which = this.o.todayBtn === 'linked' ? null : 'view';
                                    this._setDate(date, which);
                                    break;
                                case 'clear':
                                    this.clearDates();
                                    break;
                            }
                            break;
                        case 'span':
                            if (!target.hasClass('disabled')) {
                                this.viewDate.setUTCDate(1);
                                if (target.hasClass('month')) {
                                    day = 1;
                                    month = target.parent().find('span').index(target);
                                    year = this.viewDate.getUTCFullYear();
                                    this.viewDate.setUTCMonth(month);
                                    this._trigger('changeMonth', this.viewDate);
                                    if (this.o.minViewMode === 1) {
                                        this._setDate(UTCDate(year, month, day));
                                    }
                                } else {
                                    day = 1;
                                    month = 0;
                                    year = parseInt(target.text(), 10) || 0;
                                    this.viewDate.setUTCFullYear(year);
                                    this._trigger('changeYear', this.viewDate);
                                    if (this.o.minViewMode === 2) {
                                        this._setDate(UTCDate(year, month, day));
                                    }
                                }
                                this.showMode(-1);
                                this.fill();
                            }
                            break;
                        case 'td':
                            if (target.hasClass('day') && !target.hasClass('disabled')) {
                                day = parseInt(target.text(), 10) || 1;
                                year = this.viewDate.getUTCFullYear();
                                month = this.viewDate.getUTCMonth();
                                if (target.hasClass('old')) {
                                    if (month === 0) {
                                        month = 11;
                                        year -= 1;
                                    } else {
                                        month -= 1;
                                    }
                                } else if (target.hasClass('new')) {
                                    if (month === 11) {
                                        month = 0;
                                        year += 1;
                                    } else {
                                        month += 1;
                                    }
                                }
                                this._setDate(UTCDate(year, month, day));
                            }
                            break;
                    }
                }
                if (this.picker.is(':visible') && this._focused_from) {
                    $(this._focused_from).focus();
                }
                delete this._focused_from;
            },

            _toggle_multidate: function _toggle_multidate(date) {
                var ix = this.dates.contains(date);
                if (!date) {
                    this.dates.clear();
                }

                if (ix !== -1) {
                    if (this.o.multidate === true || this.o.multidate > 1 || this.o.toggleActive) {
                        this.dates.remove(ix);
                    }
                } else if (this.o.multidate === false) {
                    this.dates.clear();
                    this.dates.push(date);
                } else {
                    this.dates.push(date);
                }

                if (typeof this.o.multidate === 'number') while (this.dates.length > this.o.multidate) {
                    this.dates.remove(0);
                }
            },

            _setDate: function _setDate(date, which) {
                if (!which || which === 'date') this._toggle_multidate(date && new Date(date));
                if (!which || which === 'view') this.viewDate = date && new Date(date);

                this.fill();
                this.setValue();
                if (!which || which !== 'view') {
                    this._trigger('changeDate');
                }
                var element;
                if (this.isInput) {
                    element = this.element;
                } else if (this.component) {
                    element = this.element.find('input');
                }
                if (element) {
                    element.change();
                }
                if (this.o.autoclose && (!which || which === 'date')) {
                    this.hide();
                }
            },

            moveMonth: function moveMonth(date, dir) {
                if (!date) return undefined;
                if (!dir) return date;
                var new_date = new Date(date.valueOf()),
                    day = new_date.getUTCDate(),
                    month = new_date.getUTCMonth(),
                    mag = Math.abs(dir),
                    new_month,
                    test;
                dir = dir > 0 ? 1 : -1;
                if (mag === 1) {
                    test = dir === -1
                        // If going back one month, make sure month is not current month
                        // (eg, Mar 31 -> Feb 31 == Feb 28, not Mar 02)
                        ? function () {
                            return new_date.getUTCMonth() === month;
                        }
                        // If going forward one month, make sure month is as expected
                        // (eg, Jan 31 -> Feb 31 == Feb 28, not Mar 02)
                        : function () {
                            return new_date.getUTCMonth() !== new_month;
                        };
                    new_month = month + dir;
                    new_date.setUTCMonth(new_month);
                    // Dec -> Jan (12) or Jan -> Dec (-1) -- limit expected date to 0-11
                    if (new_month < 0 || new_month > 11) new_month = (new_month + 12) % 12;
                } else {
                    // For magnitudes >1, move one month at a time...
                    for (var i = 0; i < mag; i++) {
                        // ...which might decrease the day (eg, Jan 31 to Feb 28, etc)...
                        new_date = this.moveMonth(new_date, dir);
                    } // ...then reset the day, keeping it in the new month
                    new_month = new_date.getUTCMonth();
                    new_date.setUTCDate(day);
                    test = function test() {
                        return new_month !== new_date.getUTCMonth();
                    };
                }
                // Common date-resetting loop -- if date is beyond end of month, make it
                // end of month
                while (test()) {
                    new_date.setUTCDate(--day);
                    new_date.setUTCMonth(new_month);
                }
                return new_date;
            },

            moveYear: function moveYear(date, dir) {
                return this.moveMonth(date, dir * 12);
            },

            dateWithinRange: function dateWithinRange(date) {
                return date >= this.o.startDate && date <= this.o.endDate;
            },

            keydown: function keydown(e) {
                if (!this.picker.is(':visible')) {
                    if (e.keyCode === 27) // allow escape to hide and re-show picker
                        this.show();
                    return;
                }
                var dateChanged = false,
                    dir,
                    newDate,
                    newViewDate,
                    focusDate = this.focusDate || this.viewDate;
                switch (e.keyCode) {
                    case 27:
                        // escape
                        if (this.focusDate) {
                            this.focusDate = null;
                            this.viewDate = this.dates.get(-1) || this.viewDate;
                            this.fill();
                        } else this.hide();
                        e.preventDefault();
                        break;
                    case 37: // left
                    case 39:
                        // right
                        if (!this.o.keyboardNavigation) break;
                        dir = e.keyCode === 37 ? -1 : 1;
                        if (e.ctrlKey) {
                            newDate = this.moveYear(this.dates.get(-1) || UTCToday(), dir);
                            newViewDate = this.moveYear(focusDate, dir);
                            this._trigger('changeYear', this.viewDate);
                        } else if (e.shiftKey) {
                            newDate = this.moveMonth(this.dates.get(-1) || UTCToday(), dir);
                            newViewDate = this.moveMonth(focusDate, dir);
                            this._trigger('changeMonth', this.viewDate);
                        } else {
                            newDate = new Date(this.dates.get(-1) || UTCToday());
                            newDate.setUTCDate(newDate.getUTCDate() + dir);
                            newViewDate = new Date(focusDate);
                            newViewDate.setUTCDate(focusDate.getUTCDate() + dir);
                        }
                        if (this.dateWithinRange(newViewDate)) {
                            this.focusDate = this.viewDate = newViewDate;
                            this.setValue();
                            this.fill();
                            e.preventDefault();
                        }
                        break;
                    case 38: // up
                    case 40:
                        // down
                        if (!this.o.keyboardNavigation) break;
                        dir = e.keyCode === 38 ? -1 : 1;
                        if (e.ctrlKey) {
                            newDate = this.moveYear(this.dates.get(-1) || UTCToday(), dir);
                            newViewDate = this.moveYear(focusDate, dir);
                            this._trigger('changeYear', this.viewDate);
                        } else if (e.shiftKey) {
                            newDate = this.moveMonth(this.dates.get(-1) || UTCToday(), dir);
                            newViewDate = this.moveMonth(focusDate, dir);
                            this._trigger('changeMonth', this.viewDate);
                        } else {
                            newDate = new Date(this.dates.get(-1) || UTCToday());
                            newDate.setUTCDate(newDate.getUTCDate() + dir * 7);
                            newViewDate = new Date(focusDate);
                            newViewDate.setUTCDate(focusDate.getUTCDate() + dir * 7);
                        }
                        if (this.dateWithinRange(newViewDate)) {
                            this.focusDate = this.viewDate = newViewDate;
                            this.setValue();
                            this.fill();
                            e.preventDefault();
                        }
                        break;
                    case 32:
                        // spacebar
                        // Spacebar is used in manually typing dates in some formats.
                        // As such, its behavior should not be hijacked.
                        break;
                    case 13:
                        // enter
                        focusDate = this.focusDate || this.dates.get(-1) || this.viewDate;
                        if (this.o.keyboardNavigation) {
                            this._toggle_multidate(focusDate);
                            dateChanged = true;
                        }
                        this.focusDate = null;
                        this.viewDate = this.dates.get(-1) || this.viewDate;
                        this.setValue();
                        this.fill();
                        if (this.picker.is(':visible')) {
                            e.preventDefault();
                            if (typeof e.stopPropagation === 'function') {
                                e.stopPropagation(); // All modern browsers, IE9+
                            } else {
                                e.cancelBubble = true; // IE6,7,8 ignore "stopPropagation"
                            }
                            if (this.o.autoclose) this.hide();
                        }
                        break;
                    case 9:
                        // tab
                        this.focusDate = null;
                        this.viewDate = this.dates.get(-1) || this.viewDate;
                        this.fill();
                        this.hide();
                        break;
                }
                if (dateChanged) {
                    if (this.dates.length) this._trigger('changeDate');else this._trigger('clearDate');
                    var element;
                    if (this.isInput) {
                        element = this.element;
                    } else if (this.component) {
                        element = this.element.find('input');
                    }
                    if (element) {
                        element.change();
                    }
                }
            },

            showMode: function showMode(dir) {
                if (dir) {
                    this.viewMode = Math.max(this.o.minViewMode, Math.min(2, this.viewMode + dir));
                }
                this.picker.children('div').hide().filter('.datepicker-' + DPGlobal.modes[this.viewMode].clsName).css('display', 'block');
                this.updateNavArrows();
            }
        };

        var DateRangePicker = function DateRangePicker(element, options) {
            this.element = $(element);
            this.inputs = $.map(options.inputs, function (i) {
                return i.jquery ? i[0] : i;
            });
            delete options.inputs;

            datepickerPlugin.call($(this.inputs), options).bind('changeDate', $.proxy(this.dateUpdated, this));

            this.pickers = $.map(this.inputs, function (i) {
                return $(i).data('datepicker');
            });
            this.updateDates();
        };
        DateRangePicker.prototype = {
            updateDates: function updateDates() {
                this.dates = $.map(this.pickers, function (i) {
                    return i.getUTCDate();
                });
                this.updateRanges();
            },
            updateRanges: function updateRanges() {
                var range = $.map(this.dates, function (d) {
                    return d.valueOf();
                });
                $.each(this.pickers, function (i, p) {
                    p.setRange(range);
                });
            },
            dateUpdated: function dateUpdated(e) {
                // `this.updating` is a workaround for preventing infinite recursion
                // between `changeDate` triggering and `setUTCDate` calling.  Until
                // there is a better mechanism.
                if (this.updating) return;
                this.updating = true;

                var dp = $(e.target).data('datepicker'),
                    new_date = dp.getUTCDate(),
                    i = $.inArray(e.target, this.inputs),
                    j = i - 1,
                    k = i + 1,
                    l = this.inputs.length;
                if (i === -1) return;

                $.each(this.pickers, function (i, p) {
                    if (!p.getUTCDate()) p.setUTCDate(new_date);
                });

                if (new_date < this.dates[j]) {
                    // Date being moved earlier/left
                    while (j >= 0 && new_date < this.dates[j]) {
                        this.pickers[j--].setUTCDate(new_date);
                    }
                } else if (new_date > this.dates[k]) {
                    // Date being moved later/right
                    while (k < l && new_date > this.dates[k]) {
                        this.pickers[k++].setUTCDate(new_date);
                    }
                }
                this.updateDates();

                delete this.updating;
            },
            remove: function remove() {
                $.map(this.pickers, function (p) {
                    p.remove();
                });
                delete this.element.data().datepicker;
            }
        };

        function opts_from_el(el, prefix) {
            // Derive options from element data-attrs
            var data = $(el).data(),
                out = {},
                inkey,
                replace = new RegExp('^' + prefix.toLowerCase() + '([A-Z])');
            prefix = new RegExp('^' + prefix.toLowerCase());
            function re_lower(_, a) {
                return a.toLowerCase();
            }
            for (var key in data) {
                if (prefix.test(key)) {
                    inkey = key.replace(replace, re_lower);
                    out[inkey] = data[key];
                }
            }return out;
        }

        function opts_from_locale(lang) {
            // Derive options from locale plugins
            var out = {};
            // Check if "de-DE" style date is available, if not language should
            // fallback to 2 letter code eg "de"
            if (!dates[lang]) {
                lang = lang.split('-')[0];
                if (!dates[lang]) return;
            }
            var d = dates[lang];
            $.each(locale_opts, function (i, k) {
                if (k in d) out[k] = d[k];
            });
            return out;
        }

        var old = $.fn.datepicker;
        var datepickerPlugin = function datepickerPlugin(option) {
            var args = Array.apply(null, arguments);
            args.shift();
            var internal_return;
            this.each(function () {
                var $this = $(this),
                    data = $this.data('datepicker'),
                    options = (typeof option === 'undefined' ? 'undefined' : _typeof(option)) === 'object' && option;
                if (!data) {
                    var elopts = opts_from_el(this, 'date'),

                        // Preliminary otions
                        xopts = $.extend({}, defaults, elopts, options),
                        locopts = opts_from_locale(xopts.language),

                        // Options priority: js args, data-attrs, locales, defaults
                        opts = $.extend({}, defaults, locopts, elopts, options);
                    if ($this.hasClass('input-daterange') || opts.inputs) {
                        var ropts = {
                            inputs: opts.inputs || $this.find('input').toArray()
                        };
                        $this.data('datepicker', data = new DateRangePicker(this, $.extend(opts, ropts)));
                    } else {
                        $this.data('datepicker', data = new Datepicker(this, opts));
                    }
                }
                if (typeof option === 'string' && typeof data[option] === 'function') {
                    internal_return = data[option].apply(data, args);
                    if (internal_return !== undefined) return false;
                }
            });
            if (internal_return !== undefined) return internal_return;else return this;
        };
        $.fn.datepicker = datepickerPlugin;

        var defaults = $.fn.datepicker.defaults = {
            autoclose: false,
            beforeShowDay: $.noop,
            beforeShowMonth: $.noop,
            calendarWeeks: false,
            clearBtn: false,
            toggleActive: false,
            daysOfWeekDisabled: [],
            datesDisabled: [],
            endDate: Infinity,
            forceParse: true,
            format: 'mm/dd/yyyy',
            keyboardNavigation: true,
            language: 'en',
            minViewMode: 0,
            multidate: false,
            multidateSeparator: ',',
            orientation: "auto",
            rtl: false,
            startDate: -Infinity,
            startView: 0,
            todayBtn: false,
            todayHighlight: false,
            weekStart: 0,
            disableTouchKeyboard: false,
            container: 'body'
        };
        var locale_opts = $.fn.datepicker.locale_opts = ['format', 'rtl', 'weekStart'];
        $.fn.datepicker.Constructor = Datepicker;
        var dates = $.fn.datepicker.dates = {
            en: {
                days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
                daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"],
                months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                today: "Today",
                clear: "Clear"
            }
        };

        var DPGlobal = {
            modes: [{
                clsName: 'days',
                navFnc: 'Month',
                navStep: 1
            }, {
                clsName: 'months',
                navFnc: 'FullYear',
                navStep: 1
            }, {
                clsName: 'years',
                navFnc: 'FullYear',
                navStep: 10
            }],
            isLeapYear: function isLeapYear(year) {
                return year % 4 === 0 && year % 100 !== 0 || year % 400 === 0;
            },
            getDaysInMonth: function getDaysInMonth(year, month) {
                return [31, DPGlobal.isLeapYear(year) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month];
            },
            validParts: /dd?|DD?|mm?|MM?|yy(?:yy)?/g,
            nonpunctuation: /[^ -\/:-@\[\u3400-\u9fff-`{-~\t\n\r]+/g,
            parseFormat: function parseFormat(format) {
                // IE treats \0 as a string end in inputs (truncating the value),
                // so it's a bad format delimiter, anyway
                var separators = format.replace(this.validParts, '\0').split('\0'),
                    parts = format.match(this.validParts);
                if (!separators || !separators.length || !parts || parts.length === 0) {
                    throw new Error("Invalid date format.");
                }
                return { separators: separators, parts: parts };
            },
            parseDate: function parseDate(date, format, language) {
                if (!date) return undefined;
                if (date instanceof Date) return date;
                if (typeof format === 'string') format = DPGlobal.parseFormat(format);
                var part_re = /([\-+]\d+)([dmwy])/,
                    parts = date.match(/([\-+]\d+)([dmwy])/g),
                    part,
                    dir,
                    i;
                if (/^[\-+]\d+[dmwy]([\s,]+[\-+]\d+[dmwy])*$/.test(date)) {
                    date = new Date();
                    for (i = 0; i < parts.length; i++) {
                        part = part_re.exec(parts[i]);
                        dir = parseInt(part[1]);
                        switch (part[2]) {
                            case 'd':
                                date.setUTCDate(date.getUTCDate() + dir);
                                break;
                            case 'm':
                                date = Datepicker.prototype.moveMonth.call(Datepicker.prototype, date, dir);
                                break;
                            case 'w':
                                date.setUTCDate(date.getUTCDate() + dir * 7);
                                break;
                            case 'y':
                                date = Datepicker.prototype.moveYear.call(Datepicker.prototype, date, dir);
                                break;
                        }
                    }
                    return UTCDate(date.getUTCFullYear(), date.getUTCMonth(), date.getUTCDate(), 0, 0, 0);
                }
                parts = date && date.match(this.nonpunctuation) || [];
                date = new Date();
                var parsed = {},
                    setters_order = ['yyyy', 'yy', 'M', 'MM', 'm', 'mm', 'd', 'dd'],
                    setters_map = {
                        yyyy: function yyyy(d, v) {
                            return d.setUTCFullYear(v);
                        },
                        yy: function yy(d, v) {
                            return d.setUTCFullYear(2000 + v);
                        },
                        m: function m(d, v) {
                            if (isNaN(d)) return d;
                            v -= 1;
                            while (v < 0) {
                                v += 12;
                            }v %= 12;
                            d.setUTCMonth(v);
                            while (d.getUTCMonth() !== v) {
                                d.setUTCDate(d.getUTCDate() - 1);
                            }return d;
                        },
                        d: function d(_d, v) {
                            return _d.setUTCDate(v);
                        }
                    },
                    val,
                    filtered;
                setters_map['M'] = setters_map['MM'] = setters_map['mm'] = setters_map['m'];
                setters_map['dd'] = setters_map['d'];
                date = UTCDate(date.getFullYear(), date.getMonth(), date.getDate(), 0, 0, 0);
                var fparts = format.parts.slice();
                // Remove noop parts
                if (parts.length !== fparts.length) {
                    fparts = $(fparts).filter(function (i, p) {
                        return $.inArray(p, setters_order) !== -1;
                    }).toArray();
                }
                // Process remainder
                function match_part() {
                    var m = this.slice(0, parts[i].length),
                        p = parts[i].slice(0, m.length);
                    return m.toLowerCase() === p.toLowerCase();
                }
                if (parts.length === fparts.length) {
                    var cnt;
                    for (i = 0, cnt = fparts.length; i < cnt; i++) {
                        val = parseInt(parts[i], 10);
                        part = fparts[i];
                        if (isNaN(val)) {
                            switch (part) {
                                case 'MM':
                                    filtered = $(dates[language].months).filter(match_part);
                                    val = $.inArray(filtered[0], dates[language].months) + 1;
                                    break;
                                case 'M':
                                    filtered = $(dates[language].monthsShort).filter(match_part);
                                    val = $.inArray(filtered[0], dates[language].monthsShort) + 1;
                                    break;
                            }
                        }
                        parsed[part] = val;
                    }
                    var _date, s;
                    for (i = 0; i < setters_order.length; i++) {
                        s = setters_order[i];
                        if (s in parsed && !isNaN(parsed[s])) {
                            _date = new Date(date);
                            setters_map[s](_date, parsed[s]);
                            if (!isNaN(_date)) date = _date;
                        }
                    }
                }
                return date;
            },
            formatDate: function formatDate(date, format, language) {
                if (!date) return '';
                if (typeof format === 'string') format = DPGlobal.parseFormat(format);
                var val = {
                    d: date.getUTCDate(),
                    D: dates[language].daysShort[date.getUTCDay()],
                    DD: dates[language].days[date.getUTCDay()],
                    m: date.getUTCMonth() + 1,
                    M: dates[language].monthsShort[date.getUTCMonth()],
                    MM: dates[language].months[date.getUTCMonth()],
                    yy: date.getUTCFullYear().toString().substring(2),
                    yyyy: date.getUTCFullYear()
                };
                val.dd = (val.d < 10 ? '0' : '') + val.d;
                val.mm = (val.m < 10 ? '0' : '') + val.m;
                date = [];
                var seps = $.extend([], format.separators);
                for (var i = 0, cnt = format.parts.length; i <= cnt; i++) {
                    if (seps.length) date.push(seps.shift());
                    date.push(val[format.parts[i]]);
                }
                return date.join('');
            },
            headTemplate: '<thead>' + '<tr>' + '<th class="prev">&#171;</th>' + '<th colspan="5" class="datepicker-switch"></th>' + '<th class="next">&#187;</th>' + '</tr>' + '</thead>',
            contTemplate: '<tbody><tr><td colspan="7"></td></tr></tbody>',
            footTemplate: '<tfoot>' + '<tr>' + '<th colspan="7" class="today"></th>' + '</tr>' + '<tr>' + '<th colspan="7" class="clear"></th>' + '</tr>' + '</tfoot>'
        };
        DPGlobal.template = '<div class="datepicker">' + '<div class="datepicker-days">' + '<table class=" table-condensed">' + DPGlobal.headTemplate + '<tbody></tbody>' + DPGlobal.footTemplate + '</table>' + '</div>' + '<div class="datepicker-months">' + '<table class="table-condensed">' + DPGlobal.headTemplate + DPGlobal.contTemplate + DPGlobal.footTemplate + '</table>' + '</div>' + '<div class="datepicker-years">' + '<table class="table-condensed">' + DPGlobal.headTemplate + DPGlobal.contTemplate + DPGlobal.footTemplate + '</table>' + '</div>' + '</div>';

        $.fn.datepicker.DPGlobal = DPGlobal;

        /* DATEPICKER NO CONFLICT
  * =================== */

        $.fn.datepicker.noConflict = function () {
            $.fn.datepicker = old;
            return this;
        };

        /* DATEPICKER DATA-API
  * ================== */

        $(document).on('focus.datepicker.data-api click.datepicker.data-api', '[data-provide="datepicker"]', function (e) {
            var $this = $(this);
            if ($this.data('datepicker')) return;
            e.preventDefault();
            // component click requires us to explicitly show it
            datepickerPlugin.call($this, 'show');
        });
        $(function () {
            datepickerPlugin.call($('[data-provide="datepicker-inline"]'));
        });
    })(window.jQuery);
}();
