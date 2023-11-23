<template>
  <!-- 헤더 -->
  <div class="header">
    <ul>
      <li v-if="$store.state.flgTapUI !== 0" class="header-button header-button-left" @click="closeBut()">취소</li>
      <li><img class="logo" alt="Vue logo" src="./assets/logo.png"></li>
      <li v-if="$store.state.flgTapUI === 1" @click="addBoard()" class="header-button header-button-right">작성</li>
    </ul>
  </div>
  <!-- vuex로 데이터 바인딩된 정보를 받아옴 -->
  <!-- <p>{{ $store.state.phptest }}</p> -->
  <!-- 컨테이너 -->
  <ContainerComponent></ContainerComponent>

  <!-- 더보기 버튼 -->
  <!-- 더보기 버튼을 클릭 했을 시에 데이터를 통신해야함 클릭을 만들면 store에 actions으로 일단 이동 -->
  <!-- 플래그를 boo으로 만들어서 트루 펄스로 정리, 그리고 flgTapUI 플래그를 줘서 작성 페이지에는 안나오게 -->
  <button v-if="$store.state.flgBtnMoreView && $store.state.flgTapUI === 0 " @click="lastList()" class="label-store" style=" margin: 30px; padding: 10px; width: 300px;">더보기</button>

  <!-- 푸터 -->
  <div class="footer">
    <div class="footer-button-store">
      <label for="file" class="label-store">+</label>
      <input @change="updateImg" accept="image/*" type="file" name="" id="file" class="input-file">
    </div>
  </div>
</template>

<script>
import ContainerComponent from './components/ContainerComponent.vue';

export default {
  name: 'App',

  created() {
    this.$store.dispatch('actionGetBoardList');
  },

  methods: {
    // 작성 페이지 이동 및 이미지 관리
    updateImg(e) {
      // TODO : 해당 부분 공부
      const file = e.target.files;
      const imgURL = URL.createObjectURL(file[0]);
      // 작성 영역에 이미지를 표시하기 위한 데이터 저장
      this.$store.commit('setImgURL', imgURL);
      // 작성 처리시 보낼 파일 데이터 저장
      this.$store.commit('setPostFileData', file[0]);
      // 작성 UI 변경을 위한 플래그 수정
      this.$store.commit('setFlgTabUI', 1);
      // 이벤트 타겟 초기화
      e.target.value = '';
      // console.log(imgURL);
    },
    closeBut() {
      this.$store.commit('setFlgTabUI', 0);
    },
    // 글 작성 처리
    addBoard() {
      // 글 작성 처리 호출
      this.$store.dispatch('actionPostBoardAdd');
    },
    // 글 더보기 처리
    lastList() {
      this.$store.dispatch('actionGetBoardListLast');
    }
  },

  components: {
    ContainerComponent,
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
</style>
