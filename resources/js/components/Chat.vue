<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3 px-0">
                <side-bar v-on:to-message-box="toMessageBox" :users="users" :user_messages= user_messages :luser= luser></side-bar>
            </div>
            <div class="col-md-9 px-0">
                <div v-show="noConversation" class="message-body rounded-0">
                    <div class="message-top px-4 py-3">
                        <p class="mb-0">Chat</p>
                    </div>

                    <div class="message-chat chat-box">
                        Continue chat or start a new Conversation
                    </div>
                </div>
                <component v-on:message-box="$emit('message-box', id)" :users="users" :allMessages="allMessages" :is="currentTabComponent"></component>
            </div>

        </div>

    </div>
</template>

<script>
    import Sidebar from "./Sidebar.vue";
    import conversationList from './conversationList.vue';

    export default {
        components: {
            Sidebar,
            conversationList
        },

        props: ['user_messages', 'luser'],

        data: function() {
            return {
                openChat: false,
                noConversation: true,
                allMessages: [],
                users: []
            }
        },

        computed: {
            currentTabComponent () {
                if (this.openChat) {
                    this.noConversation = false;
                    return conversationList;
                } else {
                    this.noConversation = true;
                }
            },
        },

        methods: {
            fetchUsers() {
                axios.get('users').then(response => {
                this.users = response.data
                }).catch(()=> {

                });
            },
            fetchMessages() {
                axios.get('conversations')
                    .then(response => {
                        this.allMessages = response.data
                    })
                    .catch((err) => {
                        console.log('Error: '+err);
                    });
            },

            toMessageBox(id) {
                Fire.$emit('message-box', id);
                this.openChat = true
            },

        },
        created() {
            this.fetchMessages();
            this.fetchUsers();
        }

    }
</script>
<style scoped>
    .ash {
        background-color: #e9e9e9;
    }
</style>
