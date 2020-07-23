<template>
    <div class="container px-0 ">
        <!-- Users box-->
        <div class="contacts-list">
            <div class="inbox-categories d-flex flex-row justify-content-center align-self-center">
                <div data-toggle="tab" data-target="#chats"  class="flex-fill"> Chats </div>
                <div data-toggle="tab" data-target="#contacts" class="flex-fill active"> Contacts </div>
                <div data-toggle="tab" data-target="#marked" class="flex-fill"> Marked </div>
            </div>

            <div class="tab-content">
                <div id="chats" class="contacts-outter-wrapper tab-pane">
                    <div v-bind:key="friends.id"
                        v-for="friends in users">
                    <div v-bind:key="user.id"
                        v-for="user in user_messages">
                        <div class="contacts-outter"
                            v-if="friends.id != luser && (friends.id == user.sender_id || friends.id == user.receiver_id)">
                            <ul class="list-unstyled contacts">
                                <li @click="$emit('to-message-box', friends.id)" class="d-flex active">
                                    <div class="message-count"> 1 </div>
                                    <img alt="" class="img-circle medium-image d-inline-flex" src="/images/avatar_usae7z.svg" width="50">
                                    <div class="vcentered info-combo">
                                        <h6 class="no-margin-bottom name"> {{friends.name}} </h6>
                                        <span class="message-time contacts-add"> 2:32 AM</span>
                                        <p class="short-message"> Hah, too late, I already bought the food</p>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
                <div id="contacts" class="contacts-outter-wrapper tab-pane active">
                    <div v-bind:key="friends.id"
                        v-for="friends in users">
                        <div class="contacts-outter"
                            v-if="friends.id != luser">
                            <ul class="list-unstyled contacts">
                                <li @click="$emit('to-message-box', friends.id)" :class="{'active' : isActive}" class="d-flex">
                                    <div class="message-count"> 1 </div>
                                    <img alt="" class="img-circle medium-image d-inline-flex" src="/images/avatar_usae7z.svg" width="50">
                                    <div class="vcentered info-combo">
                                        <h6 class="no-margin-bottom name"> {{friends.name}} </h6>
                                        <span class="message-time contacts-add"> 2:32 AM</span>
                                        <p class="short-message"> Hah, too late, I already bought the food</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- <div id="marked" class="contacts-outter-wrapper tab-pane">
                    <form class="panel-search-form warning form-group has-feedback no-margin-bottom">
                        <input type="text" class="form-control" name="search" placeholder="Search">
                        <span class="fa fa-search form-control-feedback"></span>
                    </form>
                    <div class="contacts-outter">
                        <ul class="list-unstyled contacts warning">
                            <li data-toggle="tab" data-target="#marked-message-1">
                                <div class="message-count"> 2 </div>
                                <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                                <div class="vcentered info-combo">
                                    <h3 class="no-margin-bottom name"> Jessica Franco </h3>
                                    <h5> Hello, Dennis. I wanted to let you know we reviewed your proposal and decided  </h5>
                                </div>
                                <div class="contacts-add">
                                    <span class="message-time"> 1:44 <sup>AM</sup></span>
                                    <i class="fa fa-trash-o"></i>
                                    <i class="fa fa-paperclip"></i>
                                </div>
                            </li>
                            <li data-toggle="tab" data-target="#marked-message-2">
                                <div class="message-count"> 1 </div>
                                <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                                <div class="vcentered info-combo">
                                    <h3 class="no-margin-bottom name"> Pavel Durov </h3>
                                    <h5> Hey, we need your help for our next Telegram re-design. </h5>
                                </div>
                                <div class="contacts-add">
                                    <span class="message-time"> 3:23 <sup>AM</sup></span>
                                    <i class="fa fa-trash-o"></i>
                                    <i class="fa fa-paperclip"></i>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>

    </div>

</template>

<script>
    export default {
        name: "Sidebar",
        props: ['user_messages', 'luser', 'users'],
        data: function() {
            return {
                isActive: false
            }
        },
        methods: {
            // activeFriend(id) {
            //     this.isActive = true;
            //     Fire.$emit('to-message-box', id);
            //     console.log(id);
            // }
        },
        created() {

        }
    }
</script>
<style scoped>
    .chats-tab {
        background-color: #e9e9e9;
        cursor: pointer
    }

</style>
