<template>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-body">
                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" class="form-control" v-model="form.first_name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" v-model="form.last_name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lastname">Email</label>
                                        <input type="text" class="form-control" v-model="form.email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phonenumber">Phone Number</label>
                                        <input type="text" class="form-control" v-model="form.phonenumber">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-success" @click="createUser">Save</button>
                        <button class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'UserForm',
        data() {
            return {
                form: {}
            }
        },
        created() {
            document.title = 'Create user | TeacherTurf'
            this.$store.commit('RECIEVE_TITLE', 'Create user')
        },
        methods: {
            createUser() {
                axios.post('/json/v1/users', this.form).then(res => {
                    //
                }).catch(err => {
                    console.log(err)
                })
            }
        }
    }
</script>
