
<template>
    <div>
        <div class="form-group">
            <router-link to="/view_fa" class="button primary">Back</router-link>
        </div>


        <div class="form-group">
            <button type="submit" @click="sendMail()" class="button ">Send MAIL</button>
        </div>

        <div class="card" style="width: 500px;margin: 0 auto;padding-left:50px;">
            <div class="card-divider">Create new company</div>
            <div class="card-section">
                <form v-on:submit="saveForm()">
                    <div class="row">
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
                            <input type="number" name="phone" maxlength="10" minlength="10" v-model="advisor.phone" class="form-control" required>
                            </label>
                            <p class="help-text">0722000000</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-7 cell form-group">
                            <label>Default Password:
                            <input type="password" name="password" v-model="advisor.password" value="Chancery1" class="form-control disabled" required>
                            </label>
                        </div>
                    </div>
                    <div class="row">
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
                    <div class="row">
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
                    phone: '',
                    password: '',
                    rank: '',
                },
                message:''
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                let app = this;
                let newAdvisor = app.advisor;
                axios.post('/api/v1/advisors', newAdvisor)
                    .then(function (resp) {
                        app.successCreate()
                        app.$router.push({path: '/admin_dash'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        app.errorCreate()
                        // alert("Could not create an Advisor");
                    });
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
                    message: 'Could not create an Advisor',
                    type: 'danger'
                });
            },
            sendMail(){
                event.preventDefault();
                axios.post('/ConfirmAccountMail').then(function (resp) {
                   app.$router.push({path: '/admin_dash'});
               })
            }

        }
    }
</script>
