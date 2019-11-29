<template>

	<div class="container container_mobile"> <!-- Container tag start -->

		<div class="card project_card" v-for="project in projects"> <!-- Card tag open -->

			<header class="card-header ">
				<p class="card-header-title is-centered title is-5">
					{{ project.title }}
				</p>
			</header>

			<div class="card-content"> <!-- Card content tag open -->
				<div class="content">

					{{ project.description }}

					<time datetime="2016-1-1" class="death_pink"> {{ project.updated_at }} </time>

				</div>
			</div> <!-- Card content tag close -->

		</div>  <!-- Card tag close -->

	</div> <!-- Container tag close -->



</template>


<script>

export default {

	data: function () {
		return {
			projects: []
		}
	},

		mounted() {
		let uri = '/api/admin/projects';
		this.axios
		.get(uri).then((response) => {
			this.projects = response.data
		})
	},

}

</script>