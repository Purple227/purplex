
<template>

	<div class="card"> <!-- Card tag open -->

		<form v-on:submit.prevent="submit"> <!-- Form tag open -->

			<header class="card-header">
				<p class="card-header-title is-centered">
					<i class="fas fa-file-signature is-bold fa-lg">
						Register Form
					</i> 
				</p>
			</header>

			<div class="notification has-text-white is-primary" v-if="register.errors">
				<button class="delete" @click='register.errors = null'></button>
				<ul>
					<li>{{register.errors.email[0]}}</li>
					<li>{{register.errors.password[0]}}</li>
					<li>{{register.errors.name[0]}}</li>
				</ul>
			</div>

			<div class="card-content"> <!-- card content tag open -->

				<h2 class="subtitle has-text-white has-text-centered is-bold">  Step: {{ formStep.step }} of {{ formStep.totalStep }} </h2>

				<div class="content" style="margin-top: 2%;">

					<div class="" v-if="formStep.step == 1"> <!-- step 1 wrapper tag open -->

						<div class="field">
							<label class="label"> Name <span class="has-text-link"> * </span> <span class="is-pulled-right"> {{register.name.length}}/ {{ $v.register.name.$params.maxLength.max }} </span> </label>						
							<div class="control has-icons-left has-icons-right">
								<input class="input is-success" type="text" v-model.trim="register.name" placeholder="Name here" required autofocus autocomplete="on" >
								<span class="icon is-small is-left">
									<i class="fas fa-user fa-lg has-text-success"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle has-text-link" v-if="$v.register.name.$invalid"> </i>
									<i class="fas fa-check has-text-success" v-else> </i>
								</span>
							</div>
						</div>

						<div class="field">
							<label class="label"> Email </label>						

							<div class="control has-icons-left has-icons-right">
								<input class="input is-success" type="email" v-model.trim="register.email" placeholder="Email here" required autofocus autocomplete="on" >
								<span class="icon is-small is-left">
									<i class="fas fa-at has-text-success"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle has-text-link" v-if="$v.register.email.$invalid"> </i>
									<i class="fas fa-check has-text-success" v-else> </i>
								</span>
							</div>
						</div>

					</div> <!-- step 1 wrapper tag close -->


					<div class="" v-if="formStep.step == 2"> <!-- step 2 wrapper tag open -->
						<div class="field">
							<label class="label"> Password
							</label>

							<div class="control has-icons-left has-icons-right">
								<input class="input is-success" type="password" v-model.trim="register.password">
								<span class="icon is-small is-left">
									<i class="fas fa-key has-text-success"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle has-text-link" v-if="$v.register.password.$invalid"> </i>
									<i class="fas fa-check has-text-success" v-else> </i>
								</span>
							</div>
						</div>


						<div class="field">
							<label class="label"> Repeat Password
							</label>
							<div class="control has-icons-left has-icons-right">
								<input class="input is-success" type="password" v-model.trim="register.passwordConfirmation">
								<span class="icon is-small is-left">
									<i class="fas fa-key has-text-success"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle has-text-link" v-if="$v.register.passwordConfirmation.$invalid"> </i>
									<i class="fas fa-check has-text-success" v-else> </i>
								</span>
							</div>
						</div>

					</div> <!-- Step 2 wrapper tag close -->

				</div>

			</div>  <!-- card content tag close -->


			<footer class="card-footer">

				<a class="card-footer-item green is-bold" v-if="formStep.step != 1" v-on:click.prevent="prevous" >Previous</a>

				<a class="card-footer-item green is-bold" v-if="formStep.step != formStep.totalStep" v-on:click.prevent="next">
					Next
				</a>

				<button class="card-footer-item green is-bold subtitle is-6 is_borderless pointer" style="background-color: #340659; " v-if="formStep.step == formStep.totalStep"> Register</button>

			</footer>

		</form>  <!-- Form tag close -->

	</div>  <!-- Card tag close -->


</template>




<script>
import { required, minLength, maxLength, sameAs, email } from 'vuelidate/lib/validators'

export default{

	data() {
		return{

			register: {
				name: "",
				email: null,
				password: null,
				passwordConfirmation: null,
				errors: null,
			},

			formStep: {
				step: 1,
				totalStep: 2,
			},
		}
	},

	validations: {
		register: {
			name: {
				required,
				maxLength: maxLength(20)
			},
			email: {
				required,
				email,
				maxLength: maxLength(255)
			},
			password: {
				required,
				minLength: minLength(6)
			},
			passwordConfirmation: {
				sameAsPassword: sameAs('password')
			},
		}
	},


	methods: {

		next() {
			this.formStep.step++;
		},

		prevous() {
			this.formStep.step--;
		},

		submit() {
			let api = "register"

			this.axios.post(api, {
				name: this.register.name,
				email: this.register.email,
				password: this.register.password,
				password_confirmation: this.register.passwordConfirmation
			}).then((response) => {
            //will make a decision as i progress
            this.$router.go()

        }).catch(error=>{
        	this.register.errors = error.response.data.errors
        })
    }
}

}
</script>
