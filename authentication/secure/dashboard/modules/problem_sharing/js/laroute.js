(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"home","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"donner","name":null,"action":"App\Http\Controllers\HomeController@index"},{"host":null,"methods":["POST"],"uri":"auth\/register\/{one?}\/{two?}\/{three?}\/{four?}\/{five?}","name":null,"action":"App\Http\Controllers\Auth\AuthController@postRegister"},{"host":null,"methods":["GET","HEAD"],"uri":"auth\/register\/{one?}\/{two?}\/{three?}\/{four?}\/{five?}","name":null,"action":"App\Http\Controllers\Auth\AuthController@getRegister"},{"host":null,"methods":["GET","HEAD"],"uri":"auth\/login\/{one?}\/{two?}\/{three?}\/{four?}\/{five?}","name":null,"action":"App\Http\Controllers\Auth\AuthController@getLogin"},{"host":null,"methods":["POST"],"uri":"auth\/login\/{one?}\/{two?}\/{three?}\/{four?}\/{five?}","name":null,"action":"App\Http\Controllers\Auth\AuthController@postLogin"},{"host":null,"methods":["GET","HEAD"],"uri":"auth\/logout\/{one?}\/{two?}\/{three?}\/{four?}\/{five?}","name":null,"action":"App\Http\Controllers\Auth\AuthController@getLogout"},{"host":null,"methods":["GET","HEAD","POST","PUT","PATCH","DELETE"],"uri":"auth\/{_missing}","name":null,"action":"App\Http\Controllers\Auth\AuthController@missingMethod"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/email\/{one?}\/{two?}\/{three?}\/{four?}\/{five?}","name":null,"action":"App\Http\Controllers\Auth\PasswordController@getEmail"},{"host":null,"methods":["POST"],"uri":"password\/email\/{one?}\/{two?}\/{three?}\/{four?}\/{five?}","name":null,"action":"App\Http\Controllers\Auth\PasswordController@postEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{one?}\/{two?}\/{three?}\/{four?}\/{five?}","name":null,"action":"App\Http\Controllers\Auth\PasswordController@getReset"},{"host":null,"methods":["POST"],"uri":"password\/reset\/{one?}\/{two?}\/{three?}\/{four?}\/{five?}","name":null,"action":"App\Http\Controllers\Auth\PasswordController@postReset"},{"host":null,"methods":["GET","HEAD","POST","PUT","PATCH","DELETE"],"uri":"password\/{_missing}","name":null,"action":"App\Http\Controllers\Auth\PasswordController@missingMethod"},{"host":null,"methods":["GET","HEAD"],"uri":"needy","name":null,"action":"App\Http\Controllers\ProblemController@needyForm"},{"host":null,"methods":["POST"],"uri":"needy","name":null,"action":"App\Http\Controllers\ProblemController@save"},{"host":null,"methods":["POST"],"uri":"donate-money-req\/{id}","name":null,"action":"App\Http\Controllers\DonnerController@returnDonateMoneyView"},{"host":null,"methods":["GET","HEAD"],"uri":"donate-money-req\/{id}","name":null,"action":"Closure"},{"host":null,"methods":["POST"],"uri":"donate-money","name":null,"action":"App\Http\Controllers\DonnerController@charge"},{"host":null,"methods":["POST"],"uri":"donate-money-main","name":null,"action":"App\Http\Controllers\DonnerController@saveDetails"},{"host":null,"methods":["POST"],"uri":"donate-things-req\/{id}","name":null,"action":"Closure"},{"host":null,"methods":["POST"],"uri":"update-donner-dashboard","name":null,"action":"App\Http\Controllers\DonnerController@updateDashboard"},{"host":null,"methods":["POST"],"uri":"remove-cookie","name":null,"action":"App\Http\Controllers\DonnerController@destroyCookie"},{"host":null,"methods":["POST"],"uri":"\/","name":null,"action":"App\Http\Controllers\HomeController@getStats"},{"host":null,"methods":["GET","HEAD"],"uri":"problems\/{id}","name":null,"action":"Closure"},{"host":null,"methods":["POST"],"uri":"submit-things","name":null,"action":"App\Http\Controllers\DonnerController@saveThingsForm"},{"host":null,"methods":["GET","HEAD"],"uri":"problems","name":null,"action":"Closure"},{"host":null,"methods":["POST"],"uri":"problems\/{id}\/solved","name":null,"action":"App\Http\Controllers\ProblemController@solved"},{"host":null,"methods":["POST"],"uri":"problems\/{id}\/cancel","name":null,"action":"App\Http\Controllers\ProblemController@cancel"},{"host":null,"methods":["GET","HEAD"],"uri":"test","name":null,"action":"App\Http\Controllers\HomeController@test"},{"host":null,"methods":["POST"],"uri":"test","name":null,"action":"Closure"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                return this.getCorrectUrl(uri + qs);
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if(!this.absolute)
                    return url;

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

