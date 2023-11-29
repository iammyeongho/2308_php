<template>
    <main class="login-main">
        <div class="login-main-center">
            <router-link to="/login">로그인</router-link>
            <button type="button" @click="logout">로그아웃</button>
        </div>
    </main>
</template>
<script>
export default {
    methods: {
        logout() {
            this.$store.dispatch('logout');
        },
        
        
    },
}
</script>
<style>
    
</style>