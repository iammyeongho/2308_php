<template>
        <div id="modal">
            <p class="close" id="close-modal">X</p>
            <div class="modal-content">
                <ul>
                    <li><a href="">소개</a></li>
                    <li><a href="">전체 도서</a></li>
                    <li><a href="">추천 도서</a></li>
                    <li><a href="">문장 수집</a></li>
                    <li><a href="">문의</a></li>
                </ul>
            </div>
        </div>

        <header>
            <img src="/img/menu.png" alt="" id="open-modal">
            <img src="/img/icon.png" alt="">
            <img src="/img/user.png" alt="">
        </header>


        <footer>
            <div class="footer-span">
                <a class="footer-span1" href="">이용약관</a>
                <span>  |  </span>
                <a class="footer-span2" href="">개인정보보호</a>
            </div>
            <div>
                <img src="/img/test.png" alt="">
                <img src="/img/test.png" alt="">
                <img src="/img/test.png" alt="">
            </div>
        </footer>
        
    <router-view></router-view>
</template>
<script>

import LoginComponent from './LoginComponent.vue';

export default {
    name: 'AppComponent',

    methods: {

    },

    components: {
    LoginComponent,
    },
}
</script>
<style>
    @import url('/css/common.css');
</style>