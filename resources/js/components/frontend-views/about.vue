<template>

	<section class="container hero container_mobile">


        <skeleton-card actions round hover isLoading v-if="dataLoading"></skeleton-card>


    <div class="wrapper" v-else> <!-- Wrapper tag open -->


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

				<div class="content has-text-centered bold" v-html="aboutMe.description ">
 <a>@bulmaio</a>.
					<a href="#">#css</a> <a href="#">#responsive</a>
					<br>
					<time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
				</div>
			</div>
		</div>

  </div> <!-- Wrapper tag close -->

	</section>

</template>


<script>
import SkeletonCard from 'vue-skeleton-screen';


export default {

  components: {
    SkeletonCard,
  },


 metaInfo() {
  return {
    title: 'Joseph Purple Akpere',

    meta: [
    { name: 'description', content:  'Epiloge is about connecting in your field of interest. Our vision is to help people share their knowledge, work, projects, papers and ideas and build their network through what they do rather where they live, study or work.'},
    { property: 'og:title', content: "Epiloge - Build your network in your field of interest"},
    { property: 'og:site_name', content: 'Epiloge'},
    {property: 'og:type', content: 'website'},    
    {name: 'robots', content: 'index,follow'} 
    ]

  }
},

data() {
  return{

    aboutMe: {
     title: null,
     subtitle: null,
     description: null,
   },

   dataLoading: true,

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
      this.dataLoading = false 
    })

  }

  }, // Method calibrace closes


}

</script>
