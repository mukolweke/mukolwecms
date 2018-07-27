<template>
    <div>
        <div class="form-group">
            <router-link to="/view_leads" class="button primary">Back</router-link>
        </div>


        <div class="card">
            <div class="card-divider">Create Lead</div>
            <div class="card-section create_fa">

                <form v-on:submit="saveForm()">
                    <div class="grid-x">
                        <div class="medium-7 cell form-group">
                            <label>Lead Name:
                                <input type="text" name="name" v-model="lead.name" class="form-control" required>
                            </label>
                        </div>
                    </div>
                    <div class="grid-x">
                        <div class="medium-7 cell form-group">
                            <label>Source:
                                <input type="text" name="source" v-model="lead.source" class="form-control" required>
                            </label>
                        </div>
                    </div>
                    <div class="grid-x">
                        <div class="medium-7 cell form-group">
                            <label>Description:
                                <textarea name="description" v-model="lead.description" class="form-control"
                                          id="description" rows="8"></textarea>
                            </label>
                        </div>
                    </div>
                    <div class="grid-x">
                        <div class="medium-7 cell form-group">
                            <label>Assign Financial Advisor:
                                <select name="rank" class="form-control"  v-model="lead.advisor_id">
                                    <option value="">Choose FA ...</option>
                                    <option v-for="advisor, index in advisors" :value="advisor.id">{{ advisor.name }}</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="grid-x">
                    <div class="medium-7 cell form-group">
                            <button class="button success">Create Lead</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateLead",
        data: function () {
            return {
                lead: {
                    name: '',
                    source: '',
                    description: '',
                    advisor_id: '',
                    noLeads: false,
                },
                advisors:[]
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();

                let app = this;

                let newLead = app.lead;

                axios.post('/api/v1/leads', newLead)
                    .then(function (resp) {
                        app.successCreate()
                        app.$router.push({path: '/view_leads'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        app.errorCreate()
                    });
            },
            successCreate() {
                this.$message({
                    showClose: true,
                    message: 'Lead successfuly created',
                    type: 'success'
                });
            },
            errorCreate() {
                this.$message({
                    showClose: true,
                    message: 'Could not create a Lead',
                    type: 'danger'
                });
            },
            sendMail() {
                event.preventDefault();
                axios.post('/ConfirmAccountMail').then(function (resp) {
                    app.$router.push({path: '/view_leads'});
                })
            },

        },
        mounted() {
            let vm=this;
            axios.get('/api/v1/advisor/')
                .then(function (resp) {
                    console.log(resp)
                    vm.advisors = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                });
        },

    }
</script>

<style scoped>

</style>