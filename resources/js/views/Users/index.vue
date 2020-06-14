<template>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <box-table
                    :models="users"
                    :theads="theads"
                    @callPage="fetchUsers"
                    :per_page="params.per_page"
                />
            </div>
        </div>
    </section>
</template>

<script>
import { mapGetters } from 'vuex';
import BoxTable from '@/BoxTable.vue'
export default {
    name: 'Users',
    components: {
        BoxTable
    },
   data() {
    return {
        theads: ['Fullname', 'Email', 'Gender', 'Actions'],
        params: {
            page: 1,
            per_page: 10
        }
    }
   },
   created() {
    document.title = "Users | TeacherTurf"
    this.$store.commit('RECIEVE_TITLE', 'Users')
    // this.$store.dispatch('getAllUsers', this.params)
    this.fetchUsers()
   },
   computed: {
    ...mapGetters(['users'])
   },
   methods: {
    fetchUsers(page, n) {
        switch(page) {
            case 'next':
                this.params.page++
                this.$store.dispatch('getAllUsers', this.params)
                break;
            case 'prev':
                this.params.page--
                this.$store.dispatch('getAllUsers', this.params)
                break;
            case 'per_page':
                this.params.per_page = n
                this.$store.dispatch('getAllUsers', this.params)
                break;
            default:
                this.$store.dispatch('getAllUsers', this.params)
        }
    }
   }
}
</script>

<style>
    .pagination-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .paginate-input {
        width: 45px;
    }
</style>
