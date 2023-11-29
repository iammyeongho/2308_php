import { createStore } from 'vuex';
import axios from 'axios';
import router from "./router.js"

const store = createStore({
    // state() : 데이터를 저장하는 영역
    state() {
        return {
            allowScroll: true,
            // 토큰을 저장하는 상태
            email_token: null,
            // 로그인 상태 플래그
            isLoggedIn: false,
        }
    },

    // mutations : 데이터 수정용 함수 저장 영역
    mutations: {
        // 초기 데이터 세팅 (라라벨에서 받은)
        setScrollPermission(state, value) {
            state.allowScroll = value;
        },
        setToken(state, token) {
            state.email_token = token;
        },
        clearToken(state) {
            state.email_token = null;
        },
        setLoggedIn(state, isLoggedIn) {
            state.isLoggedIn = isLoggedIn;
        },
        setUserData(state, userData) {
            state.userData = userData;
        },
    },
    // actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
    actions: {
        submitUserData(context, data) {
            const url = '/api/registration'
            const header = {
                headers: {
                    "Content-Type": 'multipart/form-data'
                },
            }
            let frm = new FormData();

            frm.append('name',data.name);
            frm.append('gender',data.gender);
            frm.append('birthdate',data.birthdate);
            frm.append('phone_number',data.phone_number);
            frm.append('email',data.email);
            frm.append('password',data.password);
            frm.append('password_cnk',data.password_chk);

            axios.post(url, frm, header)
            .then(res => { 
                console.log(res.data);
            })
            .catch(err => console.log(err.response.data))
        },
        submitUserLoginData(context, data) {
            const url = '/api/Login'
            const header = {
                headers: {
                    "Content-Type": 'application/json',
                },
            }
            const requestData = {
                email: data.email,
                password: data.password,
            };

            axios.post(url, requestData, header)
            .then(res => { 
                // console.log(res.data);
                if (res.data.success) {
                    // context.commit('setToken', res.data.token);
                    // 로그인이 성공했을 때의 처리
                    // context.commit('setToken', res.data.token);
                    // console.log(res.data);
                    // context.commit('setUserData', res.data.user);
                    context.commit('setLoggedIn', true);
                    router.push('/'); 
                } else {
                    // 로그인이 실패했을 때의 처리
                    console.log(res.data.message);
                    // 예: 에러 메시지를 표시
                }
            })
            .catch(err => console.log(err.response.data))
        },
        checkLoginStatus(context) {
            // 이 부분에서 서버로부터 사용자 정보를 가져오는 API 호출을 수행하고
            // 성공한 경우 사용자 정보를 스토어에 저장할 수 있습니다.
        axios.get('/api/login')
            .then(response => {
                const userData = response.data; // 서버에서 받아온 사용자 정보
                context.commit('setLoggedIn', true);
                context.commit('setUserData', userData);
            })
            .catch(error => {
                // 로그인 상태가 아닌 경우에 대한 처리
                context.commit('setLoggedIn', false);
                context.commit('setUserData', null);
            });
        },
    }, 
});

export default store;
