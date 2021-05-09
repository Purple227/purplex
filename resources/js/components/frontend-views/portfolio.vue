<template>

	<div class="container has-text-centered"> <!-- Container tag start -->

		<span class="icon is-large">
			<i class="fas fa-briefcase fa-4x"></i>
		</span>

		<p class="title has-text-white"> Some Projects </p>


		<div class="columns"> <!-- Columns wrapper tag open -->

			<div class="column"> <!-- Column tag open -->

				<div class="projects">
					<a href="https://github.com/Purple227/inventory" target="_blank">
					<i class="fas fa-boxes fa-lg"> Stock Record</i>
					<p class="fa has-text-white">
						Is an application that take records of stocks in and out of a storehouse. The application is tiedly coupled to a cocoa store.
					</p>
				</a>
				</div>

				<div class="projects">
					<a href="https://github.com/Purple227/Laravel-blog-system" target="_blank">
					<i class="fas fa-blog fa-lg"> Blog System </i>
					<p class="fa has-text-white">
						This a blog system with all the feature of a CMS. User Role, Author Section, Elegant form for writting blog post and so on.
					</p>
				</a>
				</div>


			</div> <!-- Column tag close -->



			<div class="column">  <!-- Column tag open -->

				<div class="projects">
					<a href="https://github.com/Purple227/purplex" target="_blank">
					<i class="fas fa-globe fa-lg"> Purple-Board </i>
					<p class="fa has-text-white">
						Purple-Board is mini dashboard build for managing frontend content. It was actually crafted because i find other open source dashboard too combustion for my limited need for a dashboard. It's the dashboard backend powering the site you on right now...
					</p>
				</a>
				</div>

				<div class="projects">
					<a href="https://github.com/Purple227" target="_blank">
					<i class="fas fa-plus-circle fa-lg"> More On Github </i>
				</a>
				</div>

			</div>  <!-- Column tag close -->


		</div> <!-- Columns wrapper tag close -->


	</div> <!-- Container tag close -->

</template>


<script>

import SkeletonCard from 'vue-skeleton-screen';

export default {


   metaInfo: {
      title: 'Project',
      htmlAttrs: {
        lang: 'en',
        amp: true
      }
    },

  components: {
    SkeletonCard,
  },

  data() {
    return{
      projects: [],
      loader: true,
    }
  },

  mounted() {
    this.getProject()
  },

  methods: {

    getProject(api) {
      let api_url = "https://api.github.com/users/purple227/repos"
      this.axios
      .get(api_url).then((response) => {
      	console.log(response)
        this.projects = 'test'
        this.loader = false
      })
    }

}



}

</script>


