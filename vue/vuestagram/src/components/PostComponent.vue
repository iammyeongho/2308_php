<template>
  <div class="post" v-for="item in $store.state.boardData" :key="item">
    <div class="post-img" style="width: 500px; margin: auto;" :style="{ backgroundImage: `url('${item.img}')` }"></div>
    <div class="post-content" style="width: 500px; margin: auto;">
      <p>{{ item.likes }} 명이 좋아합니다.</p>
      <p><strong>{{ item.name }}님의 </strong>{{ item.content }}</p>
      <p>{{ item.created_at }}</p>
    </div>
  </div>
</template>
<script>
export default {
  name: 'PostComponent',
}
</script>
<style>

</style>