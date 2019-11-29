<template>

	<div class="card"> <!-- Card tag open -->

		<header class="card-header">
			<p class="card-header-title is-centered">
				<i class="fas fa-file-signature is-bold fa-lg">
					Post Form 
				</i> 
			</p>
		</header>


		<div class="card-content"> <!-- card content tag open -->
			<div class="content">

				<form v-on:submit.prevent="processForm"> <!-- Form tag open -->

				<div class="field">
					<label class="label"> Title: <span class="is-pulled-right"> 32/250 </span> </label>
					<p class="control has-icons-left has-icons-right">
						<input class="input is-success is-focused" type="email" placeholder="Title" >
						<span class="icon is-small is-left">
							<i class="fas fa-heading has-text-success"></i>
						</span>
						<span class="icon is-small is-right">
							<i class="fas fa-check has-text-success"></i>
							<!-- i class="fas fa-exclamation-triangle has-text-link"--><!--/i-->
						</span>
					</p>
				</div>


				<div class="file has-name is-boxed is-centered">
					<label class="file-label">
						<input class="file-input" type="file" name="resume">
						<span class="file-cta">
							<span class="file-icon">
								<i class="fas fa-upload"></i>
							</span>
							<span class="file-label is-bold">
								Upload image
							</span>
						</span>
						<span class="file-name">
							Screen Shot 2017-07-29 at 15.54.25.png
						</span>
					</label>
				</div>


				<!-- Tag will be placed here -->


				<label class="label"> description: <span class="is-pulled-right"> 250 </span> </label>
				<textarea class="textarea is-success" placeholder=" description "></textarea>


		<footer class="card-footer">
			<button class="card-footer-item button green is-bold is_borderless" style="background-color: #340659;"> Submit Project</button>

			<router-link :to="{name: 'dashboard'}" class="card-footer-item is-bold green" active-class='is-active' exact> Cancel </router-link> 
		</footer>

	</form> <!-- Form tag close -->


			</div>
		</div>  <!-- card content tag close -->



	</div>  <!-- Card tag close -->


</template>




<script>

import { required, minLength, maxLength } from 'vuelidate/lib/validators'

export default{

	data() {
		return{

			projectForm:{
				title: "",
				description: "",
			},
		}
	},


	validations: {
		projectForm: {
			title: {
				required,
				minLength: minLength(10),
				maxLength: maxLength(255)
			},
			description: {
				required,
				minLength: minLength(30)
			}
		}
	},
	
	methods: {
		submitForm() {
			let uri = 'http://127.0.0.1:8000/admin/projects';
			this.axios.get(uri, this.projectForm).then((response) => {
				this.$router.push({name: 'list-projects'})
			})
		}
	},

}
</script>
















































