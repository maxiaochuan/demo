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
                        {{ $validation.username.errors[0].message }}
                    </p>
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
                        {{ $validation.password.errors[0].message }}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <input name="password-repeat" type="password" class="form-control" placeholder="Password Again"
                       v-model="pwq" v-validate:confirm="{
                       required: {rule: true, message: '确认密码不可为空'},
                       confirm: {rule: pw, message: '密码不一致'}
                       }">
                <div class="help-block">
                    <p v-if="$validation.confirm.touched && $validation.confirm.invalid">
                        {{ $validation.confirm.errors[0].message }}
                    </p>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" @click="register">注册</button>
            </div>
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
                pwq: ''
            };
        },
        validators: {
            confirm: function (val, target) {
                return val === target;
            }
        },
        methods: {
            register: function (e) {
                this.$validate(true);
                if (this.$validation.valid) {
                    this.$http.post('/register', {username: this.un, password: this.pw, confirm: this.pwq}).then(
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