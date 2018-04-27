
import Vue from 'vue'
let app = new Vue({
    el: '#helper',
    data: {
        user: {},
        model: {},
        rolls: [],
        colors: [],
        errors: {},
        module: {},
        company: {},
        companies: [],
        typography: {},
        service: {},
        modules: [],
        fields: [],
        is_spining: false
    },
    mounted() {
        this.sessionChange()
    },
    methods: {

        // Json Data
        sessionChange: function(value, defaultValue){
            var _this = this
            if(_this.getCookie('company')) _this.company = _this.fromJson(_this.getCookie('company'))
            else _this.company = {}
            if(_this.getCookie('colors')) _this.colors = _this.fromJson(_this.getCookie('colors'))
            else _this.colors = []
            if(_this.getCookie('user')) _this.user = _this.fromJson(_this.getCookie('user'))
            else _this.user = {}
            if(_this.getCookie('rolls')) _this.rolls = _this.fromJson(_this.getCookie('rolls'))
            else _this.rolls = []
            if(_this.getCookie('companies')) _this.companies = _this.fromJson(_this.getCookie('companies'))
            else _this.companies = []
            if(_this.getCookie('service')) _this.service = _this.fromJson(_this.getCookie('service'))
            else _this.service = {}
            if(_this.getCookie('modules')) _this.modules = _this.fromJson(_this.getCookie('modules'))
            else _this.modules = []
            if(_this.getCookie('fields')) _this.fields = _this.fromJson(_this.getCookie('fields'))
            else _this.fields = []
            if(_this.getCookie('module')) _this.module = _this.fromJson(_this.getCookie('module'))
            else _this.module = {}
            if(_this.getCookie('model')) _this.model = _this.fromJson(_this.getCookie('model'))
            else _this.model = {}
            if(_this.getCookie('typography')) _this.typography = _this.fromJson(_this.getCookie('typography'))
            else _this.typography = {}
        },

        // Set Service
        sessionService: function(service_id){
            var _this = this
            _this.ajax(window.api+'/service/find', {
                service_id: service_id
            })
            .then(function (response) {
                if(response)
                    _this.setCookie('service', _this.toJson(response))
                if(response.modules)
                    _this.setCookie('modules', _this.toJson(response.modules))
                _this.sessionChange()
            })
            .catch(error => {
                if(error.status==401)
                    _this.authPromise()
                        .then(function () { _this.sessionService() })
                //else window.location.href = '#/home'
            })
        },

        // Set Service
        sessionModule: function(module_id){
            var _this = this
            _this.ajax(window.api+'/module/find', {
                module_id: module_id
            })
            .then(function (response) {
                if(response)
                    _this.setCookie('module', _this.toJson(response))
                if(response.model)
                    _this.setCookie('model', _this.toJson(response.model))
                _this.sessionChange()
            })
            .catch(error => {
                if(error.status==401)
                    _this.authPromise()
                        .then(function (response) { _this.sessionModule() })
                //else window.location.href = '#/home'
            })
        },

        // Basic Web
        back: function(){ window.history.back() },
        refresh: function(){ location.reload() },
        web: function(url=''){ return window.web+url },
        spin: function(){ this.is_spining = !this.is_spining },
        spin_on: function(){ this.is_spining = true },
        spin_off: function(){ this.is_spining = false },

        // Json Compiler
        fromJson: function(value, defaultValue){
            if (value==null) return defaultValue
            return JSON.parse(value)
        },
        toJson: function(value, defaultValue){
            if (value==null) return defaultValue
            return JSON.stringify(value)
        },

        // Cookie Manager
        setCookie: function(cname, cvalue){
            if (typeof(Storage) !== "undefined") {
                localStorage.setItem(cname, cvalue)
            } else {
                alert('Sorry! No Web Storage support..')
            }
        },
        getCookie: function(cname){
            if (typeof(Storage) !== "undefined") {
                return localStorage.getItem(cname)
            } else {
                alert('Sorry! No Web Storage support..')
            }
        },
        deleteCookie: function(cname){
            if (typeof(Storage) !== "undefined") {
                return localStorage.removeItem(cname)
            } else {
                alert('Sorry! No Web Storage support..')
            }
        },

        // Error Handlar
        hasErrors: function(field){ return this.errors.hasOwnProperty(field) },
        getErrors: function(field){ if(this.errors[field]){ return this.errors[field][0] }},
        clear: function(field=null){
            if (field!=null){ delete this.errors[field] }else{ this.errors = {} }
        },

        // Toast Notification
        done: function(message){
            this.$toast.open({
                duration: 3000,
                message: message,
                position: 'is-bottom-right',
                type: 'is-success'
            })
        },
        error: function(message){
            this.$toast.open({
                duration: 3000,
                message: message,
                position: 'is-bottom-right',
                type: 'is-danger'
            })
        },

        // Company Related
        setCompany: function(company){
            this.setCookie('company', this.toJson(company))
            this.sessionChange()
            //location.reload()
        },

        // Handle Request
        ajax: function(url, data={}, is_silent=true){
            var _this = this;
            return new Promise((resolve, reject) => {
                this.spin_on()
                var promisData = null
                var token_type = _this.getCookie('token_type')
                var access_token = _this.getCookie('access_token')
                var company_id = _this.company.id
                var reqHeader = {
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'Authorization': token_type+' '+access_token,
                        'Company-ID': company_id
                    }
                };
                axios.patch(url, data, reqHeader)
                    .then(response => {
                        _this.spin_off()
                        _this.clear()
                        if(response.data)
                            promisData = response.data
                        resolve(promisData)
                    })
                    .catch(error => {
                        _this.spin_off()
                        if (is_silent)
                            _this.httpError(error)
                        if(error.response)
                            promisData = error.response
                        if(error.response.data.errors)
                            _this.errors = error.response.data.errors
                        reject(promisData)
                    })
            })
        },
        httpError: function(error){
            var status = '';
            var message = '';
            var statusText = '';
            if(error.response.status)
                status = error.response.status
            if(error.response.statusText)
                statusText = error.response.statusText
            if(error.response.data.message)
                message = error.response.data.message
            this.$toast.open({
                duration: 3000,
                message: status+' '+statusText+' '+message,
                position: 'is-bottom-right',
                type: 'is-danger'
            })
        },

        // Base Guards
        authGuard() { this.baseGuard('auth') },
        guestGuard() { this.baseGuard('guest') },
        authPromise() { this.promiseGuard('auth') },
        baseGuard(guard = 'auth') {
            var _this = this
            var token_type = _this.getCookie('token_type')
            var access_token = _this.getCookie('access_token')
            var refresh_token = _this.getCookie('refresh_token')
            _this.ajax(window.oauth+'/guard', {
                'token_type': token_type,
                'access_token': access_token,
                'refresh_token': refresh_token
            }, false)
            .then(response => {
                if(response.user)
                _this.setCookie('user', _this.toJson(response.user))
                if(response.rolls)
                _this.setCookie('rolls', _this.toJson(response.rolls))
                if(response.colors)
                _this.setCookie('colors', _this.toJson(response.colors))
                if(response.typography)
                _this.setCookie('typography', _this.toJson(response.typography))
                if(response.fields)
                _this.setCookie('fields', _this.toJson(response.fields))
                if(response.companies)
                _this.setCookie('companies', _this.toJson(response.companies))
                if(response.token_type)
                _this.setCookie('token_type', response.token_type)
                if(response.access_token)
                _this.setCookie('access_token', response.access_token)
                if(response.refresh_token)
                _this.setCookie('refresh_token', response.refresh_token)
                if (guard == 'guest')
                    _this.setCompany(response.companies[0])
                    _this.sessionChange()
                if (guard == 'guest')
                    window.location.href = '#/home'
            })
            .catch(error => {
                if (guard == 'auth')
                    window.location.href = '#/'
            })
        },
        promiseGuard(guard = 'auth') {
            var _this = this
            var token_type = _this.getCookie('token_type')
            var access_token = _this.getCookie('access_token')
            var refresh_token = _this.getCookie('refresh_token')
            return new Promise((resolve) => {
                _this.ajax(window.oauth+'/guard', {
                    'token_type': token_type,
                    'access_token': access_token,
                    'refresh_token': refresh_token
                }, false)
                .then(response => {
                    resolve(response)
                    if(response.user)
                    _this.setCookie('user', _this.toJson(response.user))
                    if(response.rolls)
                    _this.setCookie('rolls', _this.toJson(response.rolls))
                    if(response.colors)
                    _this.setCookie('colors', _this.toJson(response.colors))
                    if(response.typography)
                    _this.setCookie('typography', _this.toJson(response.typography))
                    if(response.fields)
                    _this.setCookie('fields', _this.toJson(response.fields))
                    if(response.companies)
                    _this.setCookie('companies', _this.toJson(response.companies))
                    if(response.token_type)
                    _this.setCookie('token_type', response.token_type)
                    if(response.access_token)
                    _this.setCookie('access_token', response.access_token)
                    if(response.refresh_token)
                    _this.setCookie('refresh_token', response.refresh_token)
                    if (guard == 'guest')
                        _this.setCompany(response.companies[0])
                        _this.sessionChange()
                    if (guard == 'guest')
                        window.location.href = '#/home'
                })
                .catch(error => {
                    if (guard == 'auth')
                        window.location.href = '#/'
                })
            })
        }
        
    }
})

export default app