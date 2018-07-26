<template>
    <div>

        <div class="form-group">
            <router-link :to="{name: 'createLead'}" class="button success">Create Lead</router-link>
        </div>

        <div class="card">
            <div class="card-divider">Leads List</div>
            <div class="card-section">

                <div class="" v-if="noLeads === true">
                    <p>niaje</p>
                </div>
                <div v-else>
                    <table class="table">
                        <thead>
                        <tr>
                            <th width="200">Name</th>
                            <th>Source</th>
                            <th width="200">FA assigned</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th width="200">&nbsp;</th>
                            <th width="200">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="lead, index in leads">

                            <td>{{ lead.name }}</td>

                            <td><a :href="lead.source">View</a></td>

                            <td>{{ lead.created_at }}</td>

                            <td>{{ lead.description }}</td>

                            <td>
                                <router-link :to="{name: 'editAdvisor', params: {id: lead.id}}" class="button small primary ">
                                    Edit
                                </router-link>
                            </td>
                            <td>
                                <a href="#"
                                   class="button small alert"
                                   v-on:click="confirmDelete(lead.id, index)">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "ViewLeads",

        data: function ()
        {
            return {
                leads: [],
                url:'/api/v1/leads',
                pagination:[],
                noLeads: false,
            }
        },

        mounted() {
            let app = this;
            axios.get(app.url)
                .then(function (resp)
                {
                    app.leads = resp.data;
                })
                .catch(function (resp)
                {
                    // console.log(resp);
                    app.noLeads = true
                });
        },

        methods: {
            deleteEntry(id, index)
            {
                let app = this;
                axios.delete('/api/v1/leads/' + id)
                    .then(function (resp) {
                        app.leads.splice(index, 1);
                    })
                    .catch(function (resp) {
                        alert("Could not delete Client");
                    });
            },

            confirmDelete(id, index)
            {
                this.$confirm('Do you really want to delete an Client?', 'Warning',
                    {
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Cancel',
                    type: 'warning'
                    })
                    .then(() => {

                        this.deleteEntry(id, index);

                        this.$message({
                            type: 'success',
                            message: 'Delete completed'
                        });
                    })
                    .catch(() => {
                        this.$message({
                            type: 'info',
                            message: 'Delete canceled'
                        });
                    });
            },

            makePagination(data)
            {
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