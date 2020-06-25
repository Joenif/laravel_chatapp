<template>
    <div class="container px-0">
        <!-- Users box-->
        <div class="bg-white">
            <div class="card">
              <div class="card-header bg-gray px-4 pt-3 pb-2  bg-light">
                <ul class="nav nav-tabs card-header-tabs">
                  <li class="nav-item mb-0">
                    <a class="nav-link active" href="#chats">Chats</a>
                  </li>
                  <li class="nav-item mb-0">
                    <a class="nav-link" href="#contacts">Contacts</a>
                  </li>
                  <li class="nav-item mb-0">
                    <a class="nav-link" href="#groups">Groups</a>
                  </li>
                </ul>
              </div>

            </div>

            <div class=" messages-box">

                <div id="chats" class="list-group rounded-0"
                    v-bind:key="friend"
                    v-for="friend in friends">
                    <a v-if="friend.id != user" class="list-group-item list-group-item-action active text-white rounded-0">
                    <div class="media">
                        <img src="/images/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                        <div class="media-body ml-4">
                            <div class="d-flex align-items-center justify-content-between mb-1"
                                >
                                <h6 class="mb-0">
                                    <span>
                                        {{friend.name}}
                                    </span>
                                </h6>
                            </div>
                            <p class="font-italic mb-0 text-small">online</p>
                        </div>
                    </div>
                    </a>

                </div>

            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['user_messages', 'user', 'users'],
        data: function() {
            return {

                friends: [],
                // chats: []
            }
        },
        methods: {
            chat_link() {
                return this.chats.id;
            },

            isFriend() {

                this.users.forEach(friends => {
                   this.user_messages.forEach(chats => {
                       if (friends.id != this.user && (friends.id == chats.sender_id || friends.id == chats.receiver_id)) {
                            this.friends = Object.entries(friends);

                            console.log(this.friends);
                       }

                   });
                });
            }
        },
        created() {
            this.isFriend();

        }
    }
</script>
<style scoped>
/* v-if="friend.id != user && (friend.id == chats.sender_id
                                            || friend.id == chats.receiver_id)">
                                        {{friend.name}} */
</style>
