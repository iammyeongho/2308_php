<template>
    <main class="registation-main">
        <div class="registation-main-center" :class="{ 'registation-main-center-none': regiflg1 }">
            <h2>회원 가입</h2>
            <label for="">이름</label>
            <input type="text" name="name" v-model="frmUserData.name">
            <label for="">성별</label>
            <div class="genderbox">
                <input type="radio" name="gender" v-model="frmUserData.gender" value="0"> 남성
                <input type="radio" name="gender" v-model="frmUserData.gender" value="1"> 여성
            </div>
            <label for="">생년월일</label>
            <input type="date" name="birthdate" v-model="frmUserData.birthdate">
            <label for="">전화번호</label>
            <input type="tel" name="phone_number" v-model="frmUserData.phone_number">
            <button type="button" @click="regiflg1=true; regiflg2=false;">다음</button>
        </div>
        <div class="registation-main-center" :class="{ 'registation-main-center-none': regiflg2 }">
            <h2>회원 가입</h2>
            <label for="">이메일</label>
            <input type="text" name="email" v-model="frmUserData.email">
            <label for="">비밀번호</label>
            <input type="password" name="password" v-model="frmUserData.password">
            <label for="">비밀번호 확인</label>
            <!-- <input type="password" name="password_chk" v-model="frmUserData.password_chk"> -->
            <button type="button" @click="regiflg1=false; regiflg2=true;">이전</button>
            <button type="button" @click="submitUserData()">회원가입</button>
        </div>
    </main>
</template>
<script>
export default {
    name: 'RegistrationComponent',
    data() {
        return {
            regiflg1: false,
            regiflg2: true,

            frmUserData: {
                name: '',
                gender: '',
                birthdate: '',
                phone_number: '',
                email: '',
                password: '',
                // password_chk: '',
            },
        }
    },
    methods: {
        submitUserData() {
            this.$store.dispatch('submitUserData', this.frmUserData);
        },
    },
}
</script>
<style>
    @import url('/css/common.css');
</style>