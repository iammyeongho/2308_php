<template>
    <main class="login-main">
        <div class="login-main-center">
            <h2>회원 로그인</h2>
            <p>가입하신 아이디와 비밀번호를 입력해주세요.</p>
            <p>비밀번호는 대소문자를 구분합니다.</p>
            <form action="">
                <input type="text" placeholder="ID">
                <input type="password" placeholder="PASSWORD">
                <button>로그인</button>
            </form>
            <button type="button">회원가입 / 계정 찾기</button>
            <!-- <button type="button">아이디 / 비밀번호 찾기</button> -->
        </div>
    </main>
</template>
<script>
export default {
    name: 'LoginComponent',

    methods: {

    },

    components: {

    },
}
</script>
<style>
    @import url('/css/common.css');
</style>