<template>
    <div id="login">
        <validator name="validation">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="User Name"
                       v-model="un" v-validate:username="{
                       required: {rule: true, message: '用户名不可为空'}
                       }">
                <div class="help-block">
                    <p v-if="$validation.username.touched && $validation.username.invalid">
                        {{ $validation.username.errors[0].message }}</p>
                </div>
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Password"
                       v-model="pw" v-validate:password="{
                       required: {rule: true, message: '密码不可为空'},
                       minlength: {rule: 6, message: '密码必须大于6位'}
                       }">
                <div class="help-block">
                    <p v-if="$validation.password.touched && $validation.password.invalid">
                        {{ $validation.password.errors[0].message }}</p>
                </div>
            </div>
            <div class="remember">
                <input id="remember" type="checkbox" v-model="remember"><label for="remember">Remember Me</label>
            </div>
            <div class="form-group">
                <button type="submit" @click="sign">Submit</button>
            </div>
            <pre>{{ $validation | json }}</pre>
        </validator>
    </div>
</template>
<script>
    'use strict';
    module.exports = {
        data: function () {
            return {
                un: '',
                pw: '',
                remember: true,
                vaFlag: false
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
                    this.$http.post('/login', {username: this.un, password: this.pw, remember: this.remember}).then(
                            function (response) {
                                console.log(response.data);
                                //window.location = '/home';
                            },
                            function (response) {
                                console.log(response.data);
                            }
                    );
                }
            }
        }
    };
</script>