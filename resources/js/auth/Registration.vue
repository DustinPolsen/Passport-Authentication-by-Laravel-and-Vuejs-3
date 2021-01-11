<template>
  <div class="container col-md-4 mt-5">
    <div class="register-box">
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a class="h1"><b>Registration</b></a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">Register a new membership</p>

          <form @submit.prevent="submit()">
            <div class="input-group mb-3">
              <input
                type="text"
                class="form-control"
                placeholder="Full name"
                v-model="data.form.name"
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input
                type="email"
                class="form-control"
                placeholder="Email"
                v-model="data.form.email"
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
                v-model="data.form.password"
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input
                type="password"
                class="form-control"
                placeholder="Retype password"
                v-model="data.form.password_confirmation"
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
                    id="agreeTerms"
                    value="agree"
                    v-model="data.form.terms"
                  />
                  <label for="agreeTerms">
                    I agree to the
                    <router-link to="#">terms</router-link>
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <div class="social-auth-links text-center">
            <a href="#" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i>
              Sign up using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
              <i class="fab fa-google-plus mr-2"></i>
              Sign up using Google+
            </a>
          </div>

          <router-link to="/login" class="text-center"
            >I already have a membership</router-link
          >
        </div>
        <!-- /.form-box -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</template>

<script>
import { reactive } from "vue";
export default {
  setup() {
    const data = reactive({
      form: {
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        terms: "",
      },
    });

    const submit = async () => {
      const { data } = await axios.post("http://127.0.0.1:8000/api/register");
      console.log(data);
    };
    return { data, submit };
  },
};
</script>

<style></style>
