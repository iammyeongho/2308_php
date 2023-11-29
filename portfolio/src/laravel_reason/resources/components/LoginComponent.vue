<template>
    <main class="login-main">
        <div class="login-main-center">
            <h2>회원 로그인</h2>
            <div v-if="loginErrorMessage">
                <p style="color: #F03;">잘못된 아이디 또는 비밀번호입니다.</p>
                <p style="color: #F03;">{{ loginErrorMessage }}</p>
            </div>
            <div v-else>
                <p>{{ userBasePTag1 }}</p>
                <p>{{ userBasePTag2 }}</p>
            </div>
            <input type="text" placeholder="email" name="email" v-model="frmUserLoginData.email">
            <input type="password" placeholder="password" name="password" v-model="frmUserLoginData.password">
            <button type="button" @click="submitUserLoginData()">로그인</button>
            <router-link to="/registration">회원가입</router-link>
            <!-- <h4>{{ $VueCookies }}</h4> -->
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
            userBasePTag1: '가입하신 아이디와 비밀번호를 입력해주세요.',
            userBasePTag2: '비밀번호는 대소문자를 구분합니다',
        }
    },
    
    computed: {
        loginErrorMessage() {
            return this.$store.state.loginErrorMessage;
        },
    },

    methods: {
        submitUserLoginData() {
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