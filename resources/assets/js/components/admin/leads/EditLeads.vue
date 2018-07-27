<template>
    <div>
        <div class="form-group">
            <router-link to="/view_leads" class="btn btn-default">Back</router-link>
        </div>

        <div class="card">
            <div class="card-divider">Edit &nbsp;<strong>&nbsp;{{lead.name}}</strong></div>
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
        mounted() {

            axios.get('/api/v1/leads/' + this.$route.params.id)
                .then(({data}) => {
                    this.lead = data;
                }, () => {
                    console.log("Error");
                })

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

        props: ['id'],

        data: function () {
            return {
                leadsId: this.$route.params.id,
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
                let app = this;
                event.preventDefault();

                axios.patch('/api/v1/leads/' + app.leadsId, app.lead)
                    .then((response) => {
                        let data = response.data;

                        if (data.success){
                            app.$router.push({path: '/view_leads'});
                        }
                    }, () => {
                        console.log('Error')
                    })
            },
            successCreate() {
                this.$message({
                    showClose: true,
                    message: 'Financial Advisor Updated.',
                    type: 'success'
                });
            },
        },
    }
</script>