
<template>
    <div>
        <div class="form-group">
            <router-link to="/view_fa" class="button primary">Back</router-link>
        </div>


        <div class="card">
            <div class="card-divider">Create New Financial Advisor</div>
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
                    <div class="grid-x">
                        <div class="medium-7 cell form-group">
                            <label>Email:
                            <input type="email" name="email" v-model="advisor.email" class="form-control" required>
                            </label>
                        </div>
                    </div>
                    <div class="grid-x">
                        <div class="medium-7 cell form-group">
                            <label>Phone:
                            <input type="number" name="phone" maxlength="10" pattern=".{3,}" v-model="advisor.phone" class="form-control" required>
                            </label>
                            <p class="help-text">0722000000</p>
                        </div>
                    </div>
                    <div class="grid-x">
                        <div class="medium-7 cell form-group">
                            <label>Default Password:
                            <input type="password" name="password" v-model="advisor.password" value="Chancery1" class="form-control disabled" readonly>
                            </label>
                        </div>
                    </div>

                    <input type="text" v-model="advisor.activation_code" name="activation_code" class="hidden">
                    <div class="grid-x">
                        <div class="medium-7 cell form-group">
                            <label>FA Rank:
                                <select name="rank" class="form-control" v-model="advisor.rank">
                                    <option value="">Choose Rank ...</option>
                                    <option value="0">Intern</option>
                                    <option value="1">Junior</option>
                                    <option value="2">Senior</option>
                                    <option value="3">Supervisor</option>
                                </select>
                            </label>
                        </div>
                    </div>
                    <div class="grid-x">
                        <div class="medium-7 cell">
                            <button class="button success">Create FA</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                advisor: {
                    name: '',
                    email: '',
                    phone: null,
                    password: 'Chancery1',
                    activation_code: ""+(Math.trunc(((Number)(Math.random()*9000)+1000))),
                    rank: '',
                },
                message:'',
                errors:[],
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();

                let app = this;

                app.errors = [];
                app.phone = app.advisor.phone;

                if ((((app.phone).toString()).length)!==10) {
                    this.errors.push('Enter Correct Phone Number #count');
                }else{
                    let newAdvisor = app.advisor;

                    axios.post('/api/v1/advisor/', newAdvisor)
                        .then(function (resp) {
                            app.successCreate()
                            app.$router.push({path: '/view_fa'});
                        })
                        .catch(function (resp) {
                            console.log(resp);
                            app.errorCreate()
                        });
                }
            },
            successCreate() {
                this.$message({
                    showClose: true,
                    message: 'Financial Advisor Created.',
                    type: 'success'
                });
            },
            errorCreate() {
                this.$message({
                    showClose: true,
                    message: 'Could not create an Advisor; Email in use',
                    type: 'danger'
                });
            },
            sendMail(){
                event.preventDefault();
                axios.post('/ConfirmAccountMail').then(function (resp) {
                   app.$router.push({path: '/view_fa'});
               })
            }

        }
    }
</script>

<style scoped>
    .err li{
        list-style: none;
    }
    .hidden{
        display: none;
    }
</style>
