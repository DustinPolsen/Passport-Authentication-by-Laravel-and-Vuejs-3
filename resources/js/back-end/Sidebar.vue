<template>
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img
          src="images/user2-160x160.jpg"
          class="img-circle elevation-2"
          alt="User Image"
        />
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ userName }}</a>
      </div>
    </div>
    <!-- Sidebar -->
    <nav class="mt-2">
      <ul
        class="nav nav-pills nav-sidebar flex-column"
        data-widget="treeview"
        role="menu"
        data-accordion="false"
      >
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <router-link to="/dashboard" active-class="active" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </router-link>
        </li>
        <li class="nav-item has-treeview">
          <router-link active-class="active" to="/header" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Admin-Settings
              <i class="right fas fa-angle-left"></i>
            </p>
          </router-link>
          <ul class="nav nav-treeview">
            <li class="nav-item" v-for="setting in settings" :key="setting">
              <router-link active-class="active" :to="setting.path" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ setting.name }}</p>
              </router-link>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
</template>

<script>
import { onMounted, ref } from "vue";
export default {
  data() {
    return {
      settings: [
        { path: "/header", name: "Header" },
        { path: "/footer", name: "Footer" },
      ],
    };
  },
  mounted() {
    console.log(this.$router.currentRoute);
  },
  setup() {
    const userName = ref("Rezwan Hossain");
    return { userName };
  },
};
</script>

<style></style>
