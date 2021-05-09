<template>

	<div class="container container_mobile"> <!-- Container tag start -->

		<div class="card border_curve"> <!-- card tag open -->


			<form v-on:submit.prevent="submit"> <!-- Form tag open -->	

				<header class="card-header">
					<p class="card-header-title is-size-3 is-centered death_pink fa">
						Contact me
					</p>
				</header>


				<div class="card-content">

					<div class="content">


						<div class="notification" v-if="contact.errors">
							<button class="delete" @click="contact.errors = null"></button>
							<ul>
								<li v-for="value in contact.errors">
									{{ value[0] }} Failed
								</li>
							</ul>
						</div>


						<div class="columns is-vcentered" v-if="!contact.status"> <!-- Columns wrapper tag open -->

							<div class="column is-4"> <!-- column is-4 tag open -->

								<div class="field">
									<div class="control has-icons-left has-icons-right">
										<input class="input border_curve" type="text" placeholder="Subject Here" v-model="contact.subject">
										<span class="icon is-small is-left">
											<i class="fas fa-heading"></i>
										</span>

										<span class="icon is-small is-right">
											<i class="fas fa-exclamation-triangle" v-if="$v.contact.subject.$invalid"> </i>
											<i class="fas fa-check" v-else> </i>
										</span>
									</div>
									<!--p class="help is-success">This username is available</p-->
								</div> 

								<div class="field">
									<div class="control has-icons-left has-icons-right">
										<input class="input border_curve" type="email" placeholder="Email Address" v-model="contact.email">
										<span class="icon is-small is-left">
											<i class="fas fa-at"></i>
										</span>

										<span class="icon is-small is-right">
											<i class="fas fa-exclamation-triangle" v-if="$v.contact.email.$invalid"> </i>
											<i class="fas fa-check" v-else> </i>
										</span>
									</div>
								</div>

							</div> <!-- column is-4 tag close -->

							<div class="column is-6"> <!-- column is-6 tag start -->

								<div class="field">
									<div class="control ">
										<textarea class="textarea border_curve" placeholder="Message is mandatory" v-model.trim="contact.message"></textarea> 
									</div>
								</div>
							</div> <!-- column is-6 tag close -->

							<div class="column"> <!-- column tag open -->
								<button class="button is-dark is-fullwidth border_curve" v-bind:class="{ 'is-loading': loading }" @click="loading = true">
									Send
								</button>
							</div> <!-- column tag close -->

						</div> <!-- Columns wrapper tag close -->

						<!-- Notification section -->
						<div class="columns is-mobile is-centered" v-if="contact.status">
							<div class="column is-half">

								<div class="notification is-dark is-inline center border_curve">
									Hi is Joseph. I will get back to you immediately.  
								</div>

							</div>
						</div>

					</div>
				</div>

				<footer class="card-footer">
					<p class="card-footer-item">
						<a class="bolder" href="tel:+2348157871972"> 
							<i class="fas fa-mobile-alt fa-2x"> 
								Call me
							</i>  
						</a>
					</p>
				</footer>

			</form>  <!-- Form tag close -->

		</div> <!-- card tag close -->

	</div> <!-- Container tag close -->

</template>

<script>
import { required, minLength, maxLength, email } from 'vuelidate/lib/validators'
import SkeletonCard from 'vue-skeleton-screen';

export default {



   metaInfo: {
      title: 'Contact',
      htmlAttrs: {
        lang: 'en',
        amp: true
      }
    },



	data: function () {
		return {
			contact: {
				subject: null,
				email: null,
				Message:null,
				status: false,
				errors: null,
			},

			loading: null,
		}
	},

	components: {
		SkeletonCard
	},

		validations: {
		contact: {
			subject: {
				required,
			},
			email: {
				required,
				email,
			},
			Message: {
				required,
			},
		}
	},

	methods: {

		submit() {
			let uri = '/api/contact';
			this.axios.post(uri, {
				subject: this.contact.subject,
				email: this.contact.email,
				message: this.contact.message,
				//console.log(status)
			}).then((response) => {
    			this.contact.status = true
    			this.loading = false
			}).catch(error=>{
              this.contact.errors = error.response.data.errors

				this.loading = false

          })
		}
	},

}

</script>


















