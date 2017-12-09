<template>
    <div class="col-lg-12">

        <h3 class="text-center text-white">Comments</h3>

        <hr>
        <comment-show-component :comments="comments" :user-id="userId"></comment-show-component>
        <comment-post-component :user-id="userId"></comment-post-component>
        
    </div>
</template>

<script>
    import CommentPostComponent from './CommentPostComponent'
    import CommentShowComponent from './CommentShowComponent'

    export default {
        props: ['comments-url', 'user-id'],
        components: {
            CommentPostComponent,
            CommentShowComponent
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                comments: []
            }
        },
        methods: {
            getComments() {
                let self = this;
                axios.get(this.commentsUrl).then(function(response){ self.comments = response.data, console.log(response.data) })
            },
            addComment(message) {
                axios.post(this.commentsUrl, {
                    message: message,
                    _token: this.csrf
                }).then(function(response) {
                    this.getComments()
                }.bind(this))
            },
            deleteComment(id) {
                axios.post(this.commentUrl(id), {
                    _token: this.csrf
                }).then(function(response) {
                    this.getComments()
                }.bind(this))
            },
            commentUrl(id) {
                return this.commentsUrl + "/" + id
            }
        },
        created() {
            this.$on('comment-add', this.addComment)
            this.$on('comment-remove', this.deleteComment)
        },
        mounted() {
            this.getComments()
            setInterval(function () {
            this.getComments();
            }.bind(this), 3000); 
        }
    }
</script>
