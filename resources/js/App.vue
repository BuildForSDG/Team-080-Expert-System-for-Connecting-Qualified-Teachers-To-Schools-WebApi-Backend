<template>
    <div class="app">
        <navbar />
        <sidebar />
        <div class="content-wrapper">
            <section class="content-header"><h1>{{ title }}</h1></section>
            <router-view />
        </div>
        <main-footer />
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import Navbar from '@/Navbar';
import Sidebar from '@/Sidebar';
import MainFooter from '@/Footer';
export default {
    components: {
        Navbar,
        Sidebar,
        MainFooter
    },
    created(){
        this.$store.dispatch('userProfile')
    },
    computed: {
        ...mapGetters(['title'])
    }
}
</script>
