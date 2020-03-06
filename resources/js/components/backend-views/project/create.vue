<template>

	<div class="card"> <!-- Card tag open -->

		<header class="card-header">
			<p class="card-header-title is-centered">
				<i class="fas fa-file-signature is-bold fa-lg">
					Project Form 
				</i> 
			</p>
		</header>


		<div class="card-content"> <!-- card content tag open -->
			<div class="content">

				<form v-on:submit.prevent="submitForm"> <!-- Form tag open -->

					<div class="field">
						<label class="label"> Title <span class="has-text-link"> * </span> <span class="is-pulled-right"> 32/ {{ $v.projectForm.title.$params.maxLength.max }} </span> </label>
						<p class="control has-icons-left has-icons-right">
							<input class="input is-success"  autofocus="" type="text" placeholder="Title" v-model.trim="projectForm.title" required>
							<span class="icon is-small is-left">
								<i class="fas fa-heading has-text-success"></i>
							</span>
  							<span class="icon is-small is-right">
								<i class="fas fa-exclamation-triangle has-text-link" v-if="$v.projectForm.title.$invalid"> </i>
								<i class="fas fa-check has-text-success" v-else> </i>
							</span>  

						</p>
					</div>

					<label class="label"> description <span class="has-text-link"> * </span>   					
					  <span class="help is-danger is-pulled-right" v-if="$v.projectForm.description.$invalid"> Not minimium than {{ $v.projectForm.description.$params.minLength.min }} characters </span>
					  <span class="help is-success is-pulled-right" v-else> You straight </span>
					</label>
					 <!-- <textarea class="textarea is-success" id="tinyTextarea" placeholder="description" v-model.trim="projectForm.description" required>  </textarea>  -->

					 <tinymce-editor v-model.trim="projectForm.description" :init="initValue"> </tinymce-editor>

					<footer class="card-footer">
						<button class="card-footer-item button is-bold is_borderless green"  v-bind:class="[$v.projectForm.$invalid ? isHidden : '']" style="background-color: #340659;"> Submit Project</button>

						<router-link :to="{name: 'dashboard'}" class="card-footer-item is-bold green" active-class='is-active' exact> Cancel </router-link> 
					</footer>

				</form>  <!-- Form tag close -->

			</div>
		</div>  <!-- card content tag close -->


	</div>  <!-- Card tag close -->

</template>


<script>
import DynamicClassHandler from '../../../mixins/dynamic-class-handler'
import Editor from '../../../mixins/tinymce-editor'
import { required, minLength, maxLength } from 'vuelidate/lib/validators'

export default{

 mixins: [
 	Editor,
 	DynamicClassHandler
 ],


data() {
	return{
		
		projectForm:{
			title: null,
			description: null,
		},

		errors: {
			submitStatus: null,
		},

		utility: {
			titleCount: 0,
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
			minLength: minLength(50)
		}
	}
},


methods: {
	submitForm() {

		let api = '/api/admin/projects';
		this.axios.post(api, this.projectForm)
		
		.then((response) => {
			console.log('success')
		})
	}
},

}
</script>
















































