<template>
  <div class="container">
    <router-link to="/register" class="float-right btn btn-success">
      Register
    </router-link>
    <div class="container col-md-4 mt-5">
      <div class="login-box">
        <div class="login-logo">
          <b>Login</b>
        </div>
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form @submit.prevent="submit()">
              <div class="input-group mb-3">
                <input
                  type="email"
                  class="form-control"
                  placeholder="Email"
                  v-model="state.form.email"
                />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input
                  type="password"
                  class="form-control"
                  placeholder="Password"
                  v-model="state.form.password"
                />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input
                      type="checkbox"
                      id="remember"
                      v-model="state.form.remember"
                    />
                    <label for="remember"> Remember Me </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">
                    <span v-if="!isLoading">Login</span>
                    <span v-else>⌛</span>
                  </button>
                </div>
                <!-- /.col -->
              </div>
            </form>

            <div class="social-auth-links text-center mb-3">
              <p>- OR -</p>
              <a href="/login/facebook" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
              </a>
              <a href="/login/google" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
              </a>
              <a href="/login/github" class="btn btn-block btn-success">
                <i class="fab fa-github fa-fw mr-2"></i> Sign in using Github
              </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
              <a href="forgot-password.html">I forgot my password</a>
            </p>
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, reactive } from "vue";
import { useStore } from "vuex";
export default {
  setup() {
    const store = useStore();
    const isLoading = ref(false);
    const state = reactive({
      form: {
        email: "admin@admin.com",
        password: "password",
      },
      errors: "",
    });
    const submit = () => {
      isLoading.value = true;
      axios.post("/login", state.form).then((res) => {
        localStorage.setItem("AToken", res.data);
        isLoading.value = false;
        store.commit("setIsLoggedIn");
        window.location.href = "/dashboard";
      });
    };
    /* return all the data and functions for the template */
    return { state, submit, isLoading };
  },
};
</script>

<style></style>
