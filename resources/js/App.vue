<template>
    <div class="app">
        <navbar />
        <sidebar />
        <div class="content-wrapper">
            <section class="content-header"><h1>Manage Users</h1></section>
            <router-view />
        </div>
        <main-footer />
    </div>
</template>

<script>
import Navbar from '@/Navbar';
import Sidebar from '@/Sidebar';
import MainFooter from '@/Footer';
export default {
    components: {
        Navbar,
        Sidebar,
        MainFooter
    }
}
</script>
