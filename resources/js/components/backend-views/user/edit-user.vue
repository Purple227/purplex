
<template>

	<div class="card"> <!-- Card tag open -->

		<form v-on:submit.prevent="submit"> <!-- Form tag open -->

			<header class="card-header">
				<p class="card-header-title is-centered">
					<i class="fas fa-file-signature is-bold fa-lg">
						Update Profile {{updateData.name | truncate(0, 6) }}
					</i> 
				</p>
			</header>

			<div class="notification has-text-white is-primary" v-if="updateData.errors">
				<button class="delete" @click='updateData.errors = null'></button>
				<ul>
					<li> {{ updateData.errors.name[0] }} </li>
				</ul>
			</div>

			<div class="card-content"> <!-- card content tag open -->

				<h2 class="subtitle has-text-white has-text-centered is-bold">  Step: {{ formStep.step }} of {{ formStep.totalStep }} </h2>

				<div class="content" style="margin-top: 2%;"> <!-- Content tag open -->

					<div class="" v-if="formStep.step == 1"> <!-- step 1 wrapper tag open -->

						<div class="field">
							<label class="label"> Name <span class="has-text-link"> * </span> <span class="is-pulled-right"> {{updateData.name.length}}/ {{ $v.updateData.name.$params.maxLength.max }} </span> </label>						
							<div class="control has-icons-left has-icons-right">
								<input class="input is-success" type="text" v-model.trim="updateData.name" placeholder="Name here" required autofocus autocomplete="on" >
								<span class="icon is-small is-left">
									<i class="fas fa-user fa-lg has-text-success"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle has-text-link" v-if="$v.updateData.name.$invalid"> </i>
									<i class="fas fa-check has-text-success" v-else> </i>
								</span>
							</div>
						</div>

						<div class="file has-name is-fullwidth">
							<label class="file-label">
								<input class="file-input" type="file" @change="fileChange">
								<span class="file-cta">
									<span class="file-icon">
										<i class="fas fa-upload"></i>
									</span>
									<span class="file-label">
										Choose a file…
									</span>
								</span>
								<span class="file-name">
									{{ imageName || updateData.image}}
								</span>
							</label>
						</div>

					</div> <!-- step 1 wrapper tag close -->

					<div class="" v-if="formStep.step == 2"> <!-- step 2 wrapper tag open -->

						<div class="field">
							<label class="label"> Title <span class="is-pulled-right"> Not morethan {{ $v.updateData.title.$params.maxLength.max }} </span> </label>						
							<div class="control has-icons-left has-icons-right">
								<input class="input is-success" type="text" v-model.trim="updateData.title" placeholder="Title here" required autofocus autocomplete="on" >
								<span class="icon is-small is-left">
									<i class="fas fa-heading fa-lg has-text-success"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle has-text-link" v-if="$v.updateData.title.$invalid"> </i>
									<i class="fas fa-check has-text-success" v-else> </i>
								</span>
							</div>
						</div>

						<div class="field">
							<label class="label"> Subtitle <span class="is-pulled-right"> Not morethan {{ $v.updateData.subtitle.$params.maxLength.max }} </span> </label>						

							<div class="control has-icons-left has-icons-right">
								<input class="input is-success" type="email" v-model.trim="updateData.subtitle" placeholder="Subtitle here" required autocomplete="on">
								<span class="icon is-small is-left">
									<i class="fas fa-unknown has-text-success"></i>
								</span>
								<span class="icon is-small is-right">
									<i class="fas fa-exclamation-triangle has-text-link" v-if="$v.updateData.subtitle.$invalid"> </i>
									<i class="fas fa-check has-text-success" v-else> </i>
								</span>
							</div>
						</div>
					</div> <!-- step 2 wrapper tag close -->

					<div class="" v-if="formStep.step == 3"> <!-- step 2 wrapper tag open -->

						<div class="field">
							<label class="label"> description 
							</label>
							<div class="control">
								<tinymce-editor v-model.trim="updateData.description" :init="initValue" class='is-success'> </tinymce-editor>
							</div>
						</div>

					</div> <!-- step 2 wrapper tag close -->

				</div> <!-- Content tag close -->

			</div>  <!-- card content tag close -->


			<footer class="card-footer">

				<a class="card-footer-item green is-bold" v-if="formStep.step != 1" v-on:click.prevent="prevous" >Previous</a>

				<a class="card-footer-item green is-bold" v-if="formStep.step != formStep.totalStep" v-on:click.prevent="next">
					Next
				</a>

				<button class="card-footer-item green is-bold subtitle is-6 is_borderless pointer" style="background-color: #340659; " v-if="formStep.step == formStep.totalStep"> Update</button>

			</footer>

		</form>  <!-- Form tag close -->

	</div>  <!-- Card tag close -->


</template>


<script>
import { required, minLength, maxLength, sameAs, email } from 'vuelidate/lib/validators'
import Editor from '../../../mixins/tinymce-editor'

export default{

	name: "edit-user",

	mixins: [
	Editor,
	],

	data() {
		return{

			updateData: {
				name: "",
				title: null,
				subtitle: null,
				description: null,
				image: null,
				errors: null,
			},

			imageName : null,
			status: null,

			formStep: {
				step: 1,
				totalStep: 3,
			},
		}
	},

	validations: {
		updateData: {

			name: {
				required,
				maxLength: maxLength(255)
			},

			title: {
				maxLength: maxLength(255)
			},

			subtitle: {
				maxLength: maxLength(255)
			}

		}
	},

	created() {
		this.getUserData()
	},


	methods: {

		next() {
			this.formStep.step++;
		},

		prevous() {
			this.formStep.step--;
		},

		fileChange(e) {
			this.imageName = e.target.files[0].name
			this.updateData.image = e.target.files[0]
		},


		submit(e, value) {
			let api = "user/update"

			const config = {
				headers: { 'content-type': 'application/x-www-form-urlencoded' }
			}

			let formData = new FormData();
			formData.append("_method", "put");
			formData.append('file', this.updateData.image);
			formData.append('name', this.updateData.name);
			formData.append('title', this.updateData.title);
			formData.append('subtitle', this.updateData.subtitle);
			formData.append('description', this.updateData.description);

			this.axios.post(api, formData, config).then((response) => {
            //will make a decision as a progress
            this.status = true
            this.$emit('senderPlus', this.status)
            this.$router.push({name:'dashboard'})
        }).catch(error=>{
        	this.updateData.errors = error.response.data.errors
        })
    },

    getUserData() {
    	let api_url = "user/edit-authId"
    	this.axios
    	.get(api_url).then((response) => {
    		this.updateData = response.data
    	})
    },
}

}
</script>
