<template>
    <div>
        <h1>APP VUE 컴포넌트</h1>
        <h2>{{ $store.state.testStr }}</h2>
        <h2>라라벨 데이터 name : {{ laravelData.name }}</h2>
        <h2>라라벨 데이터 id : {{ laravelData.id }}</h2>
        <ul>
            <!-- 라라벨의 라우터를 찾아감 -->
            <li><a href="/">루트</a></li>
            <li><a href="/login">로그인</a></li>
            <li><a href="/board">보드</a></li>
        </ul>

        <!-- 뷰의 라우터를 찾아감 | 따라서 사용 자제(데이터를 못받을 가능성이 높음) -->
        <router-link to="/login">라우터 로그인</router-link>
        <br>
        <router-link to="/board">라우터 보드</router-link>
        <router-view></router-view>
    </div>
</template>
<script>
export default {
    name: 'AppComponent',
    props: {
        laravelData: Object,
    },
    beforeCreate() {
        this.$store.commit('setLaravelData', this.laravelData);
    },
}
</script>
<style>
    
</style>