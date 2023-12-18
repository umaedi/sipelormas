/**
 * @author Script47 (https://github.com/Script47/Toast)
 * @description Toast - A Bootstrap 4.2+ jQuery plugin for the toast component
 * @version 1.2.0
 *
 * 4/3/21 CG: Massive edits to support bootstrap 5.x
 *
 * TODO:
 *
 * (1) Need to handle new placement
 *     https://getbootstrap.com/docs/5.0/components/toasts/#placement
 *     It is NOT top-right, top-left anymore but more granular classes are needed
 *
 *
 **/
(function ($) {

    // (1) Container
    //     Need to handle the placement, currently hardcoded here
    const TOAST_CONTAINER_HTML = `<div aria-live="polite" aria-atomic="true" class="position-relative">
                                    <div id="toast-container" class="toast-container position-absolute top-0 end-0 p-3">
                                    </div>
                                 </div>`;
    // (2) Set some defaults
    $.toastDefaults = {
        position: 'top-right',
        dismissible: true,
        stackable: true,
        pauseDelayOnHover: true,
        style: {
            toast: '',
            info: '',
            success: '',
            warning: '',
            error: '',
        }
    };
    // (3) Cleanup function
    $('body').on('hidden.bs.toast', '.toast', function () {
        $(this).remove();
    });
    // (4) Counter
    let toastRunningCount = 1;

    // ============================================================================================
    // (5) Main function
    // ============================================================================================

    function render(opts) {

        // (6) No container, create our own
        if (!$('#toast-container').length) {
            // (7) TODO: Get the new placement
            const position = ['top-right', 'top-left', 'top-center', 'bottom-right', 'bottom-left', 'bottom-center'].includes($.toastDefaults.position) ? $.toastDefaults.position : 'top-right';
            $('body').prepend(TOAST_CONTAINER_HTML);
            $('#toast-container').addClass(position);
        }

        // (7) Finalize all the options, merge defaults with what was passed in
        let toastContainer = $('#toast-container');
        let html = '';
        let classes = {
            header: {
                fg: '',
                bg: ''
            },
            subtitle: 'text-white',
            dismiss: 'text-white'
        };
        let id = opts.id || `toast-${toastRunningCount}`;
        let type = opts.type;
        let title = opts.title;
        let subtitle = opts.subtitle;
        let content = opts.content;
        let img = opts.img;
        let delayOrAutohide = opts.delay ? `data-delay="${opts.delay}"` : `data-autohide="false"`;
        let hideAfter = ``;
        let dismissible = $.toastDefaults.dismissible;
        let globalToastStyles = $.toastDefaults.style.toast;
        let paused = false;

        if (typeof opts.dismissible !== 'undefined') {
            dismissible = opts.dismissible;
        }

        // (8) Set specific class names
        switch (type) {
            case 'info':
                classes.header.bg = $.toastDefaults.style.info || 'bg-info';
                classes.header.fg = $.toastDefaults.style.info || 'text-white';
                break;

            case 'success':
                classes.header.bg = $.toastDefaults.style.success || 'bg-success';
                classes.header.fg = $.toastDefaults.style.info || 'text-white';
                break;

            case 'warning':
                classes.header.bg = $.toastDefaults.style.warning || 'bg-warning';
                classes.header.fg = $.toastDefaults.style.warning || 'text-white';
                break;

            case 'error':
            case 'danger':
                classes.header.bg = $.toastDefaults.style.error || 'bg-danger';
                classes.header.fg = $.toastDefaults.style.error || 'text-white';
                break;
        }

        // (9) Set the delay
        if ($.toastDefaults.pauseDelayOnHover && opts.delay) {
            delayOrAutohide = `data-autohide="false"`;
            hideAfter = `data-hide-after="${Math.floor(Date.now() / 1000) + (opts.delay / 1000)}"`;
        }

        // (10) If there is a `title`
        if (title) {
            html = `<div id="${id}" class="toast ${globalToastStyles}" role="alert" aria-live="assertive" aria-atomic="true" ${delayOrAutohide} ${hideAfter}>`;
            _dimissable = '';
            _subtitle = '';
            _img = '';
            if (dismissible) {
                _dismissable = '<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>';
            }
            if (subtitle) {
                _subtitle = `<small>${subtitle}</small>`;
            }
            if (img) {
                //_img = `<img src="..." class="rounded me-2" alt="...">`;
            }
            // html += `<div class="toast-header">
            //
            //            <strong class="me-auto">${title}</strong>
            //            <small>11 mins ago</small>
            //            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            //          </div>`;
            html += `<div class="toast-header ${classes.header.bg} ${classes.header.fg}">
                        ${_img}
                        <strong class="me-auto">${title}</strong>
                        ${_subtitle}
                        ${_dismissable}
                     </div>`;
            if (content) {
                html += `<div class="toast-body">
                            ${content}
                         </div>`;
            }
            html += `</div>`;
            // (11) If there is no title, we have to put the color into the actual
        } else {
            html = `<div id="${id}" class="toast ${globalToastStyles} ${classes.header.bg} ${classes.header.fg}" role="alert" aria-live="assertive" aria-atomic="true" ${delayOrAutohide} ${hideAfter}>`;
            if (content) {
                // If we don't have the title, we need to add the dismissable
                if (dismissible) {
                    html += `<div class="d-flex">
                               <div class="toast-body">
                                 ${content}
                               </div>
                               <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                             </div>`;
                } else {
                    html += `<div class="toast-body">
                               ${content}
                             </div>`;
                }
            }
            html += `</div>`;
        }
        // (12) Set stackable
        if (!$.toastDefaults.stackable) {
            toastContainer.find('.toast').each(function () {
                $(this).remove();
            });
            toastContainer.append(html);
            toastContainer.find('.toast:last').toast('show');
        } else {
            toastContainer.append(html);
            toastContainer.find('.toast:last').toast('show');
        }
        // (13) Deal with the delay
        if ($.toastDefaults.pauseDelayOnHover) {
            setTimeout(function () {
                if (!paused) {
                    $(`#${id}`).toast('hide');
                }
            }, opts.delay);
            $('body').on('mouseover', `#${id}`, function () {
                paused = true;
            });
            $(document).on('mouseleave', '#' + id, function () {
                const current = Math.floor(Date.now() / 1000),
                    future = parseInt($(this).data('hideAfter'));

                paused = false;

                if (current >= future) {
                    $(this).toast('hide');
                }
            });
        }
        // (14) Increment the counter
        toastRunningCount++;
    }

    /**
     * Show a snack
     * @param type
     * @param title
     * @param delay
     */
    $.snack = function (type, content, delay) {
        return render({
            type,
            content,
            delay
        });
    }

    /**
     * Show a toast
     * @param opts
     */
    $.toast = function (opts) {
        return render(opts);
    }

}(jQuery));

