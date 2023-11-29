<template>
        <div v-show="modalVisible" id="modal">
            <p class="close" @click="closeModal">X</p>
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
            <img @click="openModal" src="/img/menu.png" alt="" id="open-modal">
            <router-link to="/"><img src="/img/icon.png" alt=""></router-link>
            <router-link to="/login"><img src="/img/user.png" alt=""></router-link>
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

    mounted() {
    // 휠 이벤트 리스너 등록
    document.addEventListener('wheel', this.handleWheelEvent, { passive: false });
    },
    beforeDestroy() {
        // 컴포넌트가 파괴되기 전에 이벤트 리스너 제거
        document.removeEventListener('wheel', this.handleWheelEvent);
    },

    data() {
        return {
            modalVisible: false,
        };
    },

    methods: {
        handleWheelEvent(event) {
            event.preventDefault();
        },
        openModal() {
            this.modalVisible = true;
            document.body.style.overflow = "hidden";
        },
        closeModal() {
            this.modalVisible = false;
            document.body.style.overflow = "auto";
        },
    },

    components: {
    LoginComponent,
    },
}
</script>
<style>
    @import url('/css/common.css');
</style>