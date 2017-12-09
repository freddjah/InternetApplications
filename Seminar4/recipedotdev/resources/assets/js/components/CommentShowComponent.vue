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
                        <button v-on:click="deleteComment(comment.id)" class="btn btn-danger">Delete Comment</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'comment-show-component',
        props: ['comments', 'user-id'],
        methods: {
            isAuthor(id) {
                return this.userId == id
            },
            deleteComment(id) {
                this.$parent.$emit('comment-remove', id)
            }   
        },
    }
</script>
