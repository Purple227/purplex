<template>

	<div class="container"> <!-- Container tag start -->
		<footer class="footer border_curve">

			<div class="content has-text-centered"> <!-- Contend center tag open -->

				<div class="columns">

					<div class="column"> <!-- First column tag start -->
						<a href="#" class="has-text-white">
							Pur<span style="color:#FF1493;">p</span>lex © <!-- {{ date("Y")}} -->
						</a>
					</div> <!-- First column tag close -->

					<div class="column"> <!-- Second column tag start -->
						<div class="dropdown is-up" v-bind:class="{ 'is-active': isActive }"  v-on-clickaway="away" @click="addActiveClass">
							<div class="dropdown-trigger">

								<span class="screen-test">
									Site-links 
								</span>

								<span class="icon is-small">
									<i class="fas " v-bind:class="[isActive ? 'fa-angle-down' : 'fa-angle-up']" aria-hidden="true"></i>
								</span>
							</div>

							<div class="dropdown-menu" id="dropdown-menu4" role="menu">
								<div class="dropdown-content">
									<div class="dropdown-item">

										<a target="_blank" href="http://127.0.0.1:8000/admin/dashboard" class="dropdown-item" active-class="is-active" exact>
											Dashboard
										</a>

										<a href="https://github.com/Purple227" target="_blank" class="dropdown-item" active-class='is-active'>
											Projects 
										</a>

										<router-link :to="{name: 'blog'}" class="dropdown-item" active-class='is-active'>
											Blog
										</router-link>


										<router-link :to="{name: 'contact'}" class="dropdown-item" active-class='is-active' exact>
											Contact
										</router-link>

										<router-link :to="{name: 'about'}" class="dropdown-item" active-class='is-active'>
											About
										</router-link>

										<a href="https://www.linkedin.com/in/purple227" target="_blank" class="dropdown-item">
											Hire Me
										</a>

									</div>
								</div>
							</div>

						</div>
					</div> <!-- Second column tag close -->

					<div class="column"> <!-- Third column tag start -->

						<div class="notification is-dark is-small border_curve" v-if="status">
							Thanks for subscribing
						</div>



						<form v-on:submit.prevent="submitForm"> <!-- Form tag open -->


							<div class="field has-addons" v-if="status == null">

								<div class="control has-icons-left has-icons-right is-expanded">

									<input class="input is-small border_curve" type="email" v-model="email" placeholder=" Subscribe" required="">

									<span class="icon is-medium is-left">
										<i class="fas fa-envelope fa-lg"></i>
									</span>

									<span class="icon is-small is-right">
										<i class="fas fa-exclamation-triangle fa-lg" v-if="$v.email.$invalid"></i>
										<i class="fas fa-check fa-lg" v-else></i> 
									</span>

								</div>

								<div class="control">
									<button class="button is-dark is-small" type="submit" v-bind:class="{ 'is-loading': isSpinning }">
										<i class="fas fa-long-arrow-alt-right has-text-white fa-lg"> </i>
									</button>
								</div>

							</div>

						</form>

					</div> <!-- Third column tag close -->
				</div>


				<p class=""> <!-- My baby stand alone start-->
					Build with 
					<i class="fas fa-heart"></i>
					and giving all the 
					<i class="fas fa-heart"></i> 
					in the world from 
					<a href="#" style="color: deeppink;"> 
						Emy 
					</a> 
					and  
					<a href="#" style="color: deeppink;"> 
						Jennifer 
					</a> 
				</p> <!-- My baby stand alone close-->

			</div> <!-- Contend center tag close -->

		</footer>
	</div> <!-- Container tag close -->

</template>

<script>

import dynamicClassToggler from '../../../mixins/dynamic-class-handler'
import { required, email } from 'vuelidate/lib/validators'


export default {

	mixins: [
	dynamicClassToggler
	],

	data() {
		return{
			email: null,
			status: null,
			isSpinning: false
		}
	},

	validations: {
		email: {
			required,
			email,
		}
	},

	methods: {
		submitForm() {
			this.isSpinning = true
			let api = '/api/subscriber';
			this.axios.post(api, {
				email: this.email,
			}).then((response) => {
				this.status = true
				this.isSpinning = false
			})
		}
	},

}

</script>

