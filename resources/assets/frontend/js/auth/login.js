/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function ($) {
    "use strict";
    //Atrribute
    var attr = {
        aType: 'data-type',
        aId: 'data-id',
        aGet: 'data-get',
        aBase: 'data-base',
        aPath: 'data-path'
    };
    //Generate attribute
    var generate = function (attr, val) {
        return '[' + attr + '="' + val + '"]';
    };
    //Element in DOM
    var element = {
        body: 'body',
        loginForm: '#login',
        actionLogin: generate(attr.aId, 'action-login'),
        loginUsername: generate(attr.aId, 'login-username'),
        loginPass: generate(attr.aId, 'login-pass'),
        loginRemember: generate(attr.aId, 'remember-token')
    };
    var baseUrl = $(element.body).attr(attr.aBase);
    var urls = {};
    var settings = $.extend({
        //Convert to uppercase 
        convertCase: function (str) {
            var lower = str.toLowerCase();
            return lower.replace(/(^| )(\w)/g, function (x) {
                return x.toUpperCase();
            });
        },
        //Management action
        action: function (event, obj, callback) {
            $(document).on(event, obj, function () {
                callback($(this));
            });
        },
        checkAll: function (checkAll, checkOne) {
            if (this.root.length) {
                settings.action('click', checkAll, function (selector) {
                    var val = selector.val();
                    if (val === "off") {
                        selector.val('on');
                        $(checkOne).map(function () {
                            this.checked = true;
                        });
                    } else {
                        selector.val('off');
                        $(checkOne).map(function () {
                            this.checked = false;
                        });
                    }
                });
            }
        },
        popup: function (data) {
            var html = '<div class="modal fade" id="' + data.id + '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
                    '<div class="modal-dialog">' +
                    '<div class="modal-content">' +
                    '<div class="modal-header">' +
                    '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    '<h4 class="modal-title" id="myModalLabel">' + data.title + '</h4>' +
                    '</div>' +
                    '<div class="modal-body">';
            if (data.content && data.content !== "") {
                html += data.content;
            }
            html += '</div>' +
                    '<div class="modal-footer">';
            if (data.button && data.button !== "") {
                html += '<button type="button" class="btn btn-default" data-dismiss="modal">' + data.button + '</button>';
            }
            if (data.submit && data.submit !== "") {
                html += '<button type="button" class="btn btn-primary" data-type="query-actions" data-id="' + data.data_id + '">' + data.submit + '</button>';
            }
            html += '</div></div></div></div>';

            return html;
        },
        //Delay function
        delay: (function () {
            var timer = 0;
            return function (callback, ms) {
                clearTimeout(timer);
                timer = setTimeout(callback, ms);
            };
        })()
    });

    var fn = {
        init: function () {
            this.self = $(this);

            $(element.actionLogin).length ? fn.login.call(this) : 1 === 1;
        },
        login: function () {
            settings.action('click', element.actionLogin, function (selector) {

                var errorHtml = function (type, message) {
                    return '<div class="form-group ' + type + '"><div class="alert alert-danger" role="alert">' + message + '</div></div>';
                };

                var username = $(element.loginForm).find(element.loginUsername).val();
                var password = $(element.loginForm).find(element.loginPass).val();
                $(element.loginForm).find('.loginFormId').remove();
                $(element.loginForm).find('.loginFormPass').remove();

                if (username === '') {
                    $(element.loginForm).find(element.loginUsername).closest('.form-group').after(errorHtml('loginFormId', 'Tên đăng nhập không được để trống'));
                }

                if (password === '') {
                    $(element.loginForm).find(element.loginPass).closest('.form-group').after(errorHtml('loginFormPass', 'Mật khẩu không được để trống'))
                }

                if ((username !== '') && (password !== '')) {
                    var url = $(element.loginForm).attr(attr.aId);                    
                    var remember = 0;

                    ($(element.loginForm).find(element.loginRemember).is(':checked')) ? remember = 1 : remember = 0;

                    var data = {username: username, password: password, remember_token: remember};
                    fn.ajax(url, 'post', data, 'json', function (response) {
                        if (response.status === true) {                            
                            $(element.loginForm).modal('hide');
                            settings.delay(function(){
                                $('.login.fright').empty().append('Xin chào: <strong>'+ response.data.username +'</strong><a class="margin-left-20" href="'+ $('.login.fright').attr(attr.aId) +'"><button type="button" class="btn btn-danger"><i class="fa fa-power-off"></i>Thoát</button></a>');                                                                                
                            }, 500);                            
                        } else {
                            (response.messages.errors.common) ? $(element.loginForm).find('form').prepend(errorHtml('loginFormCommon', response.messages.errors.common)) : $(element.loginForm).find('.loginFormCommon').remove();
                            (response.messages.errors.username) ? $(element.loginForm).find(element.loginUsername).closest('.form-group').after(errorHtml('loginFormId', response.messages.errors.username)) : $(element.loginForm).find('.loginFormId').remove();
                            (response.messages.errors.password) ? $(element.loginForm).find(element.loginPass).closest('.form-group').after(errorHtml('loginFormPass', response.messages.errors.password)) : $(element.loginForm).find('.loginFormPass').remove();
                        }
                    });
                }
            });
        },
        //Management ajax
        ajax: function (url, type, data, dataType, response) {
            $.ajax({
                url: url,
                type: type,
                dataType: dataType,
                data: data,
                async: false,
                success: function (rs) {
                    response(rs);
                }
            });
        }
    };

    fn.init();

}(jQuery));



