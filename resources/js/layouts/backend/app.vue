
<template>

	<div class="container container_mobile"> <!-- Container tag open -->

		<Navbar v-if="guard"> </Navbar>

		<div class="columns is-gapless is-marginless"> <!-- Column wrapper tag open -->

			<div class="column is-2-desktop is-3-tablet column_2_bg"> <!-- Column  tag open -->
				<Sidebar v-if="guard"> </Sidebar>
			</div>  <!-- Column  tag close -->


			<div class="column is-10-desktop is-9-tablet column_10_bg"> <!-- Column  tag open -->
				<router-view v-if="guard"> </router-view>
<div class="" v-else> <!--start of login and register wrapper -->
<div class="buttons has-addons is-right" v-bind:style="myStyle">
  <button class="button"  @click="loginComponent"> Login </button>
  <button class="button" @click="registerComponent"> Register </button>
</div>

<keep-alive>
 <component v-bind:is="componentsToggle"></component>
</keep-alive>
</div>  <!--start of login and register wrapper -->

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
		'register':Register,
		'login':Login
	},

	data() {
		return{
			guard: false,
			componentsToggle : 'login',

			myStyle: {
				marginTop: '2%',
				marginRight: '1%',
			},
		}
	},

	beforeMount() {
		this.loginGuard()
	},

	methods: {

		loginGuard() {
			let api_url = "user"
			this.axios
			.get(api_url).then((response) => {
				this.guard = response.data
			})
		},

		loginComponent() {
			this.componentsToggle = 'login'
		},

		registerComponent: function() {
			this.componentsToggle = 'register'
		},

}//method calibrace closes


}

</script>