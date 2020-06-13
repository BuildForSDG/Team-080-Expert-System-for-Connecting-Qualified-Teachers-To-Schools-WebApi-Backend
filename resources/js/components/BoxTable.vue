<template>
    <div class="box box-default">
        <div class="box-header with-border">
            <h2 class="box-title">Users</h2>
            <div class="box-tools pull-right">
                <router-link to="/create" class="btn btn-success btn-sm">Create</router-link>
            </div>
        </div>
        <div class="box-body" v-if="models.data.length">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th v-for="(data,index) in theads" :keys="index">{{ data }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item,index) in models.data">
                        <td>{{ item.first_name + ' ' + item.last_name }}</td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.gender }}</td>
                        <td>
                            <router-link to="/" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i>
                            </router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="box-footer" v-if="models.data.length">
            <div class="pagination-footer">
                <div class="paginate-item">
                    <span>Per page:</span>
                    <select @change="changePerPage" v-model="per_page">
                        <option value="10">10</option>
                        <option value="20">20</option>
                    </select>
                </div>
                <div class="paginate-item">
                    <small>Showing {{ models.from + ' - ' + models.to + ' of ' + models.total }}</small>
                </div>
                <div class="paginate-item">
                    <small>Current page:</small>
                    <input type="text" class="paginate-input" v-model="models.current_page">
                    <small>of 1</small>
                </div>
                <div class="paginate-item">
                    <button class="btn btn-default btn-sm" @click="$emit('callPage', 'prev')">Prev</button>
                    <button class="btn btn-default btn-sm" @click="$emit('callPage', 'next')">Next</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'BoxTable',
    props: {
        models: {
            type: Object
        },
        theads: {
            type: Array
        }
    },
    data() {
        return {
            per_page: 10
        }
    },
    methods: {
        changePerPage() {
            this.$emit('callPage', 'per_page', this.per_page)
        }
    }
}
</script>
