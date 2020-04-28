<template>

	<aside class="menu is-block">

<a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" v-bind:class="{ 'is-active': isActive }" v-on:click="addActiveClass">

  <span aria-hidden="true" class="mobile_menu"></span>
  <span aria-hidden="true" class="mobile_menu"></span>
  <span aria-hidden="true" class="mobile_menu"></span>
</a>



<div class="navbar-menu " v-bind:class="{ 'is-active': isActive }" v-on:click="addActiveClass"> <!-- mobile menu wrapper open -->

		<i class="fas fa-edit is-bold fa-lg is-marginless">  Create </i> 
		<ul class="menu-list">
			<li>
				<router-link :to="{name: 'create-post'}" active-class='is-active' exact>
					 Post
				</router-link>
			</li>
		</ul>

		<i class="fas fa-table is-bold fa-lg">  Tables </i> 
		<ul class="menu-list">
			<li>
				<router-link :to="{name: 'list-posts'}" active-class='is-active' exact>
					Posts <span class="tag is-pulled-right"> {{ posts }} </span>
				</router-link>
			</li>

			<li>
				<router-link :to="{name: 'list-tags'}" active-class="is-active">
					Tags <span class="tag is-pulled-right"> {{ tags }} </span>
				</router-link>
			</li>

			<li>
				<router-link :to="{name: 'email-list'}" active-class="is-active">
					Subscribers <span class="tag is-pulled-right"> {{ subscribers }} </span>
				</router-link>
			</li>


		</ul>


		<i class="fas fa-running is-bold fa-lg">  Docs </i> 
		<ul class="menu-list">
			<li>
				<a class=" ">
					Get started
				</a>
			</li>
		</ul>


		<i class="fas fa-plus-circle is-bold fa-lg">  Others </i> 
		<ul class="menu-list">

			<li>
				<a target="blank" href="http://127.0.0.1:8000/" class=" ">
					View site
				</a>
			</li>
			
			<li>
				<router-link :to="{name: 'about'}" active-class="is-active">
					About
				</router-link>
			</li>

		</ul>

		<ProfileImage> </ProfileImage>

	</div> <!-- mobile menu wrapper close-->

	</aside>

</template>



<script>

import dynamicClassToggler from '../../../mixins/dynamic-class-handler'
import ProfileImage from './profile-image.vue'

export default {

	mixins: [
	dynamicClassToggler
	],

	components:
	{
		ProfileImage,
	},

	data() {
		return {
			posts : null,
			tags: null,
			subscribers: null,
		}
	},


	mounted() {
		let api = '/api/admin/home';
		this.axios
		.get(api).then((response) => {
			this.posts = response.data[0];
			this.tags =response.data[1];
			this.subscribers =response.data[2];
		})
	},


}
</script>




































