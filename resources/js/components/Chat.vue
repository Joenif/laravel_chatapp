<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 px-0">
                <side-bar v-on:to-message-box="toMessageBox" :user_messages= user_messages :users= users :luser= luser></side-bar>
            </div>
            <div v-show="noConversation" class="col-md-8 px-0">
                <div class="card rounded-0">
                    <div class="card-header px-4 py-3">
                        <p class="mb-0">Chat</p>
                    </div>

                    <div class="card-body chat-box">
                        Continue chat or start a new Conversation
                    </div>
                </div>

            </div>
            <component v-on:message-box="$emit('message-box', id)" :is="currentTabComponent"></component>

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

        props: ['user_messages', 'luser', 'users'],

        data: function() {
            return {
                openChat: false,
                noConversation: true
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

            toMessageBox(id) {
                Fire.$emit('message-box', id);
                this.openChat = true
            },

        },
        created() {

        }

    }
</script>
<style scoped>
    .ash {
        background-color: #e9e9e9;
    }
</style>
