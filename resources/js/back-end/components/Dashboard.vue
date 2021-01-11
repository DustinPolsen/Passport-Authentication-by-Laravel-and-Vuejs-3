<template>
  <!-- Content Header (Page header) -->
  <Breadcrumb title="Dashboard" link="/" name="Dashboard" breadcrumb="Dashbord / Details">
  </Breadcrumb>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content container ml-2">
    <div class="container-fluid">
      <div class="row">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Header</h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">Special title treatment</h6>

            <p class="card-text">Total User : {{ data.users }}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</template>

<script>
import { onMounted, reactive } from "vue";
import Breadcrumb from "./sub-components/Breadcrumb.vue";
import { useStore } from "vuex";
export default {
  components: { Breadcrumb },
  setup() {
    const store = useStore();
    const data = reactive({
      users: "",
    });
    onMounted(() => {
      store.dispatch("getUser");
      data.users = store.state.auth;
    });
    return { data };
  },
};
</script>

<style></style>
