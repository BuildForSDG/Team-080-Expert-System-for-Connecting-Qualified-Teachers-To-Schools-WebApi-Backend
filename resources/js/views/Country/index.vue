<template>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <data-viewer
                    :title="title"
                    :theads="theads"
                    :models="country"
                    @callPage="fetchCountries"
                    :create="create"
                >
                <template slot-scope="props">
                    <tr>
                        <td>{{ props.item.long_name }}</td>
                        <td>
                            <router-link :to="'/country/'+props.item.id+'/edit'" class="btn btn-primary btn-sm">
                                Edit
                            </router-link>
                        </td>
                    </tr>
                </template>
                </data-viewer>
            </div>
        </div>
    </section>
</template>

<script>
import { mapGetters } from 'vuex';
import BoxTable from '@/BoxTable.vue';
import DataViewer from '@/DataViewer';
export default {
    name: 'Country',
    components: {
        DataViewer
    },
    data() {
        return {
            title: 'Country',
            theads: ['Country Name', 'Actions'],
            create: '/country/create',
            params: {
                page: 1,
                per_page: 5
            }
        }
    },
    created() {
        document.title = 'Country | TeacherTurf'
        this.fetchCountries()
    },
    methods: {
        fetchCountries(page, n) {
            switch(page) {
                case 'next':
                    this.params.page++
                    this.$store.dispatch('getAllCountries', this.params)
                    break;
                case 'prev':
                    this.params.page--
                    this.$store.dispatch('getAllCountries', this.params)
                    break;
                case 'per_page':
                    this.params.per_page = n
                    this.$store.dispatch('getAllCountries', this.params)
                    break;
                default:
                    this.$store.dispatch('getAllCountries', this.params)
            }
        }
    },
    computed: {
        ...mapGetters(['country'])
    }
}
</script>
