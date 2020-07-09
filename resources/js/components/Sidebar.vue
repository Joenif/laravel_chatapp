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

            <div class="messages-box">
                <div v-bind:key="friends"
                     v-for="friends in users">
                <div v-bind:key="user"
                     v-for="user in user_messages">
                    <div id="chats" class="list-group rounded-0"
                         v-if="friends.id != luser && (friends.id == user.sender_id || friends.id == user.receiver_id)">
                        <a class="list-group-item list-group-item-action ash text-white rounded-0">
                        <div class="media">
                            <img src="/images/avatar_usae7z.svg" alt="user" width="50" class="rounded-circle">
                            <div class="media-body ml-4">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <h6 class="mb-0">
                                        <span class="text-primary">
                                            {{friends.name}}
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
        </div>

    </div>
</template>

<script>
    export default {
        props: ['user_messages', 'luser', 'users'],
        data: function() {
            return {

            }
        },
        created() {
            // this.isFriend();

        }
    }
</script>
<style scoped>
    .ash {
        background-color: #e9e9e9;
    }
</style>
