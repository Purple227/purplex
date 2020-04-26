<template>

	<div class="card"> <!-- Card tag open -->

		<form v-on:submit.prevent="submitForm"> <!-- Form tag open -->

		<header class="card-header">
			<p class="card-header-title is-centered">
				<i class="fas fa-file-signature is-bold fa-lg">
					Edit {{ postEdit.title | truncate(0,8)}}
				</i> 
			</p>
		</header>

		  <div class="notification has-text-white is-primary" v-if="postEdit.status">
  <button class="delete" @click='postEdit.status = null'></button>
  <ul>
  	<li v-for="(value, name, index) in postEdit.status"> {{ index+1 }}. {{ value[0] }}  </li>
   </ul>
  </div>

		<div class="card-content"> <!-- card content tag open -->

			<h2 class="subtitle has-text-white has-text-centered is-bold">  Step: {{ formStep.step }} of {{ formStep.totalStep }} </h2>

			<div class="content" style="margin-top: 2%;">

					<div class="" v-if="formStep.step == 1"> <!-- step 1 wrapper tag open -->

						<div class="field">
							<label class="label"> Title <span class="has-text-link"> * </span> <span class="is-pulled-right"> {{postEdit.title.length}}/ {{ $v.postEdit.title.$params.maxLength.max }} </span> </label>						
							<div class="control has-icons-left has-icons-right">
								<input class="input is-success" type="text" v-model.trim="postEdit.title" placeholder="Title here" required autofocus autocomplete="on" >
								<span class="icon is-small is-left">
									<i class="fas fa-heading has-text-success"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle has-text-link" v-if="$v.postEdit.title.$invalid"> </i>
									<i class="fas fa-check has-text-success" v-else> </i>
								</span>
							</div>
						</div>

						<div class="field">
							<label class="label"> Tags </label>
							<input-tag class="input" v-model="postEdit.tags"> </input-tag>
						</div>

					</div> <!-- step 1 wrapper tag close -->


					<div class="" v-if="formStep.step == 2"> <!-- step 2 wrapper tag open -->
						<div class="field">
							<label class="label"> description <span class="has-text-link"> * </span>   					
								<span class="help is-danger is-pulled-right" v-if="$v.postEdit.description.$invalid"> Minimium {{ $v.postEdit.description.$params.minLength.min }} characters </span>
								<span class="help is-success is-pulled-right" v-else> You straight </span>
							</label>
							<div class="control">
								<tinymce-editor v-model.trim="postEdit.description" :init="initValue" class='is-success'> </tinymce-editor>
							</div>
						</div>
					</div> <!-- Step 2 wrapper tag close -->


					<div class=" " v-if="formStep.step == 3"> <!-- step 3 wrapper tag open -->
						<div class="field is-grouped is-grouped-centered">
							<div class="control">

								<!-- Rectangular switch -->
								<label class="label">  Published </label>	
								<label class="switch">
									<input type="checkbox" v-model='postEdit.isPublished'  true-value.number=true
									false-value.number=false>
									<span class="slider"></span>
								</label>

							</div>
						</div>
					</div> <!-- Step 3 wrapper tag close -->

			</div>

		</div>  <!-- card content tag close -->


		<footer class="card-footer">

			<a class="card-footer-item green is-bold" v-if="formStep.step != 1" v-on:click.prevent="prevous" >Previous</a>

			<a class="card-footer-item green is-bold" v-if="formStep.step != formStep.totalStep" v-on:click.prevent="next">
				Next
			</a>

			<button class="card-footer-item green is-bold subtitle is-6 is_borderless pointer" style="background-color: #340659; " v-if="formStep.step == formStep.totalStep"> Submit</button>

		</footer>

		</form>  <!-- Form tag close -->

	</div>  <!-- Card tag close -->


</template>




<script>

import DynamicClassHandler from '../../../mixins/dynamic-class-handler'
import Editor from '../../../mixins/tinymce-editor'
import { required, minLength, maxLength } from 'vuelidate/lib/validators'
import InputTag from 'vue-input-tag'

export default{

	mixins: [
	Editor,
	DynamicClassHandler
	],

	components: {
		'input-tag': InputTag
	},

	data() {
		return{
			formStep: {
				step: 1,
				totalStep: 3,
			},

			postEdit:{
				title: "",
				isPublished: null,
				description: "",
				tags: [],
				status: null,
			},
		}
	},


	validations: {
		postEdit: {
			title: {
				required,
				minLength: minLength(10),
				maxLength: maxLength(255)
			},
			description: {
				required,
				minLength: minLength(30)
			},
		}
	},

	mounted() {
		this.getEditedData()
	},

	methods: {

		next() {
			this.formStep.step++;
		},

		prevous() {
			this.formStep.step--;
		},

		getEditedData() {
			let api = '/api/admin/post/' + this.$route.params.id
			this.axios
			.get(api).then((response) => {
				this.postEdit.title = response.data.title
				this.postEdit.description = response.data.description
				this.postEdit.isPublished = response.data.status 

				let tags = response.data.tags
				let newTags = []
				for (let i = 0; i < tags.length; i++) {
					newTags.push(tags[i].name)
				}
				this.postEdit.tags = newTags
				
			})
		},

		submitForm() {
			let uri = '/api/admin/post/' + this.$route.params.id;
			let tags = []
			this.axios.put(uri, {
				title: this.postEdit.title,
				tags: this.postEdit.tags,
				description: this.postEdit.description,
				status: this.postEdit.isPublished,
				//console.log(status)
			}).then((response) => {
				let status = true
				this.$emit('editStaus', status)
				this.$router.push({name:'list-posts'})
			}).catch(error=>{
				this.postEdit.status = error.response.data.errors
			})
		}

	},

}
</script>
















































