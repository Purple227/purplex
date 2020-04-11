<template>

	<div class="container container_mobile"> <!-- Container tag start -->

		<div class="card border_curve"> <!-- card tag open -->

			<header class="card-header">
				<p class="card-header-title is-size-3 is-centered death_pink fa">
					Contact me
				</p>
			</header>


			<div class="card-content">
				<div class="content">

					<div class="columns is-vcentered"> <!-- Columns wrapper tag open -->

						<div class="column is-4"> <!-- column is-4 tag open -->

							<div class="field">
								<div class="control has-icons-left has-icons-right">
									<input class="input" type="text" placeholder="Name Here" v-model="contact.name">
									<span class="icon is-small is-left">
										<i class="fas fa-user"></i>
									</span>

								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle" v-if="$v.contact.name.$invalid"> </i>
									<i class="fas fa-check" v-else> </i>
								</span>
								</div>
								<!--p class="help is-success">This username is available</p-->
							</div> 

							<div class="field">
								<div class="control has-icons-left has-icons-right">
									<input class="input" type="email" placeholder="Email Address" v-model="contact.email">
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
									<textarea class="textarea" placeholder="Message is mandatory"></textarea> 
								</div>
							</div>
						</div> <!-- column is-6 tag close -->

						<div class="column"> <!-- column tag open -->
							<a class="button is-dark is-block">
								Send
							</a>
						</div> <!-- column tag close -->

					</div> <!-- Columns wrapper tag close -->

				</div>
			</div>

			<footer class="card-footer">
				<p class="card-footer-item">
					<a class="bolder" href="tel:1234567"> 
						<i class="fas fa-mobile-alt fa-2x"> 
							Call me
						</i>  
					</a>
				</p>
			</footer>

		</div> <!-- card tag close -->

	</div> <!-- Container tag close -->

</template>

<script>
import { required, minLength, maxLength, email } from 'vuelidate/lib/validators'

export default {

	data: function () {
		return {
			contact: {
				name: null,
				email: null,
				Message:null,
			}
		}
	},

		validations: {
		contact: {
			name: {
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

}

</script>


















