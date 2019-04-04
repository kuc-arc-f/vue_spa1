<template>
    <div>
        <div v-for="task in tasks">
            <p>ID : {{ task.id }}</p>
            <h1>
                <router-link :to="'/tasks/show/' + task.id">{{ task.title }}</router-link>
            </h1>
            <p>
                {{ task.content }}
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            this.fetchArticles()
        },
        data() {
            return {
                tasks: []
            }
        },
        methods: {
            fetchArticles() {
                axios.get('/api/tasks')
                .then(res =>  {
                    this.tasks = res.data
                    //console.log(res.data )
                })
            }
        }
    }
</script>

