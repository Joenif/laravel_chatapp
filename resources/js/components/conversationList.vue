<template>
    <div class="tab-content">
        <div class="tab-pane message-body active" id="inbox-message-1">
            <div class="message-top">
                <a class="btn leave-message-box"> <i @click="exitMessage" class="fas fa-arrow-left"></i></a>
                <img alt="" class="img-circle medium-image" src="/images/avatar_usae7z.svg">
                <h4></h4>
            </div>

            <div class="message-chat">
                <div class="chat-body">

                    <div v-bind:key="user.id"
                         v-for="user in users">
                    <div v-bind:key="message.id"
                         v-for="message in allMessages">

                        <div v-if="friend == message.sender_id && friend == user.id" class="message info">
                            <img alt="" class="img-circle medium-image" src="/images/avatar_usae7z.svg">

                            <div class="message-body">
                                <div class="message-info">
                                    <h4> {{user.name}} </h4>
                                    <h5> <i class="fas fa-clock-o"></i> {{message.created_at | meessageTime}} </h5>
                                </div>
                                <hr>
                                <div class="message-text">
                                    {{message.messages}}
                                </div>
                            </div>
                            <br>
                        </div>

                        <div v-if="friend == message.receiver_id && friend == user.id"  class="message my-message">
                            <img alt="" class="img-circle medium-image" src="/images/avatar_usae7z.svg">

                            <div class="message-body">
                                <div class="message-body-inner">
                                    <div class="message-info">
                                        <h4> Me </h4>
                                        <h5> <i class="fas fa-clock-o"></i> {{message.created_at | meessageTime}} </h5>
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
                    <textarea class="send-message-text"
                        v-model="message"
                        placeholder="Enter Message">
                    </textarea>
                    <label class="upload-file">
                        <i class="fas fa-smile-o"></i>
                    </label>
                    <label class="upload-file">
                        <input type="file" required="">
                        <i class="fas fa-paperclip"></i>
                    </label>
                    <button @click="sendMessage" type="button" class="send-message-button btn-info"> <i class="fas fa-paper-plane"></i>
                    </button>
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
                friend: '',
                message: ''

            }
        },

        watch: {
            friend: (val) => {

            }
        },

        methods: {
            exitMessage() {
                Fire.$emit('exit');
            },

            sendMessage() {
                if(this.message != '') {
                    axios.post('/conversations/', {message: this.message, receiver: this.friend})
                    .then(response => {
                        this.message = '';
                        console.log(response.data)
                    })
                    .catch((err) => {
                        console.log('Error: '+err);
                    });
                }

            }
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
