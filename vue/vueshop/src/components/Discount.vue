<!-- vueinit 적으면 아래 부분 자동 생성 -->
<template>
  <div class="discount">
    <p>지금 구매하시면, {{discountNum}}% 할인</p>
  </div>
</template>
<script>
export default {
    name: 'Discount',
    data() {
      return {
        discountNum: 50,
        intervalInfo: null,
      }
    },
    // mounted() : 라이프사이클 훅, mountd단계에서 실행되는 영역
    mounted() {
        this.intervalInfo = setInterval(() => {
        this.discountNum--;
      }, 200);
    },
    updated() {
      if(this.discountNum === 29) {
        alert('할인율 하락 중!');
      } else if(this.discountNum === 10) {
        clearInterval(this.intervalInfo);
      }
    },
}
</script>
<style>
    
</style>