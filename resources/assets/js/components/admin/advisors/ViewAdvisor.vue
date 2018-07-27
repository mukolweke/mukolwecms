<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createAdvisor'}" class="button success">Create new FA</router-link>
        </div>


        <div class="card" style="width:1000px;margin-top:30px;">
            <div class="card-divider">Financial Advisors</div>
            <div class="card-section">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Rank</th>
                        <th width="200">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="advisor, index in advisors">
                        <td>{{ advisor.name }}</td>
                        <td>{{ advisor.email }}</td>
                        <td>{{ advisor.phone }}</td>
                        <template v-if="advisor.fa_rank === 0">
                            <td>Intern FA</td>
                        </template>
                        <template v-else-if="advisor.fa_rank === 1">
                            <td>Junior FA</td>
                        </template>
                        <template v-if="advisor.fa_rank === 2">
                            <td>Senior FA</td>
                        </template>
                        <template v-if="advisor.fa_rank === 3">
                            <td>Supervisor</td>
                        </template>
                        <td>
                            <router-link :to="{name: 'editAdvisor', params: {id: advisor.id}}" class="button small primary ">
                                Edit
                            </router-link>
                            <a href="#"
                               class="button small alert"
                               v-on:click="confirmDelete(advisor.id, index)">
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
        name: "ViewAdvisor",

        data: function () {
            return {
                advisors: []
            }
        },

        mounted() {
            let app = this;
            axios.get('/api/v1/advisor/')
                .then(function (resp) {
                    app.advisors = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                });
        },

        methods: {
            deleteEntry(id, index) {
                let app = this;
                axios.delete('/api/v1/advisor/' + id)
                    .then(function (resp) {
                        app.advisors.splice(index, 1);
                    })
                    .catch(function (resp) {
                        Console.log("Could not delete FA");
                    });
                // }
            },

            confirmDelete(id, index) {
                this.$confirm('Deleting an Advisor?', 'Warning', {
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