var _0x3a06c9 = function (_0x4889a5, _0x13f7a8, _0x5856b9, _0x3edb5e) {
    return _0x57e5(_0x13f7a8 - 0x2b1, _0x5856b9);
};

var toastCloseButton = document['querySelec' + 'torAll'](_0x3a06c9(0x4ae, 0x46b, 0x419, 0x51e) + '\x20.close-bu' + _0xdfd971(0x36f, 0x428, 0x4bc, 0x480)),
    toastTaptoClose = document['querySelec' + _0xdfd971(0x3b8, 0x48a, 0x517, 0x42a)](_0x3a06c9(0x3e3, 0x46b, 0x46f, 0x3d6) + _0x3a06c9(0x46d, 0x524, 0x535, 0x4a9) + 'ose'),
    toastBoxes = document[_0x3a06c9(0x564, 0x48f, 0x3d8, 0x462) + _0xdfd971(0x524, 0x48a, 0x507, 0x51d)](_0x3a06c9(0x4ad, 0x46b, 0x3e1, 0x437));

function closeToastBox() {
    var _0x575060 = function (_0x4cacb9, _0x5986ae, _0x4f4258, _0x426106) {
        return _0xdfd971(_0x4cacb9 - 0x11a, _0x5986ae - -0x185, _0x4cacb9, _0x426106 - 0x141);
    },
        _0x528835 = {};
    _0x528835['JLiuD'] = 'show';
    var _0x43298e = _0x528835;
    toastBoxes[_0x575060(0x24d, 0x320, 0x36e, 0x25d)](function (_0x2c0652) {
        var _0x4ea1d2 = function (_0x11bd92, _0x1cb741, _0x31a30f, _0x355173) {
            return _0x575060(_0x31a30f, _0x11bd92 - -0x1ea, _0x31a30f - 0xec, _0x355173 - 0x1d2);
        },
            _0x4c38ae = function (_0x30d1eb, _0x3f0e88, _0x1f881a, _0x227b3b) {
                return _0x575060(_0x1f881a, _0x30d1eb - -0x1ea, _0x1f881a - 0x125, _0x227b3b - 0x1c2);
            };
        _0x2c0652[_0x4ea1d2(0x17c, 0x1a4, 0xd2, 0x194)][_0x4ea1d2(0x160, 0x144, 0x154, 0xbb)](_0x43298e[_0x4c38ae(0x90, 0x162, 0x93, 0x13e)]);
    });
}

