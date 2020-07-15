<template>
    <div class="col-md-8 px-0">
        <div class="card rounded-0">
            <div class="card-header px-4 py-3">
                <p class="mb-0">Chat</p>
            </div>

            <div class="card-body chat-box">
                All conversations
                <p>{{message_id}}</p>
            </div>
        </div>

    </div>
</template>

<script>

    export default {
        name: 'conversationList',

        data: function() {
            return {
                message_id: ''
            }
        },

        created() {
            Fire.$on('message-box', (id) => {
                this.message_id = id;
            })
        }
    }
</script>
<style scoped>

</style>
