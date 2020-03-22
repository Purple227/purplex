<template>

	<div class="card"> <!-- Card tag open -->

		<div class="card-content"> <!-- Card content tag open -->
			<div class="content ">  <!-- Content tag open -->


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
							Tags Table
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
									<th class="has-text-centered has-text-success "> Name </th>
									<th class="has-text-success has-text-centered"> Created </th>
									<th class="has-text-success has-text-centered"> Action </th>
								</tr>
							</thead>  <!-- thead tag close -->

							<tbody> <!-- tbody tag open -->
								<tr v-for="(tag, index) in searchQuery.length > 2 ? searchResult : tags" :key="index">
									<th class="has-text-success has-text-centered"> {{ index+1 }} </th>

									<td class=" has-text-centered"> {{ tag.name | truncate(0, 15)}} </td>
								
									<td class="has-text-centered"> {{ tag.created_at | format('D MMM YYYY - h:mm A') }} </td>

									<td class="has-text-centered">
										<span class="icon has-text-success">
											<i class="fas fa-trash" v-on:click="deleteData(tag.id, index)"> </i>
										</span>

									</td>
								</tr>
							</tbody>  <!-- tbody tag close -->

						</table>  <!-- Table tag close -->

					</div>  <!-- Table wrapper tag close -->
				</div> 	<!-- Redundancy tag close -->

			</div>  <!-- Content tag close -->
		</div>  <!-- Card content tag close -->

		<footer class="card-footer">

			<a class="card-footer-item green is-bold" @click="tagsData(pagination.previousPageUrl)">Previous</a>

			<a class="card-footer-item green is-bold fa">
				{{pagination.to}} of {{pagination.total}}
			</a>

			<a class="card-footer-item green is-bold" @click="tagsData(pagination.nextPageUrl)">Next</a>

		</footer>

	</div>  <!-- Card tag close -->

</template>


<script>
import DynamicClassHandler from '../../mixins/dynamic-class-handler'

export default {

	mixins: [
	DynamicClassHandler
	],	
	
	data() {

		return{
			tags: [],
			status: null,
			searchQuery: "",
			searchResult: [],

			pagination: {
				nextPageUrl: null,
				previousPageUrl: null, 
				to: null,
				total: null,
			},

			myStyle: {
				marginLeft: '8%',
			},

		}
	},

	mounted() {
		this.tagsData()
		this.searchData()
	},

	methods: {

		tagsData(api) {
			let api_url = api || "/api/admin/tag"
			this.axios
			.get(api_url).then((response) => {
				this.tags = response.data.data

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
         axios.get('/api/admin/tags/table/search',{params: {search_query: this.searchQuery}}).then(response => {
          this.searchResult = response.data;
         });
        }
       },
             
		deleteData(id, index) {
			window.alert('Are you sure');
			let api = '/api/admin/tag/' + id
			console.log(api)
			this.axios.delete(api)
			.then((response) => {
				this.tags.splice(index, 1);
				this.searchResult.splice(index, 1);
				this.status = true
			}).catch(function (error) {
				this.status = false
			});
		},

},//Method calibrace closes


}

</script>
