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
                                        <label for="name">Country Name</label>
                                        <input type="text" class="form-control" v-model="form.long_name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-primary" @click="save">Save</button>
                        <button class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'CountryForm',
    data() {
        return {
            form: {}
        }
    },
    created() {
        if (this.$route.meta.mode === 'edit') {
            document.title = 'Edit Country | TeacherTurf'
            this.$store.commit('RECIEVE_TITLE', 'Edit country')
            this.editCountry()
        }else{
            document.title = 'Create Country | TeacherTurf'
            this.$store.commit('RECIEVE_TITLE', 'Create country')
        }
    },
    methods: {
        save() {
            if (this.$route.meta.mode === 'edit') {
                axios.put('/json/v1/country/'+this.$route.params.id, this.form).then(res => {
                    this.$router.push('/country')
                }).catch(err => {
                    //
                })
            return;
            }
            axios.post('/json/v1/country', this.form).then(res => {
                this.$router.push('/country')
            }).catch(err => {
                //
            })
        },
        editCountry() {
            axios.get('/json/v1/country/'+this.$route.params.id+'/edit').then(res => {
                this.form = res.data
            }).catch(err => {
                //
            })
        }
    }
}
</script>
