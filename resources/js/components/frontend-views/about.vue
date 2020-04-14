<template>

	<section class="container hero container_mobile">

		<div class="hero-body is-dark has-text-centered border_curve">
			<h1 class="title has-text-white">
				{{ aboutMe.title }}
			</h1> 
			<h2 class="subtitle has-text-white bold">
				{{ aboutMe.subtitle }}
			</h2>
		</div>


		<div class="card border_curve" style="margin-top:10px;">
			<div class="card-content">

				<div class="content has-text-centered bold">
{{ aboutMe.description }} <a>@bulmaio</a>.
					<a href="#">#css</a> <a href="#">#responsive</a>
					<br>
					<time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
				</div>
			</div>
		</div>

	</section>

</template>


<script>

export default {

  data() {
    return{

      aboutMe: {
      	title: null,
      	subtitle: null,
      	description: null,
      },

    }
  },

  mounted() {
    this.aboutData()
  },

  methods: {

    aboutData() {

      let api_url = "api/about/data"
      this.axios
      .get(api_url).then((response) => {
        this.aboutMe = response.data
      })

    }

  }, // Method calibrace closes


}

</script>
