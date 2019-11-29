
export default {

data() {

	return{
			isActive: true,
		    isHidden: 'is-hidden',
		}
	},

	methods: {

    addActiveClass() {
      this.isActive = !this.isActive;
    }

  },

}
