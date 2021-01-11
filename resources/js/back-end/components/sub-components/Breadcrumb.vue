<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{ title }}</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
              <a :href="link">{{ name }}</a>
            </li>
            <li class="breadcrumb-item active">{{ breadcrumb }}</li>
          </ol>
        </div>
        <!-- /.col -->
      </div>
      <hr />
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
</template>

<script>
export default {
  props: ["title", "link", "name", "breadcrumb"],
  data() {
    return {
      link: this.link,
      name: this.name,
      breadcrumb: this.breadcrumb,
    };
  },
};
</script>

<style></style>
