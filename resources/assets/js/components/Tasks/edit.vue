<template lang="html">
    <div class="container">
            <div class="form-group">
                <label for="TopicTitle">タイトル</label>
                <input type="text" class="form-control" id="title" v-model="title" >
            </div>
            <div class="form-group">
                <label for="TopicContent">content</label>
                <textarea class="form-control" id="content" rows="3" v-model="content"></textarea>
            </div>
            <button v-on:click="postTask">投稿</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                title:'',
                content:''
            }
        },
        mounted: function() {
            this.getItem();
        },
        // メソッドの定義。ここでv-on:click=''で記述したpostArticle()メソッドを定義します
        methods: {
            getItem: function() {
                axios.get('/api/tasks/edit/' + this.$route.params.id)
                .then( ( res ) => {
                    this.item = res.data;
                    this.title   =this.item.title;
                    this.content =this.item.content;
                });
            },
            postTask(){
                // テンプレートのv-modelのtitleとcontentの入力値を取得しarticleという配列に格納
                var task = {
                    'title': this.title,
                    'content': this.content
                };

                // 今回はuserのidを1とします。
//                var id = 1;
                // axios.postの第１引数にルートを、第２引数にポストするデータの配列を渡します
                axios.post('/api/tasks/update/'+ this.$route.params.id ,task).then(res => {
                    // テストのため返り値をコンソールに表示
                    console.log(res.data.title);
                    console.log(res.data.content);
                });
            }
        }
    }
</script>
