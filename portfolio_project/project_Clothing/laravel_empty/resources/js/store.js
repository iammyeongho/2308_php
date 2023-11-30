import { createStore } from 'vuex';
import axios from 'axios';
import router from "./router.js"


const store = createStore({
    // state() : 데이터를 저장하는 영역
    state() {
        return {

        }
    },

    // mutations : 데이터 수정용 함수 저장 영역
    mutations: {
        // 초기 데이터 세팅 (라라벨에서 받은)
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


            frm.append('user_id',data.user_id);
            frm.append('name',data.name);
            frm.append('gender',data.gender);
            frm.append('birthdate',data.birthdate);
            frm.append('phone_number',data.phone_number);
            frm.append('email',data.email);
            frm.append('password',data.password);
            frm.append('password_chk',data.password_chk);

            axios.post(url, frm, header)
            .then(res => { 
                // console.log(res.data);
                router.push('/'); 
            })
            .catch(err => console.log(err.response.data))
        },
    }, 
});

export default store;
