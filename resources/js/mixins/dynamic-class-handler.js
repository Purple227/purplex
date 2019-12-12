
import { mixin as clickaway } from 'vue-clickaway';

export default {
	  mixins: [ clickaway ],

data() {

	return{
			isActive: false,
		    isHidden: 'is-hidden',
		}
	},

	methods: {

    addActiveClass() {
      this.isActive = !this.isActive;
    },

    away: function() {
      this.isActive = false;
    },

  },

}
