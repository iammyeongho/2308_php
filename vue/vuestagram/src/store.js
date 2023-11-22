import { createStore } from 'vuex';
import axios from 'axios';

const store = createStore({
    // state() : 데이터를 저장하는 영역
    state() {
        return {
            // 게시글 저장용도의 배열
            boardData: [],

            // 탭 UI용 플래그
            flgTapUI: 0,

            // 작성 탭 표시용 이미지 URL 저장용
            imgURL: '',

            // 글 작성 파일 데이터 저장용
            postFileData: null,

            // 가장 마지막 로드된 게시글 번호 저장용
            lastBoardId: 0,

            // 더보기 플래그
            moreFlg: 0,
        }
    },

    // mutations : 데이터 수정용 함수 저장 영역
    mutations: {
        // set 저장, get 가져오는 것, 규칙은 아니지만 관습적으로 사용

        // 초기데이터 세팅용
        setBoardList(state, data) {
            state.boardData = data;
            state.lastBoardId = data[data.length-1].id;
            // console.log(state.lastBoardId);
        },
        // tap UI 세팅용
        setFlgTabUI(state, num) {
            state.flgTapUI = num;
        },
        // 작성 탭 표시용 이미지 URL 세팅용
        setImgURL(state, url) {
            state.imgURL = url;
        },
        // 글 작성 파일 데이터 세팅용
        setPostFileData(state, file) {
            state.postFileData = file;
        },
        // 작성된 글 삽입용
        setUnshiftBoard(state, data) {
            state.boardData.unshift(data);
        },
        // 작성 후 초기화 처리
        setClearAddData(state) {
            state.imgURL = '';
            state.postFileData = null;
        },
        setBoardLastList(state, data) {
            // state.boardData.push(data);
            // console.log(data);
            // console.log(state.lastBoardId);
            // console.log(state.boardData[state.boardData.length - 1].id);
            // state.lastBoardId = state.boardData[state.boardData.length - 1].id > state.lastBoardId ? state.boardData[state.boardData.length - 1].id : 1;
            // state.lastBoardId = state.boardData[state.boardData.length - 1].id;
            // state.lastBoardId = data.id;
            // console.log(state.lastBoardId);
            if (typeof data.id !== 'undefined') {
                state.boardData.push(data);
                state.lastBoardId = data.id;
            } else {
                alert('데이터가 없습니다.');
                state.moreFlg = 1;
            }
        }
    },
    // actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
    actions: {
        // 초기 게시글 데이터 획득 ajax 처리
        // node.js 사용 시 모든 ajax처리는 axios를 사용
        // context, state = store에 접근할 수 있는 파라미터 규칙 
        actionGetBoardList(context) {
            const url = 'http://112.222.157.156:6006/api/boards';
            // 서버 연결 비밀번호 입력 ? |  Authorization 설정 | 해당 유알엘의 서버를 접속하기위해서 해당 인증 비밀번호를 입력해야함
            const header = {
                headers: {
                    'Authorization': 'Bearer meerkat'
                }
            };
            // axios에 두번째 파라미터는 body값을 넣어줘야하는데 현재 없기 때문에 null(삭제), 세번째는 header값
            axios.get(url, header)
            .then(res => {
                // setBoardList로 보내줌, 보내느 파라미터는 한개지만, state는 자동으로 vue에서 잡아주고 res.data만 보냄
                context.commit('setBoardList',res.data);
                // console.log(res.data);
                // console.log(res.status);
            })
            .catch(err => {
                console.log(err);
                // console.log(status);
            })
        },
        // 글 작성 처리
        actionPostBoardAdd(context) {
            const url = 'http://112.222.157.156:6006/api/boards';
            const header = {
                headers: {
                    'Authorization': 'Bearer meerkat',
                    'Content-Type': 'multipart/form-data',
                }
            };
            const data = {
                name: '호모사피엔스',
                img: context.state.postFileData,
                content: document.getElementById('content').value,
            };
            axios.post(url, data, header)
            .then(res => {
                // 작성글 데이터 저장
                context.commit('setUnshiftBoard', res.data);
                // 리스트 UI로 전환
                context.commit('setFlgTabUI', 0);
                // 작성 후 초기화 처리
                context.commit('setClearAddData');
            })
            .catch(err => {
                console.log(err);
            });
        },
        // 글 더보기 처리
        actionGetBoardListLast(context) {
            const lastNum = '/' + context.state.lastBoardId;
            const url = 'http://112.222.157.156:6006/api/boards' + lastNum;
            const header = {
                headers: {
                    'Authorization': 'Bearer meerkat'
                }
            };
            axios.get(url, header)
            .then(res => {
                context.commit('setBoardLastList',res.data);
            })
            .catch(err => {
                console.log(err);
                // console.log(status);
            })
        },
    }, 
});

export default store;
