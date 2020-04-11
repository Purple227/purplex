
<template>

	<section class="container hero container_mobile">

		<div class="hero-body is-dark has-text-centered border_curve">
			<h1 class="title has-text-white">
				{{ post.title }}
			</h1> 
		</div>


		<div class="card border_curve" style="margin-top:10px;">
			<div class="card-content">

				<div class="content has-text-centered bold">
					{{ post.description }} 
					<a>@bulmaio</a>.
					<a href="#">#css</a> 
					<a href="#">#responsive</a>
					<br>
					<time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
				</div>
			</div>
		</div>

	</section>

</template>


<script>

export default{

	data() {
		return{
			post: {
				title : null,
				description: null,
				created_at: null,
				updated_at: null,
				tags: [],
			}
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
				
			})
		},

	},


}
</script>
