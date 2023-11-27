import { createStore } from 'vuex';
import axios from 'axios';

const store = createStore({
    // state() : 데이터를 저장하는 영역
    state() {
        return {
            testStr: 'vuex 테스트용',

            // 라라벨에서 받은 데이터 저장용
            laravelData: null,
        }
    },

    // mutations : 데이터 수정용 함수 저장 영역
    mutations: {
        // 초기 데이터 세팅 (라라벨에서 받은)
        setLaravelData(state, data) {
            state.laravelData = data;
        },
    },
    // actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
    actions: {
    }, 
});

export default store;
