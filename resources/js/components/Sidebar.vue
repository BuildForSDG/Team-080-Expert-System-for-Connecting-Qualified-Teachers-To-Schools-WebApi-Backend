<template>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                  <img src="/img/default.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                  <p v-if="profile">{{ profile.first_name+' '+profile.last_name }}</p>
                  <a href="#"><i class="fa fa-user text-success"></i> Profile</a>
                  <a href="#"><i class="fa fa-power-off text-warning"></i> Logout</a>
                </div>
            </div>
            <ul class="sidebar-menu true" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <router-link to="/" tag="li">
                    <a>
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </router-link>
                <router-link to="/users" tag="li">
                    <a>
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                    </a>
                </router-link>
                <router-link to="/country" tag="li">
                    <a>
                        <i class="fa fa-flag"></i>
                        <span>Country</span>
                    </a>
                </router-link>
            </ul>
        </section>
    </aside>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
    computed: {
        ...mapGetters(['profile'])
    }
}
</script>
