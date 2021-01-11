<template>
  <!-- Content Header (Page header) -->
  <Breadcrumb title="Header" link="/" name="Header" breadcrumb="Header / Details">
  </Breadcrumb>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content container ml-2">
    <div class="container-fluid">
      <div class="row">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Featured</h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">Special title treatment</h6>

            <p class="card-text">
              With supporting text below as a natural lead-in to additional content.
            </p>
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
import Breadcrumb from "../sub-components/Breadcrumb.vue";
export default {
  components: { Breadcrumb },
};
</script>

<style></style>
