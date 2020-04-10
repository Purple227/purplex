
<template>

	<div class="card"> <!-- Card tag open -->

		<form v-on:submit.prevent="submitForm"> <!-- Form tag open -->

			<header class="card-header">
				<p class="card-header-title is-centered">
					<i class="fas fa-file-signature is-bold fa-lg">
						Update Security Details
					</i> 
				</p>
			</header>

			<div class="notification has-text-white is-primary" v-if="updateData.errors">
				<button class="delete" @click='updateData.errors = false'></button>
				<ul>
					<li> {{ updateData.errors }} </li>
				</ul> 
			</div>

			<div class="card-content"> <!-- card content tag open -->

				<h2 class="subtitle has-text-white has-text-centered is-bold">  Step: {{ formStep.step }} of {{ formStep.totalStep }} </h2>

				<div class="content" style="margin-top: 2%;">

					<div class="" v-if="formStep.step == 1"> <!-- step 1 wrapper tag open -->
						<div class="field">
							<label class="label"> Old Password
							</label>

							<div class="control has-icons-left has-icons-right">
								<input class="input is-success" type="password" v-model.trim="updateData.passwordQuerry" v-on:keyup="submitForm">
								<span class="icon is-small is-left">
									<i class="fas fa-key has-text-success"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle has-text-link" v-if="updateData.passwordStatus == false"> </i>
									<i class="fas fa-check has-text-success" v-else> </i>
								</span>
							</div>
						</div>


					<div class="" v-if="updateData.passwordStatus == true"> <!-- Password success wrapper -->
						<div class="field">
							<label class="label"> New Password
							</label>
							<div class="control has-icons-left has-icons-right">
								<input class="input is-success" type="password" v-model.trim="updateData.password">
								<span class="icon is-small is-left">
									<i class="fas fa-key has-text-success"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle has-text-link" v-if="$v.updateData.password.$invalid"> </i>
									<i class="fas fa-check has-text-success" v-else> </i>
								</span>
							</div>
						</div>

						<div class="field">
							<label class="label"> Repeat New Password
							</label>
							<div class="control has-icons-left has-icons-right">
								<input class="input is-success" type="password" v-model.trim="updateData.passwordConfirmation">
								<span class="icon is-small is-left">
									<i class="fas fa-key has-text-success"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle has-text-link" v-if="$v.updateData.passwordConfirmation.$invalid"> </i>
									<i class="fas fa-check has-text-success" v-else> </i>
								</span>
							</div>
						</div>
					</div> <!-- Password sucess wrapper close -->

					</div> <!-- Step 1 wrapper tag close -->


					<div class="" v-if="formStep.step == 2"> <!-- step 2 wrapper tag open -->

						<div class="field">
							<label class="label">Old Email </label>						

							<div class="control has-icons-left has-icons-right">
								<input class="input is-success" type="email" v-model.trim="updateData.emailQuerry" placeholder="Email here" v-on:keyup="submitForm">
								<span class="icon is-small is-left">
									<i class="fas fa-at has-text-success"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle has-text-link" v-if="updateData.emailStatus == true"> </i>
									<i class="fas fa-check has-text-success" v-else> </i>
								</span>
							</div>
						</div>

						<div class="field" v-if="updateData.emailStatus == true">
							<label class="label">New Email </label>						

							<div class="control has-icons-left has-icons-right">
								<input class="input is-success" type="email" v-model.trim="updateData.email" placeholder="Email here" >
								<span class="icon is-small is-left">
									<i class="fas fa-at has-text-success"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle has-text-link" v-if="$v.updateData.email.$invalid"> </i>
									<i class="fas fa-check has-text-success" v-else> </i>
								</span>
							</div>
						</div>

					</div> <!-- step 2 wrapper tag close -->

				</div>

			</div>  <!-- card content tag close -->


			<footer class="card-footer">

				<a class="card-footer-item green is-bold" v-if="formStep.step != 1" v-on:click.prevent="prevous" >Previous</a>

				<a class="card-footer-item green is-bold" v-if="formStep.step != formStep.totalStep" v-on:click.prevent="next">
					Change Email
				</a>

				<button class="card-footer-item green is-bold subtitle is-6 is_borderless pointer" style="background-color: #340659;" @click="updateData.save = true"> Update </button>

			</footer>

		</form>  <!-- Form tag close -->

	</div>  <!-- Card tag close -->


</template>


<script>
import { required, minLength, maxLength, sameAs, email } from 'vuelidate/lib/validators'

export default{

	data() {
		return{
			updateData: {
				email: null,
				emailQuerry: "",
				password: null,
				passwordQuerry: "", 
				save: false,
				emailStatus : false,
				passwordStatus: false,
			},

			formStep: {
				step: 1,
				totalStep: 2,
			},

		}
	},

	validations: {
		updateData: {

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

	created() {
		//code goes here
	},


	methods: {

		next() {
			this.formStep.step++;
		},

		prevous() {
			this.formStep.step--;
		},


		submitForm() {
			let uri = 'user';

			if( this.updateData.passwordQuerry.length > 5 || this.updateData.emailQuerry.length > 7) {
				this.axios.post(uri, {
					password: this.updateData.password,
					password_confirmation: this.updateData.passwordConfirmation,
					password_querry: this.updateData.passwordQuerry,
					email: this.updateData.email,
					email_querry: this.updateData.emailQuerry,
					save: this.updateData.save,
				}).then((response) => {

					this.updateData.passwordStatus = response.data[0]
					this.updateData.emailStatus = response.data[1]

					if (response.data[0] == false && response.data[1] == false ) {
						this.updateData.errors = "Please update either password nor email before submitting"
					}

					if(this.updateData.save == true ) {
						this.$router.push({name:'dashboard'})
					}

				}).catch(error=>{
					//this.updateData.errors = error.response.data.errors;
				})
			} //If calibrace closes 

		},

	}// Method calibrace close

}


</script>
