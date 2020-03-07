<template>

	<div class="card"> <!-- Card tag open -->

		<div class="card-content"> <!-- Card content tag open -->
			<div class="content">  <!-- Content tag open -->


				<div class="redundancy"> <!-- Redundancy tag open -->

					<header class="card-header level">

						<p class="card-header-title green">
							Post Table
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
									<th class="has-text-success has-text-centered"> Status </th>
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

								<tr v-for="post in posts" :key="post.id">
									<th class="has-text-success"> {{ post.id }} </th>
									<td class=""> {{ post.title }} </td>
									<td class="has-text-centered"> {{ post.status }} </td>
									<td class=""> {{ post.created_at }} </td>
									<td class=""></td>
									<td class="has-text-centered">  <i class="fas fa-eye has-text-success"></i> <i class="fas fa-trash has-text-success"></i> <i class="fas fa-edit has-text-success"></i> </td>
								</tr>

							</tbody>  <!-- tbody tag close -->
						</table>  <!-- Table tag close -->

					</div>  <!-- Table wrapper tag close -->
				</div> 	<!-- Redundancy tag close -->

			</div>  <!-- Content tag close -->
		</div>  <!-- Card content tag close -->

		<footer class="card-footer">

			<a href="#" class="card-footer-item green is-bold">Save</a>

			<a href="#" class="card-footer-item">
				Edit
			</a>

			<a href="#" class="card-footer-item green is-bold">Delete</a>

		</footer>

	</div>  <!-- Card tag close -->

</template>


<script>

export default {
	
	data() {

		return{
			posts: []
		}
	},

	mounted() {
		let api = '/api/admin/post';
		this.axios
		.get(api).then((response) => {
			this.posts = response.data
		})
	},

}

</script>
