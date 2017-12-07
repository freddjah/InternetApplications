<template>
    <div class="mt-3">
        <h4 class="text-center text-white">Write a comment:</h4>

        <hr>

        <div v-if="isLoggedIn">
            <div class="form-group">
                <textarea v-model="message" class="form-control" rows="5" name="message" placeholder="Write a message (up to 250 characters)..." required></textarea>
                <input type="hidden" name="_token" :value="csrf">
            </div>
            <button v-on:click="addComment()" class="btn btn-light">Add comment</button>
        </div>
        <div v-else>
            <div class="form-group">
                <textarea class="form-control" rows="5" name="body" placeholder="Please log in to write a comment" required disabled></textarea>
            </div>
            <button class="btn btn-light" type="submit" name="submit" disabled>Add comment</button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['is-logged-in', 'route-connection'],
        data() {
            return {
                message: '',
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        methods: {
            addComment() {
                axios.post(this.routeConnection, {
                    message: this.message,
                    _token: this.csrf
                })
                this.$emit('messageAdded')
                this.message = ''
            },
        },
    }
</script>