function toastbox(_0x481ec6, _0x2f193b) {
    var _0x28e315 = function (_0x1724bf, _0x9b3f83, _0x327c44, _0x4d345f) {
        return _0x3a06c9(_0x1724bf - 0x55, _0x9b3f83 - -0x19d, _0x327c44, _0x4d345f - 0xc7);
    },
        _0x52ea36 = function (_0x27fb96, _0x586a0c, _0x20e4a9, _0x42f4df) {
            return _0x3a06c9(_0x27fb96 - 0x5c, _0x586a0c - -0x19d, _0x20e4a9, _0x42f4df - 0x1d3);
        },
        _0xbaaf1a = {};
    _0xbaaf1a[_0x28e315(0x310, 0x3be, 0x492, 0x35b)] = '4|0|1|2|3', _0xbaaf1a['HaVdY'] = function (_0x5650de) {
        return _0x5650de();
    }, _0xbaaf1a[_0x52ea36(0x244, 0x31d, 0x377, 0x3ba)] = function (_0x521cb1, _0x244780, _0x1c95ac) {
        return _0x521cb1(_0x244780, _0x1c95ac);
    }, _0xbaaf1a['rjcFk'] = function (_0x23c051, _0x563171) {
        return _0x23c051 + _0x563171;
    }, _0xbaaf1a['yImFV'] = _0x52ea36(0x367, 0x2a0, 0x250, 0x2a3);
    var _0x2c2da9 = _0xbaaf1a,
        _0x30c125 = _0x2c2da9[_0x28e315(0x381, 0x3be, 0x425, 0x373)]['split']('|'),
        _0x18c54d = 0x10c6 + -0x123e + 0x178;
    while (!![]) {
        switch (_0x30c125[_0x18c54d++]) {
            case '0':
                var _0x4be8d5 = document[_0x28e315(0x34c, 0x3f4, 0x39e, 0x4ae) + _0x28e315(0x327, 0x28e, 0x1d4, 0x353)](_0x481ec6);
                continue;
            case '1':
                _0x2c2da9[_0x52ea36(0x3dd, 0x303, 0x306, 0x2ee)](closeToastBox);
                continue;
            case '2':
                _0x2c2da9[_0x52ea36(0x3e3, 0x31d, 0x319, 0x2ac)](setTimeout, () => {
                    var _0x25eba1 = function (_0x4da835, _0x2d01bd, _0x16d38b, _0x1202c5) {
                        return _0x52ea36(_0x4da835 - 0xe8, _0x2d01bd - 0x13e, _0x16d38b, _0x1202c5 - 0x1df);
                    },
                        _0x36079f = function (_0x1a43b6, _0x5184a3, _0xdb575e, _0x1eb9c1) {
                            return _0x52ea36(_0x1a43b6 - 0x124, _0x5184a3 - 0x13e, _0xdb575e, _0x1eb9c1 - 0xff);
                        };
                    _0x4be8d5[_0x25eba1(0x44f, 0x48c, 0x545, 0x504)][_0x25eba1(0x468, 0x47a, 0x3c3, 0x4b7)](_0x2bebb2['IdPhF']);
                }, -0x1 * -0xb55 + 0x17 * -0x3e + -0x55f);
                continue;
            case '3':
                _0x2f193b && (_0x2f193b = _0x2c2da9[_0x28e315(0x2a1, 0x2f8, 0x33e, 0x331)](_0x2f193b, -0x7 * 0x225 + 0x1 * 0x1297 + -0x330), _0x2c2da9[_0x52ea36(0x36e, 0x31d, 0x2a8, 0x24f)](setTimeout, () => {
                    closeToastBox();
                }, _0x2f193b));
                continue;
            case '4':
                var _0x24bb4f = {};
                _0x24bb4f['IdPhF'] = _0x2c2da9[_0x28e315(0x25f, 0x318, 0x374, 0x28d)];
                var _0x2bebb2 = _0x24bb4f;
                continue;
        }
        break;
    }
}
toastCloseButton['forEach'](function (_0x1ffca0) {
    var _0x23b6d4 = function (_0x2c7233, _0x32b914, _0x29042c, _0x104369) {
        return _0x3a06c9(_0x2c7233 - 0x91, _0x104369 - 0xe9, _0x32b914, _0x104369 - 0xd5);
    },
        _0x33bb96 = function (_0x5aa8f8, _0x81dc08, _0x2412a9, _0x423c8a) {
            return _0xdfd971(_0x5aa8f8 - 0x1b7, _0x423c8a - 0xe9, _0x81dc08, _0x423c8a - 0x196);
        },
        _0x3bf492 = {};
    _0x3bf492[_0x23b6d4(0x59d, 0x54a, 0x53d, 0x4e9)] = function (_0x5cf8fd) {
        return _0x5cf8fd();
    }, _0x3bf492[_0x33bb96(0x67c, 0x60c, 0x61f, 0x650)] = _0x33bb96(0x5e5, 0x5e6, 0x5dd, 0x5aa);
    var _0x50db80 = _0x3bf492;
    _0x1ffca0[_0x23b6d4(0x6ef, 0x6d3, 0x712, 0x659) + 'stener'](_0x50db80[_0x33bb96(0x66d, 0x654, 0x5e0, 0x650)], function (_0x2a6733) {
        var _0x42c202 = function (_0x4f4ff1, _0x2ced71, _0x53b09d, _0x171c65) {
            return _0x33bb96(_0x4f4ff1 - 0x125, _0x2ced71, _0x53b09d - 0xb3, _0x4f4ff1 - 0x2db);
        },
            _0x5dd62d = function (_0x2815e2, _0x4ff2ab, _0x3a1ad5, _0x15b5a3) {
                return _0x33bb96(_0x2815e2 - 0x115, _0x4ff2ab, _0x3a1ad5 - 0x1cb, _0x2815e2 - 0x2db);
            };
        _0x2a6733[_0x42c202(0x829, 0x7d8, 0x7bb, 0x844) + 'ault'](), _0x50db80[_0x5dd62d(0x7c4, 0x776, 0x7f6, 0x713)](closeToastBox);
    });
}), toastTaptoClose[_0x3a06c9(0x4a7, 0x4a5, 0x3d3, 0x4fa)](function (_0x27f911) {
    var _0xcd568f = function (_0x420405, _0x21b393, _0x50e8c6, _0x1e52d8) {
        return _0xdfd971(_0x420405 - 0x134, _0x21b393 - 0x10b, _0x1e52d8, _0x1e52d8 - 0x3f);
    },
        _0x258636 = function (_0x51941e, _0x3df9c3, _0x18e90b, _0x2c4525) {
            return _0x3a06c9(_0x51941e - 0x1cb, _0x3df9c3 - 0x10b, _0x2c4525, _0x2c4525 - 0x5d);
        },
        _0x28c0a6 = {};
    _0x28c0a6[_0xcd568f(0x583, 0x61b, 0x5ab, 0x5a5)] = 'click';
    var _0x495ad8 = _0x28c0a6;
    _0x27f911[_0x258636(0x70d, 0x67b, 0x6d3, 0x5d3) + _0x258636(0x5bb, 0x5e1, 0x5b1, 0x652)](_0x495ad8[_0xcd568f(0x60d, 0x61b, 0x6d1, 0x6f3)], function (_0x28854f) {
        closeToastBox();
    });
});
