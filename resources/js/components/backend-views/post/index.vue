<template>

	<div class="card"> <!-- Card tag open -->

		<div class="card-content"> <!-- Card content tag open -->
			<div class="content ">  <!-- Content tag open -->

				<create-post @statusHolder="statusListener" v-if='false'/>


				<div class="redundancy table-container"> <!-- Redundancy tag open -->

					<header class="card-header level">

						<p class="card-header-title green">
							Posts Table
						</p>

						<div class="field has-addons">
							<div class="control has-icons-left">
								<input class="input is-small" type="text" placeholder="Search Posts">
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
									<th class="has-text-success"> {{ index+1 }} </th>
									<td class=""> {{ post.title | truncate(0, 15)}} </td>
									<td class="has-text-centered"> {{ post.status? 'Yes': 'No' }} </td>
									<td class=""> {{ post.edited ? post.updated_at : post.created_at | format('D MMM YYYY - h m A') }} </td>
									<td class="has-text-centered">
										<span class="icon has-text-success">
											<i class="fas fa-eye"></i>
										</span>
										<span class="icon has-text-success">
  <i class="fas fa-trash"></i>
</span>
									 
<span class="icon has-text-success">
  <i class="fas fa-edit"></i>
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

				<a class="card-footer-item green is-bold">Previous</a>

				<a href="#" class="card-footer-item green is-bold">
					DatePicker
				</a>

				<a class="card-footer-item green is-bold">Next</a>

			</footer>

		</div>  <!-- Card tag close -->

	</template>


<script>

import CreatePost from './create.vue'

export default {

	components: {
		'create-post': CreatePost
	},
	
	data() {

		return{
			posts: [],
			status: null,
		}
	},

	mounted() {
		let api = '/api/admin/post';
		this.axios
		.get(api).then((response) => {
			this.posts = response.data
		})
	},

 methods: {
    statusListener: function (arg) {
      this.status = arg
    }
  }

}

</script>
