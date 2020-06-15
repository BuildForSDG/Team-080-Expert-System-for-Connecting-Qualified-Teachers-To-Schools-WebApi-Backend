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
                <data-viewer
                    :theads="theads"
                    :models="allStates"
                    title="States"
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
                            <div class="form-group" v-for="(item,index) in states">
                                <label for="name">State Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" v-model="item.name">
                                    <div class="input-group-btn">
                                        <button
                                            type="button"
                                            class="btn btn-danger"
                                            @click="states.splice(index,1)"
                                        >
                                            &times;
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="box-footer">
                        <button type="button" class="btn btn-success" @click="states.push({name: ''})">Add</button>
                        <button type="button" class="btn btn-primary" @click="createState">save</button>
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
            states: [
                {name:''},
                {name:''},
                {name:''},
                {name:''}
            ],
            theads: ['ID', 'Name'],
            allStates: {data: []},
            params: {
                page: 1,
                per_page: 5
            }
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
                this.getAllStates(res.data.id)
            }).catch(err => {
                //
            })
        },
        createState() {
            var form = {}
            form.country_id = this.form.id
            form.states = this.states
            axios.post('/json/v1/states', form).then(res => {
                //
            }).catch(err => {
                //
            })
        },
        getAllStates(id) {
            axios.get('/json/v1/states', {
                params:{
                    country_id: id,
                    page: this.params.page,
                    per_page: this.params.per_page
                }}).then(res => {
                this.allStates = res.data
            }).catch(err => {
                //
            })
        }
    }
}
</script>
