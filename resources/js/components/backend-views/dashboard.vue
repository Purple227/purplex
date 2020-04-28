<template>

	<div class="card"> <!-- Card tag open -->

		<div class="" v-if="false">
		<edit-user @senderPlus="statusSignal"> </edit-user>
		</div>

<div class="notification has-text-centered is-primary" v-if="status">
  <button class="delete" @click="staus = null"></button>
  <strong> Succesfull</strong>
</div>



<div class="columns is-mobile">
  <div class="column is-11 is-offset-0">
  	
				<div class="card-content"> <!-- card content tag open -->
					<DoughnutChart :data="chartData" :options="chartOptions" class="doughnut_chart" aria-label="Hello ARIA World" role="img"> <p> Update your browser or make sure javascript is turn on. Chart not supported </p> </DoughnutChart>
				</div>  <!-- card content tag close -->


  </div>
</div>




		 <!--
		 	My new box for card start here section am working on start here. this for clarity 
		 -->


	</div>  <!-- Columns wrapper tag close -->


</div>  <!-- Card tag close -->


</template>



<script>

import DoughnutChart from "./chart/doughnut-chart";
import EditUser from './user/edit-user.vue'

export default {

  name: "dashboard",

  components: {
  	DoughnutChart,
  	'edit-user': EditUser,
  },

  data() {
  	return {
  		posts: null,
  		tags: null,
  		status: null,


	  chartOptions: { // chart option calibrace syntax open 

	  	hoverBorderWidth: 20,
	  	maintainAspectRatio: false,
	  	responsive: true,

	  	legend: {
	  		display: true,
	  		position: 'bottom',
	  		labels: {
	  			fontColor: '#FFF8DC',
	  			fontSize: 14,
	  			fontStyle: 'bold',
	  		}
	  	},

	  	title: {
	  		display: true,
	  		text: 'Traffic Overview',
	  		fontColor: '#00d1b2',
	  		fontSize: 18,
	  		position: 'top',
	  	},

	  },

	  chartData: {
	  	labels: ["Today", "Return", "Click Rate", "Posts View"],
	  	datasets: [
	  	{
		  //label: "Data One",
		  backgroundColor: ["#eddd53", "#add45c", "#57c785", "#00baad"],
		  data: [2, 3, 5, 7]
		}
		]
	}
};
  },  // chart option calibrace syntax close

  	mounted() {
  		this.homeData()
	},


  methods: {

    statusSignal: function(value) {
      this.status = value
      console.log(this.status)
    },

  },// method calibrace close


};
</script>







































































