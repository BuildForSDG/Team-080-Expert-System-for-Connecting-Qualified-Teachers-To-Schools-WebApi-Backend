<template>
    <div class="box box-default">
        <div class="box-header with-border">
            <h2 class="box-title">{{ title }}</h2>
            <div class="box-tools pull-right" v-if="create">
                <router-link :to="create" class="btn btn-sm btn-success">Create</router-link>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th v-for="(data,index) in theads" :keys="index">
                            {{ data }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <slot v-for="(item,index) in models.data" :item="item"></slot>
                </tbody>
            </table>
        </div>
        <div class="box-footer" v-if="models.data.length">
            <div class="pagination-footer">
                <div class="paginate-item">
                    <span>Per page:</span>
                    <select @change="changePerPage" v-model="per_page">
                        <option value="5">5</option>
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
                    <button
                        class="btn btn-default btn-sm"
                        @click="$emit('callPage', 'prev')"
                        :disabled="! models.prev_page_url"
                    >
                        Prev
                    </button>
                    <button
                        class="btn btn-default btn-sm"
                        @click="$emit('callPage', 'next')"
                        :disabled="! models.next_page_url"
                    >
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DataViewer',
    props: {
        title: {
            type: String
        },
        theads: {
            type: Array
        },
        models: {
            type: Object
        },
        create: {
            type: String
        }
    },
    data() {
        return {
            per_page: 5
        }
    },
    methods: {
        changePerPage() {
            this.$emit('callPage', 'per_page', this.per_page)
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
