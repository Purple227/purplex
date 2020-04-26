
<template>
	<div class="dropdown level-item is-right" v-bind:class="{ 'is-active': isActive }"  v-on-clickaway="away" @click="addActiveClass">
		<div class="dropdown-trigger">
			<i class="fas fa-user"> </i>
		</div>

		<div class="dropdown-menu" id="dropdown-menu3" role="menu">
			<div class="dropdown-content">

				<router-link :to="{name: 'edit-user'}" active-class="is-active" class="dropdown-item">
					Update Profile
				</router-link>

				<router-link :to="{name: 'update-security'}" active-class="is-active" class="dropdown-item">
					Change Password
				</router-link>

				<a class="dropdown-item" @click="logout">
					Logout
				</a>

			</div>
		</div>
	</div>
</template>


<script>

import DynamicClassHandler from '../../../../mixins/dynamic-class-handler'

export default{

  mixins: [
  DynamicClassHandler
  ],

  data() {
    return{
    	//reactive data
    }
  },

methods: {

  logout() {
    let api = "logout"
    this.axios.post(api, {
    }).then((response) => {
      history.go();
    }).catch(function (error) {
      console.log(error)
    });
  },

} //method calibrace close

}

</script>


























