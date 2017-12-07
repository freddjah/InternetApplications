<template>
    <div class="container">
        <div v-for="comment in comments" class="row mt-3">
            <div class="card col-lg-12">

                <div class="card-header">
                    <strong>{{ comment.user.name }}</strong> - {{ comment.created_at }}.
                </div>
                <div class="card-body">
                    <p class="card-text">{{ comment.message }}</p>
                    <div v-if="isAuthor(comment.user.id)">
                         <form :action="commentUrl(comment.id)" method="POST">
                            <input type="hidden" name="_token" :value="csrf">
                            <button type="submit" class="btn btn-danger">Delete Comment</button>
                        </form> 
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['recipe-id', 'current-user', 'route-connection'],
        data() {
            return {
                comments: [],
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        methods: {
            getComments() {
                axios.get(this.routeConnection).then(response => { this.comments = response.data })
                console.log(this.comments)
            },
            commentUrl(commentId) {
                return this.routeConnection + "/" + commentId
            },
            isAuthor(id) {
                return this.currentUser == id
            },
            addComment(message) {
                axios.post('this.routeConnection', message).then(this.getComments())
            },
        },
        created() {
            this.getComments()
        },
        mounted() {
            setInterval(function() {
                this.getComments()
            }.bind(this), 5000)
        }
    }
</script>
