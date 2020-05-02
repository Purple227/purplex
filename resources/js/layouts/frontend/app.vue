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

	components: {
		Navbar,
		Foot,
	},

}
</script>

