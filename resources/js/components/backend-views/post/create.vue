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

			<h2 class="subtitle has-text-white has-text-centered is-bold">  Step: {{ formStep.step }} of {{ formStep.totalStep }} </h2>

			<div class="content" style="margin-top: 2%;">

				<form v-on:submit.prevent="submitForm"> <!-- Form tag open -->

					<div class="" v-if="formStep.step == 1"> <!-- step 1 wrapper tag open -->

						<div class="field">
							<label class="label"> Title <span class="has-text-link"> * </span> <span class="is-pulled-right"> {{postForm.title.length}}/ {{ $v.postForm.title.$params.maxLength.max }} </span> </label>						
							<div class="control has-icons-left has-icons-right">
								<input class="input is-success" type="text" v-model.trim="postForm.title" placeholder="Title here" required autofocus autocomplete="on" >
								<span class="icon is-small is-left">
									<i class="fas fa-heading has-text-success"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle has-text-link" v-if="$v.postForm.title.$invalid"> </i>
									<i class="fas fa-check has-text-success" v-else> </i>
								</span>
							</div>
						</div>

					</div> <!-- step 1 wrapper tag close -->


					<div class="" v-if="formStep.step == 2"> <!-- step 2 wrapper tag open -->
						<div class="field">
							<label class="label"> description <span class="has-text-link"> * </span>   					
								<span class="help is-danger is-pulled-right" v-if="$v.postForm.description.$invalid"> Minimium {{ $v.postForm.description.$params.minLength.min }} characters </span>
								<span class="help is-success is-pulled-right" v-else> You straight </span>
							</label>
							<div class="control">
								<tinymce-editor v-model.trim="postForm.description" :init="initValue" class='is-success'> </tinymce-editor>
							</div>
						</div>
					</div> <!-- Step 2 wrapper tag close -->


					<div class=" " v-if="formStep.step == 3"> <!-- step 3 wrapper tag open -->
						<div class="field is-grouped is-grouped-centered">
							<div class="control">

								<!-- Rectangular switch -->
								<label class="label">  Published </label>	
								<label class="switch">
									<input type="checkbox">
									<span class="slider"></span>
								</label>

							</div>
						</div>
					</div> <!-- Step 3 wrapper tag close -->

				</form>  <!-- Form tag close -->

			</div>
		</div>  <!-- card content tag close -->


				<footer class="card-footer">

			<a class="card-footer-item green is-bold" v-if="formStep.step != 1" v-on:click.prevent="prevous" >Previous</a>

			<a class="card-footer-item green is-bold" v-if="formStep.step != formStep.totalStep" v-on:click.prevent="next">
				Next
			</a>

			<a class="card-footer-item green is-bold" v-if="formStep.step == formStep.totalStep"> Submit</a>

		</footer>


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
			formStep: {
				step: 1,
				totalStep: 3,
			},

			postForm:{
				title: "",
				image: [],
				status: false,
				description: "",
				tag: [],
			},
		}
	},


	validations: {
		postForm: {
			title: {
				required,
				minLength: minLength(10),
				maxLength: maxLength(255)
			},
			description: {
				required,
				minLength: minLength(30)
			},
			image: {
				required,
				maxLength: maxLength(47)
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

		submitForm() {
			let uri = 'http://127.0.0.1:8000/admin/posts';
			this.axios.get(uri, this.postForm).then((response) => {
    			console.log(response.headers);
			})
		}
	},

}
</script>
















































