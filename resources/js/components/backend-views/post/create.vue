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

				<form v-on:submit.prevent="submitForm"> <!-- Form tag open -->

					<div class="field" v-if="formStep.step == 1">

						<label class="label"> Title <span class="has-text-link"> * </span> <span class="is-pulled-right"> 32/ {{ $v.postForm.title.$params.maxLength.max }} </span> </label>						
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

					<div class="field"  v-if="formStep.step == 2">
						<label class="label"> description <span class="has-text-link"> * </span>   					
							<span class="help is-danger is-pulled-right" v-if="$v.postForm.description.$invalid"> Not minimium than {{ $v.postForm.description.$params.minLength.min }} characters </span>
							<span class="help is-success is-pulled-right" v-else> You straight </span>
						</label>
						<div class="control">
							<tinymce-editor v-model.trim="postForm.description" :init="initValue"> </tinymce-editor>
						</div>
					</div>

					<div class="field" v-if="formStep.step == 3">
						<div class="control">
							<div class="select is-multiple">
								<select multiple size="8">
									<option value="Argentina">Argentina</option>
									<option value="Bolivia">Bolivia</option>
									<option value="Brazil">Brazil</option>
									<option value="Chile">Chile</option>
									<option value="Colombia">Colombia</option>
									<option value="Ecuador">Ecuador</option>
									<option value="Guyana">Guyana</option>
									<option value="Paraguay">Paraguay</option>
									<option value="Peru">Peru</option>
									<option value="Suriname">Suriname</option>
									<option value="Uruguay">Uruguay</option>
									<option value="Venezuela">Venezuela</option>
								</select>
							</div>
						</div>
					</div>

					<div class="field is-grouped is-grouped-right">
						<p class="control">
							<a class="button is-primary" v-if="formStep.step != 1" v-on:click.prevent="prevous">
								Previous
							</a>
						</p>

						<p class="control">
							<a class="button is-primary"  v-if="formStep.step != formStep.totalStep" v-on:click.prevent="next">
								Next
							</a>
						</p>

						<p class="control">
							<a class="button is-primary"  v-if="formStep.step == formStep.totalStep" v-on:click.prevent="next">
								Submit
							</a>
						</p>

					</div>

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
			formStep: {
				step: 1,
				totalStep: 3,
			},

			postForm:{
				title: "",
				image: [],
				imageName: '',
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
















































