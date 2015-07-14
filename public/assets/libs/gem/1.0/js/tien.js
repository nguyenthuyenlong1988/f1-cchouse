/*jslint -W069, strict: true, browser: false, nomen: true */
/*global module, define, console, Expo */

/**
 * Created by Tien Nguyen on 2015/07/08 22:39.
 */

/**
 * TienJS JavaScript Library class.
 *
 * JSLint options:
 *      -W069: ignore dot-notation issue.
 *      browser: `true` if the standard browser globals should be predefined.
 *      nomen: `true` if tolerate dangling _ in identifiers.
 *
 */

// Helps ensure compatibility with AMD/RequireJS and CommonJS/Node.
var
    _hasModule = typeof module === 'object' && typeof module.exports === 'object',
    _tienScope = (_hasModule && typeof global !== 'undefined') ? global : this || window;

(function (global, factory)
{
    'use strict';

    var _module = _hasModule ? module : null;

    if (_module) {
        // For CommonJS and CommonJS-like environments where a proper window is present,
        // execute the factory and get TienJS.
        _module.exports = global.document ? factory(global) : function (_window)
        {
            if (!_window.document) {
                throw new Error('TienJS requires a window with a document.');
            }
            return factory(_window);
        };
    }
    else {
        global.TienJS = factory(global);
    }

}(_tienScope, function (global)
{
    'use strict';

    var
        _jquery = global['jQuery'],
        _tweenMax = global['TweenMax'],
        _factory = function (jquery, tweenMax)
        {
            if (!jquery) {
                throw new Error('TienJS requires jQuery library (http://jquery.com).');
            }
            if (!tweenMax) {
                throw new Error('TienJS requires TweenMax library (http://www.greensock.com).');
            }

            var
                version = '1.0',

            // Define a local copy of TienJS.
                _TienJS = global['TienJS'] || {},

            // Some methods.
                log = global.console ?
                    function (s, isDebug)
                    {
                        if (isDebug === false) return;

                        if (_TienJS.debug) {
                            console.log(s);
                        }
                    }
                    : function ()
                {
                },
                error = global.console ?
                    function (s)
                    {
                        console.error(s);
                    }
                    : function ()
                {
                },
                printObj = JSON !== 'undefined' ? JSON.stringify : function (obj)
                {
                    var arr = [];
                    jquery.each(obj, function (key, val)
                    {
                        var next = key + ': ';
                        next += jquery.isPlainObject(val) ? printObj(val) : val;
                        arr.push(next);
                    });
                    return '{ ' + arr.join(', ') + ' }';
                },

            // Util object include static functions.
                Util = {
                    inIframe: function ()
                    {
                        return global.self !== global.top;
                    },

                    isTouchDevice: function ()
                    {
                        return !!(global.hasOwnProperty('ontouchstart')) || !!global.navigator['msMaxTouchPoints'];
                    },

                    hexToRgb: function (hex)
                    {
                        var
                            shortFormat = /^#?([a-f\d])([a-f\d])([a-f\d])$/i,
                            fullFormat = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i,
                            result;
                        /*jslint unparam: true*/
                        hex = hex.replace(shortFormat, function (m, r, g, b)
                        {
                            /*jshint unused:true*/
                            return r + r + g + g + b + b;
                        });

                        /*jslint unparam: false*/
                        result = fullFormat.exec(hex);
                        return result ?
                        {
                            r       : parseInt(result[1], 16),
                            g       : parseInt(result[2], 16),
                            b       : parseInt(result[3], 16),
                            toString: function ()
                            {
                                return 'rgb(' + this.r + ',' + this.g + ',' + this.b + ')';
                            }
                        }
                            : null;
                    },

                    rgbToRgba: function (rgb, alpha)
                    {
                        var format = /([\w\W]*?)rgb\((\d+), (\d+), (\d+)\)/.exec(rgb),
                            parsedRgb;
                        if (!format) {
                            return null;
                        }
                        parsedRgb = format.splice(2, 4).join(',');
                        return 'rgba(' + parsedRgb + ',' + alpha + ')';
                    },

                    resetInput: function (el)
                    {
                        var $el = jquery(el);
                        $el.wrap('<form>').closest('form').get(0).reset();
                        $el.unwrap();
                    }
                }, // Util

                Eventor = {},

            // BaseInitor class.
                BaseInitor = function (config)
                {
                    this.description = 'BaseInitor class for TienJS JavaScript Library';
                    this.config = jquery.extend(true, this.config || {}, config);
                    this.globals();
                },

            // Initor class.
                Initor = function (config)
                {
                    BaseInitor.call(this, config);
                    this.description = 'Initor class for TienJS JavaScript Library';
                };

            BaseInitor.fn = BaseInitor.prototype;

            BaseInitor.fn.globals = function ()
            {
                _TienJS.version = version;
                _TienJS.global = global;
                _TienJS.config = global['cfg'] || {};
                _TienJS.debug = _TienJS.config['js_debug'] || false;
                _TienJS.log = log;
                _TienJS.error = error;
                _TienJS.printObj = printObj;

                _TienJS.$win = jquery(global);
                _TienJS.$doc = jquery(global.document);
                _TienJS.$body = jquery('body');
            };

            Initor.prototype = new BaseInitor(); // or Object.create(BaseInitor.prototype);

            /* assign to alias */
            _TienJS.BaseInitor = BaseInitor;
            _TienJS.Initor = Initor;
            _TienJS.Eventor = Eventor;
            _TienJS.Util = Util;
            //don't need: _TienJS.global.TienJS = _TienJS;


// Util.StandByMode ==========================================================

            /**
             * StandByMode object for saving energy.
             *
             * @param parentElement
             * @param time
             * @param lang
             * @constructor
             */
            Util.StandByMode = function (parentElement, time, lang)
            {
                var
                    self = this;

                self.$parentEl = parentElement instanceof jquery ? parentElement : jquery(parentElement);
                self.time = time;
                self.lang = lang;
            };

            var _StandByMode = Util.StandByMode;

            _StandByMode.prototype = {
                namespace      : 'util_standByMode',
                debug          : _TienJS.config['js_standbymode_debug'],
                idleTime       : 0,
                standby        : false,
                template       : '<div id="UIStandBy"></div>',
                $template      : null,
                timer          : null,
                top            : 0,
                init           : function ()
                {
                    // log
                    _TienJS.log('[StandByMode] init()', this.debug);

                    if (typeof jquery === 'undefined') {
                        _TienJS.error('StandByMode needs jQuery library.');
                        return;
                    }

                    // declare
                    var
                        self = this,
                        $win = _TienJS.$win,
                        $doc = _TienJS.$doc,
                        $template = jquery(self.template);

                    function h_win_onResize()
                    {
                        _TienJS.log('[window] resize', self.debug);

                        self.$template.css({height: $win.height()});
                    }

                    function h_win_onMouseOver()
                    {
                        _TienJS.log('[window] mouseover', self.debug);

                        self.stop();
                    }

                    function h_doc_onKeyPress()
                    {
                        _TienJS.log('[document] keypress', self.debug);

                        self.stop();
                    }

                    // logic
                    self.$template = $template;
                    self.resetTimer(self, true);

                    // assign events
                    $win.on('resize.' + self.namespace, h_win_onResize);
                    $win.on('mouseover.' + self.namespace, h_win_onMouseOver);
                    $win.on('keypress.' + self.namespace, $doc, h_doc_onKeyPress);

                    return self;
                },
                checkInactivity: function ()
                {
                    // log
                    _TienJS.log('[StandByMode] checkInactivity()', this.debug);

                    // declare
                    var self = this;

                    // logic
                    self.idleTime += 10;
                    _TienJS.log('[StandByMode] idle time: ', self.debug);

                    if (self.idleTime >= self.time) {
                        self.start();
                    }
                },
                start          : function ()
                {
                    // log
                    _TienJS.log('[StandByMode] start()', this.debug);

                    if (!this.standby) {
                        // declare
                        var self = this;

                        // logic
                        self.standby = true;
                        self.resetTimer(self);
                        self.setScreen('off');
                    }
                },
                stop           : function ()
                {
                    // log
                    _TienJS.log('[StandByMode] stop()', this.debug);

                    this.resetTimer(this, true);

                    if (this.standby) {
                        // declare
                        var self = this;

                        // logic
                        self.standby = false;
                        self.setScreen('on');
                    }
                },
                restart        : function ()
                {
                    _TienJS.log('[StandByMode] restart()', this.debug);

                    var self = this;

                    self.resetTimer(self, true);
                },
                exit           : function ()
                {
                    _TienJS.log('[StandByMode] exit()', this.debug);

                    var
                        self = this,
                        $win = _TienJS.$win;

                    self.standby = false;
                    $win.off('.' + self.namespace);
                    self.resetTimer(self);
                },
                resetTimer     : function (self, hasFunc)
                {
                    _TienJS.log('[StandByMode] resetTimer()' + (hasFunc ? ' and set handler' : ''), this.debug);

                    self.idleTime = 0;
                    clearInterval(self.timer);
                    if (hasFunc) {
                        self.timer = setInterval(
                            function ()
                            {
                                self.checkInactivity();
                            },
                            10000
                        );
                    }
                },
                setScreen      : function (on_off)
                {
                    // declare
                    var
                        self = this,
                        $win = _TienJS.$win,
                        $doc = _TienJS.$doc,
                        tween = _TienJS.tween,
                        $template = self.$template,
                        $uiGlobal = jquery('#UIGlobal');

                    // logic
                    if (on_off === 'on') {
                        tween.to($template, 0.55,
                            {
                                ease      : Expo.easeInOut,
                                top       : '50%',
                                left      : '50%',
                                width     : 0,
                                height    : 0,
                                onComplete: function ()
                                {
                                    $template.hide();
                                    $template.remove();
                                }
                            });
                        $uiGlobal.removeClass('INoVScroll');
                        $doc.scrollTop(Math.abs(self.top));
                    }

                    if (on_off === 'off') {
                        self.top = -$doc.scrollTop();

                        self.$parentEl.append($template);
                        $uiGlobal.css({top: self.top}).addClass('INoVScroll');
                        $template.show();
                        tween.to($template, 0.35,
                            {
                                ease  : Expo.easeInOut,
                                top   : '0%',
                                left  : '0%',
                                width : '100%',
                                height: $win.height()
                            });
                    }
                }
            };


// Util.ConfirmDialog ========================================================

            /**
             * Native confirm dialog.
             *
             * @param message
             * @constructor
             */
            Util.ConfirmDialog = function (message)
            {
                this.__construct(message);
            };

            var _ConfirmDialog = Util.ConfirmDialog;

            _ConfirmDialog.DEFAULT = {
                formSubmitting: false,
                message       : 'Nếu bạn đang soạn thảo/cập nhật nội dung, ' +
                'thì nên lưu lại nội dung trước khi chuyển sang trang khác. ' +
                'Nếu không nội dung sẽ bị mất!'
            };
            _ConfirmDialog.instance = null;
            _ConfirmDialog.option = {};
            _ConfirmDialog.active = function (message)
            {
                if (!_ConfirmDialog.instance) {
                    _ConfirmDialog.instance = new _ConfirmDialog(message);
                }

                return _ConfirmDialog.instance.active();
            };
            _ConfirmDialog.deactive = function ()
            {
                return _ConfirmDialog.instance.deactive();
            };

            _ConfirmDialog.prototype = {
                __construct: function (message)
                {
                    var
                        self = this,
                        option = {
                            message: message || _ConfirmDialog.DEFAULT.message
                        };

                    $.extend(_ConfirmDialog.option, _ConfirmDialog.DEFAULT, option);
                    self.deactive();
                },

                _setOption: function (option)
                {
                    $.extend(_ConfirmDialog.option, option);
                },

                active: function ()
                {
                    var
                        self = this,
                        _onBeforeUnload = function (e)
                        {
                            var option = _ConfirmDialog.option;

                            if (option.formSubmitting) {
                                return;
                            }

                            (e || global.event).returnValue = option.message; //Gecko + IE
                            return option.message; //Gecko + Webkit, Safari, Chrome etc.
                        };

                    self._setOption({formSubmitting: false});

                    global.onload = function ()
                    {
                        global.addEventListener('beforeunload', _onBeforeUnload);
                    };

                    return self;
                },

                deactive: function ()
                {
                    this._setOption({formSubmitting: true});
                    return this;
                }
            };

            // #end Util.ConfirmDialog

            return _TienJS;
        };

    // Register as a named AMD module, since TienJS can be concatenated with other
    // files that may use define, but not via a proper concatenation script that
    // understands anonymous AMD modules. A named AMD is safest and most robust
    // way to register.
    if (typeof define === 'function' && define.amd) {
        define('tienjs', ['jquery', 'tweenmax'], function (jquery, tweenmax)
        {
            return _factory(jquery, tweenmax);
        });
    }
    else {
        return _factory(_jquery, _tweenMax);
    }

}));

