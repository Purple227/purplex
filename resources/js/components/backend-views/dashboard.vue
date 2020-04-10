<template>

	<div class="card"> <!-- Card tag open -->

		<div class="" v-if="false">
		<edit-user @senderPlus="statusSignal"> </edit-user>
		</div>

<div class="notification has-text-centered is-primary" v-if="status">
  <button class="delete" @click="staus = null"></button>
  <strong> Succesfull</strong>
</div>

		<div class="columns is-gapless is-marginless"> <!-- Columns wrapper tag open -->

			<div class="column is-8"> <!-- Column is-8 tag open -->

				<div class="card-content"> <!-- card content tag open -->
					<DoughnutChart :data="chartData" :options="chartOptions" class="doughnut_chart" aria-label="Hello ARIA World" role="img"> <p> Update your browser or make sure javascript is turn on. Chart not supported </p> </DoughnutChart>
				</div>  <!-- card content tag close -->


		 <!--
		 	My new box for card start here section am working on start here. this for clarity 
		 -->

		 <div class="card-content"> <!-- card content tag open -->

		 	<div class="redundancy"> <!-- This just insolence open -->

		 		<p class="title is-5 has-text-centered has-text-success ">
		 			Most Read
		 		</p>

		 		<div class="table_wrapper_plus"> <!-- Table wrapper plus tag open -->

		 			<table class="table is-bordered "> <!-- table wrapper tag open -->

		 				<thead>  <!-- thead tag open -->
		 					<tr>

		 						<th title="Number" class="has-text-success"> No. </th>
		 						<th class="has-text-centered has-text-success is_hidden_mobile_tablet"> Title </th>
		 						<th class="has-text-success"> Views </th>
		 						<th class="has-text-success "> Created </th>
		 						<th class="has-text-success"> Action </th>

		 					</tr>
		 				</thead>  <!-- thead tag close -->

		 				<tfoot>  <!-- tfoot tag open -->
		 					<tr>

		 						<th title="Number" class="has-text-success"> No. </th>
		 						<th class="has-text-centered has-text-success is_hidden_mobile_tablet"> Title </th>
		 						<th class="has-text-success"> Views </th>
		 						<th class="has-text-success "> Created </th>
		 						<th class="has-text-success"> Action </th>

		 					</tr>
		 				</tfoot>  <!-- tfoot tag open -->

		 				<tbody>  <!-- tbody tag open -->

		 					<tr>
		 						<th class="has-text-success"> 1 </th>
		 						<td class="is_hidden_mobile_tablet"> Blah blah blah blah blah blah... </td>
		 						<td class="has-text-centered"> 54 </td>
		 						<td class=""> 3 Oct </td>
		 						<td class="has-text-centered"> <i class="fas fa-eye has-text-success"></i> </td>
		 					</tr>

		 					<tr>
		 						<th class="has-text-success"> 2 </th>
		 						<td class="is_hidden_mobile_tablet"> Blah blah blah blah blah blah... </td>
		 						<td class="has-text-centered"> 32 </td>
		 						<td class=""> 4 Oct </td>
		 						<td class="has-text-centered"> <i class="fas fa-eye has-text-success"></i> </td>
		 					</tr>

		 					<tr>
		 						<th class="has-text-success"> 3 </th>
		 						<td class="is_hidden_mobile_tablet"> Blah blah blah blah blah blah... </td>
		 						<td class="has-text-centered"> 22 </td>
		 						<td class=""> 3 Oct </td>
		 						<td class="has-text-centered"> <i class="fas fa-eye has-text-success"></i> </td>
		 					</tr>

		 					<tr>
		 						<th class="has-text-success"> 4 </th>
		 						<td class="is_hidden_mobile_tablet"> Blah blah blah blah blah blah...  </td>
		 						<td class="has-text-centered"> 22 </td>
		 						<td class=""> 3 Oct </td>
		 						<td class="has-text-centered"> <i class="fas fa-eye has-text-success"></i> </td>
		 					</tr>

		 				</tbody>  <!-- tbody tag close -->
		 			</table>  <!-- table wrapper tag close -->
		 		</div>  <!-- Table wrapper plus tag close -->

		 	</div> <!-- This just insolence close-->

		 </div>  <!-- card content tag close -->

		</div>  <!-- Column is-8 tag close -->




		<div class="column is-4">  <!-- Column is-4 tag open -->

			<div class="card-content">  <!-- card content tag close -->
				<div class="box"> <!-- Box tag open -->
					<i class=" fas fa-money-check-alt fa-4x">  </i>  <span class=" corn_silk is-bold"> $56,000  </span>
					<a class="button green is-bold is-block is-size-7-tablet"> Site Revenue </a>
				</div>  <!-- Box tag open -->

				<div class="box"> <!-- Box tag open -->
					<i class=" fas fa-share-alt fa-4x">  </i>  <span class=" corn_silk is-bold"> 26,000  </span>
					<a class="button is-bold is-block green is-size-7-tablet"> Social Share </a>
				</div>  <!-- Box tag close -->

				<div class="box"> <!-- Box tag open -->
					<i class=" fas fa-mail-bulk fa-4x">  </i>  <span class=" corn_silk is-bold"> {{ subscribers }}  </span>
					<a class="button is-bold is-block green is-size-7-tablet"> Email Listing </a>
				</div>  <!-- Box tag close -->

			</div>  <!-- card content tag close -->


		</div>  <!-- Column is-4 tag open -->

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
  		subscribers: null,
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

    homeData: function() {
    	let api = '/api/admin/home';
		this.axios
		.get(api).then((response) => {
			this.subscribers =response.data[2];
		})
    }

  },// method calibrace close


};
</script>







































































