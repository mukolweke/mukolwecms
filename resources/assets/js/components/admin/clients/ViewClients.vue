<template>
    <div>

        <div class="card" style="width:1000px;margin-top:30px;">
            <div class="card-divider">Cytonn Client List</div>
            <div class="card-section">

                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="200">Phone</th>
                        <th>Date</th>
                        <th width="200">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="client, index in clients">
                        <td>{{ client.name }}</td>
                        <td>{{ client.email }}</td>
                        <td>{{ client.phone }}</td>
                        <td>{{ client.created_at }}</td>
                        <td>
                            <router-link :to="{name: 'editAdvisor', params: {id: client.id}}" class="button small primary ">
                                Edit
                            </router-link>
                            <a href="#"
                               class="button small alert"
                               v-on:click="confirmDelete(client.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "ViewClients",

        data: function () {
            return {
                clients: []
            }
        },

        mounted() {
            let app = this;
            axios.get('/api/v1/clients')
                .then(function (resp) {
                    app.clients = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load Clients List");
                });
        },

        methods: {
            deleteEntry(id, index) {
                let app = this;
                // if (confirm("Do you really want to delete an FA?")) { // implement call confirm delete elemenmt ui
                axios.delete('/api/v1/clients/' + id)
                    .then(function (resp) {
                        app.advisors.splice(index, 1);
                    })
                    .catch(function (resp) {
                        alert("Could not delete Client");
                    });
                // }
            },

            confirmDelete(id, index) {
                this.$confirm('Do you really want to delete an Client?', 'Warning', {
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Cancel',
                    type: 'warning'
                }).then(() => {

                    this.deleteEntry(id, index);

                    this.$message({
                        type: 'success',
                        message: 'Delete completed'
                    });
                }).catch(() => {
                    this.$message({
                        type: 'info',
                        message: 'Delete canceled'
                    });
                });
            }
        }
    }
</script>


<style scoped>

</style>