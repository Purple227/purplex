
<template>


	<section class="container">

		<div class="navbar-brand my_center">
			<router-link :to="{name: 'home'}" class="navbar-item is-size-4" active-class='is-active' exact>
				Pur <span style="color:#FF1493;">p</span> lex
			</router-link>
		</div>

		<nav class="navbar is-transparent nav-desktop"> <!-- nav tag start -->

			<span class="level is-mobile is-hidden-desktop is-hidden-fullhd">
				<div class="navbar-burger burger level-item " v-bind:class="{ 'is-active': isActive }" v-on:click="addActiveClass" data-target="navbarExampleTransparentExample">
					<span class="mobile_menu_design level-item"></span>
					<span class="mobile_menu_design level-item"></span>
					<span class="mobile_menu_design level-item"></span>
				</div>

				<div class="level-item has-text-centered">
					<div class="field has-addons">


							<!-- Droppdown when a user start typing -->
							<div class="dropdown"  v-bind:class="classObject">
								<div class="dropdown-menu" id="dropdown-menu2" role="menu">
									<div class="dropdown-content">
										<div class="dropdown-item"  v-for="(data, index) in searchResult" :key="index">
											<router-link :to="{name: 'post', params: {slug: data.slug}}"> <span class="has-text-white" @click="searchQuery = '' ">  {{ data.title | truncate(0, 38)}} </span> </router-link>
											<hr>
										</div>
									</div>
								</div>
							</div>


						<p class="control has-icons-left">
							<input class="input" type="text" placeholder="Search article" v-model="searchQuery"  v-on:keyup="searchData">
							<span class="icon is-small is-left">
								<i class="fas fa-search"></i>
							</span>
						</p>
						<div class="control">
							<button class="button is-dark border_curve">Search</button>
						</div>
					</div>
				</div>
			</span>


			<div id="navbarExampleTransparentExample" class="navbar-menu" v-bind:class="{ 'is-active': isActive }" v-on:click="addActiveClass"> <!-- navbar menu tag open -->

				<div class="navbar-start">
					<!-- Social icons start mobile-->
					<center>
						<span class="icon are-large mobile_icon_center" >

							<span class="fa-stack ">
								<a class="navbar-item" href="#">
									<i class="fas fa-stack-2x"> </i>
									<i class="fab fa-facebook-square fa-2x"> </i>
								</a>
							</span>


							<span class="fa-stack">
								<a class="navbar-item" href="#" >
									<i class="fas fa-stack-2x"> </i>
									<i class="fab fa-linkedin fa-2x"> </i>
								</a>
							</span>

						</span>
					</center>
					<!-- Social icons end mobile-->


					<router-link :to="{name: 'portfolio'}" class="navbar-item" active-class='is-active'>
						<span> Projects </span>
					</router-link>

					<router-link :to="{name: 'blog'}" class="navbar-item" active-class='is-active'>
						<span>Blog</span>
					</router-link>

					<router-link :to="{name: 'contact'}" class="navbar-item" active-class='is-active' exact>
						<span>Contact</span>
					</router-link>

					<router-link :to="{name: 'about'}" class="navbar-item" active-class='is-active'>
						<span class="">About</span>
					</router-link>
				</div> <!-- navbar start tag close -->

				<div class="navbar-end is_hidden_mobile_tablet"> <!-- navbar end tag open -->
					<div class="navbar-item">
						<div class="field has-addons" style="margin-top: 3%;">

							<!-- Droppdown when a user start typing -->
							<div class="dropdown"  v-bind:class="classObject">
								<div class="dropdown-menu" id="dropdown-menu2" role="menu">
									<div class="dropdown-content">
										<div class="dropdown-item"  v-for="(data, index) in searchResult" :key="index">
											<router-link :to="{name: 'post', params: {slug: data.slug}}"> <span class="has-text-white" @click="searchQuery = '' ">  {{ data.title | truncate(0, 38)}} </span> </router-link>
											<hr>
										</div>
									</div>
								</div>
							</div>


							<p class="control has-icons-left has-icons-right">
								<input class="input" type="text" placeholder="Search article" v-model="searchQuery" v-on:keyup="searchData">
								<span class="icon is-small is-left">
									<i class="fas fa-search"></i>
								</span>
							</p>

							<div class="control">
								<button class="button is-dark border_curve">Submit</button>
							</div>

						</div>

						<a class="navbar-item" href="#" target="blank">
							<i class="fab fa-facebook-square fa-2x"></i>
						</a>

						<a class="navbar-item" href="#" target="blank">
							<i class="fab fa-linkedin fa-2x"></i>
						</a>

					</div>
				</div> <!-- Navbar end tag close -->

			</div> <!-- navbar menu tag open -->

		</nav> <!-- nav tag close -->


	</section> <!-- Container tag close here -->

</template>



<script>

import dynamicClassHandler from '../../../mixins/dynamic-class-handler'

export default {

	mixins: [
	dynamicClassHandler
    ],

	data: function () {
		return {
			searchQuery: "",
			searchResult: [],
		}
	},

  mounted() {
    this.searchData()
  },

	methods: {

		searchData() {
			this.searchResult = []
			if(this.searchQuery.length > 2) {
				axios.get('/api/blog/search',{params: {search_query: this.searchQuery}}).then(response => {

					let data = response.data
					let string = this.searchQuery.toLowerCase();

					function sortResult(value) {
  						return value.title.toLowerCase().indexOf(string) >= 0;
					}

					this.searchResult = data.filter(sortResult)

				});
			}
		},

	},//method calibrace close

computed: {
  classObject: function () {
    return {
      'is-active': this.searchQuery.length > 2,
      //'text-danger': this.error && this.error.type === 'fatal'
    }
  }
}

}

</script>











































