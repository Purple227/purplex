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

					<div class="notification is-primary" v-if="datePicker.dateSelected">
						<button class="delete" @click="postsData(), datePicker.dateSelected = null"></button>
						<strong> Seeing post created at {{ datePicker.dateSelected }} </strong>
					</div>

					<div class="redundancy table-container"> <!-- Redundancy tag open -->

						<header class="card-header level">

							<p class="card-header-title green">
								Posts Table
							</p>

							<div class="field has-addons">
								<div class="control has-icons-left">
									<input class="input is-small" type="text" placeholder="Search Table" v-model="searchQuery" v-on:keyup="searchData">
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

								<tbody> <!-- tbody tag open -->
									<tr v-for="(post, index) in searchQuery.length > 2 ? searchResult : posts" :key="index">

										<th class="has-text-success has-text-centered"> {{ index+1 }} </th>
										<td class=" has-text-centered"> {{ post.title | truncate(0, 15)}} </td>
										<td class="has-text-centered"> {{ post.status? 'Yes': 'No' }} </td>
										<td class="has-text-centered"> {{ post.edited ? post.updated_at : post.created_at | format('D MMM YYYY - h:mm A') }} </td>

										<td class="has-text-centered">
											<span class="icon has-text-success">
												<i class="fas fa-eye"></i>
											</span>

											<span class="icon has-text-success">
												<i class="fas fa-trash" v-on:click="deleteData(post.id, index)"> </i>
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

							<div class="notification is-primary has-text-centered" v-if="posts.length == 0">
								<strong> No post found. <router-link :to="{name: 'create-post'}"> Create post </router-link> </strong>
							</div>

						</div>  <!-- Table wrapper tag close -->
					</div> 	<!-- Redundancy tag close -->

				</div>  <!-- Content tag close -->
			</div>  <!-- Card content tag close -->

			<footer class="card-footer">

				<a class="card-footer-item green is-bold" @click="postsData(pagination.previousPageUrl)">Previous</a>

				<a class="card-footer-item green is-bold fa">
					{{pagination.to}} of {{pagination.total}}
				</a>

				<a class="card-footer-item green is-bold" @click="postsData(pagination.nextPageUrl)">Next</a>

				<a class="card-footer-item is-marginless"> <input type="date" data-display-mode="dialog" data-show-header="true" data-color="is-primary" data-date-format="YYYY-MM-DD" id="my-element" v-model.lazy="pagination.dateSelected"> </a>

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
			searchQuery: "",
			searchResult: [],

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
		this.searchData()
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

		searchData() {
			this.searchResult= []
			if(this.searchQuery.length > 2) {
				axios.get('/api/admin/posts/table/search',{params: {search_query: this.searchQuery}}).then(response => {

					this.searchResult = response.data

					let sortResult = []
					let string = this.searchQuery

					for (var i = 0; i < response.data.length; i++)
					{	
						let searchTitle = [response.data[i].title]
						//let blah = searchTitle.indexOf(string) 
							
						console.log(searchTitle)
					}// For loop calibrace close

					console.log(sortResult)

/*					let result = this.searchResult
					console.log(typeof(response.data))

					let string = this.searchQuery

					function sort(value) {
                      return value.indexOf(string) >= 0;
                    }

                    let searchSort = result.filter(sort);
                    console.log(searchSort)*/

				});
			}
		},

		deleteData(id, index) {
			window.alert('Are you sure');
			let api = '/api/admin/post/' + id
			this.axios.delete(api)
			.then((response) => {
				this.posts.splice(index, 1);
				this.searchResult.splice(index, 1);
				this.status = true
				this.isActive = false
			}).catch(function (error) {
				this.status = false
				this.isActive = false
			});
		},

		statusListener(value) {
			this.status = value
		},


		bulmaCalendar () {
// Initialize all input of type date//
let calendars = bulmaCalendar.attach('[type="date"]');

// Loop on each calendar initialized
calendars.forEach(calendar => {
  // Add listener to date:selected event
  calendar.on('date:selected', date => {
  });
});

// To access to bulmaCalendar instance of an element
let element = document.querySelector('#my-element');
if (element) {
  // bulmaCalendar instance is available as element.bulmaCalendar
  element.bulmaCalendar.on('select', datepicker => {
  	let selectedDate = datepicker.data.value()
  	selectedDate = selectedDate.replace(/\//g, "-")
  	this.datePicker.dateSelected = selectedDate
  	this.pagination.dateSelected = "/api/admin/posts/" +selectedDate
  	this.postsData(this.pagination.dateSelected)
  });
}

}

},//Method calibrace closes


}

</script>
