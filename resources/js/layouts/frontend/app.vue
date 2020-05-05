<template>
	<div>

		<Navbar> </Navbar>

		<router-view> </router-view>

		<Foot> </Foot>

	</div>
</template>


<script>

import Navbar from './partials/navbar.vue'
import Foot from './partials/footer.vue';


export default {

	metaInfo: {
		title: 'Home',
		titleTemplate: '%s - Purplex',
		htmlAttrs: {
			lang: 'en',
			amp: true
		}
	},

	components: {
		Navbar,
		Foot,
	},

}
</script>

