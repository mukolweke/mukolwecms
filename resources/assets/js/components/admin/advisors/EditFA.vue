<template>
    <div>
        <div class="form-group">
            <router-link to="/admin_dash" class="btn btn-default">Back</router-link>
        </div>

        <div class="card">
            <div class="card-divider">Edit &nbsp;<strong>&nbsp;{{advisor.name}}</strong></div>
            <div class="card-section create_fa">
                <form v-on:submit="saveForm()">
                    <div class="grid-x">
                        <div class="medium-7 cell">
                            <el-alert v-if="errors.length" type="error">
                                <ul class="err">
                                    <li v-for="error in errors">{{ error }}</li>
                                </ul>
                            </el-alert>
                        </div>
                    </div>
                    <div class="grid-x">
                        <div class="medium-7 cell form-group">
                            <label>Name:
                                <input type="text" name="name" v-model="advisor.name" class="form-control" required>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-7 cell form-group">
                            <label>Email:
                                <input type="email" name="email" v-model="advisor.email" class="form-control" required>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-7 cell form-group">
                            <label>Phone:
                                <input type="number" name="phone" maxlength="10" minlength="10" v-model="advisor.phone"
                                       class="form-control" required>
                            </label>
                            <p class="help-text">0722000000</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="medium-7 cell form-group">
                            <label>FA Rank:
                                <select name="rank" class="form-control" v-model="advisor.fa_rank">
                                    <option value="">Choose Rank ...</option>
                                    <option value="0">Intern</option>
                                    <option value="1">Junior</option>
                                    <option value="2">Senior</option>
                                    <option value="3">Supervisor</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-7 cell">
                            <button class="button success">Update FA</button>
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

            axios.get('/api/v1/advisor/' + this.$route.params.id)
                .then(({data}) => {
                    this.advisor = data;
                }, () => {
                    console.log("Error");
                })
        },

        props: ['id','title'],

        data: function () {
            return {
                advisorId: this.$route.params.id,
                advisor: {
                    name: '',
                    email: '',
                    phone: null,
                    rank: null,
                },
                errors:[],
                message:'',
            }
        },

        methods: {
            saveForm() {
                let app = this;
                event.preventDefault();

                app.errors = [];
                app.phone = app.advisor.phone;

                if ((((app.phone).toString()).length)!==10) {
                    this.errors.push('Enter Correct Phone Number #count');
                }else {
                    axios.patch('/api/v1/advisor/' + app.advisorId, app.advisor)
                        .then((response) => {
                            let data = response.data;

                            if (data.success) {
                                app.$router.push({path: '/view_fa'});
                            }
                        }, () => {
                            console.log('Error')
                        })
                }
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