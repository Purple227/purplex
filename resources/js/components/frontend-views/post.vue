
<template>

	<section class="container hero container_mobile post">

		    <skeleton-card actions round hover isLoading v-if="dataLoading"></skeleton-card>

    <div class="wrapper" v-else> <!-- Wrapper tag open -->


		<div class="hero-body is-dark has-text-centered border_curve">
			<h1 class="title has-text-white">
				{{ post.title }} 
			</h1> 
		</div>

		<social-sharing class="social" :url="currentUrl"
		:title="post.title"
		:description="post.description"
		quote="Vue is a progressive framework for building user interfaces."
		:hashtags="post.tags.toString()"
		twitter-user="vuejs"
		inline-template>
		<div>

			<p  class="subtitle is-inline has-text-white is-marginless"> Share </p>

			<network network="email">
				<i class="fa fa-envelope icon has-text-white" style="font-size: 25px;"></i>
			</network>

			<network network="facebook">
				<i class="fab fa-facebook-square icon has-text-white" style="font-size: 25px; margin-top:15px;"></i> 
			</network>

			<network network="linkedin">
				<i class="fab fa-linkedin icon has-text-white" style="font-size: 25px; margin-top:15px;"></i>
			</network>

			<network network="twitter">
				<i class="fab fa-twitter icon has-text-white" style="font-size: 25px; margin-top:15px;"></i> 
			</network>

			<network network="whatsapp">
				<i class="fab fa-whatsapp icon has-text-white" style="font-size: 25px; margin-top:15px;"></i> 
			</network>
		</div>
	</social-sharing>


	<div class="card border_curve" style="margin-top:10px;">
		<div class="card-content">

			<div class="content post_wrap has-text-black" v-html="post.description">
				<a>@bulmaio</a>.
				<a href="#">#css</a> 
				<a href="#">#responsive</a>
				<br>
				<time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
			</div>
		</div>
	</div>


<div class="field is-grouped is-grouped-multiline" style="margin-top:20px">
  <div class="control">
    <div class="tags has-addons">
      <span class="tag is-white"> Tags </span>
      <span class="tag is-black "> {{ post.tags.length }} </span>
    </div>
  </div>

  <div class="control">
    <div class="tags"  >
      <span class="tag is-white" v-for="(tag, index) in  post.tags"> {{ tag }} </span>
    </div>
  </div>

</div>

</div> <!-- Wrapper tag close -->



</section>

</template>


<script>
import SocialShare from '../../../../public/js/vue-social-sharing.js'
import SkeletonCard from 'vue-skeleton-screen';

export default{


	metaInfo() {
		return {
			title: `${this.post.title} - Purplex`,
			htmlAttrs: {
				lang: 'en',
				amp: true
			}
		}
	},

	components: {
		'social-sharing': SocialShare,
		SkeletonCard,
	},

	data() {
		return{
			post: {
				title : null,
				description: null,
				created_at: null,
				updated_at: null,
				tags: [],
			},

			currentUrl: window.location.href,
			dataLoading: true,

		}
	},

	mounted() {
		this.postData()
	},

	methods: {

		postData() {
			let api = '/api/blog/' + this.$route.params.slug
			this.axios
			.get(api).then((response) => {
				this.post.title = response.data.title
				this.post.description = response.data.description
				this.post.created_at = response.data.created_at 
				this.post.updated_at = response.data.updated_at

				let tags = response.data.tags
				let newTags = []
				for (let i = 0; i < tags.length; i++) {
					newTags.push(tags[i].name)
				}

				this.post.tags = newTags

				this.dataLoading = false 
				
			})
		},

	},


}
</script>
