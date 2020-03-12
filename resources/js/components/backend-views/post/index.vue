<template>

	<div class="card"> <!-- Card tag open -->

		<div class="card-content"> <!-- Card content tag open -->
			<div class="content ">  <!-- Content tag open -->

				<div class="" v-if='false'>
				<create-post @createStatus="statusListener"> </create-post>
				<edit-post @editStatus="statusListener" v-if='false'> </edit-post>
			    </div>

				<div class="notification is-primary" v-if="status">
					<button class="delete" @click="status = null"></button>
					<strong>Task Succesfull </strong>
				</div>

				<div class="notification is-primary" v-if="status == false">
					<button class="delete" @click="status = null"></button>
					<strong> Task Failed </strong>
				</div>


				<div class="redundancy table-container"> <!-- Redundancy tag open -->

					<header class="card-header level">

						<p class="card-header-title green">
							Posts Table
						</p>

						<div class="field has-addons">
							<div class="control has-icons-left">
								<input class="input is-small" type="text" placeholder="Search Table">
								<span class="icon is-small is-left">
									<i class="fas fa-search has-text-success"></i>
								</span>
							</div>
							<div class="control">
								<a class="button is-info is-small is-success">
									Search
								</a>
							</div>
						</div>

					</header>

					<div class="table_wrapper">  <!-- Redundancy tag close -->

						<table class="table is-bordered">  <!-- Table tag open -->

							<thead>  <!-- thead tag open -->
								<tr>
									<th class="has-text-success"><abbr title="Number">No</abbr></th>
									<th class="has-text-centered has-text-success "> Title </th>
									<th class="has-text-success has-text-centered"> Published </th>
									<th class="has-text-success has-text-centered"> Created </th>
									<th class="has-text-success has-text-centered"> Action </th>
								</tr>
							</thead>  <!-- thead tag close -->

							<tfoot>  <!-- tfoot tag open -->
								<tr>
									<th class="has-text-success"><abbr title="Number">No</abbr></th>
									<th class="has-text-centered has-text-success"> Title </th>
									<th class="has-text-success has-text-centered"> Status </th>
									<th class="has-text-success has-text-centered"> Created </th>
									<th class="has-text-success has-text-centered"> Action </th>
								</tr>
							</tfoot>  <!-- tfoot tag close -->

							<tbody> <!-- tbody tag open -->

								<tr v-for="(post, index) in posts" :key="index">
									<th class="has-text-success has-text-centered"> {{ index+1 }} </th>
									<td class=" has-text-centered"> {{ post.title | truncate(0, 15)}} </td>
									<td class="has-text-centered"> {{ post.status? 'Yes': 'No' }} </td>
									<td class="has-text-centered"> {{ post.edited ? post.updated_at : post.created_at | format('D MMM YYYY - h:mm A') }} </td>

									<td class="has-text-centered">
										<span class="icon has-text-success">
											<i class="fas fa-eye"></i>
										</span>



										<div class="modal is-active is-rounded" v-if='isActive'>
											<div class="modal-background"></div>
											<div class="modal-card">
												<section class="modal-card-body">
													<div class="card-content">
														<p class="subtitle"> Are You Sure </p>
													</div>
													<footer class="card-footer">
														<a class="card-footer-item is-bold has-text-danger" v-on:click="deleteData(post.id, index)">Delete</a>
														<a class="card-footer-item is-bold has-text-success" v-on:click="isActive = false, status = false">Cancel</a>
													</footer>
												</section>
											</div>
										</div>
										<span class="icon has-text-success" v-on:click="addActiveClass">
											<i class="fas fa-trash"></i>
										</span>



										<router-link :to="{name: 'edit-post', params: {id: post.id}}" v-bind:style="myStyle">
										<span class="icon has-text-success">
											<i class="fas fa-edit"></i>
										</span>
									    </router-link>
									</td>
								</tr>

							</tbody>  <!-- tbody tag close -->
						</table>  <!-- Table tag close -->

					</div>  <!-- Table wrapper tag close -->
				</div> 	<!-- Redundancy tag close -->

			</div>  <!-- Content tag close -->
		</div>  <!-- Card content tag close -->

		<footer class="card-footer">

			<a class="card-footer-item green is-bold" @click="postsData(pagination.previousPageUrl)">Previous</a>

			<a href="#" class="card-footer-item green is-bold fa">
				{{pagination.to}} of {{pagination.total}}
			</a>

			<a class="card-footer-item green is-bold" @click="postsData(pagination.nextPageUrl)">Next</a>

			<a class="card-footer-item is-marginless" @click="postsData(pagination.dateSelected)"> <input type="date" data-display-mode="dialog" data-show-header="true" data-color="is-primary" data-date-format="YYYY-MM-DD" id="my-element" v-model.lazy="pagination.dateSelected" @click="postsData(pagination.dateSelected)"> <span class="button has-text-primary is-radiusless set"> Set </span> </a>

		</footer>

	</div>  <!-- Card tag close -->

</template>


<script>

import CreatePost from './create.vue'
import EditPost from './edit.vue'
import DynamicClassHandler from '../../../mixins/dynamic-class-handler'
import bulmaCalendar from 'bulma-calendar/dist/js/bulma-calendar.min.js'

export default {

	components: {
		'create-post': CreatePost,
		'edit-post': EditPost
	},

	mixins: [
	DynamicClassHandler
	],	
	
	data() {

		return{
			posts: [],
			status: null,

			pagination: {
				nextPageUrl: null,
				previousPageUrl: null, 
				dateSelected: null,
				to: null,
				total: null,
			},

			datePicker: {
				dateSelected: null,
			},

			myStyle: {
				marginLeft: '8%',
			},

		}
	},

	mounted() {
		this.postsData()
		this.bulmaCalendar()
	},

	methods: {

		postsData(api) {
			let api_url = api || "/api/admin/post"
			this.axios
			.get(api_url).then((response) => {
				this.posts = response.data.data

				let nextPageUrl = response.data.next_page_url
				this.pagination.nextPageUrl = nextPageUrl ? nextPageUrl.slice(21) : null

				let previousPageUrl = response.data.prev_page_url
				this.pagination.previousPageUrl =  previousPageUrl ? previousPageUrl.slice(21) : null

				this.pagination.to = response.data.to
				this.pagination.total = response.data.total
			})
		},

		deleteData(id, index) {
			let api = '/api/admin/post/' + id
			console.log(api)
			this.axios.delete(api)
			.then((response) => {
				this.posts.splice(index, 1);
				this.status = true
				this.isActive = false
			}).catch(function (error) {
				this.status = false
			});
		},

		statusListener(value) {
			this.status = value
			console.log(this.status)
			console.log(value)
		},


		bulmaCalendar () {
// Initialize all input of type date//
let calendars = bulmaCalendar.attach('[type="date"]');

// Loop on each calendar initialized
calendars.forEach(calendar => {
  // Add listener to date:selected event
  calendar.on('date:selected', date => {
  	console.log(date);
  });
});

// To access to bulmaCalendar instance of an element
let element = document.querySelector('#my-element');
if (element) {
  // bulmaCalendar instance is available as element.bulmaCalendar
  element.bulmaCalendar.on('select', datepicker => {
  	let selectedDate = datepicker.data.value()
  	selectedDate = selectedDate.replace(/\//g, "-")
  	this.dateSelectedEmpty= selectedDate
  	this.pagination.dateSelected = "/api/admin/posts/" +selectedDate
  });
}

}


  }//Method calibrace closes

}

</script>
