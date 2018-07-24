
<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.advisorId = id;
            axios.get('/api/v1/advisors/' + id)
                .then(function (resp) {
                    app.advisor = resp.data;
                })
                .catch(function () {
                    alert("Could not load FA List")
                });
        },
        props: ['id'],
        data: function () {
            return {
                advisorId: null,
                advisor: {
                    name: '',
                    email: '',
                    phone: '',
                    password: '',
                    rank: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                let app = this;
                let newAdvisor = app.advisor;
                axios.patch('/api/v1/advisors/' + app.advisorId, newAdvisor)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not Update Avisors Details");
                    });
            }
        }
    }
</script>

<template>
    <div>
        <div class="form-group">
            <router-link to="/admin_dash" class="btn btn-default">Back</router-link>
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