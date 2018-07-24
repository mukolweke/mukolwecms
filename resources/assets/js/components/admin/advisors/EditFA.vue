
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
