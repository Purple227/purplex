

<template>

<div class="container container_mobile">

<div class="card has-text-centered border_curve">
	<div class="card-content">
		<p class="title">
			Hello, I'm <span class="death_pink"> Joseph P Akpere. </span> I'm a full-stack developer.
		</p>
	</div>

	<footer class="card-footer">
		<p class="card-footer-item is-dark border_curve">
			<router-link :to="{name:'portfolio'}" class="has-text-white">
				 Projects 
			</router-link>
		</p>

		<p class="card-footer-item is-dark border_curve">
			<a href="https://www.linkedin.com/in/purple227" target="_blank" class="has-text-white"> 
			Hire me
			</a>
		</p>
	</footer>

</div>

</div>

</template>

<script>

export default{

	metaInfo: {
		title: 'Home',

    meta: [
    { name: 'description', content:  'Epiloge is about connecting in your field of interest. Our vision is to help people share their knowledge, work, projects, papers and ideas and build their network through what they do rather where they live, study or work.'},
    { property: 'og:title', content: "Epiloge - Build your network in your field of interest"},
    { property: 'og:site_name', content: 'Epiloge'},
    {property: 'og:type', content: 'website'},    
    {name: 'robots', content: 'index,follow'} 
    ]
    
	},

}
</script>