(function (global)
{

    // DEFINE STATIC FUNCTIONS
    var
        _$ = global.jQuery,
        _TienJS = global.TienJS,
        _cfg = _TienJS.config,
        _func = {};

    /**
     * Show confirm dialog on delete record.
     *
     * @param post_id
     * @param post_title
     * @param _token
     */
    _func.cfmOnDeletePost = function (post_id, post_title, _token)
    {
        var str =
            // @formatter:off
            '<div class="modal fade">' +
                '<div class="modal-dialog">' +
                    '<div class="modal-content">' +
                        '<div class="modal-header">' +
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<h4 class="modal-title">Xóa bài viết #' + post_id + '</h4>' +
                        '</div>' +
                        '<div class="modal-body">' +
                            '<p>Bạn muốn xóa bài viết này?</p>' +
                            '<p>#<strong>' + post_id + '</strong><br /><strong>' + post_title + '</strong></p>' +
                        '</div>' +
                        '<div class="modal-footer">' +
                            '<form method="POST" action="' + _cfg['page_base_url'] + '/@dmin-zone/posts/' + post_id + '" accept-charset="' + _cfg['page_charset'] + '">' +
                                '<input type="hidden" name="_method" value="DELETE">' +
                                '<input type="hidden" name="_token" value="' + _token + '">' +
                                '<button type="button" class="btn btn-primary" data-dismiss="modal">Không, đừng xóa</button>' +
                                '<button class="btn btn-default">Đồng ý xóa</button>' +
                            '</form>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>';
            // @formatter:on

        _$(str).on('hidden.bs.modal', function ()
        {
            _$(this).remove();
        }).modal();
    };

    /**
     * Reset a element on form.
     *
     * @param el
     */
    _func.postResetInput = function (el)
    {
        _func.resetInput(el);
        _$('#post_avatar').val('');
        _$('.post-avatar img').attr('src', 'assets/img/blank.gif');
    };

    /**
     * Reset HTML input[text] and input[file] control.
     *
     * @param el
     */
    _func.resetInput = function (el)
    {
        var $el = _$(el);
        $el.wrap('<form>').closest('form').get(0).reset();
        $el.unwrap();
    };

    /**
     * Ajax upload image.
     *
     * @param input
     * @param options
     */
    _func.ajaxUploadImage = function (input, options)
    {
        if (!global['FormData']) {
            _TienJS.log('Your browser is not support File API.');
            return;
        }

        var
            _options = options || {},
            formData = new FormData();

        formData.append('file', input.files[0]);

        _$.ajax({
            url        : _cfg['api_url'] + '/_upload_image.py',
            type       : 'POST',
            data       : formData,
            dataType   : 'json',
            cache      : false,
            processData: false,
            contentType: false,
            success    : _options.success || null,
            error      : function (jqXHR, textStatus, errorThrown)
            {
                // Handle errors here
                _TienJS.log('ERRORS: ' + textStatus);
            }
        });
    };


    global._func = _func;

}(_tienScope));
