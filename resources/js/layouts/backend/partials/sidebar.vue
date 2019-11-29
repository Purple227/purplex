<template>

	<aside class="menu is-block">


<a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" v-bind:class="{ 'is-active': !isActive }" v-on:click="isActive = !isActive">
  <span aria-hidden="true" class="mobile_menu"></span>
  <span aria-hidden="true" class="mobile_menu"></span>
  <span aria-hidden="true" class="mobile_menu"></span>
</a>



<div class="navbar-menu " v-bind:class="{ 'is-active': !isActive }" v-on:click="isActive = !isActive"> <!-- mobile menu wrapper open -->

		<i class="fas fa-edit is-bold fa-lg">  Create </i> 
		<ul class="menu-list">
			<li>
				<router-link :to="{name: 'create-post'}" active-class='is-active' exact>
					 Post
				</router-link>
			</li>

			<li>
				<router-link :to="{name: 'create-project'}" active-class='is-active' exact>
					Project 
				</router-link>
			</li>

		</ul>

		<i class="fas fa-table is-bold fa-lg">  Tables </i> 
		<ul class="menu-list">
			<li>
				<router-link :to="{name: 'list-posts'}" active-class='is-active' exact>
					Posts <span class="tag is-pulled-right"> 12 </span>
				</router-link>
			</li>

			<li>
				<router-link :to="{name: 'list-projects'}" active-class='is-active' exact>
					Projects <span class="tag is-pulled-right"> 4 </span>
				</router-link>
			</li>

						<li>
				<a class=" ">
					Tags <span class="tag is-pulled-right"> 34 </span>
				</a>
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
				<a class=" ">
					About
				</a>
			</li>

			<li>
				<a class=" ">
					Support
				</a>
			</li>

			<li>
				<a target="blank" href="http://127.0.0.1:8000/" class=" ">
					View site
				</a>
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
      
    }
  },

}
</script>




































