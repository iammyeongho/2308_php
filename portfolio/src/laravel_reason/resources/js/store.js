import { createStore } from 'vuex';
import axios from 'axios';
import router from "./router.js"
import VueCookies from "vue-cookies";


const store = createStore({
    // state() : 데이터를 저장하는 영역
    state() {
        return {
            allowScroll: true,
            loggedIn: false,
            // 로그인 상태 토큰
            userToken: null,
            loginErrorMessage: '',

        }
    },

    // mutations : 데이터 수정용 함수 저장 영역
    mutations: {
        // 초기 데이터 세팅 (라라벨에서 받은)
        setScrollPermission(state, value) {
            state.allowScroll = value;
        },
        setLoggedIn(state, isLoggedIn) {
            state.loggedIn = isLoggedIn;
        },
        setToken(state, token) {
            state.userToken = token;
        },
        setLoginErrorMessage(state, message) {
            state.loginErrorMessage = message;
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
                // console.log(res.data);
                router.push('/'); 
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
                    const oneDayInSeconds = 24 * 60 * 60;
                    VueCookies.set('remember_token', res.data.cookie, oneDayInSeconds, '/');
                    // console.log(VueCookies.get('remember_token'));
                    router.push('/'); 
                } else {
                    // 로그인이 실패했을 때의 처리
                    // console.log('로그인 실패');
                    // console.log(res.data.message);
                    context.commit('setLoginErrorMessage', res.data.message);
                    // console.log('로그인 실패:', res.data.message);
                    // 예: 에러 메시지를 표시
                }
            })
            .catch(err => console.log(err.response.data))
        },
        logout(context, data) {
            const url = '/api/Logout'
            const header = {
                headers: {
                    "Content-Type": 'application/json',
                },
            }

            axios.post(url, header)
            .then(res => {
                // console.log(res);
            })
            .catch(err => console.log(err.response.data))
            // 쿠키 삭제
            VueCookies.remove('remember_token');
            router.push('/login'); 

            // commit('SET_USER', null);
        }
    }, 
});

export default store;
