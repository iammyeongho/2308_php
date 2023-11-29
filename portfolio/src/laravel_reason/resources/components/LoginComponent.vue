<template>
    <main class="login-main">
        <div class="login-main-center">
            <h2>회원 로그인</h2>
            <p>가입하신 아이디와 비밀번호를 입력해주세요.</p>
            <p>비밀번호는 대소문자를 구분합니다.</p>
            <input type="text" placeholder="email" name="email" v-model="frmUserLoginData.email">
            <input type="password" placeholder="password" name="password" v-model="frmUserLoginData.password">
            <button type="button" @click="submitUserLoginData()">로그인</button>
            <router-link to="/registration">회원가입</router-link>
            <!-- <button type="button">아이디 / 비밀번호 찾기</button> -->
        </div>
    </main>
</template>
<script>
export default {
    name: 'LoginComponent',

    data() {
        return {
            frmUserLoginData: {
                email: '',
                password: '',
            },
        }
    },

    methods: {
        submitUserLoginData() {
            console.log(this.frmUserLoginData);
            this.$store.dispatch('submitUserLoginData', this.frmUserLoginData);
        },
        
    },

    components: {

    },
}
</script>
<style>
    @import url('/css/common.css');
</style>