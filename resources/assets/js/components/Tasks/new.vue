<template lang="html">
    <div class="container">
            <div class="form-group">
                <label for="TopicTitle">タイトル</label>
                <input type="text" class="form-control" id="title" v-model="title">
            </div>
            <div class="form-group">
                <label for="TopicContent">content</label>
                <textarea class="form-control" id="content" rows="3" v-model="content"></textarea>
            </div>
            <button v-on:click="postArticle">投稿</button>
    </div>
</template>

<script>
    export default {
        // コンポーネント作成時に実行する処理を定義
        // created() {
        // 今回は特に処理はありません
        // },
        // テンプレート内で使う変数を定義
        data() {
            return {
                title:'',
                content:''
            }
        },
        // メソッドの定義。ここでv-on:click=''で記述したpostArticle()メソッドを定義します
        methods: {
            postArticle(){
                // テンプレートのv-modelのtitleとcontentの入力値を取得しarticleという配列に格納
                var task = {
                    'title': this.title,
                    'content': this.content
                };

                // 今回はuserのidを1とします。
//                var id = 1;
                // axios.postの第１引数にルートを、第２引数にポストするデータの配列を渡します
                axios.post('/api/tasks/add' ,task).then(res => {
                    // テストのため返り値をコンソールに表示
                    console.log(res.data.title);
                    console.log(res.data.content);
                });
            }
        }
    }
</script>
