
<template>

	<div class="card"> <!-- Card tag open -->

		<form v-on:submit.prevent="submitForm"> <!-- Form tag open -->

			<header class="card-header">
				<p class="card-header-title is-centered">
					<i class="fas fa-file-signature is-bold fa-lg">
						Login to gain permission
					</i> 
				</p>
			</header>

			<div class="notification has-text-white is-primary" v-if="login.errors">
				<button class="delete" @click='login.errors = null'></button>
				<ul>
					<li>{{ login.errors }}</li>
				</ul>
			</div>

			<div class="card-content"> <!-- card content tag open -->

						<div class="field">
							<label class="label"> Email </label>
							<div class="control has-icons-left has-icons-right">
								<input class="input is-success" type="email" v-model.trim="login.email" placeholder="Email here" required autofocus autocomplete="on" >
								<span class="icon is-small is-left">
									<i class="fas fa-at has-text-success"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle has-text-link" v-if="$v.login.email.$invalid"> </i>
									<i class="fas fa-check has-text-success" v-else> </i>
								</span>
							</div>
						</div>

						<div class="field">
							<label class="label"> Password
							</label>
							<div class="control has-icons-left has-icons-right">
								<input class="input is-success" type="password" v-model.trim="login.password">
								<span class="icon is-small is-left">
									<i class="fas fa-key has-text-success"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle has-text-link" v-if="$v.login.password.$invalid"> </i>
									<i class="fas fa-check has-text-success" v-else> </i>
								</span>
							</div>
						</div>


                <div class="field has-addons has-addons-centered">
                  <p class="control">
                    <a class="button is-primary is-static is-bold has-text-black">
                      Remember Me
                    </a>
                    <label class="switch">
                      <input type="checkbox" v-model="login.remember" true-value="on" false-value="off" >
                      <span class="slider"></span>
                    </label>
                  </p>
                </div>


			</div>  <!-- card content tag close -->


			<footer class="card-footer">

				<button class="card-footer-item green is-bold subtitle is-6 is_borderless pointer" style="background-color: #340659;" v-bind:class="[{ 'is-loading': loading, 'button': loading  }]" @click="loading = true"> Login </button>

			</footer>

		</form>  <!-- Form tag close -->

	</div>  <!-- Card tag close -->


</template>


  <script>
  import { required, minLength, maxLength, email } from 'vuelidate/lib/validators'
  import Register from './register.vue'

  export default{

  components: {
    'register': Register,
  },

    data() {
      return{
        login: {
          email: null,
          password: null,
          remember: null,
          errors: null,
        },
        status: null,
        loading: null,
      }
    },

    validations: {
      login: {

        email: {
          required,
          email,
          maxLength: maxLength(255)
        },
        password: {
          required,
          minLength: minLength(6)
        },

      }
    },


    methods: {

      submitForm() {

        let api = "login"
        let errors 

        this.axios.post(api, {
          email: this.login.email,
          password: this.login.password,
          remember: this.login.remember,
        }).then((response) => {
            //will make a decision as a progress
            this.loading = false
            this.$router.go()
          }).catch(error=>{
            if(error.response.status==422){
              this.login.errors = error.response.data.errors.email[0]
              this.loading = false
            }
          })
        } //submitForm function calibrace closes

      }

    }
    </script>

