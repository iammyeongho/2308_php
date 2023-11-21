<template>
  <div class="nav">
    <!-- <a href="#">홈</a>
    <a href="#">상품</a>
    <a href="#">기타</a> -->

  <!-- 반복문 -->
    <a v-for="item in data" :key="item">{{ item }}</a>
  <!-- <a v-for="(item, i) in navList" :key="item">{{ i + ' : ' + item }}</a> -->
  </div>
</template>
<script>
export default {
  name: 'Header',

  // props : 상위 컴포넌트의 데이터를 하위 컴포넌트가 쓰기 위한 영역
  props: {
    data: Array,
  }
}
</script>
<style>
    
</style>