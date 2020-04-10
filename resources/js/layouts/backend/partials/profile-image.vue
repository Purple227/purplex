<template>
	
	<figure class="image is-128x128 menu">
		<img class="is-rounded is_bordered" src="getImagePath">
	</figure>

</template>


<script>

export default{

	data() {
		return{
			imagePath:null,
		}
	},

	created() {
		this.getImageData()
	},

	methods: {

		getImageData() {
			let api_url = "user/edit-authId"
			this.axios
			.get(api_url).then((response) => {
				this.imagePath = response.data.image
			})
		},

      },// method calibrace closes here

      computed: {
    // a computed getter
    getImagePath: function () {
      // `this` points to the vm instance
      let originalPath = this.imagePath
      let laravelRootPath = 'Storage/'
      let completePath = laravelRootPath + originalPath
      return this.imagePath = completePath
  }
}

}
</script>

