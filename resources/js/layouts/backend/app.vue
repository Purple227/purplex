
<template>

	<div class="container container_mobile"> <!-- Container tag open -->

		<Navbar> </Navbar>

		<div class="columns is-gapless is-marginless"> <!-- Column wrapper tag open -->

			<div class="column is-2-desktop is-3-tablet column_2_bg"> <!-- Column  tag open -->
				<Sidebar> </Sidebar>
			</div>  <!-- Column  tag close -->


			<div class="column is-10-desktop is-9-tablet column_10_bg"> <!-- Column  tag open -->
				<router-view v-if="false"> </router-view>
				<register v-if="false"> </register>
				<login> </login>
			</div> <!-- Column  tag close -->

		</div>  <!-- Column wrapper tag open -->

	</div> <!-- Container tag open -->

</template>

<script>

import Navbar from './partials/navbar.vue'
import Sidebar from './partials/sidebar.vue'
import Register from '../../components/backend-views/user/register.vue'
import Login from '../../components/backend-views/user/login.vue'

export default 
{

	components: 
	{
		Navbar,
		Sidebar,
		Register,
		Login
	},

}

</script>