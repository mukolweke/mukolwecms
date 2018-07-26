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
                        <th>Date Created</th>
                        <th>Financial Advisor</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="client, index in clients">
                        <td>{{ client.name }}</td>
                        <td>{{ client.email }}</td>
                        <td>{{ client.phone }}</td>
                        <td>{{ client.created_at }}</td>
                        <td>Mike</td>
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
                clients: [],
                url:'/api/v1/clients',
                pagination:[],
                noLeads:''
            }
        },

        mounted() {
            let app = this;
            axios.get(app.url)
                .then(function (resp) {
                    app.clients = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    app.noLeads = true;
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
            },

            makePagination(data){
                this.paginate  = {
                    current_page : data.current_page,
                    last_page : data.last_page,
                    next_page_url: data.next_page_url,
                    prev_page_url: data.prev_page_url,
                }
            }

        }
    }
</script>


<style scoped>

</style>