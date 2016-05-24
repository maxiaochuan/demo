<style>
    /*@import "../../less/form.less";*/
</style>
<template>
    <div id="loginForm">
        <validator name="validation">
            <div class="help-block">
                <p v-if="serverAuth">{{serverError}}</p>
                <p v-if="!serverAuth && $validation.username.touched && $validation.username.invalid">
                    {{ $validation.username.errors[0].message }}</p>
                <p v-else v-if="!serverAuth && $validation.password.touched && $validation.password.invalid">
                    {{ $validation.password.errors[0].message }}</p>
            </div>
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="User Name"
                       v-model="username" v-validate:username="{
                       required: {rule: true, message: 'Username can not be empty'}
                       }">
                <!--<div class="help-block">-->
                <!--<p v-if="$validation.username.touched && $validation.username.invalid">-->
                <!--{{ $validation.username.errors[0].message }}</p>-->
                <!--</div>-->
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Password"
                       v-model="password" v-validate:password="{
                       required: {rule: true, message: 'Password can not be empty'}
                       }">
                <!--<div class="help-block">-->
                <!--<p v-if="$validation.password.touched && $validation.password.invalid">-->
                <!--{{ $validation.password.errors[0].message }}</p>-->
                <!--</div>-->
            </div>
            <div class="remember">
                <input id="remember" type="checkbox" v-model="remember"><label for="remember">Remember Me</label>
            </div>
            <div class="form-group">
                <button type="submit" @click="sign">Submit</button>
            </div>
        </validator>
    </div>
</template>
<script>
    'use strict';
    module.exports = {
        data: function () {
            return {
                username: '',
                password: '',
                remember: true,
                serverAuth: false,
                serverError: ''
            };
        },
        validators: {
            confirm: function (val, target) {
                return val === target
            }
        },
        methods: {
            sign: function (e) {
                this.$validate(true);
                if (this.$validation.valid) {
                    this.$http.post('/login', {
                        username: this.username,
                        password: this.password,
                        remember: this.remember
                    }).then(
                            function (response) {
                                if (!response.data.result) {
                                    this.serverError = response.data.errors[0];
                                    this.serverAuth = true;
                                }
                            },
                            function (response) {
                                console.log(response.data);
                            }
                    );
                }
            }
        },
        ready: function () {
//            this.$http.post('/login', {name: 'Parameter request'}).then(function (response) {
//                        console.log(response.data);
//                    },
//                    function (response) {
//                        console.log(response.data);
//                    }
//            );
        }
    };
</script>