const app = new Vue({
    el: "#app",
    data: {
        editFriend: null,
        friends: [],
        friendname: "",
    },
    methods: {
        deleteFriend(id, i) {
            fetch("http://rest.learncode.academy/api/kate/friends/" + id, {
                method: "DELETE"
            })
                .then(() => {
                    this.friends.splice(i, 1);
                })
        },
        updateFriend(friend) {
            fetch("http://rest.learncode.academy/api/kate/friends/" + friend.id, {
                body: JSON.stringify(friend),
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                },
            })
                .then(() => {
                    this.editFriend = null;
                })
        },
        addFriend(friend) {
            this.friends.push({'name' : friend});
            this.friendname = "";
            this.newFriend = false;

            fetch("http://rest.learncode.academy/api/kate/friends", {
                body: JSON.stringify({'name' : friend}),
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
            })
        },
    },
    mounted() {
        fetch("http://rest.learncode.academy/api/kate/friends")
            .then(response => response.json())
            .then((data) => {
                this.friends = data;
            })
    },
    template: `
    <div>
        <div>
          <input v-model="friendname" v-on:keyup.13="addFriend(friendname)" />
          <button v-on:click="addFriend(friendname)">add</button>
        </div>

      <li v-for="friend, i in friends">
        <div v-if="editFriend === friend.id">
          <input v-on:keyup.13="updateFriend(friend)" v-model="friend.name" />
          <button v-on:click="updateFriend(friend)">save</button>
        </div>
        <div v-else>
          <button v-on:click="editFriend = friend.id">edit</button>
          <button v-on:click="deleteFriend(friend.id, i)">x</button>
          {{friend.name}}
        </div>
      </li>
    </div>
    `,
});