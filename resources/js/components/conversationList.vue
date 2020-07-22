<template>
    <div class="tab-content">
        <div class="tab-pane message-body active" id="inbox-message-1">
            <div class="message-top">
                <a class="btn btn btn-success new-message"> <i class="fas fa-envelope"></i> New Message </a>
            </div>

            <div class="message-chat">
                <div class="chat-body">

                    <div v-bind:key="friends.id"
                         v-for="friends in users">
                    <div v-bind:key="message.id"
                         v-for="message in allMessages">

                        <div v-if="friend == message.sender_id && friend == friends.id" class="message info">
                            <img alt="" class="img-circle medium-image" src="/images/avatar_usae7z.svg">

                            <div class="message-body">
                                <div class="message-info">
                                    <h4> {{friends.name}} </h4>
                                    <h5> <i class="fas fa-clock-o"></i> {{message.created_at | meessageTime}} </h5>
                                </div>
                                <hr>
                                <div class="message-text">
                                    {{message.messages}}
                                </div>
                            </div>
                            <br>
                        </div>

                        <div v-if="friend == message.receiver_id && friend == friends.id" class="message my-message">
                            <img alt="" class="img-circle medium-image" src="/images/avatar_usae7z.svg">

                            <div class="message-body">
                                <div class="message-body-inner">
                                    <div class="message-info">
                                        <h4> {{friends.name}} </h4>
                                        <h5> <i class="fas fa-clock-o"></i> 2:28 PM </h5>
                                    </div>
                                    <hr>
                                    <div class="message-text">
                                        {{message.messages}}
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    </div>

                </div>

                <div class="chat-footer">
                    <textarea class="send-message-text"></textarea>
                    <label class="upload-file">
                        <input type="file" required="">
                        <i class="fas fa-paperclip"></i>
                    </label>
                    <button type="button" class="send-message-button btn-info"> <i class="fa fa-send"></i> </button>
                </div>
            </div>
        </div>

    </div>

</template>

<script>

    export default {
        name: 'conversationList',
        props: ['allMessages', 'users'],
        data: function() {
            return {
                friend: ''

            }
        },

        watch: {
            friend: (val) => {

            }
        },

        methods: {

        },

        created() {
            Fire.$on('message-box', (id) => {
                    this.friend = id;
                });
            // this.debouncedFetchMessages = _.debounce(this.fetchMessages(this.message_id), 500)
        }
    }
</script>
<style scoped>

</style>
