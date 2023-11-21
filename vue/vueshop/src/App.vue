<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <!-- 헤더 -->
  <!-- 상속 -->
  <Header :data="navList"></Header>
  <!-- 컴포넌트 Header 파일로 이관 -->
  <!-- <div class="nav"> -->
    <!-- <a href="#">홈</a>
    <a href="#">상품</a>
    <a href="#">기타</a> -->

  <!-- 반복문 -->
    <!-- <a v-for="item in navList" :key="item">{{ item }}</a> -->
  <!-- <a v-for="(item, i) in navList" :key="item">{{ i + ' : ' + item }}</a> -->
  <!-- </div> -->

  <!-- 할인 배너 -->
  <Discount></Discount>
  <!-- 컴포넌트 Discount 파일로 이관 -->
  <!-- <div class="discount">
    <p>지금 구매하시면, 30% 할인</p>
  </div> -->

  <!-- 모달 -->
  <transition name="modalAni">
    <Modal v-if = "modalFlg" :data = "item" @modalClose = "modalClose"></Modal>
    <!-- 컴포넌트 Modal 파일로 이관 -->
    <!-- <div class="bg_balck" v-if="modalFlg" @click="modalClose()">
    <div class="bg_white">
      <h4>{{ item.name }}</h4>
      <p>{{ item.content }}</p>
      <img :src="item.img" alt="이미지 없음">
      <p>가격 : {{ item.price }}</p>
      <p>신고수 : {{ item.reportCnt }}</p>
      <button @click="modalClose()">닫기</button>
    </div>
    </div> -->
  </transition>
  

  <!-- 상품 리스트 -->
  <div>
    <!-- <div>
      <h4 :style="sty_color_red">양말</h4>
      <p>{{price1}}원</p>
    </div>
    <div>
      <h4>티셔츠</h4>
      <p>{{price2}}원</p>
    </div> -->
    <div>
        <!-- <h4 v-for="(data, idx) in products" :key="idx">{{data.item}}</h4> -->
        <!-- <h4>{{ products[0] }}</h4>
        <p :style="sty_color_red">{{ products[0] }}</p>
        <p>{{prices[0]}}원</p>
        <h4>{{ products[1] }}</h4>
        <p>{{prices[1]}}원</p>
        <h4>{{ products[2] }}</h4>
        <p>{{prices[2]}}원</p> -->
        
        <!-- <h4 v-for="item in products" :key="item">{{ item }}</h4>
        <p v-for="item in prices" :key="item">{{ item }}</p>
        <h4 v-for="item in products" :key="item">{{ item.name }}</h4>
        <p v-for="item in products" :key="item">{{ item.price }}</p> -->

        <!-- <h4 v-for="item in products[0]" :key="item">{{ item }}</h4>
        <h4 v-for="item in products[1]" :key="item">{{ item }}</h4>
        <h4 v-for="item in products[2]" :key="item">{{ item }}</h4> -->

        <!-- 컴포넌트 List로 이관 -->
        <div>
          <ProductsList v-for="(item, i) in products" :key="i" :data="item" :productKey = "i" @openModal = "openModal" @plusOne = "plusOne"></ProductsList>
        </div>
        <!-- <div v-for="(item, i) in products" :key="i">
          <h4 @click="openModal(item)">{{ item.name }}</h4>
          <p>{{ item.price }}</p>
          <button @click="plusOne(i)" type="button">허위 신고</button>
          <p>신고수 : {{ item.reportCnt }}</p>
          <hr>
        </div> -->
        <!-- <h4 v-for="item in products" :key="item"> {{ item.name + " : " + item.price }}</h4> -->
    </div>
  </div>
</template>

<script>
import data from './assets/js/data.js';

import Discount from './components/Discount.vue';
import Header from './components/Header.vue';
import Modal from './components/Modal.vue';
import ProductsList from './components/ProductsList.vue';

export default {
  name: 'App',
  
  // 데이터 바인딩 : 우리가 사용할 데이터를 저장하는 공간
  data() {
    return {
      navList: ['홈', '상품', '기타', '문의'],
      // products : [ {item : '양말'}, {item : '티셔츠'}, {item : '바지'}],
      // products : ['양말', '티셔츠', '바지'],
      // prices : ['1,500', '40,000', '60,000'],
      // products : [
      //   {name : '양말', content : '그냥 양말', price : '1,500원', reportCnt : 0, img: require('@/assets/img/1.jpg')},
      //   {name : '티셔츠', content : '그냥 티셔츠', price : '40,000원', reportCnt : 0, img: require('@/assets/img/2.png')},
      //   {name : '바지', content : '그냥 바지', price : '60,000원', reportCnt : 0, img: require('@/assets/img/3.jpg')}
      // ],
      products : data,
      price1 : '1,500',
      price2 : '40,000',
      price3 : '60,000',
      sty_color_red : 'color: red; font-weight: bold',
      // reportCnt : 0,
      modalFlg : false,
      item: {}
    }
  },
  // methods() :  함수를 정의하는 영역
  methods: {
    openModal(item) {
      this.item = item;
      this.modalFlg = true;
      // this.$emit('openModal', item);
    },
    plusOne(i) {
      this.products[i].reportCnt++;
      // this.$emit('plusOne', i);
    },
    modalClose() {
      this.modalFlg = false;
    }
  }, 
  // components : 컴포넌트를 등록하는 영역
  components: {
    Discount,
    Header,
    Modal,
    ProductsList,
  },
}
</script>

<style>
@import url('./assets/css/common.css');

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
/* css 파일로 이관 */
/* .nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}

.nav a {
  color: white;
  padding: 10px;
  text-decoration: none;
} */
</style>
  