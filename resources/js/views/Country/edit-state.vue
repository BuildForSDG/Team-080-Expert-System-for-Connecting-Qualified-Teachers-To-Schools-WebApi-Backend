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
                                        <input type="text" class="form-control" v-model="form.name">
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
                <data-viewer
                    :theads="theads"
                    :models="allTowns"
                    title="Towns"
                >
                    <template slot-scope="props">
                        <tr>
                            <td>{{ props.item.name }}</td>
                            <td>
                                <router-link :to="'/state/'+props.item.id+'/edit'" class="btn btn-primary btn-sm">
                                    Edit
                                </router-link>
                            </td>
                        </tr>
                    </template>
                </data-viewer>
            </div>
            <div class="col-md-4" v-if=" $route.meta.mode === 'edit' ">
                <div class="box box-primary">
                    <div class="box-body">
                        <form>
                            <div class="form-group" v-for="(item,index) in towns">
                                <label for="name">Town Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" v-model="item.name">
                                    <div class="input-group-btn">
                                        <button
                                            type="button"
                                            class="btn btn-danger"
                                            @click="towns.splice(index,1)"
                                        >
                                            &times;
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="box-footer">
                        <button type="button" class="btn btn-success" @click="towns.push({name: ''})">Add</button>
                        <button type="button" class="btn btn-primary" @click="createTown">save</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import DataViewer from '@/DataViewer'
export default {
    name: 'CountryForm',
    components: {
        DataViewer
    },
    data() {
        return {
            form: {},
            towns: [
                {name:''},
                {name:''},
                {name:''},
                {name:''}
            ],
            theads: ['ID', 'Name'],
            allTowns: {data: []},
            params: {
                page: 1,
                per_page: 5
            }
        }
    },
    created() {
        if (this.$route.meta.mode === 'edit') {
            document.title = 'Edit State | TeacherTurf'
            this.$store.commit('RECIEVE_TITLE', 'Edit country')
            this.editState()
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
        editState() {
            axios.get('/json/v1/states/'+this.$route.params.id+'/edit').then(res => {
                this.form = res.data
                this.getAllTowns(res.data.id)
            }).catch(err => {
                //
            })
        },
        createTown() {
            var form = {}
            form.state_id = this.form.id
            form.towns = this.towns
            axios.post('/json/v1/city', form).then(res => {
                this.towns.forEach((item) => {
                    this.allTowns.data.push(item)
                })
            }).catch(err => {
                //
            })
        },
        getAllTowns(id) {
            axios.get('/json/v1/city', {
                params:{
                    state_id: id,
                    page: this.params.page,
                    per_page: this.params.per_page
                }}).then(res => {
                this.allTowns = res.data
            }).catch(err => {
                //
            })
        }
    }
}
</script>
