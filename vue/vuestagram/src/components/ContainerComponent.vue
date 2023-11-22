<template>
  <div v-if="$store.state.flgTapUI === 0">
    <!-- 포스트 -->
    <PostComponent></PostComponent>
  </div>

  <!-- 탭 UI -->
  <!-- 글작성 -->
  <div v-if="$store.state.flgTapUI === 1">
    <br>
    <div class="upload-img" style="width:500px; height:600px; margin: auto;" :style="{ backgroundImage: `url('${$store.state.imgURL}')` }"></div>
    <div>
      <textarea style="width:500px; height:200px; margin: auto;" class="write-box" name="content" id="content" placeholder="게시글을 작성해주세요."></textarea>
    </div>
  </div>
</template>
<script>
import PostComponent from './PostComponent.vue';

export default {
  name: 'ContainerComponent',
  components: {
    PostComponent,
  }
}
</script>
<style>
  
</style>