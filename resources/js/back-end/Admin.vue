<template>
  <!-- Navbar -->
  <navbar></navbar>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <logo></logo>
    <sidebar></sidebar>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"><router-view></router-view></div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">Anything you want</div>
    <!-- Default to the left -->
    <strong
      >Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong
    >
    All rights reserved.
  </footer>
  <!-- ./wrapper -->
</template>

<script>
import Sidebar from "./Sidebar.vue";
import Navbar from "./Navbar.vue";
import Logo from "./Logo.vue";
export default {
  components: { Sidebar, Navbar, Logo },
};
</script>

<style></style>
